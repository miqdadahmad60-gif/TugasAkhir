<?php
session_start();

if(!isset($_SESSION["peminjaman"])){
    $_SESSION["peminjaman"] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <div id="halaman-peminjaman" class="page-view active">
            <div class="auth-form-container" style="max-width: 600px;">
                <h2 style="text-align:center">Form Peminjaman Fasilitas</h2>
                <form action="proses_peminjaman.php" method="POST">
                <label class="label-soal">Nama Lengkap Siswa:</label>
                <input type="text" name="p-nama-siswa" class="input-kuis" placeholder="Masukkan nama Anda">
                <label class="label-soal">Fasilitas yang Dipinjam:</label>
                <select name="p-jenis-fasilitas" class="input-kuis">
                    <option value="Laboratorium RPL">Laboratorium RPL</option>
                    <option value="Laboratorium Akuntansi">Laboratorium Akuntansi</option>
                    <option value="Aula Utama">Aula Utama</option>
                    <option value="Proyektor LCD">Proyektor LCD</option>
                    <option value="Laptop Sekolah">Laptop Sekolah</option>
                </select>
                <label class="label-soal">Tanggal Penggunaan:</label>
                <input type="date" name="p-tanggal" class="input-kuis">
                <button class="auth-button" style="margin-top:20px;" onclick="ajukanPinjaman()">KIRIM PERMOHONAN</button>
                </form>
    <h2>Daftar Peminjaman</h2>

   <table class="tabel-peminjaman" border="1">
    <tr>
        <th>Nama</th>
        <th>Alat / Ruangan</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>

    <?php
    include 'koneksi.php'; 
    $query = mysqli_query($conn, "SELECT * FROM peminjaman ORDER BY Tanggal DESC");
    while($data = mysqli_fetch_array($query)){
        echo "<tr>";
        echo "<td>" . $data["Nama"] . "</td>";
        echo "<td>" . $data["Alat"] . "</td>";
        echo "<td>" . $data["Tanggal"] . "</td>";
        echo "<td>";
            echo "<a href='editpeminjaman.php?nama=" . $data['Nama'] . "' style='color: blue; text-decoration: none;'>Edit</a>";
            echo " | ";
            echo "<a href='hapuspeminjaman.php?nama=" . $data['Nama'] . "' 
                    style='color: red; text-decoration: none;' 
                    onclick='return confirm(\"Yakin mau hapus data " . $data['Nama'] . "?\")'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
    </table>
<?php


foreach($_SESSION["peminjaman"] as $data){
echo "<tr>";
echo "<td>".$data["nama"]."</td>";
echo "<td>".$data["alat"]."</td>";
echo "<td>".$data["tanggal"]."</td>";
echo "</tr>";
}
?>
</table>
</body>
</html>
