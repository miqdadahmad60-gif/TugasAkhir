<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "modul_webpro";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("koneksi gagal: " . conn->connect_error);
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data berdasarkan atribut 'name' di HTML
    $nama = $_POST['p-nama-siswa'];
    $alat = $_POST['p-jenis-fasilitas'];
    $tgl  = $_POST['p-tanggal'];

    $sql = "INSERT INTO peminjaman (Nama, Alat, Tanggal) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nama, $alat, $tgl);

    if ($stmt->execute()) {
        $_SESSION["peminjaman"][] = [
            "p-nama-siswa" => $nama,
            "p-jenis-fasilitas" => $alat,
            "p-tanggal" => $tgl
        ];
        header("Location: peminjaman.php");
        exit();
    } else {
        echo "Gagal menyimpan: " . $conn->error;
    }
}
?>
