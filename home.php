<?php
    // Konfigurasi untuk koneksi database jika diperlukan
    $base_url = "http://localhost/disnaker/";
    $title = "Dashboard - DISNAKER";
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

        /* Header Styles Halaman */
        header {
            background: white; /* Diubah menjadi putih */
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

        /* Untuk Pondasi Animasi Slider Styles */
        .slider-container {
            position: relative;
            width: 100%;
            height: 600px;
            overflow: hidden;
            background: #2c3e50;
        }

        .slider-wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
        }

        .slide {
            min-width: 100%;
            height: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Slide 1 (Pertama) */
        .slide-hero {
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), 
                        url('img/gedung_disnaker.png') center/cover;
            padding: 80px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-content {
            color: white;
            max-width: 800px;
            text-align: center;
            padding: 40px 20px;
            width: 100%;
        }

        .hero-content h1 {
            font-size: 48px;
            font-weight: bold;
            line-height: 1.2;
            margin-bottom: 30px;
        }

        .hero-btn {
            background-color: #f4a950;
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            text-transform: uppercase;
            transition: all 0.3s;
        }

        .hero-btn:hover {
            background-color: #e09840;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(244,169,80,0.4);
        }

        /* Slide 2 (Kedua) */
        .slide-services {
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), 
                        url('img/gedung_disnaker.png') center/cover;
            padding: 80px 20px;
            min-height: auto;
            position: relative;
            z-index: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .services-content {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .section-title {
            color: white;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 50px;
            text-align: center;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .service-card {
            background: white;
            border-radius: 10px;
            padding: 40px 30px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .service-card:nth-child(1) {
            background-color: #e8f0f7;
        }

        .service-card:nth-child(2) {
            background-color: #f9e4bc;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .service-icon {
            font-size: 60px;
            margin-bottom: 20px;
        }

        .service-card:nth-child(1) .service-icon {
            color: #4a6382;
        }

        .service-card:nth-child(2) .service-icon {
            color: #2c4a6d;
        }

        .service-card h3 {
            color: #2c4a6d;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .service-card p {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .service-btn {
            background-color: #4a6382;
            color: white;
            padding: 10px 25px;
            border: none;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .service-btn:hover {
            background-color: #3d5a7c;
        }

        /* Form Arrow */
        .slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            color: #2c3e50;
            font-size: 24px;
            cursor: pointer;
            padding: 12px 16px;
            border-radius: 50%;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            transition: all 0.3s;
            z-index: 10;
        }

        .slider-arrow:hover {
            background-color: rgba(255, 255, 255, 0.9);
            transform: translateY(-50%) scale(1.1);
        }

        /* Untuk posisi kiri dan kanan */
        .slider-arrow.prev {
            left: 20px;
        }

        .slider-arrow.next {
            right: 20px;
        }

        /* Slider Navigation Dots */
        .slider-nav {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 10;
        }

        .slider-dot {
            width: 12px;
            height: 12px;
            background-color: rgba(255,255,255,0.6);
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s;
        }

        .slider-dot.active,
        .slider-dot:hover {
            background-color: #f4a950;
            transform: scale(1.2);
        }

        /* Footer */
        footer {
            background-color: #1f2f3f;
            color: white;
            padding: 40px 0;
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

        .footer-section ul li i {
            color: #f4a950;
        }

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

        .social-media a:hover {
            color: #f4a950;
        }

        .footer-bottom {
            text-align: center;
            padding: 20px 0;
            border-top: 1px solid #3a4a5a;
            font-size: 14px;
            color: #aaa;
            margin: 0;
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
            .hero-content h1 { 
                font-size: 28px; 
                margin-bottom: 20px;
                line-height: 1.3;
            }
            .hero-content { 
                padding: 20px 15px;
                max-width: 100%;
            }
            .hero-btn {
                padding: 12px 30px;
                font-size: 12px;
            }
            .slide-hero {
                padding: 60px 20px 80px 20px;
                min-height: auto;
                height: auto;
            }
            .slide {
                height: auto;
                min-height: auto;
            }
            .services-grid { grid-template-columns: 1fr; }
            .slider-container { height: auto; }
            .slide-services { 
                padding: 60px 20px 80px 20px; 
                min-height: auto;
                height: auto;
            }
            .section-title { 
                font-size: 24px; 
                margin-bottom: 30px;
                margin-top: 20px;
            }
            .services-grid { gap: 20px; }
            .service-card { 
                padding: 25px 15px; 
                border-radius: 8px;
            }
            .service-icon { font-size: 48px; margin-bottom: 15px; }
            .service-card h3 { font-size: 16px; margin-bottom: 8px; }
            .service-card p { font-size: 12px; margin-bottom: 15px; }
            .service-btn { padding: 8px 20px; font-size: 11px; }
        }
    </style>
</head>

<body>
    <!-- Header Form -->
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
                    <li><a href="home.php" class="active">Beranda</a></li>
                    <li><a href="kami.php">Tentang Kami</a></li>
                    <li><a href="layanan.php">Layanan</a></li>
                    <li><a href="berita.php">Berita</a></li>
                    <li><a href="kontak.php">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Slider Container -->
    <div class="slider-container">
        <div class="slider-wrapper">

            <!-- Slide 1 -->
            <div class="slide slide-hero">
                <div class="hero-content">
                    <h1>Mewujudkan Tenaga Kerja Kompeten dan Berdaya Saing</h1>
                    <button class="hero-btn" onclick="window.location.href='berita.php'">Info Lowongan Kerja Terbaru</button>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="slide slide-services">
                <div class="services-content">
                    <h2 class="section-title">Layanan Utama Kami</h2>
                    <div class="services-grid">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <h3>Pelayanan Pencari Kerja</h3>
                            <p>Pendaftaran (contoh AK1, kartu kuning)</p>
                            <button class="service-btn" onclick="window.location.href='layanan.php'">Pelajari Layanan</button>
                        </div>

                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <h3>Pelatihan & Produktivitas</h3>
                            <p>Jadwal & Lokasi Pelatihan</p>
                            <button class="service-btn" onclick="window.location.href='layanan.php'">Pelajari Layanan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider -- Controls -->
        <button class="slider-arrow prev" onclick="changeSlide(-1)">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="slider-arrow next" onclick="changeSlide(1)">
            <i class="fas fa-chevron-right"></i>
        </button>

        <div class="slider-nav">
            <span class="slider-dot active" onclick="goToSlide(0)"></span>
            <span class="slider-dot" onclick="goToSlide(1)"></span>
        </div>
    </div>

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
                            <img src="img/Logo.png" alt="Logo Kemnaker">
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
                <p>&copy; <?= date('Y') ?> DISNAKER. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Burger Menu Toggle
        function toggleMenu() {
            document.querySelector('.nav-menu').classList.toggle('show');
        }

        /* Script Animasi Slider */
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.slider-dot');
        const sliderWrapper = document.querySelector('.slider-wrapper');

        function updateSlider() {
            sliderWrapper.style.transform = `translateX(-${currentSlide * 100}%)`;
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }

        function changeSlide(direction) {
            currentSlide += direction;
            if (currentSlide < 0) currentSlide = slides.length - 1;
            else if (currentSlide >= slides.length) currentSlide = 0;
            updateSlider();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateSlider();
        }

        setInterval(() => { changeSlide(1); }, 5000);
    </script>
</body>
</html>
