<?php
include 'koneksi.php';

// Ambil nama dari URL (edit_peminjaman.php?nama=...)
$nama_target = $_GET['nama'];

// Cari data berdasarkan nama tersebut
$query = mysqli_query($conn, "SELECT * FROM peminjaman WHERE Nama='$nama_target'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Peminjaman</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>
    <div class="auth-form-container" style="max-width: 600px; margin: 50px auto;">
        <h2>Edit Peminjaman Fasilitas</h2>
        
        <form action="prosesedit.php" method="POST">
            <input type="hidden" name="nama_lama" value="<?php echo $data['Nama']; ?>">

            <label class="label-soal">Nama Lengkap Siswa:</label>
            <input type="text" name="p-nama-siswa" class="input-kuis" value="<?php echo $data['Nama']; ?>">

            <label class="label-soal">Fasilitas yang Dipinjam:</label>
            <select name="p-jenis-fasilitas" class="input-kuis">
                <option value="Laboratorium RPL" <?php if($data['Alat'] == 'Laboratorium RPL') echo 'selected'; ?>>Laboratorium RPL</option>
                <option value="Laboratorium Akuntansi" <?php if($data['Alat'] == 'Laboratorium Akuntansi') echo 'selected'; ?>>Laboratorium Akuntansi</option>
                <option value="Aula Utama" <?php if($data['Alat'] == 'Aula Utama') echo 'selected'; ?>>Aula Utama</option>
                <option value="Proyektor LCD" <?php if($data['Alat'] == 'Proyektor LCD') echo 'selected'; ?>>Proyektor LCD</option>
                <option value="Laptop Sekolah" <?php if($data['Alat'] == 'Laptop Sekolah') echo 'selected'; ?>>Laptop Sekolah</option>
            </select>

            <label class="label-soal">Tanggal Penggunaan:</label>
            <input type="date" name="p-tanggal" class="input-kuis" value="<?php echo $data['Tanggal']; ?>">

            <button type="submit" class="auth-button" style="margin-top:20px;">UPDATE DATA</button>
            <br><br>
            <a href="peminjaman.php">Batal</a>
        </form>
    </div>
</body>
</html>
