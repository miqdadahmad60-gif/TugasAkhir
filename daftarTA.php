<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <div id="daftar" class="page-view active">
            <div class="auth-form-container">
                <h2 style="text-align:center">Pendaftaran Baru</h2>
                <form action="proses_daftar.php" method="POST">
                <label class="label-soal">Nama Lengkap:</label>
                <input type="text" name="nama" id="reg-nama" class="input-kuis">
                <label class="label-soal">Email:</label>
                <input type="email" name="email" id="reg-email" class="input-kuis">
                <label class="label-soal">Role (Daftar Sebagai):</label>
                <select name="role" id="reg-role" class="input-kuis">
                    <option value="murid">Murid</option>
                    <option value="guru">Guru</option>
                    <option value="ortu">Orang Tua</option>
                </select>
                <label class="label-soal">Password:</label>
                <input type="password" name="password" id="reg-pass" class="input-kuis">
                <button class="auth-button" type="submit">KIRIM PENDAFTARAN</button>
                </form>
                <button onclick="showPage('login')" style="width:100%; background:none; border:none; color:var(--primary-color); cursor:pointer; margin-top:10px;"><a href = 'loginTA.php'>Sudah punya akun? Login</a></button>
            </div>
        </div>

        <?php if (isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
            <script>
                alert("Pendaftaran Berhasil! Data Anda sudah tersimpan.");
            </script>
        <?php endif; ?>
</body>
</html>