<?php
$conn = new mysqli("localhost", "root", "", "modul_webpro");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
