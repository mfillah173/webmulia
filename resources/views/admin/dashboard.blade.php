@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Welcome Section -->
<div class="row mb-6">
    <div class="col-12">
        <div class="welcome-card">
            <div class="welcome-content">
                <div class="welcome-text">
                    <h2 class="welcome-title">Selamat Datang di Admin Panel</h2>
                    <p class="welcome-subtitle">Kelola konten website Mulia Special Academy dengan mudah dan efisien</p>
                </div>
                <div class="welcome-actions">
                    <a href="{{ route('home') }}" class="btn btn-outline-primary" target="_blank">
                        <i class="fas fa-external-link-alt me-2"></i>Lihat Website
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Overview -->
<div class="row mb-6">
    <div class="col-12">
        <div class="section-header">
            <h3 class="section-title">Overview</h3>
            <p class="section-subtitle">Ringkasan data website</p>
        </div>
    </div>
</div>

<div class="row g-4 mb-6">
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stat-card stat-card-primary">
            <div class="stat-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="stat-content">
                <div class="stat-number">{{ $stats['total_berita'] }}</div>
                <div class="stat-label">Total Berita</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    {{ $stats['berita_aktif'] }} aktif
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stat-card stat-card-success">
            <div class="stat-icon">
                <i class="fas fa-eye"></i>
            </div>
            <div class="stat-content">
                <div class="stat-number">{{ $stats['berita_aktif'] }}</div>
                <div class="stat-label">Berita Aktif</div>
                <div class="stat-change positive">
                    <i class="fas fa-check-circle"></i>
                    Diterbitkan
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stat-card stat-card-info">
            <div class="stat-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="stat-content">
                <div class="stat-number">{{ $stats['total_kontak'] }}</div>
                <div class="stat-label">Total Kontak</div>
                <div class="stat-change neutral">
                    <i class="fas fa-inbox"></i>
                    Semua pesan
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stat-card stat-card-warning">
            <div class="stat-icon">
                <i class="fas fa-envelope-open"></i>
            </div>
            <div class="stat-content">
                <div class="stat-number">{{ $stats['kontak_unread'] }}</div>
                <div class="stat-label">Belum Dibaca</div>
                <div class="stat-change {{ $stats['kontak_unread'] > 0 ? 'negative' : 'positive' }}">
                    <i class="fas {{ $stats['kontak_unread'] > 0 ? 'fa-exclamation-circle' : 'fa-check-circle' }}"></i>
                    {{ $stats['kontak_unread'] > 0 ? 'Perlu ditindak' : 'Semua terbaca' }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Management -->
<div class="row mb-6">
    <div class="col-12">
        <div class="section-header">
            <h3 class="section-title">Content Management</h3>
            <p class="section-subtitle">Kelola semua konten website</p>
        </div>
    </div>
</div>

<div class="row g-5 mb-6">
    <!-- Content Types -->
    <div class="col-12">
        <div class="management-section">
            <div class="section-header-inline">
                <h4 class="section-title-small">
                    <i class="fas fa-layer-group me-2"></i>
                    Content Types
                </h4>
                <p class="section-subtitle-small">Kelola konten utama website</p>
            </div>

            <div class="row g-5">
                <!-- Berita -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="management-card">
                        <div class="card-header-custom">
                            <div class="card-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="card-title-section">
                                <h5 class="card-title">Berita</h5>
                                <p class="card-subtitle">Artikel dan berita sekolah</p>
                            </div>
                        </div>
                        <div class="card-body-custom">
                            <div class="card-stats">
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['total_berita'] }}</span>
                                    <span class="stat-label">Total</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['berita_aktif'] }}</span>
                                    <span class="stat-label">Aktif</span>
                                </div>
                            </div>
                            <div class="card-actions">
                                <a href="{{ route('admin.berita.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus me-1"></i>Tambah
                                </a>
                                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-list me-1"></i>Kelola
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Program -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="management-card">
                        <div class="card-header-custom">
                            <div class="card-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="card-title-section">
                                <h5 class="card-title">Program</h5>
                                <p class="card-subtitle">Program pembelajaran</p>
                            </div>
                        </div>
                        <div class="card-body-custom">
                            <div class="card-stats">
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['total_program'] }}</span>
                                    <span class="stat-label">Total</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['program_aktif'] }}</span>
                                    <span class="stat-label">Aktif</span>
                                </div>
                            </div>
                            <div class="card-actions">
                                <a href="{{ route('admin.program.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus me-1"></i>Tambah
                                </a>
                                <a href="{{ route('admin.program.index') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-list me-1"></i>Kelola
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sistem -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="management-card">
                        <div class="card-header-custom">
                            <div class="card-icon">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <div class="card-title-section">
                                <h5 class="card-title">Sistem</h5>
                                <p class="card-subtitle">Sistem pembelajaran</p>
                            </div>
                        </div>
                        <div class="card-body-custom">
                            <div class="card-stats">
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['total_sistem'] }}</span>
                                    <span class="stat-label">Total</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['sistem_aktif'] }}</span>
                                    <span class="stat-label">Aktif</span>
                                </div>
                            </div>
                            <div class="card-actions">
                                <a href="{{ route('admin.sistem.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus me-1"></i>Tambah
                                </a>
                                <a href="{{ route('admin.sistem.index') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-list me-1"></i>Kelola
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fasilitas -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="management-card">
                        <div class="card-header-custom">
                            <div class="card-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="card-title-section">
                                <h5 class="card-title">Fasilitas</h5>
                                <p class="card-subtitle">Fasilitas sekolah</p>
                            </div>
                        </div>
                        <div class="card-body-custom">
                            <div class="card-stats">
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['total_fasilitas'] }}</span>
                                    <span class="stat-label">Total</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['fasilitas_aktif'] }}</span>
                                    <span class="stat-label">Aktif</span>
                                </div>
                            </div>
                            <div class="card-actions">
                                <a href="{{ route('admin.fasilitas.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus me-1"></i>Tambah
                                </a>
                                <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-list me-1"></i>Kelola
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Media & Gallery -->
<div class="row mb-6">
    <div class="col-12">
        <div class="management-section">
            <div class="section-header-inline">
                <h4 class="section-title-small">
                    <i class="fas fa-images me-2"></i>
                    Media & Gallery
                </h4>
                <p class="section-subtitle-small">Kelola gambar dan media</p>
            </div>

            <div class="row g-5">
                <!-- Galeri Program -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="management-card">
                        <div class="card-header-custom">
                            <div class="card-icon">
                                <i class="fas fa-images"></i>
                            </div>
                            <div class="card-title-section">
                                <h5 class="card-title">Galeri Program</h5>
                                <p class="card-subtitle">Foto program pembelajaran</p>
                            </div>
                        </div>
                        <div class="card-body-custom">
                            <div class="card-stats">
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['total_galeri_program'] }}</span>
                                    <span class="stat-label">Total</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['galeri_program_aktif'] }}</span>
                                    <span class="stat-label">Aktif</span>
                                </div>
                            </div>
                            <div class="card-actions">
                                <a href="{{ route('admin.galeri-program.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus me-1"></i>Tambah
                                </a>
                                <a href="{{ route('admin.galeri-program.index') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-list me-1"></i>Kelola
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Galeri Sistem -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="management-card">
                        <div class="card-header-custom">
                            <div class="card-icon">
                                <i class="fas fa-photo-video"></i>
                            </div>
                            <div class="card-title-section">
                                <h5 class="card-title">Galeri Sistem</h5>
                                <p class="card-subtitle">Foto sistem pembelajaran</p>
                            </div>
                        </div>
                        <div class="card-body-custom">
                            <div class="card-stats">
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['total_galeri_sistem'] }}</span>
                                    <span class="stat-label">Total</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['galeri_sistem_aktif'] }}</span>
                                    <span class="stat-label">Aktif</span>
                                </div>
                            </div>
                            <div class="card-actions">
                                <a href="{{ route('admin.galeri-sistem.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus me-1"></i>Tambah
                                </a>
                                <a href="{{ route('admin.galeri-sistem.index') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-list me-1"></i>Kelola
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Galeri Fasilitas -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="management-card">
                        <div class="card-header-custom">
                            <div class="card-icon">
                                <i class="fas fa-camera"></i>
                            </div>
                            <div class="card-title-section">
                                <h5 class="card-title">Galeri Fasilitas</h5>
                                <p class="card-subtitle">Foto fasilitas sekolah</p>
                            </div>
                        </div>
                        <div class="card-body-custom">
                            <div class="card-stats">
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['total_galeri_fasilitas'] }}</span>
                                    <span class="stat-label">Total</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['galeri_fasilitas_aktif'] }}</span>
                                    <span class="stat-label">Aktif</span>
                                </div>
                            </div>
                            <div class="card-actions">
                                <a href="{{ route('admin.galeri-fasilitas.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus me-1"></i>Tambah
                                </a>
                                <a href="{{ route('admin.galeri-fasilitas.index') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-list me-1"></i>Kelola
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Settings & Others -->
<div class="row mb-6">
    <div class="col-12">
        <div class="management-section">
            <div class="section-header-inline">
                <h4 class="section-title-small">
                    <i class="fas fa-cog me-2"></i>
                    Settings & Others
                </h4>
                <p class="section-subtitle-small">Pengaturan dan utilitas</p>
            </div>

            <div class="row g-5">
                <!-- Syarat Pendaftaran -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="management-card">
                        <div class="card-header-custom">
                            <div class="card-icon">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div class="card-title-section">
                                <h5 class="card-title">Syarat Pendaftaran</h5>
                                <p class="card-subtitle">Persyaratan pendaftaran</p>
                            </div>
                        </div>
                        <div class="card-body-custom">
                            <div class="card-stats">
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['total_syarat'] }}</span>
                                    <span class="stat-label">Total</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['syarat_aktif'] }}</span>
                                    <span class="stat-label">Aktif</span>
                                </div>
                            </div>
                            <div class="card-actions">
                                <a href="{{ route('admin.syarat-pendaftaran.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus me-1"></i>Tambah
                                </a>
                                <a href="{{ route('admin.syarat-pendaftaran.index') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-list me-1"></i>Kelola
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kontak -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="management-card">
                        <div class="card-header-custom">
                            <div class="card-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="card-title-section">
                                <h5 class="card-title">Kontak</h5>
                                <p class="card-subtitle">Pesan dari pengunjung</p>
                            </div>
                        </div>
                        <div class="card-body-custom">
                            <div class="card-stats">
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['total_kontak'] }}</span>
                                    <span class="stat-label">Total</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-value">{{ $stats['kontak_unread'] }}</span>
                                    <span class="stat-label">Belum Dibaca</span>
                                </div>
                            </div>
                            <div class="card-actions">
                                <a href="{{ route('admin.kontak.index') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-list me-1"></i>Kelola
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Website -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="management-card">
                        <div class="card-header-custom">
                            <div class="card-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="card-title-section">
                                <h5 class="card-title">Website</h5>
                                <p class="card-subtitle">Lihat tampilan website</p>
                            </div>
                        </div>
                        <div class="card-body-custom">
                            <div class="card-stats">
                                <div class="stat-item">
                                    <span class="stat-value">Live</span>
                                    <span class="stat-label">Status</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-value">Online</span>
                                    <span class="stat-label">Server</span>
                                </div>
                            </div>
                            <div class="card-actions">
                                <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm" target="_blank">
                                    <i class="fas fa-external-link-alt me-1"></i>Lihat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Content -->
<div class="row">
    <!-- Recent Berita -->
    <div class="col-lg-6 mb-4">
        <div class="recent-card">
            <div class="recent-header">
                <h5 class="recent-title">
                    <i class="fas fa-newspaper me-2"></i>Berita Terbaru
                </h5>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="recent-content">
                @if(isset($recentBerita) && $recentBerita->count() > 0)
                @foreach($recentBerita as $berita)
                <div class="recent-item">
                    <div class="recent-item-content">
                        <h6 class="recent-item-title">{{ $berita->judul }}</h6>
                        <p class="recent-item-meta">
                            <span class="badge badge-status {{ $berita->status === 'active' ? 'badge-success' : 'badge-secondary' }}">
                                {{ $berita->status === 'active' ? 'Aktif' : 'Draft' }}
                            </span>
                            <span class="recent-item-date">{{ $berita->tanggal->format('d M Y') }}</span>
                        </p>
                    </div>
                    <div class="recent-item-actions">
                        <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                @endforeach
                @else
                <div class="recent-empty">
                    <i class="fas fa-newspaper fa-2x text-muted mb-2"></i>
                    <p class="text-muted">Belum ada berita</p>
                    <a href="{{ route('admin.berita.create') }}" class="btn btn-sm btn-primary">Tambah Berita</a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Kontak -->
    <div class="col-lg-6 mb-4">
        <div class="recent-card">
            <div class="recent-header">
                <h5 class="recent-title">
                    <i class="fas fa-envelope me-2"></i>Kontak Terbaru
                </h5>
                <a href="{{ route('admin.kontak.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="recent-content">
                @if(isset($recentKontak) && $recentKontak->count() > 0)
                @foreach($recentKontak as $kontak)
                <div class="recent-item">
                    <div class="recent-item-content">
                        <h6 class="recent-item-title">{{ $kontak->nama }}</h6>
                        <p class="recent-item-meta">
                            <span class="badge badge-status {{ $kontak->status === 'unread' ? 'badge-warning' : 'badge-success' }}">
                                {{ $kontak->status === 'unread' ? 'Belum Dibaca' : 'Sudah Dibaca' }}
                            </span>
                            <span class="recent-item-date">{{ $kontak->created_at->format('d M Y') }}</span>
                        </p>
                    </div>
                    <div class="recent-item-actions">
                        <a href="{{ route('admin.kontak.show', $kontak) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </div>
                @endforeach
                @else
                <div class="recent-empty">
                    <i class="fas fa-envelope fa-2x text-muted mb-2"></i>
                    <p class="text-muted">Belum ada kontak</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
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
    }

    /* Spacing System - Improved */
    .mb-6 {
        margin-bottom: var(--spacing-3xl) !important;
    }

    .g-4 {
        gap: var(--spacing-lg) !important;
    }

    .g-5 {
        gap: var(--spacing-xl) !important;
    }

    /* Welcome Section */
    .welcome-card {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        border-radius: var(--border-radius-lg);
        padding: var(--spacing-3xl);
        color: white;
        box-shadow: var(--shadow-lg);
    }

    .welcome-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .welcome-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: var(--spacing-sm);
    }

    .welcome-subtitle {
        font-size: 1.125rem;
        opacity: 0.9;
        margin-bottom: 0;
    }

    .welcome-actions .btn {
        border-color: rgba(255, 255, 255, 0.3);
        color: white;
    }

    .welcome-actions .btn:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.5);
    }

    /* Section Headers */
    .section-header {
        margin-bottom: var(--spacing-xl);
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: var(--spacing-sm);
    }

    .section-subtitle {
        color: var(--gray-500);
        margin-bottom: 0;
    }

    .section-header-inline {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: var(--spacing-lg);
    }

    .section-title-small {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 0;
    }

    .section-subtitle-small {
        color: var(--gray-500);
        margin-bottom: 0;
    }

    /* Stat Cards */
    .stat-card {
        background: white;
        border-radius: var(--border-radius-lg);
        padding: var(--spacing-xl);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--primary-color);
    }

    .stat-card-primary::before {
        background: var(--primary-color);
    }

    .stat-card-success::before {
        background: var(--success-color);
    }

    .stat-card-warning::before {
        background: var(--warning-color);
    }

    .stat-card-info::before {
        background: var(--info-color);
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: var(--border-radius);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: var(--spacing-md);
        font-size: 1.25rem;
        color: white;
    }

    .stat-card-primary .stat-icon {
        background: var(--primary-color);
    }

    .stat-card-success .stat-icon {
        background: var(--success-color);
    }

    .stat-card-warning .stat-icon {
        background: var(--warning-color);
    }

    .stat-card-info .stat-icon {
        background: var(--info-color);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: var(--gray-800);
        margin-bottom: var(--spacing-xs);
    }

    .stat-label {
        color: var(--gray-500);
        font-size: 0.875rem;
        margin-bottom: var(--spacing-sm);
    }

    .stat-change {
        display: flex;
        align-items: center;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .stat-change i {
        margin-right: var(--spacing-xs);
    }

    .stat-change.positive {
        color: var(--success-color);
    }

    .stat-change.negative {
        color: var(--danger-color);
    }

    .stat-change.neutral {
        color: var(--gray-500);
    }

    /* Management Cards - Improved Spacing */
    .management-section {
        background: white;
        border-radius: var(--border-radius-lg);
        padding: var(--spacing-xl);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--gray-200);
    }

    .management-card {
        background: white;
        border-radius: var(--border-radius-lg);
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
        overflow: hidden;
        height: 100%;
    }

    .management-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary-color);
    }

    .card-header-custom {
        padding: var(--spacing-lg);
        border-bottom: 1px solid var(--gray-200);
        display: flex;
        align-items: center;
    }

    .card-icon {
        width: 40px;
        height: 40px;
        border-radius: var(--border-radius);
        background: var(--gray-100);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: var(--spacing-md);
        color: var(--primary-color);
        font-size: 1.125rem;
    }

    .card-title-section {
        flex: 1;
    }

    .card-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: var(--spacing-xs);
    }

    .card-subtitle {
        font-size: 0.875rem;
        color: var(--gray-500);
        margin-bottom: 0;
    }

    .card-body-custom {
        padding: var(--spacing-lg);
    }

    .card-stats {
        display: flex;
        gap: var(--spacing-lg);
        margin-bottom: var(--spacing-md);
    }

    .stat-item {
        text-align: center;
    }

    .stat-item .stat-value {
        display: block;
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--gray-800);
    }

    .stat-item .stat-label {
        font-size: 0.75rem;
        color: var(--gray-500);
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    /* Card Actions - Improved Spacing */
    .card-actions {
        display: flex;
        gap: var(--spacing-sm);
        justify-content: space-between;
    }

    .card-actions .btn {
        flex: 1;
        font-size: 0.875rem;
        padding: var(--spacing-sm) var(--spacing-md);
        border-radius: var(--border-radius);
        transition: all 0.2s ease;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: var(--spacing-xs);
    }

    .card-actions .btn:hover {
        transform: translateY(-1px);
    }

    .card-actions .btn-primary {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }

    .card-actions .btn-primary:hover {
        background: var(--primary-dark);
        border-color: var(--primary-dark);
    }

    .card-actions .btn-outline-primary {
        border-color: var(--gray-300);
        color: var(--gray-600);
        background: white;
    }

    .card-actions .btn-outline-primary:hover {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }

    .card-actions .btn-outline-secondary {
        border-color: var(--gray-300);
        color: var(--gray-600);
        background: white;
    }

    .card-actions .btn-outline-secondary:hover {
        background: var(--gray-100);
        border-color: var(--gray-400);
    }

    /* Recent Cards */
    .recent-card {
        background: white;
        border-radius: var(--border-radius-lg);
        border: 1px solid var(--gray-200);
        overflow: hidden;
    }

    .recent-header {
        padding: var(--spacing-lg);
        border-bottom: 1px solid var(--gray-200);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .recent-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 0;
    }

    .recent-content {
        padding: var(--spacing-lg);
    }

    .recent-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: var(--spacing-md) 0;
        border-bottom: 1px solid var(--gray-100);
    }

    .recent-item:last-child {
        border-bottom: none;
    }

    .recent-item-title {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--gray-800);
        margin-bottom: var(--spacing-xs);
    }

    .recent-item-meta {
        display: flex;
        align-items: center;
        gap: var(--spacing-sm);
        margin-bottom: 0;
    }

    .recent-item-date {
        font-size: 0.75rem;
        color: var(--gray-500);
    }

    .recent-item-actions .btn {
        padding: var(--spacing-xs) var(--spacing-sm);
        font-size: 0.75rem;
    }

    .recent-empty {
        text-align: center;
        padding: var(--spacing-xl) 0;
    }

    /* Badges */
    .badge-status {
        font-size: 0.75rem;
        padding: var(--spacing-xs) var(--spacing-sm);
        border-radius: var(--border-radius);
    }

    .badge-success {
        background: var(--success-color);
        color: white;
    }

    .badge-secondary {
        background: var(--gray-400);
        color: white;
    }

    .badge-warning {
        background: var(--warning-color);
        color: white;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .welcome-content {
            flex-direction: column;
            text-align: center;
            gap: var(--spacing-lg);
        }

        .section-header-inline {
            flex-direction: column;
            align-items: flex-start;
            gap: var(--spacing-sm);
        }

        .card-stats {
            justify-content: space-around;
        }

        .card-actions {
            flex-direction: column;
            gap: var(--spacing-sm);
        }

        .card-actions .btn {
            width: 100%;
        }
    }
</style>
@endsection