<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem HRIS Internal Yayasan Al Kautsar Bandarlampung - Manajemen SDM Terintegrasi">
    
    <title>HRIS Internal | Yayasan Al Kautsar Bandarlampung</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="#">
    
    <!-- Styles -->
    <style>
        :root {
            --primary: #1e4da1;
            --primary-dark: #153a7a;
            --secondary: #0d8a3f;
            --accent: #f9a825;
            --dark: #1a237e;
            --light: #f5f7fa;
            --gray: #5d6970;
            --success: #2e7d32;
            --warning: #f57c00;
            --gradient: linear-gradient(135deg, #1e4da1 0%, #0d8a3f 100%);
            --shadow: 0 4px 20px rgba(30, 77, 161, 0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Open Sans', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #fff;
            overflow-x: hidden;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header Styles */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background-color: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            box-shadow: var(--shadow);
            padding: 1rem 0;
            transition: all 0.3s ease;
            border-bottom: 3px solid var(--primary);
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        
        .logo-circle {
            width: 45px;
            height: 45px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.3rem;
            overflow: hidden;
            flex-shrink: 0;
        }
        
        .logo-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 5px;
        }
        
        .logo-text {
            display: flex;
            flex-direction: column;
        }
        
        .logo-main {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary);
            line-height: 1.2;
        }
        
        .logo-sub {
            font-size: 0.85rem;
            color: var(--gray);
            font-weight: 500;
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }
        
        .nav-links a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            font-size: 0.95rem;
        }
        
        .nav-links a:hover {
            color: var(--primary);
        }
        
        .btn {
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            font-size: 0.95rem;
            font-family: 'Poppins', sans-serif;
        }
        
        .btn-primary {
            background: var(--gradient);
            color: white;
            box-shadow: 0 4px 14px rgba(30, 77, 161, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(30, 77, 161, 0.4);
        }
        
        .btn-secondary {
            background-color: white;
            color: var(--primary);
            border: 2px solid var(--primary);
        }
        
        .btn-secondary:hover {
            background-color: var(--light);
        }
        
        /* Hero Section */
        .hero {
            padding: 160px 0 80px;
            background: linear-gradient(135deg, #f0f4f8 0%, #e1e8f0 100%);
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 400px;
            height: 400px;
            background: var(--primary);
            opacity: 0.05;
            border-radius: 50%;
        }
        
        .hero::after {
            content: '';
            position: absolute;
            bottom: -150px;
            left: -100px;
            width: 300px;
            height: 300px;
            background: var(--secondary);
            opacity: 0.05;
            border-radius: 50%;
        }
        
        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }
        
        .hero-text h1 {
            font-size: 2.8rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            color: var(--dark);
        }
        
        .hero-text h1 span {
            color: var(--primary);
        }
        
        .hero-text p {
            font-size: 1.1rem;
            color: var(--gray);
            margin-bottom: 2rem;
            max-width: 90%;
        }
        
        .hero-highlight {
            background-color: rgba(30, 77, 161, 0.1);
            border-left: 4px solid var(--primary);
            padding: 1.5rem;
            border-radius: 0 8px 8px 0;
            margin: 2rem 0;
        }
        
        .hero-highlight p {
            font-style: italic;
            color: var(--primary-dark);
            margin-bottom: 0;
        }
        
        .hero-btns {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .hero-image {
            position: relative;
        }
        
        .dashboard-preview {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: transform 0.5s ease;
        }
        
        .dashboard-preview:hover {
            transform: translateY(-5px);
        }
        
        /* Features Section */
        .features {
            padding: 80px 0;
            background-color: white;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-title h2 {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
        }
        
        .section-title p {
            color: var(--gray);
            max-width: 700px;
            margin: 0 auto;
            font-size: 1.1rem;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }
        
        .feature-card {
            background: white;
            border-radius: 12px;
            padding: 2rem 1.5rem;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            border-top: 4px solid var(--primary);
            text-align: center;
            height: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(30, 77, 161, 0.15);
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 1.8rem;
            color: white;
            background: var(--gradient);
        }
        
        .feature-card h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--dark);
        }
        
        .feature-card p {
            color: var(--gray);
            font-size: 0.95rem;
        }
        
        /* Info Section */
        .info {
            padding: 80px 0;
            background-color: var(--light);
        }
        
        .info-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }
        
        .info-text h2 {
            font-size: 2.2rem;
            color: var(--dark);
            margin-bottom: 1.5rem;
        }
        
        .info-text p {
            color: var(--gray);
            margin-bottom: 1.5rem;
        }
        
        .info-list {
            list-style: none;
            margin-top: 1.5rem;
        }
        
        .info-list li {
            margin-bottom: 1rem;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        
        .info-list li::before {
            content: "✓";
            color: var(--secondary);
            font-weight: bold;
            background-color: rgba(13, 138, 63, 0.1);
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .info-image img {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        /* Login Section */
        .login-section {
            padding: 80px 0;
            text-align: center;
            background: white;
        }
        
        .login-box {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            padding: 3rem;
            box-shadow: var(--shadow);
            border-top: 5px solid var(--primary);
        }
        
        .login-box h2 {
            color: var(--dark);
            margin-bottom: 1rem;
        }
        
        .login-box p {
            color: var(--gray);
            margin-bottom: 2rem;
        }
        
        .login-note {
            background-color: rgba(249, 168, 37, 0.1);
            border: 1px solid rgba(249, 168, 37, 0.3);
            border-radius: 8px;
            padding: 1rem;
            margin-top: 2rem;
            text-align: left;
        }
        
        .login-note h4 {
            color: var(--warning);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        /* Footer */
        footer {
            padding: 50px 0 20px;
            background-color: var(--dark);
            color: white;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 2rem;
        }
        
        .footer-col h4 {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            color: white;
        }
        
        .footer-col p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1rem;
        }
        
        .footer-col ul {
            list-style: none;
        }
        
        .footer-col ul li {
            margin-bottom: 0.8rem;
        }
        
        .footer-col ul li a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-col ul li a:hover {
            color: white;
        }
        
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        
        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
            
            .hero-text {
                text-align: center;
            }
            
            .hero-text p {
                max-width: 100%;
            }
            
            .hero-btns {
                justify-content: center;
            }
            
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .info-content {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
            
            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hero {
                padding: 140px 0 60px;
            }
            
            .hero-text h1 {
                font-size: 2.2rem;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
            }
            
            .login-box {
                padding: 2rem;
            }
        }
        
        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <div class="logo-section">
                <a href="#" class="logo">
                    <div class="logo-circle">
                        <img src="/public/logo/logo_ak.png" alt="Yayasan Al Kautsar Logo" class="logo-image">
                    </div>
                    <div class="logo-text">
                        <div class="logo-main">HRIS Internal</div>
                        <div class="logo-sub">Yayasan Al Kautsar Bandarlampung</div>
                    </div>
                </a>
            </div>
            <nav class="nav-links">
                <a href="#features">Fitur</a>
                <a href="#info">Tentang</a>
                <a href="{{ route('login') }}" class="btn btn-primary">Login ke Sistem</a>
                  <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text fade-in">
                    <h1>Sistem SDM Internal <span>Yayasan Al Kautsar</span></h1>
                    <p>Platform terintegrasi untuk manajemen sumber daya manusia internal Yayasan Al Kautsar Bandarlampung. Kelola data karyawan, absensi, penggajian, dan kinerja dalam satu sistem yang aman.</p>
                    
                    <div class="hero-highlight">
                        <p>"Sistem ini dikembangkan khusus untuk memenuhi kebutuhan internal Yayasan Al Kautsar Bandarlampung dalam mengelola SDM secara efektif dan efisien."</p>
                    </div>
                    
                    <div class="hero-btns">
                        <a href="{{ route('login') }}" class="btn btn-primary">Login ke Sistem</a>
                        <a href="#features" class="btn btn-secondary">Pelajari Fitur</a>
                    </div>
                </div>
                
                <div class="hero-image fade-in">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                         alt="Dashboard HRIS Yayasan Al Kautsar" class="dashboard-preview">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-title fade-in">
                <h2>Fitur Utama Sistem</h2>
                <p>Manajemen SDM yang komprehensif untuk mendukung operasional Yayasan Al Kautsar Bandarlampung</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        👥
                    </div>
                    <h3>Manajemen Data Karyawan</h3>
                    <p>Pusat data lengkap seluruh staf, guru, dan karyawan Yayasan Al Kautsar dengan informasi personal, pendidikan, dan riwayat kerja.</p>
                </div>
                
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        📅
                    </div>
                    <h3>Presensi & Absensi</h3>
                    <p>Sistem pencatatan kehadiran digital dengan berbagai metode input dan laporan otomatis untuk monitoring produktivitas.</p>
                </div>
                
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        💰
                    </div>
                    <h3>Penggajian Terintegrasi</h3>
                    <p>Perhitungan gaji otomatis dengan komponen tunjangan, potongan, pajak, dan generate slip gaji digital untuk seluruh karyawan.</p>
                </div>
                
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        📊
                    </div>
                    <h3>Evaluasi Kinerja</h3>
                    <p>Sistem penilaian kinerja periodik terukur untuk pengembangan profesional.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="info" id="info">
        <div class="container">
            <div class="info-content">
                <div class="info-text fade-in">
                    <h2>Tentang Sistem</h2>
                    <p>Sistem pengelolaan SDM ini dikembangkan khusus untuk internal Yayasan Al Kautsar Bandarlampung guna meningkatkan efisiensi pengelolaan sumber daya manusia.</p>
                    <p>Dengan sistem terpusat ini, seluruh divisi dan unit kerja di bawah Yayasan Al Kautsar dapat mengelola data SDM secara konsisten dan terintegrasi.</p>
                    
                    <ul class="info-list">
                        <li>Akses terbatas untuk karyawan Yayasan Al Kautsar</li>
                        <li>Data tersimpan aman di server internal</li>
                        <li>Pelaporan real-time untuk manajemen</li>
                        <li>Kustomisasi sesuai kebutuhan yayasan</li>
                    </ul>
                </div>
                
                <div class="info-image fade-in">
                    <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1169&q=80" 
                         alt="Gedung Yayasan Al Kautsar">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-col">
                    <h4>HRIS Internal</h4>
                    <p>Sistem Human Resource Information System untuk internal Yayasan Al Kautsar Bandarlampung.</p>
                    <p>Dikembangkan untuk meningkatkan efisiensi pengelolaan SDM di lingkungan yayasan.</p>
                </div>
                
                <div class="footer-col">
                    <h4>Akses Cepat</h4>
                    <ul>
                        <li><a href="{{ route('login') }}">Login Sistem</a></li>
                        <li><a href="#features">Fitur Sistem</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Kontak</h4>
                    <div class="contact-info">
                        <div class="contact-item">
                            <span>📍</span>
                            <span>Yayasan Al Kautsar Bandarlampung<br>Jl. Soekarno Hatta (Depan Islamic Center), Kecamatan Rajabasa, Kota Bandar Lampung, Lampung 35144.</span>
                        </div>
                        <div class="contact-item">
                            <span>📞</span>
                            <span>Telepon : 0721-788410</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; <script>document.write(new Date().getFullYear())</script> Yayasan Al Kautsar Bandarlampung. | Sistem SDM Internal v1.0</p>
            </div>
        </div>
    </footer>

    <script>
        // Fade-in animation on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const fadeElements = document.querySelectorAll('.fade-in');
            
            const fadeInOnScroll = function() {
                fadeElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const elementVisible = 150;
                    
                    if (elementTop < window.innerHeight - elementVisible) {
                        element.classList.add('visible');
                    }
                });
            };
            
            // Initial check
            fadeInOnScroll();
            
            // Check on scroll
            window.addEventListener('scroll', fadeInOnScroll);
            
            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // Header scroll effect
            window.addEventListener('scroll', function() {
                const header = document.querySelector('header');
                if (window.scrollY > 50) {
                    header.style.padding = '0.7rem 0';
                    header.style.boxShadow = '0 4px 20px rgba(30, 77, 161, 0.15)';
                } else {
                    header.style.padding = '1rem 0';
                    header.style.boxShadow = '0 4px 20px rgba(30, 77, 161, 0.1)';
                }
            });
        });
    </script>
</body>
</html>