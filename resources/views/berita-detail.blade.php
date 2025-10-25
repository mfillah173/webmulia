@extends('layouts.app')

@section('title', $berita['judul'] . ' - Mulia Special Academy')
@section('description', Str::limit(strip_tags($berita['konten']), 160))

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="py-3 bg-light">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($berita['judul'], 50) }}</li>
        </ol>
    </div>
</nav>

<!-- Article Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <article class="news-article">
                    <!-- Article Header -->
                    <header class="article-header text-center mb-5">
                        <h1 class="article-title">{{ $berita['judul'] }}</h1>
                        <div class="article-meta">
                            <span class="article-date">
                                <i class="fas fa-calendar-alt me-2"></i>
                                {{ \Carbon\Carbon::parse($berita['tanggal'])->format('d F Y') }}
                            </span>
                            <span class="article-author ms-3">
                                <i class="fas fa-user me-2"></i>
                                Mulia Special Academy
                            </span>
                        </div>
                    </header>

                    <!-- Article Image -->
                    <div class="article-image mb-4">
                        <div class="bg-primary d-flex align-items-center justify-content-center" style="height: 300px; border-radius: 15px;">
                            @if($berita['id'] == 1)
                                <i class="fas fa-user-plus fa-4x text-white"></i>
                            @elseif($berita['id'] == 2)
                                <i class="fas fa-toilet fa-4x text-white"></i>
                            @elseif($berita['id'] == 3)
                                <i class="fas fa-palette fa-4x text-white"></i>
                            @else
                                <i class="fas fa-hand-holding-heart fa-4x text-white"></i>
                            @endif
                        </div>
                    </div>

                    <!-- Article Content -->
                    <div class="article-content">
                        {!! nl2br(e($berita['konten'])) !!}
                    </div>

                    <!-- Article Footer -->
                    <footer class="article-footer mt-5 pt-4 border-top">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="article-tags">
                                    <span class="badge bg-primary me-2">Pendidikan</span>
                                    <span class="badge bg-success me-2">Anak Berkebutuhan Khusus</span>
                                    <span class="badge bg-info">Mulia Special Academy</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <div class="article-share">
                                    <span class="me-2">Bagikan:</span>
                                    <a href="#" class="btn btn-outline-primary btn-sm me-2">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-info btn-sm me-2">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-success btn-sm">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </footer>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Related Articles -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title">Artikel Terkait</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card news-card h-100">
                    <div class="card-img-top bg-success d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-child fa-3x text-white"></i>
                    </div>
                    <div class="card-body">
                        <span class="news-date">20 Desember 2024</span>
                        <h5 class="card-title">Tips Memilih Sekolah untuk Anak Berkebutuhan Khusus</h5>
                        <p class="card-text">Panduan lengkap untuk orang tua dalam memilih sekolah yang tepat untuk anak berkebutuhan khusus.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card news-card h-100">
                    <div class="card-img-top bg-warning d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-home fa-3x text-white"></i>
                    </div>
                    <div class="card-body">
                        <span class="news-date">18 Desember 2024</span>
                        <h5 class="card-title">Menciptakan Lingkungan Rumah yang Mendukung</h5>
                        <p class="card-text">Cara menciptakan lingkungan rumah yang kondusif untuk perkembangan anak berkebutuhan khusus.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card news-card h-100">
                    <div class="card-img-top bg-info d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-users fa-3x text-white"></i>
                    </div>
                    <div class="card-body">
                        <span class="news-date">15 Desember 2024</span>
                        <h5 class="card-title">Membangun Komunikasi yang Efektif dengan Anak</h5>
                        <p class="card-text">Strategi komunikasi yang efektif untuk membangun hubungan yang baik dengan anak berkebutuhan khusus.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-3">Tertarik dengan Program Kami?</h3>
                <p class="mb-0">Hubungi kami untuk konsultasi lebih lanjut tentang program yang sesuai dengan kebutuhan anak Anda.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('kontak') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-phone me-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
.article-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 1rem;
}

.article-meta {
    color: #666;
    font-size: 0.9rem;
}

.article-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--dark-color);
}

.article-content h3 {
    color: var(--primary-color);
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.article-content ul {
    margin-bottom: 1.5rem;
}

.article-content li {
    margin-bottom: 0.5rem;
}

.breadcrumb {
    background: transparent;
    padding: 0;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: ">";
    color: var(--primary-color);
}

.breadcrumb-item a {
    color: var(--primary-color);
    text-decoration: none;
}

.breadcrumb-item a:hover {
    text-decoration: underline;
}

.article-share .btn {
    width: 35px;
    height: 35px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

@media (max-width: 768px) {
    .article-title {
        font-size: 2rem;
    }
    
    .article-content {
        font-size: 1rem;
    }
}
</style>
@endsection
