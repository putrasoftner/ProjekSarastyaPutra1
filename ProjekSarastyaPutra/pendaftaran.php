<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran PKL - PT Sarastya Technology</title>
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/pendaftaran.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <h1>PT Sarastya Technology</h1>
            <p>Solusi Teknologi Terdepan untuk Masa Depan</p>
        </div>
    </header>

    <!-- Formulir -->
    <div class="container">
        <h2>Formulir Pendaftaran PKL</h2>
        <p>Silakan lengkapi data berikut untuk pendaftaran Program Kerja Lapangan (PKL).</p>
        <form action="proses_pendaftaran.php" method="POST" enctype="multipart/form-data">
            <!-- Biodata Peserta -->
            <fieldset>
                <legend>Biodata Peserta</legend>
                <div class="form-row">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" placeholder="Contoh: Muhammad Zaki" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" id="email" name="email" placeholder="Contoh: email@gmail.com" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input type="tel" id="no_hp" name="no_hp" placeholder="Contoh: 081xxxxxxxx" required>
                    </div>
                </div>
            </fieldset>

            <!-- Informasi Pendidikan -->
            <fieldset>
                <legend>Informasi Pendidikan</legend>
                <div class="form-row">
                    <div class="form-group">
                        <label for="jenjang">Jenjang Pendidikan</label>
                        <select id="jenjang" name="jenjang" required>
                            <option value="SMA/SMK">SMA/SMK</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lembaga">Lembaga Pendidikan</label>
                        <input type="text" id="lembaga" name="lembaga" placeholder="Nama sekolah/universitas" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="jurusan">Fakultas/Jurusan</label>
                        <input type="text" id="jurusan" name="jurusan" required>
                    </div>
                    <div class="form-group">
                        <label for="judul_pkl">Judul PKL</label>
                        <input type="text" id="judul_pkl" name="judul_pkl" placeholder="Masukkan rencana topik PKL" required>
                    </div>
                </div>
            </fieldset>

            <!-- Upload Dokumen -->
            <fieldset>
                <legend>Upload Dokumen</legend>
                <div class="form-row">
                    <div class="form-group">
                        <label for="ktp">Upload KTP</label>
                        <input type="file" id="ktp" name="ktp" accept="image/*,.pdf" required>
                    </div>
                    <div class="form-group">
                        <label for="cv">Upload CV</label>
                        <input type="file" id="cv" name="cv" accept=".pdf,.docx" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="surat_rekomendasi">Upload Surat Rekomendasi</label>
                        <input type="file" id="surat_rekomendasi" name="surat_rekomendasi" accept=".pdf" required>
                    </div>
                    <div class="form-group">
                        <label for="transkrip">Upload Transkrip Nilai</label>
                        <input type="file" id="transkrip" name="transkrip" accept=".pdf" required>
                    </div>
                </div>
            </fieldset>

            <!-- Tombol Kirim -->
            <div style="text-align: center; margin-top: 20px;">
                <button type="submit">Daftar</button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <p>&copy; 2024 PT Sarastya Technology. Semua Hak Dilindungi.</p>
        </div>
    </footer>
</body>
</html>
