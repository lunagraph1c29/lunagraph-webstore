<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8f9fa;
        }
        
        /* LAYOUT */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        
        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .sidebar.collapsed {
            width: 70px;
        }
        
        .sidebar-brand {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 30px;
            white-space: nowrap;
            overflow: hidden;
        }
        
        .sidebar.collapsed .sidebar-brand {
            font-size: 1.5rem;
            text-align: center;
        }
        
        .sidebar-menu {
            list-style: none;
        }
        
        .sidebar-menu li {
            margin-bottom: 5px;
        }
        
        .sidebar-menu a,
        .sidebar-menu button {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            color: rgba(255,255,255,0.8);
            border-radius: 8px;
            transition: all 0.3s;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            font-size: 1rem;
            text-decoration: none;
            white-space: nowrap;
        }
        
        .sidebar.collapsed .sidebar-menu a,
        .sidebar.collapsed .sidebar-menu button {
            justify-content: center;
            padding: 12px 10px;
        }
        
        .sidebar.collapsed .menu-text {
            display: none;
        }
        
        .menu-icon {
            font-size: 1.2rem;
            min-width: 24px;
            text-align: center;
        }
        
        .sidebar-menu a:hover,
        .sidebar-menu a.active,
        .sidebar-menu button:hover {
            background: rgba(255,255,255,0.2);
            color: white;
        }
        
        .sidebar-divider {
            height: 1px;
            background: rgba(255,255,255,0.2);
            margin: 15px 0;
        }
        
        /* TOGGLE BUTTON */
        .sidebar-toggle {
            position: absolute;
            top: 20px;
            right: -15px;
            background: white;
            border: 2px solid #667eea;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.3s;
            z-index: 1001;
        }
        
        .sidebar-toggle:hover {
            background: #667eea;
            color: white;
        }
        
        .sidebar-toggle-icon {
            transition: transform 0.3s;
        }
        
        .sidebar.collapsed .sidebar-toggle-icon {
            transform: rotate(180deg);
        }
        
        /* MAIN CONTENT */
        .main-content {
            margin-left: 250px;
            flex: 1;
            display: flex;
            flex-direction: column;
            transition: margin-left 0.3s ease;
        }
        
        .sidebar.collapsed + .main-content {
            margin-left: 70px;
        }
        
        /* TOPBAR */
        .topbar {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .topbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 5px;
        }
        
        .user-menu {
            position: relative;
        }
        
        .user-btn {
            background: none;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s;
        }
        
        .user-btn:hover {
            background: #f8f9fa;
        }
        
        .user-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            background: white;
            min-width: 200px;
            border-radius: 5px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            display: none;
        }
        
        .user-dropdown.show {
            display: block;
        }
        
        .user-dropdown-item {
            padding: 12px 20px;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .user-dropdown-item:last-child {
            border-bottom: none;
        }
        
        .user-dropdown button {
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            padding: 0;
            color: #dc3545;
            cursor: pointer;
            font-size: 1rem;
        }
        
        /* CONTENT */
        .content {
            padding: 30px;
            flex: 1;
        }
        
        /* ALERT */
        .alert {
            padding: 15px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .alert-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            opacity: 0.7;
        }
        
        .alert-close:hover {
            opacity: 1;
        }
        
        /* CARD */
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            overflow: hidden;
            margin-bottom: 20px;
        }
        
        .card-header {
            padding: 20px;
            border-bottom: 1px solid #f0f0f0;
            font-weight: bold;
        }
        
        .card-body {
            padding: 20px;
        }
        
        /* STAT CARD */
        .stat-card {
            border-left: 4px solid;
        }
        
        .stat-card.primary { border-color: #667eea; }
        .stat-card.success { border-color: #28a745; }
        .stat-card.warning { border-color: #ffc107; }
        
        .stat-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .stat-icon {
            font-size: 3rem;
            opacity: 0.2;
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: bold;
        }
        
        .stat-label {
            color: #666;
            margin-bottom: 10px;
        }
        
        /* GRID */
        .grid {
            display: grid;
            gap: 20px;
        }
        
        .grid-2 { grid-template-columns: repeat(2, 1fr); }
        .grid-3 { grid-template-columns: repeat(3, 1fr); }
        
        /* BUTTON */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            text-align: center;
        }
        
        .btn-primary { background: #667eea; color: white; }
        .btn-primary:hover { background: #5568d3; }
        
        .btn-success { background: #28a745; color: white; }
        .btn-warning { background: #ffc107; color: #333; }
        .btn-danger { background: #dc3545; color: white; }
        .btn-info { background: #17a2b8; color: white; }
        
        .btn-sm { padding: 5px 10px; font-size: 0.9rem; }
        
        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }
        
        table th {
            background: #f8f9fa;
            font-weight: 600;
        }
        
        /* FORM */
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #667eea;
        }
        
        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }
        
        /* OVERLAY untuk mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }
        
        .sidebar-overlay.show {
            display: block;
        }
        
        /* RESPONSIVE */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 250px;
            }
            
            .sidebar.mobile-open {
                transform: translateX(0);
            }
            
            .sidebar.collapsed {
                transform: translateX(-100%);
            }
            
            .sidebar-toggle {
                display: none;
            }
            
            .main-content {
                margin-left: 0 !important;
            }
            
            .mobile-menu-toggle {
                display: block;
            }
            
            .grid-2,
            .grid-3 {
                grid-template-columns: 1fr;
            }
        }
                /* ===============================
           FIX LARAVEL DEFAULT PAGINATION
           (SVG PANAH KEGEDEAN)
           =============================== */

        nav[aria-label="Pagination Navigation"] {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        nav[aria-label="Pagination Navigation"] svg {
            width: 16px !important;
            height: 16px !important;
            max-width: 16px !important;
            max-height: 16px !important;
            display: inline-block !important;
        }

        nav[aria-label="Pagination Navigation"] a,
        nav[aria-label="Pagination Navigation"] span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 10px;
            font-size: 0.9rem;
            line-height: 1;
        }

    </style>
    
    @yield('styles')
</head>
<body>
    <div class="admin-wrapper">
        <!-- SIDEBAR OVERLAY (mobile only) -->
        <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleMobileSidebar()"></div>
        
        <!-- SIDEBAR -->
        <aside class="sidebar" id="sidebar">
            <button class="sidebar-toggle" onclick="toggleSidebar()">
                <span class="sidebar-toggle-icon">◀</span>
            </button>
            
            <div class="sidebar-brand">
                <span class="brand-full">  Admin Panel</span>
            </div>
            
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" 
                       class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <span class="menu-icon">📊</span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}" 
                       class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <span class="menu-icon">🏷️</span>
                        <span class="menu-text">Kategori</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}" 
                       class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <span class="menu-icon">📦</span>
                        <span class="menu-text">Produk</span>
                    </a>
                </li>
                <li>
    <a href="{{ route('admin.orders.index') }}"
       class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
        <span class="menu-icon">🧾</span>
        <span class="menu-text">Order</span>
    </a>
</li>

                <li>
                    <a href="{{ route('admin.settings.index') }}" 
                       class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                        <span class="menu-icon">⚙️</span>
                        <span class="menu-text">Pengaturan</span>
                    </a>
                </li>
                
                <div class="sidebar-divider"></div>
                
                <li>
                    <a href="{{ route('home') }}" target="_blank">
                        <span class="menu-text">Lihat Website</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">
                            <span class="menu-text">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </aside>
        
        <!-- MAIN -->
        <div class="main-content">
            <!-- TOPBAR -->
            <div class="topbar">
                <div class="topbar-left">
                    <button class="mobile-menu-toggle" onclick="toggleMobileSidebar()">
                        ☰
                    </button>
                </div>
                
                <div class="user-menu">
                    <button class="user-btn" onclick="toggleDropdown(event)">
                        👤 {{ Auth::user()->name }} ▼
                    </button>
                    <div class="user-dropdown" id="userDropdown">
                        <div class="user-dropdown-item" style="font-size: 0.9rem; color: #666;">
                            {{ Auth::user()->email }}
                        </div>
                        <div class="user-dropdown-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- CONTENT -->
            <div class="content">
                @if(session('success'))
                <div class="alert alert-success">
                    <span>✓ {{ session('success') }}</span>
                    <button class="alert-close" onclick="this.parentElement.remove()">×</button>
                </div>
                @endif
                
                @if(session('error'))
                <div class="alert alert-danger">
                    <span>✗ {{ session('error') }}</span>
                    <button class="alert-close" onclick="this.parentElement.remove()">×</button>
                </div>
                @endif
                
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        // Toggle sidebar (desktop)
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
            
            // Simpan state ke localStorage
            if (sidebar.classList.contains('collapsed')) {
                localStorage.setItem('sidebarCollapsed', 'true');
            } else {
                localStorage.setItem('sidebarCollapsed', 'false');
            }
        }
        
        // Toggle mobile sidebar
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('mobile-open');
            overlay.classList.toggle('show');
        }
        
        // Load sidebar state dari localStorage
        window.addEventListener('DOMContentLoaded', function() {
            const sidebarCollapsed = localStorage.getItem('sidebarCollapsed');
            const sidebar = document.getElementById('sidebar');
            
            if (sidebarCollapsed === 'true') {
                sidebar.classList.add('collapsed');
            }
        });
        
        // User dropdown
        function toggleDropdown(e) {
            e.stopPropagation();
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('show');
        }
        
        document.addEventListener('click', function() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.remove('show');
        });
        
        // Auto hide alerts
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
    
    @yield('scripts')
</body>
</html>