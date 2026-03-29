<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Smart School Kupang</title>

<!-- ⚠️ CSS KAMU TETAP (TIDAK DIUBAH) -->
<style>
/* (SEMUA CSS KAMU BIARIN, TIDAK DIUBAH) */
</style>

</head>

<body>

<!-- ⚠️ SEMUA HTML KAMU BIARIN PERSIS -->
<!-- (Aku tidak ubah layout, hanya JS di bawah) -->

<script>

let userLogin = JSON.parse(sessionStorage.getItem('user_aktif')) || null

/* ===========================
   REGISTER (SUDAH DATABASE)
=========================== */
function prosesDaftar() {

    const nama = document.getElementById('reg-nama').value
    const email = document.getElementById('reg-email').value
    const role = document.getElementById('reg-role').value
    const pass = document.getElementById('reg-pass').value

    if (!nama || !email || !pass) {
        alert("Lengkapi data!")
        return
    }

    fetch('register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `nama=${nama}&email=${email}&password=${pass}&role=${role}`
    })
    .then(res => res.text())
    .then(res => {

        if (res === "BERHASIL") {
            alert("Pendaftaran berhasil!")
            showPage('login')
        } else if (res === "EMAIL_SUDAH_ADA") {
            alert("Email sudah terdaftar!")
        } else {
            alert("Gagal daftar!")
        }

    })
}


/* ===========================
   LOGIN (SUDAH DATABASE)
=========================== */
function prosesLogin() {

    const email = document.getElementById('login-email').value
    const pass = document.getElementById('login-pass').value

    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `email=${email}&password=${pass}`
    })
    .then(res => res.json())
    .then(res => {

        if (res.status === "success") {

            sessionStorage.setItem("user_aktif", JSON.stringify(res))
            userLogin = res

            updateNavigasiUI()

            alert("Login berhasil sebagai " + res.role)

            showPage('beranda')

        } else {
            alert("Email atau password salah!")
        }

    })
}


/* ===========================
   LOGOUT
=========================== */
function prosesLogout() {
    sessionStorage.removeItem('user_aktif')
    userLogin = null
    updateNavigasiUI()
    showPage('beranda')
}


/* ===========================
   UPDATE UI (TETAP PUNYA KAMU)
=========================== */
function updateNavigasiUI() {
    const navLinks = document.querySelector('.nav-links')
    const navActions = document.getElementById('auth-buttons')

    if (userLogin) {

        let menuRole = ''
        if (userLogin.role === 'guru') menuRole = `<a onclick="showPage('guru')">Ruang Guru</a>`
        if (userLogin.role === 'murid') menuRole = `<a onclick="showPage('murid')">Ruang Murid</a>`
        if (userLogin.role === 'ortu') menuRole = `<a onclick="showPage('halaman-orang-tua')">Ruang Ortu</a>`

        navLinks.innerHTML = `
            <a onclick="showPage('beranda')">Beranda</a>
            ${menuRole}
        `

        navActions.innerHTML = `
            <span>Halo, <b>${userLogin.nama}</b></span>
            <a onclick="prosesLogout()" class="daftar-button">Logout</a>
        `

    } else {

        navLinks.innerHTML = `
            <a onclick="showPage('beranda')">Beranda</a>
        `

        navActions.innerHTML = `
            <a onclick="showPage('login')" class="login-link">Login</a>
            <a onclick="showPage('daftar')" class="daftar-button">Daftar</a>
        `
    }
}


/* ===========================
   INIT
=========================== */
updateNavigasiUI()

</script>

</body>
</html>