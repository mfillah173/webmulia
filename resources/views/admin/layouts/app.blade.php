<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Mulia Special Academy</title>
    <meta name="description" content="Admin Panel Mulia Special Academy">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Design System Variables */
        :root {
            --primary-color: #3b82f6;
            --primary-dark: #2563eb;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --info-color: #06b6d4;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --spacing-xs: 0.25rem;
            --spacing-sm: 0.5rem;
            --spacing-md: 1rem;
            --spacing-lg: 1.5rem;
            --spacing-xl: 2rem;
            --spacing-2xl: 3rem;
            --spacing-3xl: 4rem;
            --border-radius: 0.5rem;
            --border-radius-lg: 0.75rem;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 80px;
        }

        /* Base Styles */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--gray-50);
            color: var(--gray-800);
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: white;
            border-right: 1px solid var(--gray-200);
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
            box-shadow: var(--shadow-sm);
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        .sidebar.collapsed .nav-text,
        .sidebar.collapsed .sidebar-brand-text {
            opacity: 0;
            width: 0;
            overflow: hidden;
        }

        .sidebar.collapsed .sidebar-brand {
            justify-content: center;
        }

        .sidebar.collapsed .nav-item {
            display: flex;
            justify-content: center;
        }

        /* Sidebar Header */
        .sidebar-header {
            padding: var(--spacing-xl);
            border-bottom: 1px solid var(--gray-200);
            background: var(--gray-50);
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: var(--gray-800);
            font-weight: 700;
            font-size: 1.25rem;
            transition: all 0.3s ease;
        }

        .sidebar-brand:hover {
            color: var(--primary-color);
            text-decoration: none;
        }

        .sidebar-brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: var(--spacing-md);
            font-size: 1.125rem;
        }

        .sidebar-brand-text {
            transition: all 0.3s ease;
        }

        /* Sidebar Navigation */
        .sidebar-nav {
            padding: var(--spacing-lg) 0;
        }

        .nav-section {
            margin-bottom: var(--spacing-xl);
        }

        .nav-section-title {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--gray-500);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0 var(--spacing-xl);
            margin-bottom: var(--spacing-md);
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .nav-section-title {
            opacity: 0;
            height: 0;
            margin: 0;
            padding: 0;
        }

        .nav-item {
            margin-bottom: var(--spacing-xs);
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: var(--spacing-md) var(--spacing-xl);
            color: var(--gray-600);
            text-decoration: none;
            transition: all 0.2s ease;
            border-radius: 0;
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary-color);
            background: rgba(59, 130, 246, 0.05);
            text-decoration: none;
        }

        .nav-link.active {
            color: var(--primary-color);
            background: rgba(59, 130, 246, 0.1);
            font-weight: 500;
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: var(--primary-color);
        }

        .nav-link i {
            width: 20px;
            margin-right: var(--spacing-md);
            text-align: center;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .nav-text {
            transition: all 0.3s ease;
            font-weight: 500;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            transition: margin-left 0.3s ease;
            min-height: 100vh;
        }

        .main-content.expanded {
            margin-left: var(--sidebar-collapsed-width);
        }

        /* Top Bar */
        .topbar {
            background: white;
            border-bottom: 1px solid var(--gray-200);
            padding: var(--spacing-lg) var(--spacing-xl);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow-sm);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: var(--spacing-lg);
        }

        .sidebar-toggle {
            background: none;
            border: none;
            color: var(--gray-600);
            font-size: 1.25rem;
            cursor: pointer;
            padding: var(--spacing-sm);
            border-radius: var(--border-radius);
            transition: all 0.2s ease;
        }

        .sidebar-toggle:hover {
            color: var(--primary-color);
            background: var(--gray-100);
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--gray-800);
            margin: 0;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: var(--spacing-lg);
        }

        /* User Menu */
        .user-menu {
            display: flex;
            align-items: center;
            gap: var(--spacing-md);
            padding: var(--spacing-sm);
            border-radius: var(--border-radius);
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .user-menu:hover {
            background: var(--gray-100);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray-800);
            margin: 0;
        }

        .user-role {
            font-size: 0.75rem;
            color: var(--gray-500);
            margin: 0;
        }

        /* Content Area */
        .content {
            padding: var(--spacing-xl);
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Cards */
        .card {
            background: white;
            border: 1px solid var(--gray-200);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-sm);
            transition: all 0.2s ease;
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        .card-header {
            background: white;
            border-bottom: 1px solid var(--gray-200);
            padding: var(--spacing-lg) var(--spacing-xl);
        }

        .card-body {
            padding: var(--spacing-xl);
        }

        .card-footer {
            background: var(--gray-50);
            border-top: 1px solid var(--gray-200);
            padding: var(--spacing-lg) var(--spacing-xl);
        }

        /* Buttons */
        .btn {
            font-weight: 500;
            border-radius: var(--border-radius);
            transition: all 0.2s ease;
            border: none;
            padding: var(--spacing-sm) var(--spacing-md);
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            background: white;
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            color: white;
        }

        .btn-sm {
            padding: var(--spacing-xs) var(--spacing-sm);
            font-size: 0.875rem;
        }

        .btn-lg {
            padding: var(--spacing-md) var(--spacing-xl);
            font-size: 1.125rem;
        }

        /* Alerts */
        .alert {
            border: none;
            border-radius: var(--border-radius);
            padding: var(--spacing-md) var(--spacing-lg);
            margin-bottom: var(--spacing-lg);
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }

        .alert-warning {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning-color);
            border-left: 4px solid var(--warning-color);
        }

        .alert-info {
            background: rgba(6, 182, 212, 0.1);
            color: var(--info-color);
            border-left: 4px solid var(--info-color);
        }

        /* Loading States */
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
            border-top-color: currentColor;
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

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: var(--sidebar-width);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .main-content.expanded {
                margin-left: 0;
            }

            .content {
                padding: var(--spacing-lg);
            }

            .topbar {
                padding: var(--spacing-md) var(--spacing-lg);
            }

            .page-title {
                font-size: 1.25rem;
            }

            .user-info {
                display: none;
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

        /* Scrollbar Styling */
        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: var(--gray-300);
            border-radius: 2px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: var(--gray-400);
        }

        /* Focus States */
        .btn:focus,
        .form-control:focus,
        .form-select:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* Animation Classes */
        .fade-in {
            animation: fadeIn 0.3s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .slide-in {
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(-20px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
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
                <div class="sidebar-brand-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <span class="sidebar-brand-text">Mulia Special Academy</span>
            </a>
        </div>

        <nav class="sidebar-nav">
            <!-- Main Navigation -->
            <div class="nav-section">
                <div class="nav-section-title">Main</div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Content Management -->
            <div class="nav-section">
                <div class="nav-section-title">Content</div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('admin.berita.index') }}" class="nav-link {{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
                            <i class="fas fa-newspaper"></i>
                            <span class="nav-text">Berita</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.program.index') }}" class="nav-link {{ request()->routeIs('admin.program*') ? 'active' : '' }}">
                            <i class="fas fa-graduation-cap"></i>
                            <span class="nav-text">Program</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.sistem.index') }}" class="nav-link {{ request()->routeIs('admin.sistem*') ? 'active' : '' }}">
                            <i class="fas fa-cogs"></i>
                            <span class="nav-text">Sistem</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.fasilitas.index') }}" class="nav-link {{ request()->routeIs('admin.fasilitas*') ? 'active' : '' }}">
                            <i class="fas fa-building"></i>
                            <span class="nav-text">Fasilitas</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Media & Gallery -->
            <div class="nav-section">
                <div class="nav-section-title">Media</div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('admin.galeri-program.index') }}" class="nav-link {{ request()->routeIs('admin.galeri-program*') ? 'active' : '' }}">
                            <i class="fas fa-images"></i>
                            <span class="nav-text">Galeri Program</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.galeri-sistem.index') }}" class="nav-link {{ request()->routeIs('admin.galeri-sistem*') ? 'active' : '' }}">
                            <i class="fas fa-photo-video"></i>
                            <span class="nav-text">Galeri Sistem</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.galeri-fasilitas.index') }}" class="nav-link {{ request()->routeIs('admin.galeri-fasilitas*') ? 'active' : '' }}">
                            <i class="fas fa-camera"></i>
                            <span class="nav-text">Galeri Fasilitas</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Settings -->
            <div class="nav-section">
                <div class="nav-section-title">Settings</div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('admin.syarat-pendaftaran.index') }}" class="nav-link {{ request()->routeIs('admin.syarat-pendaftaran*') ? 'active' : '' }}">
                            <i class="fas fa-clipboard-list"></i>
                            <span class="nav-text">Syarat Pendaftaran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.kontak.index') }}" class="nav-link {{ request()->routeIs('admin.kontak*') ? 'active' : '' }}">
                            <i class="fas fa-envelope"></i>
                            <span class="nav-text">Kontak</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- External Links -->
            <div class="nav-section">
                <div class="nav-section-title">External</div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link" target="_blank">
                            <i class="fas fa-external-link-alt"></i>
                            <span class="nav-text">Lihat Website</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline w-100">
                            @csrf
                            <button type="submit" class="nav-link w-100 text-start" style="background: none; border: none;">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="nav-text">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
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
                <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
            </div>

            <div class="topbar-right">
                <div class="user-menu">
                    <div class="user-avatar">
                        {{ substr(auth('admin')->user()->name, 0, 1) }}
                    </div>
                    <div class="user-info">
                        <p class="user-name">{{ auth('admin')->user()->name }}</p>
                        <p class="user-role">{{ auth('admin')->user()->role }}</p>
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

            // Add fade-in animation to content
            document.querySelector('.content').classList.add('fade-in');
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

        // CSRF Token Setup
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        if (token) {
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token;
        }
    </script>

    @yield('scripts')
</body>

</html>