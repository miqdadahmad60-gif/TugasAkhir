<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css"
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <div id="beranda" class="page-view active">
            <section class="hero">
                <div class="container">
                    <h1>Smart School Kupang</h1>
                    <p>Sekolah Menengah Kejuruan terdepan di Kupang yang menghasilkan lulusan berkompeten dan siap kerja.</p>
            </section>

             <section id="tentang">
                <div class="container">
                    <h2 class="section-title">Akses Portal Sekolah</h2>
                    <div class="features-grid">
                        <div onclick="showPage('murid')" class="feature-item">
                            <span class="icon">📚</span>
                            <h3>Ruang Murid</h3>
                            <p>Akses portal belajar, bank soal, dan materi inspiratif digital.</p>
                        </div>
                        <div onclick="showPage('guru')" class="feature-item">
                            <span class="icon">👩‍🏫</span>
                            <h3>Ruang Guru</h3>
                            <p>Panel manajemen kuis, pemberian materi, dan kontrol kelas.</p>
                        </div>
                        <div onclick="showPage('halaman-orang-tua')" class="feature-item">
                            <span class="icon">👨‍👩-👧</span>
                            <h3>Ruang Orang Tua</h3>
                            <p>Pantau kehadiran, laporan nilai, dan perkembangan belajar anak secara real-time.</p>
                        </div>
                        <div onclick="showPage('halaman-peminjaman')" class="feature-item">
                            <span class="icon">🏢</span>
                            <h3>Peminjaman</h3>
                            <p>Layanan peminjaman laboratorium, ruang praktek, dan alat pendukung.</p>
                        </div>
                    </div>
                </div>
            </section>
</body>
</html>