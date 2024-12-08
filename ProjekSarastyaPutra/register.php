<?php
// Koneksi langsung ke database
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

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Validasi input
    if ($password !== $confirmPassword) {
        $error = 'Password dan konfirmasi password tidak cocok.';
    } else {
        // Hash password
        $hashedPassword = hash('sha256', $password);

        // Cek apakah username atau email sudah terdaftar
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
        $stmt->execute(['username' => $username, 'email' => $email]);
        if ($stmt->rowCount() > 0) {
            $error = 'Username atau email sudah terdaftar.';
        } else {
            // Masukkan data ke database
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)");
            $stmt->execute([
                'username' => $username,
                'email' => $email,
                'password' => $hashedPassword,
                'role' => 'user' // Peran default sebagai user
            ]);
            $success = 'Registrasi berhasil. Silakan login.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/stylelogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Register</title>
</head>
<body>
    <div class="company-container">
        <div class="logo"></div>
        <div class="company-label">Sarastya Technology</div>
    </div>

    <div class="register-container">
        <h2>Register</h2>
        <form method="POST" action="register.php" autocomplete="off"> 
            <label for="username">Username</label>
            <div class="input-icon">
                <i class="fas fa-user"></i>
                <input type="text" id="username" name="username" required autocomplete="off"> 
            </div>
            <label for="email">Email</label>
            <div class="input-icon">
                <i class="fas fa-envelope"></i>
                <input type="email" id="email" name="email" required autocomplete="off"> 
            </div>
            <label for="password">Password</label>
            <div class="input-icon">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" required autocomplete="new-password"> 
            </div>
            <label for="confirm-password">Konfirmasi Password</label>
            <div class="input-icon">
                <i class="fas fa-lock"></i>
                <input type="password" id="confirm-password" name="confirm-password" required autocomplete="new-password"> 
            </div>
            <input type="submit" value="Register">
        </form>

        <?php if (!empty($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php elseif (!empty($success)): ?>
            <p class="success"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
