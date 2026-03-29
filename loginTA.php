<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <div id="login" class="page-view active">
            <div class="auth-form-container">
                <h2 style="text-align:center">Login Portal</h2>
                <form action="proses_login.php" method="POST">
                <label class="label-soal">Email / Username:</label>
                <input type="text" name="email" id="login-email" class="input-kuis" placeholder="user@school.com">
                <label class="label-soal">Password:</label>
                <input type="password" name="password" id="login-pass" class="input-kuis" placeholder="******">
                <button class="auth-button" type="submit">MASUK</button>
                </form>
                <p style="text-align:center; font-size:0.8rem; color:gray; margin-top:15px;">
                    Guru: guru@smart.com (pass: 123) | Murid: murid@smart.com (pass: 123)
                </p>
                <button onclick="showPage('beranda')" style="width:100%; background:none; border:none; color:gray; cursor:pointer; margin-top:10px;">Kembali</button>
            </div>
        </div>

        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo "<p style='color:red;'>Email atau Password salah!</p>";
            } else if($_GET['pesan'] == "logout"){
                echo "<p style='color:green;'>Anda telah berhasil logout.</p>";
            } else if($_GET['pesan'] == "belum_login"){
                echo "<p style='color:orange;'>Silahkan login terlebih dahulu.</p>";
            }
        }
        ?>
</body>
</html>