<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Katalog Produk')</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        
        a { text-decoration: none; color: inherit; }
        img { max-width: 100%; display: block; }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* NAVBAR */
        .navbar {
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #667eea;
        }
        
        .navbar-menu {
            display: flex;
            list-style: none;
            gap: 30px;
        }
        
        .navbar-menu a {
            color: #555;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .navbar-menu a:hover {
            color: #667eea;
        }
        
        .navbar-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        /* HERO */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
        }
        
        .hero-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }
        
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        
        .hero p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        /* BUTTONS */
        .btn {
            display: inline-block;
            padding: 12px 30px;
            border-radius: 5px;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }
        
        .btn-primary { background: #667eea; color: white; }
        .btn-primary:hover { background: #5568d3; transform: translateY(-2px); }
        
        .btn-success { background: #25D366; color: white; }
        .btn-success:hover { background: #128C7E; }
        
        .btn-light { background: white; color: #667eea; }
        .btn-light:hover { background: #f8f9fa; }
        
        .btn-outline {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }
        
        /* SECTION */
        .section {
            padding: 60px 0;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .section-header h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .section-header p {
            color: #666;
            font-size: 1.1rem;
        }
        
        /* GRID */
        .grid {
            display: grid;
            gap: 30px;
        }
        
        .grid-2 { grid-template-columns: repeat(2, 1fr); }
        .grid-3 { grid-template-columns: repeat(3, 1fr); }
        .grid-4 { grid-template-columns: repeat(4, 1fr); }
        
        /* CARD */
        .card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        
        .card-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        
        .card-body {
            padding: 20px;
        }
        
        .card-title {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }
        
        .card-text {
            color: #666;
            margin-bottom: 15px;
        }
        
        /* BADGE */
        .badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .badge-primary { background: #667eea; color: white; }
        .badge-success { background: #28a745; color: white; }
        
        /* FOOTER */
        .footer {
            background: #2d3748;
            color: white;
            padding: 50px 0 30px;
            margin-top: 60px;
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .footer h3 {
            margin-bottom: 15px;
        }
        
        .footer ul {
            list-style: none;
        }
        
        .footer ul li {
            margin-bottom: 8px;
        }
        
        .footer a {
            color: rgba(255,255,255,0.7);
            transition: color 0.3s;
        }
        
        .footer a:hover {
            color: white;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        
        /* UTILITIES */
        .text-center { text-align: center; }
        .mb-20 { margin-bottom: 20px; }
        .mt-30 { margin-top: 30px; }
        
        /* RESPONSIVE */
        @media (max-width: 768px) {
            .navbar-menu {
                position: fixed;
                top: 60px;
                left: 0;
                right: 0;
                background: white;
                flex-direction: column;
                padding: 20px;
                box-shadow: 0 5px 10px rgba(0,0,0,0.1);
                display: none;
            }
            
            .navbar-menu.active {
                display: flex;
            }
            
            .navbar-toggle {
                display: block;
            }
            
            .hero-grid,
            .grid-2,
            .grid-3,
            .grid-4,
            .footer-grid {
                grid-template-columns: 1fr;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-container">
                <a href="{{ route('home') }}" class="navbar-brand">
                {{ $setting->site_name ?? 'Katalog Produk' }}
                </a>
                
                <button class="navbar-toggle" onclick="toggleMenu()" id="menuToggle">
                    ☰
                </button>
                
                <ul class="navbar-menu" id="navMenu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('catalog') }}">Katalog</a></li>
                    <li><a href="{{ route('about') }}">Tentang</a></li>
                    <li><a href="{{ route('contact') }}">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div>
                    <h3>{{ $setting->site_name ?? 'Katalog Produk' }}</h3>
                    <p>{{ isset($setting->description) ? substr($setting->description, 0, 100) : '' }}...</p>
                </div>
                <div>
                    <h3>Menu</h3>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('catalog') }}">Katalog</a></li>
                        <li><a href="{{ route('about') }}">Tentang</a></li>
                        <li><a href="{{ route('contact') }}">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h3>Kontak</h3>
                    <p>{{ $setting->whatsapp ?? '-' }}</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} {{ $setting->site_name ?? 'Katalog Produk' }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('navMenu');
            menu.classList.toggle('active');
        }
        
        // Close menu on outside click
        document.addEventListener('click', function(e) {
            const menu = document.getElementById('navMenu');
            const toggle = document.getElementById('menuToggle');
            
            if (!menu.contains(e.target) && !toggle.contains(e.target)) {
                menu.classList.remove('active');
            }
        });
    </script>
    
    @yield('scripts')
</body>
</html>
