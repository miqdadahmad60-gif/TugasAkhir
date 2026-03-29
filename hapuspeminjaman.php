<?php
include 'koneksi.php';


$nama = $_GET['nama'];
$query = mysqli_query($conn, "DELETE FROM peminjaman WHERE Nama='$nama'");

if($query){
    header("location:peminjaman.php?pesan=terhapus");
    exit();
} else {
    echo "Gagal hapus: " . mysqli_error($conn);
}
?>
