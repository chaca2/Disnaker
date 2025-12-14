<?php
    $base_url = "http://localhost/disnaker/";
    $title = "Kontak - DISNAKER";
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

        /* Header Styles */
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

        /* Contact Section Styles */
        .contact-section {
            padding: 80px 0;
            background-color: #f5f5f5;
        }

        .contact-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: start;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .info-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            display: flex;
            align-items: start;
            gap: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .info-card:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 25px rgba(0,0,0,0.15);
        }

        .info-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #4a6382 0%, #5d7694 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            flex-shrink: 0;
        }

        .info-content h3 {
            color: #2c4a6d;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .info-content p {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
        }

        .contact-form {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }

        .contact-form h2 {
            color: #2c4a6d;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .contact-form .subtitle {
            color: #666;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            color: #2c4a6d;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 14px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #4a6382;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .submit-btn {
            background: linear-gradient(135deg, #4a6382 0%, #5d7694 100%);
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            width: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(74, 99, 130, 0.4);
        }

        .map-section {
            padding: 0;
            margin-top: -40px;
        }

        .map-container {
            background: #e8f0f7;
            padding: 60px 0;
            text-align: center;
        }

        .map-container h2 {
            color: #2c4a6d;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .map-container p {
            color: #666;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .map-placeholder {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .map-placeholder iframe {
            width: 100%;
            height: 400px;
            border: none;
        }

        /* Footer Styles */
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
            .nav-menu {
                display: none;
            }

            .page-header h1 {
                font-size: 32px;
            }

            .contact-wrapper {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .social-links {
                flex-direction: column;
                align-items: center;
            }

            .social-card {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
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
                    <li><a href="layanan.php">Layanan</a></li>
                    <li><a href="berita.php">Berita</a></li>
                    <li><a href="kontak.php" class="active">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Page Hero -->
    <section class="page-hero">
        <img src="img/gedung_disnaker.png" class="hero-gedung" alt="Gedung Disnaker">
            <div class="hero-text">
                <h1>Hubungi Kami</h1>
                <p>Kami siap membantu Anda dengan layanan terbaik</p>
            </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-wrapper">
                <div class="contact-info">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h3>Alamat Kantor</h3>
                            <p>Sukamahi, Kec. Cikarang Pusat, Kab. Bekasi<br>Jawa Barat, Indonesia 17530</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-content">
                            <h3>Telepon</h3>
                            <p>(021) 89970349</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h3>Email</h3>
                            <p>info@disnaker.go.id<br>layanan@disnaker.go.id</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <h3>Jam Operasional</h3>
                            <p>Senin - Jumat: 08:00 - 16:00 WIB<br>Sabtu & Minggu: Tutup</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <h2>Kirim Pesan</h2>
                    <p class="subtitle">Isi formulir di bawah ini untuk menghubungi kami</p>
                    <form id="contactForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="form-group">
                            <label for="name">Nama Lengkap *</label>
                            <input type="text" id="name" name="name" required placeholder="Masukkan nama lengkap Anda">
                        </div>

                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required placeholder="contoh@email.com">
                        </div>

                        <div class="form-group">
                            <label for="phone">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone" placeholder="+62 896 4000 6123">
                        </div>

                        <div class="form-group">
                            <label for="subject">Subjek *</label>
                            <select id="subject" name="subject" required>
                                <option value="" hidden>Pilih subjek</option>
                                <option value="informasi">Informasi Umum</option>
                                <option value="pengaduan">Pengaduan</option>
                                <option value="layanan">Layanan</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message">Pesan *</label>
                            <textarea id="message" name="message" required placeholder="Tuliskan pesan Anda di sini..."></textarea>
                        </div>

                        <button type="submit" class="submit-btn">Kirim Pesan</button>
                    </form>

                    <?php
                    // Proses untuk kirim data ke database
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $name = htmlspecialchars($_POST["name"]);
                        $email = htmlspecialchars($_POST["email"]);
                        $phone = htmlspecialchars($_POST["phone"]);
                        $subject = htmlspecialchars($_POST["subject"]);
                        $message = htmlspecialchars($_POST["message"]);

                        echo "<script>alert('Terima kasih $name! Pesan Anda telah terkirim. Kami akan segera menghubungi Anda.');</script>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="map-container">
            <h2>Lokasi Kami</h2>
            <p>Temukan lokasi kantor DISNAKER di peta</p>
            <div class="map-placeholder">
                <!-- Google Maps Embed dengan Marker -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.284745!2d107.17136695!3d-6.3670084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69a7d5cfffffff%3A0x1111111111111!2sDINAS+TENAGA+KERJA+KABUPATEN+BEKASI!5e0!3m2!1sid!2sid!4v1234567890" width="100%" height="400" style="border:none;border-radius:10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
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
                <p>&copy; <?php echo date('Y'); ?> DISNAKER. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Burger Menu Toggle
        function toggleMenu() {
            document.querySelector('.nav-menu').classList.toggle('show');
        }
    </script>
</body>
</html>

