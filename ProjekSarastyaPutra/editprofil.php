<?php
// Koneksi ke database
$host = 'localhost';
$dbname = 'sarastya';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Inisialisasi session
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Ambil data user yang sudah login
$username = $_SESSION['username'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$stmt->execute(['username' => $username]);
$user = $stmt->fetch();

// Proses update profile jika form dikirimkan
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newUsername = $_POST['username'];
    $newPassword = $_POST['password'];

    // Cek apakah username diubah
    if ($newUsername && $newUsername !== $user['username']) {
        $stmt = $pdo->prepare("UPDATE users SET username = :newUsername WHERE username = :username");
        $stmt->execute(['newUsername' => $newUsername, 'username' => $username]);
        $_SESSION['username'] = $newUsername;
    }

    // Cek apakah password diubah
    if ($newPassword) {
        $hashedPassword = hash('sha256', $newPassword);
        $stmt = $pdo->prepare("UPDATE users SET password = :newPassword WHERE username = :username");
        $stmt->execute(['newPassword' => $hashedPassword, 'username' => $username]);
    }

    // Redirect ke halaman dashboard setelah update berhasil
    header('Location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/profil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Edit Akun</title>
</head>
<body>
    <div class="company-container">
        <div class="logo"></div>
        <div class="company-label">Sarastya Technology</div>
    </div>

    <div class="login-container">
        <h2>Edit Akun</h2>
        <form method="POST" action="" autocomplete="off">
            <label for="username">Username</label>
            <div class="input-icon">
                <i class="fas fa-user"></i>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required autocomplete="off">
            </div>
            <label for="password">Password</label>
            <div class="input-icon">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Enter new password if you wish to change" autocomplete="new-password">
            </div>
            <input type="submit" value="Update Profile">
        </form>
    </div>
</body>
</html>
