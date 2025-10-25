<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mulia Special Academy')</title>
    <meta name="description" content="@yield('description', 'Sekolah Berbasis Stimulasi for Children with Special Needs - Kindergarten & Primary School di Surabaya')">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    @yield('styles')
    
    <style>
        /* Custom Navbar Styles - Orange Theme */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #ff8c00 0%, #ff6b35 100%);
            background-size: 200% 200%;
            animation: gradientShift 8s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .logo-circle {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.25);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        .logo-circle:hover {
            background: rgba(255, 255, 255, 0.35);
            transform: scale(1.1);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            border-color: rgba(255, 255, 255, 0.6);
        }
        
        .logo-circle i {
            font-size: 1.5rem;
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        /* Navbar height and spacing */
        .navbar {
            min-height: 80px;
            padding: 0.75rem 0;
        }
        
        .navbar-brand {
            margin-right: 2rem;
        }
        
        .navbar-brand h4 {
            color: white !important;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .navbar-brand small {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
        
        /* Navbar text contrast fix */
        .navbar .text-primary {
            color: white !important;
        }
        
        .navbar .text-muted {
            color: rgba(255, 255, 255, 0.8) !important;
        }
        
        .navbar .text-light {
            color: rgba(255, 255, 255, 0.9) !important;
        }
        
        .nav-link-custom {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            padding: 1rem 1.25rem !important;
            margin: 0 0.25rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-width: 110px;
            text-align: center;
            height: 70px;
        }
        
        .nav-link-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .nav-link-custom:hover::before {
            left: 100%;
        }
        
        .nav-link-custom:hover {
            color: white !important;
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        .nav-link-custom.active {
            color: white !important;
            background: rgba(255, 255, 255, 0.2);
            font-weight: 600;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .nav-link-custom i {
            transition: transform 0.3s ease;
            font-size: 1.2rem;
            margin-bottom: 0.25rem;
        }
        
        .nav-link-custom:hover i {
            transform: scale(1.1);
        }
        
        .nav-link-custom span {
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .navbar-toggler {
            border: none !important;
            padding: 0.25rem 0.5rem;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        .btn-warning {
            background: linear-gradient(45deg, #ff8c00, #ff6b35);
            border: none;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.4);
            transition: all 0.3s ease;
        }
        
        .btn-warning:hover {
            background: linear-gradient(45deg, #ff6b35, #ff8c00);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.6);
        }
        
        /* Navbar spacing and layout */
        .navbar-nav {
            gap: 0.5rem;
        }
        
        .navbar-nav .nav-item {
            flex: 1;
            display: flex;
            justify-content: center;
        }
        
        .navbar-nav .nav-item:first-child {
            margin-left: 0;
        }
        
        .navbar-nav .nav-item:last-child {
            margin-right: 0;
        }
        
        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border-radius: 10px;
                margin-top: 1rem;
                padding: 1rem;
            }
            
            .navbar-nav {
                flex-direction: column;
                gap: 0.75rem;
            }
            
            .navbar-nav .nav-item {
                flex: none;
            }
            
            .nav-link-custom {
                margin: 0;
                min-width: auto;
                width: 100%;
                flex-direction: row;
                justify-content: flex-start;
                text-align: left;
                padding: 0.75rem 1rem !important;
            }
            
            .nav-link-custom i {
                margin-bottom: 0;
                margin-right: 0.75rem;
                font-size: 1.1rem;
            }
            
            .nav-link-custom span {
                font-size: 1rem;
            }
        }
        
        @media (min-width: 992px) {
            .navbar-nav {
                max-width: 800px;
                margin: 0 auto;
            }
        }
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Navbar shadow animation */
        .navbar {
            transition: box-shadow 0.3s ease;
        }
        
        .navbar.scrolled {
            box-shadow: 0 2px 20px rgba(255, 140, 0, 0.3);
        }
        
        /* Orange Theme Variables */
        :root {
            --primary-orange: #ff8c00;
            --secondary-orange: #ff6b35;
            --light-orange: #ffb366;
            --dark-orange: #e67300;
            --orange-gradient: linear-gradient(135deg, #ff8c00 0%, #ff6b35 100%);
        }
        
        /* Global Orange Theme */
        .text-primary {
            color: var(--primary-orange) !important;
        }
        
        .bg-primary {
            background: var(--orange-gradient) !important;
        }
        
        .btn-primary {
            background: var(--orange-gradient);
            border: none;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #ff6b35 0%, #ff8c00 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.5);
        }
        
        .btn-outline-primary {
            color: var(--primary-orange);
            border-color: var(--primary-orange);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-orange);
            border-color: var(--primary-orange);
        }
        
        /* Card hover effects with orange theme */
        .card {
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(255, 140, 0, 0.2);
        }
        
        /* Section titles with orange accent */
        .section-title {
            color: var(--primary-orange);
            position: relative;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--orange-gradient);
            border-radius: 2px;
        }
        
        /* Feature icons with orange theme */
        .feature-icon {
            background: var(--orange-gradient);
            color: white;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2rem;
            transition: all 0.3s ease;
        }
        
        .feature-icon:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 25px rgba(255, 140, 0, 0.4);
        }
        
        /* News cards with orange theme */
        .news-card {
            transition: all 0.3s ease;
        }
        
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(255, 140, 0, 0.2);
        }
        
        .news-date {
            color: var(--primary-orange);
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        /* Footer with orange accents */
        .footer .text-primary {
            color: var(--primary-orange) !important;
        }
        
        /* Call to action sections */
        .bg-primary {
            background: var(--orange-gradient) !important;
        }
        
        /* Links and interactive elements */
        a {
            color: var(--primary-orange);
            transition: color 0.3s ease;
        }
        
        a:hover {
            color: var(--secondary-orange);
        }
        
        /* Form elements */
        .form-control:focus {
            border-color: var(--primary-orange);
            box-shadow: 0 0 0 0.2rem rgba(255, 140, 0, 0.25);
        }
        
        /* Progress bars and loading elements */
        .progress-bar {
            background: var(--orange-gradient);
        }
        
        /* Badges and labels */
        .badge-primary {
            background: var(--orange-gradient);
        }
        
        /* Hero Section Orange Theme */
        .hero-section {
            background: linear-gradient(135deg, rgba(255, 140, 0, 0.1) 0%, rgba(255, 107, 53, 0.1) 100%);
            padding: 100px 0 80px;
        }
        
        .hero-title {
            color: var(--primary-orange) !important;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .hero-subtitle {
            color: var(--secondary-orange) !important;
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .hero-content .lead {
            color: #333 !important;
            font-weight: 500;
            line-height: 1.6;
        }
        
        /* Hero section text contrast */
        .hero-content h1,
        .hero-content h2,
        .hero-content h3,
        .hero-content h4,
        .hero-content h5,
        .hero-content h6 {
            color: var(--primary-orange) !important;
        }
        
        .hero-content p {
            color: #333 !important;
        }
        
        .hero-content .text-muted {
            color: #666 !important;
        }
        
        /* Hero buttons styling */
        .hero-buttons .btn {
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .hero-buttons .btn-primary {
            background: var(--orange-gradient);
            border: none;
            color: white;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
        }
        
        .hero-buttons .btn-primary:hover {
            background: linear-gradient(135deg, #ff6b35 0%, #ff8c00 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.4);
        }
        
        .hero-buttons .btn-outline-primary {
            color: var(--primary-orange);
            border-color: var(--primary-orange);
            background: white;
        }
        
        .hero-buttons .btn-outline-primary:hover {
            background: var(--primary-orange);
            color: white;
            border-color: var(--primary-orange);
        }
        
        .hero-placeholder {
            background: var(--orange-gradient);
            border-radius: 25px;
            padding: 4rem 3rem;
            color: white;
            box-shadow: 0 15px 35px rgba(255, 140, 0, 0.4);
            position: relative;
            overflow: hidden;
            transform: perspective(1000px) rotateY(-8deg) rotateX(8deg);
            transition: all 0.4s ease;
            border: 3px solid rgba(255, 255, 255, 0.2);
        }
        
        .hero-placeholder:hover {
            transform: perspective(1000px) rotateY(0deg) rotateX(0deg) scale(1.05);
            box-shadow: 0 25px 50px rgba(255, 140, 0, 0.5);
        }
        
        .hero-placeholder::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.15), transparent);
            transform: rotate(45deg);
            animation: shimmer 4s infinite;
        }
        
        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }
        
        .hero-placeholder::after {
            content: '';
            position: absolute;
            top: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.7; }
            50% { transform: scale(1.2); opacity: 0.3; }
        }
        
        .hero-placeholder i {
            position: relative;
            z-index: 3;
            filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.3));
            animation: float 3s ease-in-out infinite;
            font-size: 8rem !important;
            opacity: 0.9;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(5deg); }
        }
        
        /* Additional decorative elements */
        .hero-image {
            position: relative;
        }
        
        .hero-image::before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, rgba(255, 140, 0, 0.1), rgba(255, 107, 53, 0.1));
            border-radius: 50%;
            animation: rotate 10s linear infinite;
        }
        
        .hero-image::after {
            content: '';
            position: absolute;
            bottom: -30px;
            right: -30px;
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, rgba(255, 107, 53, 0.1), rgba(255, 140, 0, 0.1));
            border-radius: 50%;
            animation: rotate 8s linear infinite reverse;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        /* Enhanced hero section background */
        .hero-section {
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 80%, rgba(255, 140, 0, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 107, 53, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }
        
        .hero-section::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 140, 0, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            animation: breathe 4s ease-in-out infinite;
        }
        
        @keyframes breathe {
            0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.5; }
            50% { transform: translate(-50%, -50%) scale(1.1); opacity: 0.3; }
        }
        
        /* Floating decorative elements */
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero-content::before {
            content: '✨';
            position: absolute;
            top: -20px;
            right: 20px;
            font-size: 2rem;
            animation: sparkle 2s ease-in-out infinite;
        }
        
        .hero-content::after {
            content: '🎓';
            position: absolute;
            bottom: -30px;
            left: 10px;
            font-size: 1.5rem;
            animation: bounce 2s ease-in-out infinite;
        }
        
        @keyframes sparkle {
            0%, 100% { transform: scale(1) rotate(0deg); opacity: 0.7; }
            50% { transform: scale(1.2) rotate(180deg); opacity: 1; }
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        /* Syarat Pendaftaran Section Styling */
        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        
        .card-header.bg-success {
            background: var(--orange-gradient) !important;
            border: none;
            padding: 1.5rem;
        }
        
        .list-group-item {
            padding: 1rem 1.5rem;
            border-left: 3px solid var(--primary-orange);
            margin-bottom: 0.5rem;
            border-radius: 0;
            transition: all 0.3s ease;
        }
        
        .list-group-item:hover {
            background-color: rgba(255, 140, 0, 0.05) !important;
            transform: translateX(5px);
            box-shadow: 0 2px 8px rgba(255, 140, 0, 0.2);
        }
        
        .list-group-item i {
            font-size: 1.2rem;
            width: 20px;
            color: var(--primary-orange);
        }
        
        .btn-success {
            background: var(--orange-gradient);
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
            transition: all 0.3s ease;
        }
        
        .btn-success:hover {
            background: linear-gradient(135deg, #ff6b35, #ff8c00);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.4);
        }
        
        /* Override btn-primary untuk syarat pendaftaran */
        .btn-primary {
            background: var(--orange-gradient) !important;
            border: none !important;
            color: white !important;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3) !important;
            transition: all 0.3s ease !important;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #ff6b35, #ff8c00) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.4) !important;
        }
        
        /* Contact Banner Styling */
        .contact-icon-circle {
            width: 50px;
            height: 50px;
            border: 2px solid #333;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            transition: all 0.3s ease;
        }
        
        .contact-icon-circle:hover {
            background: #333;
            color: white;
            transform: scale(1.1);
        }
        
        .contact-icon-circle i {
            font-size: 1.2rem;
            color: #333;
            transition: color 0.3s ease;
        }
        
        .contact-icon-circle:hover i {
            color: white;
        }
        
        .contact-text span {
            font-size: 1rem;
            transition: color 0.3s ease;
        }
        
        .contact-text:hover span {
            color: var(--primary-orange);
        }
        
        /* Responsive contact banner */
        @media (max-width: 768px) {
            .contact-icon-circle {
                width: 40px;
                height: 40px;
            }
            
            .contact-icon-circle i {
                font-size: 1rem;
            }
            
            .contact-text span {
                font-size: 0.9rem;
            }
        }
        
        /* Daftar Harga Section Styling */
        .pricing-container {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .pricing-item {
            display: flex;
            background: white;
            border-radius: 15px;
            margin-bottom: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .pricing-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 140, 0, 0.2);
        }
        
        .pricing-label {
            flex: 1;
            background: linear-gradient(135deg, var(--light-orange) 0%, var(--primary-orange) 100%);
            padding: 20px 25px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }
        
        .pricing-label::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 179, 102, 0.9) 0%, rgba(255, 140, 0, 0.95) 100%);
        }
        
        .pricing-text {
            font-size: 1.1rem;
            font-weight: 700;
            color: white;
            position: relative;
            z-index: 2;
            margin-bottom: 0;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
        
        .pricing-subtitle {
            font-size: 0.85rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9);
            position: relative;
            z-index: 2;
            margin-top: 5px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }
        
        .pricing-price {
            background: var(--orange-gradient);
            padding: 20px 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 180px;
            position: relative;
        }
        
        .pricing-price::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.9) 0%, rgba(255, 140, 0, 0.9) 100%);
        }
        
        .price-text {
            font-size: 1.2rem;
            font-weight: 700;
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 2;
        }
        
        /* Responsive pricing */
        @media (max-width: 768px) {
            .pricing-item {
                flex-direction: column;
            }
            
            .pricing-label {
                padding: 15px 20px;
                text-align: center;
            }
            
            .pricing-price {
                padding: 15px 20px;
                min-width: auto;
            }
            
            .pricing-text {
                font-size: 1rem;
            }
            
            .price-text {
                font-size: 1.1rem;
            }
        }
        
        /* What is MSA & Core Principles Section - Combined */
        .msa-content {
            padding: 2rem 0;
        }
        
        .msa-badge {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        
        .msa-title {
            font-size: 4rem;
            font-weight: 800;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            letter-spacing: -2px;
        }
        
        .msa-description {
            font-size: 1.1rem;
            color: #6c757d;
            line-height: 1.7;
            max-width: 500px;
        }
        
        /* Visual Elements */
        .msa-visual {
            padding: 2rem 0;
            position: relative;
        }
        
        .visual-container {
            position: relative;
            width: 100%;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .main-circle {
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 6px solid white;
            position: relative;
            z-index: 2;
        }
        
        .inner-circle {
            width: 100px;
            height: 100px;
            background: var(--primary-orange);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(255, 140, 0, 0.4);
        }
        
        .inner-circle i {
            color: white;
            font-size: 3rem;
        }
        
        .floating-icons {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
        }
        
        .icon-item {
            position: absolute;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            animation: float 6s ease-in-out infinite;
        }
        
        .icon-item i {
            font-size: 1.5rem;
            color: white;
        }
        
        .icon-1 {
            top: 10%;
            right: 20%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            animation-delay: 0s;
        }
        
        .icon-2 {
            top: 20%;
            left: 10%;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            animation-delay: 1.5s;
        }
        
        .icon-3 {
            top: 15%;
            left: 5%;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            animation-delay: 3s;
        }
        
        .icon-4 {
            bottom: 20%;
            right: 15%;
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            animation-delay: 4.5s;
        }
        
        .icon-5 {
            width: 80px;
            height: 30px;
            bottom: 10%;
            right: 5%;
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            border-radius: 20px;
            animation-delay: 2s;
        }
        
        .pill {
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #fa709a 0%, #fee140 100%);
            border-radius: 20px;
        }
        
        @keyframes float {
            0%, 100% { 
                transform: translateY(0px) rotate(0deg); 
            }
            50% { 
                transform: translateY(-20px) rotate(10deg); 
            }
        }
        
        /* MSA Core Principles Section - Modern Cards */
        .principles-container {
            padding: 2rem 0;
        }
        
        .main-principle {
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }
        
        .paperclip-icon {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: #c0c0c0;
            padding: 8px 12px;
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .paperclip-icon i {
            color: #666;
            font-size: 1rem;
        }
        
        .principle-title {
            background: var(--primary-orange);
            color: white;
            padding: 20px 40px;
            border-radius: 15px;
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
            box-shadow: 0 10px 30px rgba(255, 140, 0, 0.3);
            display: inline-block;
        }
        
        .principles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 1rem;
        }
        
        .principle-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #f8f9fa;
            position: relative;
            overflow: hidden;
        }
        
        .principle-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-orange);
        }
        
        .principle-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .card-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
        }
        
        .card-1 .card-icon {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .card-2 .card-icon {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        
        .card-3 .card-icon {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        
        .card-4 .card-icon {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }
        
        .principle-card h4 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
        }
        
        .principle-card p {
            color: #6c757d;
            line-height: 1.6;
            margin: 0;
        }
        
        /* Responsive Design */
        @media (max-width: 991.98px) {
            .msa-title {
                font-size: 3rem;
            }
            
            .main-circle {
                width: 160px;
                height: 160px;
            }
            
            .inner-circle {
                width: 80px;
                height: 80px;
            }
            
            .inner-circle i {
                font-size: 2.5rem;
            }
            
            .icon-item {
                width: 50px;
                height: 50px;
            }
            
            .icon-item i {
                font-size: 1.2rem;
            }
            
            .principles-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 1.5rem;
            }
        }
        
        @media (max-width: 767.98px) {
            .msa-title {
                font-size: 2.5rem;
            }
            
            .msa-description {
                font-size: 1rem;
            }
            
            .main-circle {
                width: 140px;
                height: 140px;
            }
            
            .inner-circle {
                width: 70px;
                height: 70px;
            }
            
            .inner-circle i {
                font-size: 2rem;
            }
            
            .principle-title {
                font-size: 1.4rem;
                padding: 15px 30px;
            }
            
            .principles-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .principle-card {
                padding: 1.5rem;
            }
        }
        
        
        /* System Cards Styling */
        .system-card {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            cursor: pointer;
        }
        
        a.text-decoration-none:hover .system-card {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .system-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }
        
        .system-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .system-card:hover .system-image img {
            transform: scale(1.05);
        }
        
        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 140, 0, 0.8) 0%, rgba(255, 107, 53, 0.8) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .system-card:hover .image-overlay {
            opacity: 1;
        }
        
        .image-overlay i {
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .system-card .card-title {
            color: var(--primary-orange);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        /* System Detail Page Styling */
        .system-detail-image {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }
        
        .system-detail-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .system-detail-image:hover img {
            transform: scale(1.05);
        }
        
        .system-info {
            padding: 2rem 0;
        }
        
        .system-title {
            color: var(--primary-orange);
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }
        
        .system-description {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #6c757d;
            margin-bottom: 2rem;
        }
        
        .system-section {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            height: 100%;
        }
        
        .features-list, .benefits-list {
            list-style: none;
            padding: 0;
        }
        
        .feature-item, .benefit-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #f8f9fa;
        }
        
        .feature-item:last-child, .benefit-item:last-child {
            border-bottom: none;
        }
        
        .feature-item i, .benefit-item i {
            font-size: 1.2rem;
        }
        
        .system-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        /* System Gallery Grid */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 2rem;
        }
        
        .gallery-item {
            position: relative;
            cursor: pointer;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        
        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .gallery-item-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 140, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .gallery-item:hover .gallery-item-overlay {
            opacity: 1;
        }
        
        .gallery-item-overlay i {
            color: white;
            font-size: 2rem;
        }
        
        /* Related System Cards */
        .system-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }
        
        .system-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .system-card:hover .system-image img {
            transform: scale(1.05);
        }
        
        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 140, 0, 0.8) 0%, rgba(255, 107, 53, 0.8) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .system-card:hover .image-overlay {
            opacity: 1;
        }
        
        .image-overlay i {
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .system-card .card-title {
            color: var(--primary-orange);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        /* Responsive Design */
        @media (max-width: 991.98px) {
            .system-title {
                font-size: 2rem;
            }
            
            .system-detail-image img {
                height: 300px;
            }
            
            .system-actions {
                justify-content: center;
            }
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 15px;
            }
            
            .gallery-item img {
                height: 150px;
            }
        }
        
        @media (max-width: 767.98px) {
            .system-title {
                font-size: 1.8rem;
            }
            
            .system-detail-image img {
                height: 250px;
            }
            
            .system-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .system-actions .btn {
                width: 100%;
                max-width: 300px;
            }
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 10px;
            }
            
            .gallery-item img {
                height: 120px;
            }
            
            .system-section {
                padding: 1.5rem;
            }
        }
        .program-card {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            cursor: pointer;
        }
        
        a.text-decoration-none:hover .program-card {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        /* Program Detail Page Styling */
        .program-detail-image {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }
        
        .program-detail-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .program-detail-image:hover img {
            transform: scale(1.05);
        }
        
        .program-info {
            padding: 2rem 0;
        }
        
        .program-title {
            color: var(--primary-orange);
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }
        
        .program-description {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #6c757d;
            margin-bottom: 2rem;
        }
        
        .program-details {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }
        
        .detail-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .detail-item:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            font-weight: 600;
            color: #2c3e50;
            margin-right: 0.5rem;
        }
        
        .detail-value {
            color: var(--primary-orange);
            font-weight: 500;
        }
        
        .program-section {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            height: 100%;
        }
        
        .objectives-list, .methods-list {
            list-style: none;
            padding: 0;
        }
        
        .objective-item, .method-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #f8f9fa;
        }
        
        .objective-item:last-child, .method-item:last-child {
            border-bottom: none;
        }
        
        .objective-item i, .method-item i {
            font-size: 1.2rem;
        }
        
        .program-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        /* Program Gallery Grid */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 2rem;
        }
        
        .gallery-item {
            position: relative;
            cursor: pointer;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        
        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .gallery-item-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 140, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .gallery-item:hover .gallery-item-overlay {
            opacity: 1;
        }
        
        .gallery-item-overlay i {
            color: white;
            font-size: 2rem;
        }
        
        /* Related Program Cards */
        .program-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }
        
        .program-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .program-card:hover .program-image img {
            transform: scale(1.05);
        }
        
        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 140, 0, 0.8) 0%, rgba(255, 107, 53, 0.8) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .program-card:hover .image-overlay {
            opacity: 1;
        }
        
        .image-overlay i {
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .program-card .card-title {
            color: var(--primary-orange);
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        /* Responsive Design */
        @media (max-width: 991.98px) {
            .program-title {
                font-size: 2rem;
            }
            
            .program-detail-image img {
                height: 300px;
            }
            
            .program-actions {
                justify-content: center;
            }
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 15px;
            }
            
            .gallery-item img {
                height: 150px;
            }
        }
        
        @media (max-width: 767.98px) {
            .program-title {
                font-size: 1.8rem;
            }
            
            .program-detail-image img {
                height: 250px;
            }
            
            .program-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .program-actions .btn {
                width: 100%;
                max-width: 300px;
            }
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 10px;
            }
            
            .gallery-item img {
                height: 120px;
            }
            
            .program-section {
                padding: 1.5rem;
            }
        }
        .gallery-main {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }
        
        .gallery-main img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .gallery-main:hover img {
            transform: scale(1.05);
        }
        
        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .gallery-main:hover .gallery-overlay {
            opacity: 1;
        }
        
        .gallery-thumbnails {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .thumbnail-item {
            position: relative;
            cursor: pointer;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 3px solid transparent;
        }
        
        .thumbnail-item:hover {
            transform: scale(1.05);
            border-color: var(--primary-orange);
        }
        
        .thumbnail-item.active {
            border-color: var(--primary-orange);
            box-shadow: 0 5px 15px rgba(255, 140, 0, 0.3);
        }
        
        .thumbnail-item img {
            width: 100%;
            height: 80px;
            object-fit: cover;
        }
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 2rem;
        }
        
        .gallery-item {
            position: relative;
            cursor: pointer;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        
        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .gallery-item-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 140, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .gallery-item:hover .gallery-item-overlay {
            opacity: 1;
        }
        
        .gallery-item-overlay i {
            color: white;
            font-size: 2rem;
        }
        
        /* Lightbox Modal */
        .lightbox-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .lightbox-image {
            max-width: 100%;
            max-height: 80vh;
            object-fit: contain;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }
        
        .lightbox-close {
            position: absolute;
            top: -40px;
            right: 0;
            color: white;
            font-size: 2rem;
            font-weight: bold;
            cursor: pointer;
            background: rgba(255, 140, 0, 0.8);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease;
        }
        
        .lightbox-close:hover {
            background: var(--primary-orange);
        }
        
        .lightbox-caption {
            margin-top: 20px;
            text-align: center;
            color: white;
            font-size: 1.2rem;
            font-weight: 500;
        }
        
        /* Responsive Design */
        @media (max-width: 991.98px) {
            .gallery-main img {
                height: 300px;
            }
            
            .gallery-thumbnails {
                flex-direction: row;
                flex-wrap: wrap;
            }
            
            .thumbnail-item img {
                height: 60px;
            }
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 15px;
            }
            
            .gallery-item img {
                height: 150px;
            }
        }
        
        @media (max-width: 767.98px) {
            .gallery-main img {
                height: 250px;
            }
            
            .gallery-thumbnails {
                flex-direction: row;
                justify-content: center;
            }
            
            .thumbnail-item {
                flex: 0 0 calc(50% - 5px);
            }
            
            .thumbnail-item img {
                height: 50px;
            }
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 10px;
            }
            
            .gallery-item img {
                height: 120px;
            }
            
            .lightbox-content {
                max-width: 95%;
                padding: 10px;
            }
            
            .lightbox-close {
                top: -30px;
                width: 30px;
                height: 30px;
                font-size: 1.5rem;
            }
        }
        .facility-detail-image {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }
        
        .facility-detail-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .facility-detail-image:hover img {
            transform: scale(1.05);
        }
        
        .image-overlay-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 140, 0, 0.9);
            color: white;
            padding: 15px;
            border-radius: 50%;
            font-size: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .facility-info {
            padding: 2rem 0;
        }
        
        .facility-title {
            color: var(--primary-orange);
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }
        
        .facility-description {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #6c757d;
            margin-bottom: 2rem;
        }
        
        .features-title {
            color: #2c3e50;
            font-weight: 600;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .features-list {
            list-style: none;
            padding: 0;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #f8f9fa;
            font-size: 1rem;
        }
        
        .feature-item:last-child {
            border-bottom: none;
        }
        
        .feature-item i {
            font-size: 1.2rem;
            color: var(--primary-orange);
        }
        
        .facility-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .breadcrumb {
            background: none;
            padding: 0;
        }
        
        .breadcrumb-item a {
            color: var(--primary-orange);
            text-decoration: none;
        }
        
        .breadcrumb-item a:hover {
            text-decoration: underline;
        }
        
        .breadcrumb-item.active {
            color: #6c757d;
        }
        
        /* Responsive Design */
        @media (max-width: 991.98px) {
            .facility-title {
                font-size: 2rem;
            }
            
            .facility-detail-image img {
                height: 300px;
            }
            
            .facility-actions {
                justify-content: center;
            }
        }
        
        @media (max-width: 767.98px) {
            .facility-title {
                font-size: 1.8rem;
            }
            
            .facility-detail-image img {
                height: 250px;
            }
            
            .facility-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .facility-actions .btn {
                width: 100%;
                max-width: 300px;
            }
        }
        .facility-card {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            cursor: pointer;
        }
        
        a.text-decoration-none:hover .facility-card {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        
        .facility-image {
            position: relative;
            height: 250px;
            overflow: hidden;
        }
        
        .facility-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .facility-card:hover .facility-image img {
            transform: scale(1.05);
        }
        
        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 140, 0, 0.8) 0%, rgba(255, 107, 53, 0.8) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .facility-card:hover .image-overlay {
            opacity: 1;
        }
        
        .image-overlay i {
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .facility-card .card-title {
            color: var(--primary-orange);
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }
        
        .facility-card .card-body {
            padding: 2rem;
        }
        
        .facility-card .lead {
            color: #6c757d;
            margin-bottom: 1.5rem;
        }
        
        .facility-card .list-unstyled li {
            padding: 0.5rem 0;
            border-bottom: 1px solid #f8f9fa;
        }
        
        .facility-card .list-unstyled li:last-child {
            border-bottom: none;
        }
        
        .facility-card .list-unstyled i {
            color: var(--primary-orange);
        }
        
        /* Responsive Design */
        @media (max-width: 991.98px) {
            .facility-image {
                height: 200px;
            }
            
            .facility-card .card-body {
                padding: 1.5rem;
            }
        }
        
        @media (max-width: 767.98px) {
            .facility-image {
                height: 180px;
            }
            
            .facility-card .card-body {
                padding: 1rem;
            }
            
            .facility-card .card-title {
                font-size: 1.3rem;
            }
        }
        .links-container {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
        }
        
        .links-container::before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            right: -20px;
            bottom: -20px;
            background: radial-gradient(circle at center, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 20px;
            pointer-events: none;
        }
        
        .link-item {
            display: flex;
            align-items: center;
            padding: 20px 0;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            border-radius: 10px;
            margin: 10px 0;
        }
        
        .link-item:hover {
            transform: translateX(10px);
            background: rgba(255, 255, 255, 0.1);
            text-decoration: none;
            color: inherit;
        }
        
        .link-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            flex-shrink: 0;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }
        
        .link-icon:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.8);
            transform: scale(1.1);
        }
        
        .link-icon i {
            color: #fff;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        
        .link-icon:hover i {
            color: #fff;
        }
        
        .link-content {
            flex: 1;
        }
        
        .link-title {
            color: #fff;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 5px;
            line-height: 1.3;
        }
        
        .link-url {
            color: #fff;
            font-size: 0.9rem;
            margin-bottom: 0;
            opacity: 0.9;
            word-break: break-all;
        }
        
        .link-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.4);
            margin: 20px 0;
            border-radius: 1px;
        }
        
        /* Responsive links */
        @media (max-width: 768px) {
            .link-item {
                flex-direction: column;
                text-align: center;
                padding: 25px 0;
            }
            
            .link-icon {
                margin-right: 0;
                margin-bottom: 15px;
            }
            
            .link-title {
                font-size: 1rem;
            }
            
            .link-url {
                font-size: 0.85rem;
            }
        }
        
        /* Call to Action sections with orange theme */
        .bg-primary {
            background: var(--orange-gradient) !important;
        }
        
        /* News section with orange accents */
        .news-card .card-img-top {
            background: var(--orange-gradient) !important;
        }
        
        /* Program cards with orange theme */
        .card-header {
            background: var(--orange-gradient);
            color: white;
            border: none;
        }
        
        .card-header i {
            color: white;
        }
        
        /* Facility cards with orange theme */
        .card-header h3,
        .card-header h4 {
            color: white;
        }
        
        /* System learning cards with orange theme */
        .card-header h4 {
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-gradient-primary fixed-top shadow-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <div class="logo-circle me-3">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <div>
                    <h4 class="mb-0 text-white fw-bold">Mulia Special Akademik</h4>
                    <small class="text-light opacity-75">Nurturing Special Child Potentials</small>
                </div>
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto d-flex justify-content-between w-100">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('fasilitas') ? 'active' : '' }}" href="{{ route('fasilitas') }}">
                            <i class="fas fa-building"></i>
                            <span>Fasilitas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('program') ? 'active' : '' }}" href="{{ route('program') }}">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Program Pembelajaran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('sistem') ? 'active' : '' }}" href="{{ route('sistem') }}">
                            <i class="fas fa-cogs"></i>
                            <span>Sistem Pembelajaran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('berita*') ? 'active' : '' }}" href="{{ route('berita.index') }}">
                            <i class="fas fa-newspaper"></i>
                            <span>Berita</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">
                            <i class="fas fa-phone"></i>
                            <span>Kontak</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main style="margin-top: 90px;">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="logo-circle me-3">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 text-primary">Mulia Special Academy</h5>
                            <small class="text-muted">Nurturing Special Child Potentials</small>
                        </div>
                    </div>
                    <p class="text-light">Sekolah Berbasis Stimulasi for Children with Special Needs - Kindergarten & Primary School di Surabaya.</p>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <h5 class="text-primary mb-3">Kontak Kami</h5>
                    <div class="contact-info">
                        <p><i class="fas fa-map-marker-alt me-2"></i> Jl. Medokan Semampir Indah 99-101, Surabaya</p>
                        <p><i class="fas fa-phone me-2"></i> 082 338 414 452</p>
                        <p><i class="fas fa-envelope me-2"></i> msa@saim.sch.id</p>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <h5 class="text-primary mb-3">Tentang MSA</h5>
                    <p>Sekolah dan pusat terapi yang dirancang khusus untuk anak berkebutuhan khusus mulai usia 2-6 tahun. MSA memadukan pendidikan akademik, terapi perkembangan, dan pembentukan karakter melalui sistem stimulasi bertahap dan pembelajaran individual.</p>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; {{ date('Y') }} Mulia Special Academy. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="social-links">
                        <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    @yield('scripts')
    
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Add loading animation to buttons
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function() {
                if (!this.classList.contains('btn-loading')) {
                    this.classList.add('btn-loading');
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';
                    
                    setTimeout(() => {
                        this.classList.remove('btn-loading');
                        this.innerHTML = originalText;
                    }, 2000);
                }
            });
        });
        
        // Navbar mobile menu animation
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('.navbar-collapse');
        
        navbarToggler.addEventListener('click', function() {
            navbarCollapse.classList.toggle('show');
        });
        
        // Close mobile menu when clicking on a link
        document.querySelectorAll('.nav-link-custom').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 992) {
                    navbarCollapse.classList.remove('show');
                }
            });
        });
        
        // Add ripple effect to nav links
        document.querySelectorAll('.nav-link-custom').forEach(link => {
            link.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    </script>
    
    <style>
        /* Ripple effect styles */
        .nav-link-custom {
            position: relative;
            overflow: hidden;
        }
        
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
            pointer-events: none;
        }
        
        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        /* Button loading animation */
        .btn-loading {
            pointer-events: none;
            opacity: 0.7;
        }
        
        /* Enhanced mobile menu */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                transition: all 0.3s ease;
                transform: translateY(-10px);
                opacity: 0;
            }
            
            .navbar-collapse.show {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</body>
</html>
