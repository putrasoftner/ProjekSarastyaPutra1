<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'sarastya';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mendapatkan ID dari URL
$id = $_GET['id'];

// Menghapus data berdasarkan ID
$sql = "DELETE FROM pendaftaran WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    echo "<script>alert('Data berhasil dihapus!'); window.location.href = 'admin-hasil.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location.href = 'admin-hasil.php';</script>";
}

$stmt->close();
$conn->close();
?>
