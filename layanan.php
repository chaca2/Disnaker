<?php
    // Konfigurasi dasar untuk koneksi database dan pengaturan situs
    $base_url = "http://localhost/disnaker/";
    $title = "Layanan - DISNAKER";

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
        }

        /* Header Navigation */
        header {
            background: white;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            position: relative;
            z-index: 100;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        nav {
            display: flex;
            justify-content: space-between; 
            align-items: center;
            padding: 15px 40px;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            left: 0;
            top: 0;
            z-index: 1000;
        }

        .burger-btn {
            display: none;
            font-size: 28px;
            color: #4a6382;
            cursor: pointer;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            font-size: 20px;
            font-weight: bold;
            flex-shrink: 0;
            background: white;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .logo-icon img {
            max-width: 35px;
            max-height: 35px;
            width: auto;
            height: auto;
            object-fit: contain;
        }

        .logo span {
            color: #4a6382;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 30px;
            align-items: center;
            margin-left: auto;
        }

        .nav-menu a {
            color: #4a6382; /* Diubah menjadi gelap agar terlihat di background putih */
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s;
            padding-bottom: 5px;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #f4a950;
            border-bottom: 2px solid #f4a950;
        }

        /* Page Hero */
        .page-hero {
            position: relative;
            height: 700px;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5));
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            overflow: hidden;
        }

        .hero-gedung {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: auto;
            object-fit: contain;
            z-index: 1;
        }

        .hero-text {
            position: relative;
            z-index: 2;
            color: white;
        }

        .page-hero h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .page-hero p {
            font-size: 18px;
            color: rgba(255,255,255,0.9);
        }

        /* Services Section */
        .services-section {
            padding: 80px 0;
            background-color: #f5f5f5;
        }

        .section-title {
            font-size: 32px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 50px;
            color: #2c4a6d;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .service-card {
            background: white;
            border-radius: 10px;
            padding: 40px 30px;
            text-align: center;
            transition: transform 0.5s ease, box-shadow 0.5s ease, opacity 0.6s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            opacity: 0;
            transform: translateY(50px);
        }

        /* Saat muncul animasi aktif */
        .service-card.show {
            opacity: 1;
            transform: translateY(0);
        }

        .service-card:nth-child(1) { background-color: #e8f0f7; }
        .service-card:nth-child(2) { background-color: #f9e4bc; }
        .service-card:nth-child(3) { background-color: #e8f0f7; }
        .service-card:nth-child(4) { background-color: #f9e4bc; }
        .service-card:nth-child(5) { background-color: #e8f0f7; }
        .service-card:nth-child(6) { background-color: #f9e4bc; }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .service-icon {
            font-size: 60px;
            margin-bottom: 20px;
        }

        .service-card:nth-child(odd) .service-icon { color: #4a6382; }
        .service-card:nth-child(even) .service-icon { color: #2c4a6d; }

        .service-card h3 {
            color: #2c4a6d;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .service-card p {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .service-btn {
            background-color: #4a6382;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
        }

        .service-btn:hover {
            background-color: #3d5a7c;
            transform: translateY(-2px);
        }

        /* Footer */
        footer {
            background-color: #1f2f3f;
            color: white;
            padding: 40px 0 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 30px;
        }

        .footer-section h3 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 10px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-section ul li i { color: #f4a950; }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .footer-logo-icon {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c4a6d;
            padding: 5px;
            flex-shrink: 0;
        }

        .footer-logo-icon img {
            max-width: 40px;
            max-height: 40px;
            width: auto;
            height: auto;
            object-fit: contain;
        }

        .social-media {
            display: flex;
            gap: 15px;
        }

        .social-media a {
            color: white;
            font-size: 20px;
            transition: color 0.3s;
        }

        .social-media a:hover { color: #f4a950; }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #3a4a5a;
            font-size: 14px;
            color: #aaa;
        }

        /* Responsive Styles */
        @media (max-width: 900px) {
            .burger-btn {
                display: block;
            }

            .page-hero {
                height: 430px;
            }

            nav {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 40px;
            }

            .nav-menu {
                display: none;
                position: absolute;
                top: 75px;
                right: 20px;
                background: white;
                flex-direction: column;
                justify-content: space-between;
                width: 200px;
                padding: 15px 20px;
                border-radius: 10px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            }

            .nav-menu.show {
                display: flex;
            }

            .nav-menu li {
                margin: 12px 0;
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .nav-menu { display: none; }
            .page-header h1 { font-size: 32px; }
            .services-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav>
                <div class="logo">
                    <div class="logo-icon">
                        <img src="img/Logo.png" alt="Logo DISNAKER">
                    </div>
                    <span>DISNAKER</span>
                </div>
                <!-- Burger Menu Button -->
                <div class="burger-btn" onclick="toggleMenu()">
                    <i class="fas fa-bars"></i>
                </div>
                <!-- Navigation Menu -->
                <ul class="nav-menu">
                    <li><a href="home.php">Beranda</a></li>
                    <li><a href="kami.php">Tentang Kami</a></li>
                    <li><a href="layanan.php" class="active">Layanan</a></li>
                    <li><a href="berita.php">Berita</a></li>
                    <li><a href="kontak.php">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Page Hero -->
    <section class="page-hero">
        <img src="img/gedung_disnaker.png" class="hero-gedung" alt="Gedung Disnaker">
            <div class="hero-text">
                <h1>Layanan Kami</h1>
                <p>Berbagai layanan untuk mendukung tenaga kerja Indonesia</p>
            </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <h2 class="section-title">Layanan Utama DISNAKER</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-user-tie"></i></div>
                    <h3>Pelayanan Pencari Kerja</h3>
                    <p>Pendaftaran AK1, pembuatan kartu kuning, dan bantuan pencarian kerja untuk masyarakat.</p>
                    <button class="service-btn">Pelajari Lebih Lanjut</button>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-cogs"></i></div>
                    <h3>Pelatihan & Produktivitas</h3>
                    <p>Program pelatihan kerja dan peningkatan produktivitas untuk meningkatkan kompetensi tenaga kerja.</p>
                    <button class="service-btn">Pelajari Lebih Lanjut</button>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-briefcase"></i></div>
                    <h3>Bursa Kerja</h3>
                    <p>Informasi lowongan kerja terkini dari berbagai perusahaan dan instansi yang membutuhkan tenaga kerja.</p>
                    <button class="service-btn">Pelajari Lebih Lanjut</button>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-file-contract"></i></div>
                    <h3>Pengurusan Izin Kerja</h3>
                    <p>Layanan pengurusan izin kerja untuk tenaga kerja asing (TKA) dan berbagai perizinan ketenagakerjaan.</p>
                    <button class="service-btn">Pelajari Lebih Lanjut</button>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-handshake"></i></div>
                    <h3>Hubungan Industrial</h3>
                    <p>Mediasi hubungan antara pekerja dengan pengusaha untuk menciptakan lingkungan kerja harmonis.</p>
                    <button class="service-btn">Pelajari Lebih Lanjut</button>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-shield-alt"></i></div>
                    <h3>Jaminan Sosial Ketenagakerjaan</h3>
                    <p>Informasi dan bantuan terkait BPJS Ketenagakerjaan dan program jaminan sosial lainnya untuk pekerja.</p>
                    <button class="service-btn">Pelajari Lebih Lanjut</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Kontak Kami</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i>Komplek Perkantoran Pemda, Komplek Pemda, Sukamahi, Kec. Cikarang Pusat, Kabupaten Bekasi, Jawa Barat 17530</li>
                        <li><i class="fas fa-phone"></i> (021) 89970349</li>
                        <li><i class="fas fa-envelope"></i> info@disnaker.go.id</li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Jam Operasional</h3>
                    <ul>
                        <li><i class="fas fa-clock"></i> Senin - Jumat</li>
                        <li><i class="fas fa-clock"></i> 08:00 - 16:00 WIB</li>
                    </ul>
                </div>

                <div class="footer-section">
                    <div class="footer-logo">
                        <div class="footer-logo-icon">
                            <img src="img/Logo.png" alt="Logo Disnaker">
                        </div>
                        <div>
                            <div style="font-weight: bold; font-size: 12px;">DINAS TENAGA KERJA</div>
                            <div style="font-weight: bold; font-size: 18px;">DISNAKER</div>
                        </div>
                    </div>
                    <h3 style="font-size: 12px; margin-bottom: 10px;">Media Sosial</h3>
                    <div class="social-media">
                        <a href="https://www.instagram.com/disnakerkotabekasi/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@disnakerkabbekasi"><i class="fab fa-youtube"></i></a>
                        <a href="https://twitter.com/urcdisnaker"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 DISNAKER. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Burger Menu Toggle
        function toggleMenu() {
            document.querySelector('.nav-menu').classList.toggle('show');
        }

        // Animasi muncul saat scroll
        const cards = document.querySelectorAll('.service-card');
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('show');
            });
        }, { threshold: 0.2 });

        cards.forEach(card => observer.observe(card));
    </script>
</body>
</html>
