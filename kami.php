<?php
    // Untuk konfigurasi dasar situs koneksi database dan lainnya
    $base_url = "http://localhost/disnaker/";
    $title = "Tentang Kami - DISNAKER";
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

        /* Header  */
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
            color: #4a6382;
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

         /* Hero Section (Halaman Utama) */
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

        /* Content (Box Topic) */
        .about-content {
            padding: 80px 20px;
        }

        .about-section {
            margin-bottom: 60px;
        }

        .about-section h2 {
            color: #2c4a6d;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .about-section p {
            color: #555;
            font-size: 16px;
            line-height: 1.8;
            text-align: center;
            max-width: 900px;
            margin: 0 auto 30px;
        }

        /* Visi & Misi Cards */
        .vision-mission {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .vm-card {
            background: white;
            border-radius: 15px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .vm-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .vm-card.vision {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .vm-card.mission {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }

        .vm-icon {
            font-size: 60px;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .vm-card h3 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .vm-card p {
            font-size: 16px;
            line-height: 1.7;
            opacity: 0.95;
        }

        /* Values Section (Nilai) */
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }

        .value-card {
            background: white;
            border-radius: 10px;
            padding: 30px 25px;
            text-align: center;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            transition: all 0.3s;
        }

        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }

        .value-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #4a6382 0%, #5d7694 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 32px;
        }

        .value-card h4 {
            color: #2c4a6d;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .value-card p {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
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

        .social-media a:hover {
            color: #f4a950;
        }

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

            .nav {
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
            .nav-menu {
                display: none;
            }

            .page-hero h1 {
                font-size: 32px;
            }

            .about-section h2 {
                font-size: 26px;
            }

            .stat-number {
                font-size: 36px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav>
                <a href="index.php" class="logo">
                    <div class="logo-icon">
                        <img src="img/Logo.png" alt="Logo DISNAKER">
                    </div>
                    <span>DISNAKER</span>
                </a>
                <!-- Burger Menu Button -->
                <div class="burger-btn" onclick="toggleMenu()">
                    <i class="fas fa-bars"></i>
                </div>
                <!-- Navigation Menu -->
                <ul class="nav-menu">
                    <li><a href="home.php">Beranda</a></li>
                    <li><a href="kami.php" class="active">Tentang Kami</a></li>
                    <li><a href="layanan.php">Layanan</a></li>
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
                <h1>Tentang Kami</h1>
                <p>Dinas Tenaga Kerja - Membangun Masa Depan Ketenagakerjaan Indonesia</p>
            </div>
    </section>


    <!-- About Content -->
    <section class="about-content">
        <div class="container">
            <!-- Profile -->
            <div class="about-section">
                <h2>Profil DISNAKER</h2>
                <p>
                    Dinas Tenaga Kerja (DISNAKER) adalah instansi pemerintah yang bertanggung jawab dalam 
                    pengelolaan dan pengembangan sumber daya manusia di bidang ketenagakerjaan. Kami berkomitmen 
                    untuk menciptakan ekosistem ketenagakerjaan yang sehat, produktif, dan berdaya saing tinggi.
                </p>
                <p>
                    Dengan pengalaman puluhan tahun dalam melayani masyarakat, DISNAKER terus berinovasi 
                    dalam memberikan layanan terbaik untuk pencari kerja, pekerja, dan pemberi kerja di Indonesia.
                </p>
            </div>

            <!-- Visi & Misi -->
            <div class="about-section">
                <h2>Visi & Misi</h2>
                <div class="vision-mission">
                    <div class="vm-card vision">
                        <div class="vm-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3>Visi</h3>
                        <p>
                            Mewujudkan tenaga kerja Indonesia yang kompeten, produktif, dan berdaya saing 
                            global melalui sistem ketenagakerjaan yang modern dan berkelanjutan.
                        </p>
                    </div>

                    <div class="vm-card mission">
                        <div class="vm-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3>Misi</h3>
                        <p>
                            Meningkatkan kualitas SDM melalui pelatihan berkualitas, memfasilitasi penempatan 
                            tenaga kerja, dan mengawasi implementasi standar ketenagakerjaan yang berkeadilan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Values -->
            <div class="about-section">
                <h2>Nilai-Nilai Kami</h2>
                <div class="values-grid">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h4>Integritas</h4>
                        <p>Menjunjung tinggi kejujuran dan transparansi dalam setiap pelayanan</p>
                    </div>

                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4>Profesional</h4>
                        <p>Memberikan layanan terbaik dengan kompetensi dan dedikasi tinggi</p>
                    </div>

                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h4>Inovatif</h4>
                        <p>Terus berinovasi untuk solusi ketenagakerjaan yang lebih baik</p>
                    </div>

                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4>Peduli</h4>
                        <p>Memahami dan merespons kebutuhan tenaga kerja dengan empati</p>
                    </div>
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
                <p>&copy; <?php echo date('Y'); ?> DISNAKER. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Burger Menu Toggle
        function toggleMenu() {
            document.querySelector('.nav-menu').classList.toggle('show');
        }

        // Scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.vm-card, .value-card, .team-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>