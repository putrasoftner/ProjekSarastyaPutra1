<?php
// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'sarastya';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil semua data pendaftaran
$sql = "SELECT * FROM pendaftaran";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran PKL - PT Sarastya Technology</title>
    <link rel="stylesheet" href="css/hasil.css">
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="header-container">
            <h1>PT Sarastya Technology</h1>
            <p>Masa Depan Dimulai di Sini</p>
        </div>
    </header>

    <div class="container">
        <h2>Daftar Pendaftaran PKL</h2>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Tanggal Lahir</th>
                    <th>No HP</th>
                    <th>Jenjang</th>
                    <th>Lembaga</th>
                    <th>Jurusan</th>
                    <th>Judul PKL</th>
                    <th>Dokumen</th>
                    <th>Tanggal Pendaftaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['tanggal_lahir'] ?></td>
                    <td><?= $row['no_hp'] ?></td>
                    <td><?= $row['jenjang'] ?></td>
                    <td><?= $row['lembaga'] ?></td>
                    <td><?= $row['jurusan'] ?></td>
                    <td><?= $row['judul_pkl'] ?></td>
                    <td>
                        <a href="<?= 'uploads1/' . $row['ktp_path'] ?>" class="doc-link" target="_blank">KTP</a><br>
                        <a href="<?= 'uploads1/' . $row['cv_path'] ?>" class="doc-link" target="_blank">CV</a><br>
                        <a href="<?= 'uploads1/' . $row['surat_rekomendasi_path'] ?>" class="doc-link" target="_blank">Surat Rekomendasi</a><br>
                        <a href="<?= 'uploads1/' . $row['transkrip_path'] ?>" class="doc-link" target="_blank">Transkrip Nilai</a>
                    </td>
                    <td><?= $row['tanggal_pendaftaran'] ?></td>
                    <td>
                        <a href="hapus.php?id=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Login User Button -->
        <div class="login-btn-container">
            <a href="daftar-login.php" class="login-btn">Login User</a>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-container">
            <p>&copy; 2024 PT Sarastya Technology. Semua Hak Dilindungi.</p>
        </div>
    </footer>

</body>
</html>

<style>
    .login-btn-container {
        text-align: center;
        margin-top: 20px;
    }

    .login-btn {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .login-btn:hover {
        background-color: #45a049;
    }
</style>
