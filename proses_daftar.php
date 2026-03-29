<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "modul_webpro";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("koneksi gagal: " . conn->connect_error);
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $role = $_POST["role"];

        $sql = "INSERT INTO smartschool (Nama, Email, Password, Role) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare(query: $sql);
        $stmt->bind_param("ssss", $nama, $email, $password, $role); 

        if ($stmt->execute()) {
            header(header: "location: daftarTA.php?status=sukses");
            exit();
        } else {
            echo "<p>error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
}
$conn->close();
?>
