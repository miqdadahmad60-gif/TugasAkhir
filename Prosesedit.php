<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lama = $_POST['nama_lama']; // Nama asli sebelum diedit
    $nama_baru = $_POST['p-nama-siswa'];
    $alat_baru = $_POST['p-jenis-fasilitas'];
    $tgl_baru  = $_POST['p-tanggal'];

    // Update data di database
    $sql = "UPDATE peminjaman SET 
            Nama = '$nama_baru', 
            Alat = '$alat_baru', 
            Tanggal = '$tgl_baru' 
            WHERE Nama = '$nama_lama'";

    $query = mysqli_query($conn, $sql);

    if($query){
        header("Location: peminjaman.php?pesan=update_berhasil");
        exit();
    } else {
        echo "Gagal update bruwh: " . mysqli_error($conn);
    }
}
?>
