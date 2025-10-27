<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Mulia Special Academy</title>
    <meta name="description" content="Admin Panel Mulia Special Academy">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary-orange: #ff8c00;
            --secondary-orange: #ff6b35;
            --light-orange: #ffb366;
            --dark-orange: #e67300;
            --orange-gradient: linear-gradient(135deg, #ff8c00 0%, #ff6b35 100%);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            line-height: 1.6;
            color: #2c3e50;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background: var(--orange-gradient);
            background-size: 200% 200%;
            animation: gradientShift 8s ease infinite;
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
        }

        /* Desktop collapsed sidebar */
        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar.collapsed .nav-text {
            opacity: 0;
            width: 0;
            overflow: hidden;
        }

        .sidebar.collapsed .sidebar-brand .nav-text {
            opacity: 0;
            width: 0;
            overflow: hidden;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .sidebar-header {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .sidebar-brand {
            color: white;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.2rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .sidebar-brand i {
            color: white;
            margin-right: 0.5rem;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .nav-item {
            margin-bottom: 0.25rem;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            padding: 1rem 1.25rem !important;
            margin: 0 0.25rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link:hover {
            color: white !important;
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .nav-link.active {
            color: white !important;
            background: rgba(255, 255, 255, 0.2);
            font-weight: 600;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-link i {
            width: 20px;
            margin-right: 0.75rem;
            text-align: center;
            transition: transform 0.3s ease;
            font-size: 1.2rem;
        }

        .nav-link:hover i {
            transform: scale(1.1);
        }

        .nav-text {
            transition: opacity 0.3s ease;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            transition: margin-left 0.3s ease;
            min-height: 100vh;
        }

        .main-content.expanded {
            margin-left: 70px;
        }

        /* Top Bar */
        .topbar {
            background: white;
            padding: 1rem 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar-left {
            display: flex;
            align-items: center;
        }

        .sidebar-toggle {
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #2c3e50;
            margin-right: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .sidebar-toggle:hover {
            color: var(--primary-orange);
            transform: scale(1.1);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            margin-left: auto;
        }

        .admin-info {
            display: flex;
            align-items: center;
            margin-right: 1rem;
        }

        .admin-avatar {
            width: 35px;
            height: 35px;
            background: var(--orange-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            margin-right: 0.5rem;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
            transition: all 0.3s ease;
        }

        .admin-avatar:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.4);
        }

        /* Content Area */
        .content {
            padding: 2rem;
        }

        /* Cards */
        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(255, 140, 0, 0.2);
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #e9ecef;
            font-weight: 600;
        }

        /* Buttons */
        .btn-primary {
            background: var(--orange-gradient);
            border: none;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #ff6b35 0%, #ff8c00 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.4);
        }

        .btn-outline-primary {
            color: var(--primary-orange);
            border-color: var(--primary-orange);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-orange);
            border-color: var(--primary-orange);
        }

        /* Stats Cards */
        .stats-card {
            background: var(--orange-gradient);
            color: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
            transition: all 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(255, 140, 0, 0.4);
        }

        .stats-card .stats-icon {
            font-size: 2.5rem;
            opacity: 0.8;
        }

        .stats-card .stats-number {
            font-size: 2rem;
            font-weight: 700;
            margin: 0.5rem 0;
        }

        .stats-card .stats-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* Tables */
        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead th {
            background: #f8f9fa;
            border: none;
            font-weight: 600;
            color: #2c3e50;
        }

        /* Alerts */
        .alert {
            border: none;
            border-radius: 10px;
        }

        /* Desktop - sidebar can be collapsed */
        @media (min-width: 769px) {
            .sidebar {
                transform: translateX(0) !important;
                width: 250px !important;
            }

            .sidebar.collapsed {
                width: 70px !important;
            }

            .main-content {
                margin-left: 250px !important;
            }

            .main-content.expanded {
                margin-left: 70px !important;
            }

            .sidebar-overlay {
                display: none !important;
            }
        }

        /* Mobile - sidebar hidden by default */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%) !important;
                width: 250px !important;
                transition: transform 0.3s ease !important;
                z-index: 1001;
            }

            .sidebar.show {
                transform: translateX(0) !important;
            }

            .sidebar.collapsed {
                width: 250px !important;
            }

            .main-content {
                margin-left: 0 !important;
                width: 100% !important;
            }

            .main-content.expanded {
                margin-left: 0 !important;
            }

            .content {
                padding: 1rem;
            }

            .topbar {
                padding: 0.75rem 1rem;
            }

            .topbar h4 {
                font-size: 1.1rem;
            }

            .stats-card {
                margin-bottom: 0.75rem;
            }

            .stats-card .stats-number {
                font-size: 1.5rem;
            }

            .stats-card .stats-icon {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .content {
                padding: 0.75rem;
            }

            .stats-card {
                padding: 1rem;
            }

            .stats-card .stats-number {
                font-size: 1.25rem;
            }

            .stats-card .stats-icon {
                font-size: 1.75rem;
            }

            .card-body {
                padding: 1rem;
            }
        }

        /* Mobile Overlay */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }

        .sidebar-overlay.show {
            display: block;
        }

        /* Loading Animation */
        .btn-loading {
            position: relative;
            pointer-events: none;
        }

        .btn-loading::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            top: 50%;
            left: 50%;
            margin-left: -8px;
            margin-top: -8px;
            border: 2px solid transparent;
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    @yield('styles')
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
                <i class="fas fa-hands-helping"></i>
                <span class="nav-text">Mulia Special Akademik</span>
            </a>
        </div>

        <nav class="sidebar-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.berita.index') }}" class="nav-link {{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
                        <i class="fas fa-newspaper"></i>
                        <span class="nav-text">Berita</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.kontak.index') }}" class="nav-link {{ request()->routeIs('admin.kontak*') ? 'active' : '' }}">
                        <i class="fas fa-envelope"></i>
                        <span class="nav-text">Kontak</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link" target="_blank">
                        <i class="fas fa-external-link-alt"></i>
                        <span class="nav-text">Lihat Website</span>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link w-100 text-start" style="background: none; border: none;">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="nav-text">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Mobile Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Top Bar -->
        <div class="topbar">
            <div class="topbar-left">
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h4 class="mb-0">@yield('page-title', 'Dashboard')</h4>
            </div>

            <div class="topbar-right">
                <div class="admin-info">
                    <div class="admin-avatar">
                        {{ substr(auth('admin')->user()->name, 0, 1) }}
                    </div>
                    <div>
                        <div class="fw-semibold">{{ auth('admin')->user()->name }}</div>
                        <small class="text-muted">{{ auth('admin')->user()->role }}</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Initialize sidebar state
        function initializeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const overlay = document.getElementById('sidebarOverlay');

            // Reset all classes first
            sidebar.classList.remove('show', 'collapsed');
            mainContent.classList.remove('expanded');
            overlay.classList.remove('show');

            // Apply appropriate state based on screen size
            if (window.innerWidth <= 768) {
                // Mobile - sidebar hidden by default
                sidebar.classList.remove('collapsed');
                mainContent.classList.remove('expanded');
            } else {
                // Desktop - sidebar visible by default
                sidebar.classList.remove('show');
                mainContent.classList.remove('expanded');
            }
        }

        // Sidebar toggle
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const overlay = document.getElementById('sidebarOverlay');

            if (window.innerWidth <= 768) {
                // Mobile behavior - slide sidebar
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
            } else {
                // Desktop behavior - collapse sidebar
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
            }
        });

        // Close sidebar when clicking overlay
        document.getElementById('sidebarOverlay').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });

        // Close sidebar when clicking nav links on mobile
        document.querySelectorAll('.nav-link').forEach(function(link) {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    const sidebar = document.getElementById('sidebar');
                    const overlay = document.getElementById('sidebarOverlay');

                    sidebar.classList.remove('show');
                    overlay.classList.remove('show');
                }
            });
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            initializeSidebar();
        });

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            initializeSidebar();
        });

        // Auto-hide alerts
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Loading button
        document.querySelectorAll('form').forEach(function(form) {
            form.addEventListener('submit', function() {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.classList.add('btn-loading');
                    submitBtn.disabled = true;
                }
            });
        });
    </script>

    @yield('scripts')
</body>

</html>