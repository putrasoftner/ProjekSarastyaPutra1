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

// Ambil data dari formulir
$nama = $_POST['nama'];
$email = $_POST['email'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$no_hp = $_POST['no_hp'];
$jenjang = $_POST['jenjang'];
$lembaga = $_POST['lembaga'];
$jurusan = $_POST['jurusan'];
$judul_pkl = $_POST['judul_pkl'];

// Tangani file upload
$uploads_dir = '';
if (!is_dir($uploads_dir)) {
    mkdir($uploads_dir, 0777, true);
}

$ktp_path = $uploads_dir . '' . basename($_FILES['ktp']['name']);
$cv_path = $uploads_dir . '' . basename($_FILES['cv']['name']);
$surat_rekomendasi_path = $uploads_dir . '' . basename($_FILES['surat_rekomendasi']['name']);
$transkrip_path = $uploads_dir . '' . basename($_FILES['transkrip']['name']);

move_uploaded_file($_FILES['ktp']['tmp_name'], $ktp_path);
move_uploaded_file($_FILES['cv']['tmp_name'], $cv_path);
move_uploaded_file($_FILES['surat_rekomendasi']['tmp_name'], $surat_rekomendasi_path);
move_uploaded_file($_FILES['transkrip']['tmp_name'], $transkrip_path);

// Masukkan data ke database
$sql = "INSERT INTO pendaftaran 
    (nama, email, tanggal_lahir, no_hp, jenjang, lembaga, jurusan, judul_pkl, ktp_path, cv_path, surat_rekomendasi_path, transkrip_path) 
    VALUES 
    ('$nama', '$email', '$tanggal_lahir', '$no_hp', '$jenjang', '$lembaga', '$jurusan', '$judul_pkl', '$ktp_path', '$cv_path', '$surat_rekomendasi_path', '$transkrip_path')";

if ($conn->query($sql) === TRUE) {
    echo "Pendaftaran berhasil disimpan!";
    header("Location: pendaftaran.php"); // Redirect ke halaman hasil
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
