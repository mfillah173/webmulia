@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stats-number">{{ $stats['total_berita'] }}</div>
                    <div class="stats-label">Total Berita</div>
                </div>
                <div class="stats-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stats-number">{{ $stats['berita_aktif'] }}</div>
                    <div class="stats-label">Berita Aktif</div>
                </div>
                <div class="stats-icon">
                    <i class="fas fa-eye"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stats-number">{{ $stats['total_kontak'] }}</div>
                    <div class="stats-label">Total Kontak</div>
                </div>
                <div class="stats-icon">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stats-number">{{ $stats['kontak_unread'] }}</div>
                    <div class="stats-label">Kontak Belum Dibaca</div>
                </div>
                <div class="stats-icon">
                    <i class="fas fa-envelope-open"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-bolt me-2"></i>Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary w-100">
                            <i class="fas fa-plus me-2"></i>Tambah Berita
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-primary w-100">
                            <i class="fas fa-list me-2"></i>Kelola Berita
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.kontak.index') }}" class="btn btn-outline-primary w-100">
                            <i class="fas fa-envelope me-2"></i>Kelola Kontak
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100" target="_blank">
                            <i class="fas fa-external-link-alt me-2"></i>Lihat Website
                        </a>
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
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-newspaper me-2"></i>Berita Terbaru
                </h5>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-primary">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body">
                @if($berita_terbaru->count() > 0)
                <div class="list-group list-group-flush">
                    @foreach($berita_terbaru as $berita)
                    <div class="list-group-item border-0 px-0">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">
                                    <a href="{{ route('admin.berita.show', $berita->id) }}" class="text-decoration-none">
                                        {{ Str::limit($berita->judul, 50) }}
                                    </a>
                                </h6>
                                <p class="mb-1 text-muted small">
                                    {{ Str::limit(strip_tags($berita->konten), 80) }}
                                </p>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $berita->created_at->format('d M Y, H:i') }}
                                </small>
                            </div>
                            <div class="ms-3">
                                @if($berita->status === 'active')
                                <span class="badge bg-success">Aktif</span>
                                @elseif($berita->status === 'draft')
                                <span class="badge bg-warning">Draft</span>
                                @else
                                <span class="badge bg-secondary">Nonaktif</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center text-muted py-4">
                    <i class="fas fa-newspaper fa-3x mb-3 opacity-25"></i>
                    <p>Belum ada berita</p>
                    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Berita Pertama
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Kontak -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-envelope me-2"></i>Kontak Terbaru
                </h5>
                <a href="{{ route('admin.kontak.index') }}" class="btn btn-sm btn-outline-primary">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body">
                @if($kontak_terbaru->count() > 0)
                <div class="list-group list-group-flush">
                    @foreach($kontak_terbaru as $kontak)
                    <div class="list-group-item border-0 px-0">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">
                                    <a href="{{ route('admin.kontak.show', $kontak->id) }}" class="text-decoration-none">
                                        {{ $kontak->nama }}
                                    </a>
                                </h6>
                                <p class="mb-1 text-muted small">
                                    <strong>Subjek:</strong> {{ Str::limit($kontak->subjek, 40) }}
                                </p>
                                <p class="mb-1 text-muted small">
                                    {{ Str::limit($kontak->pesan, 60) }}
                                </p>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $kontak->created_at->format('d M Y, H:i') }}
                                </small>
                            </div>
                            <div class="ms-3">
                                @if($kontak->status === 'unread')
                                <span class="badge bg-danger">Belum Dibaca</span>
                                @elseif($kontak->status === 'read')
                                <span class="badge bg-warning">Sudah Dibaca</span>
                                @else
                                <span class="badge bg-success">Sudah Dibalas</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center text-muted py-4">
                    <i class="fas fa-envelope fa-3x mb-3 opacity-25"></i>
                    <p>Belum ada pesan kontak</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Monthly Stats -->
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-chart-bar me-2"></i>Statistik Bulan Ini
                </h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <div class="border-end">
                            <h3 class="text-primary mb-1">{{ $berita_bulanan }}</h3>
                            <p class="text-muted mb-0">Berita Baru</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <h3 class="text-success mb-1">{{ $kontak_bulanan }}</h3>
                        <p class="text-muted mb-0">Kontak Baru</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Informasi Sistem
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <small class="text-muted">Laravel Version:</small>
                        <span class="fw-semibold">{{ app()->version() }}</span>
                    </div>
                    <div class="col-12 mb-2">
                        <small class="text-muted">PHP Version:</small>
                        <span class="fw-semibold">{{ PHP_VERSION }}</span>
                    </div>
                    <div class="col-12 mb-2">
                        <small class="text-muted">Environment:</small>
                        <span class="fw-semibold">{{ app()->environment() }}</span>
                    </div>
                    <div class="col-12">
                        <small class="text-muted">Last Login:</small>
                        <span class="fw-semibold">{{ auth('admin')->user()->updated_at->format('d M Y, H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
