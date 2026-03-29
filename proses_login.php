<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "modul_webpro";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("koneksi gagal: " . conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pass  = $_POST["password"];

    $sql = "SELECT * FROM smartschool WHERE Email = ? AND Password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        header(header: "location: beranda.php");
        exit();
    } else {
          echo "<p>error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
   
$conn->close();  
?>
