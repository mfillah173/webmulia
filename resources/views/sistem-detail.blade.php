@extends('layouts.app')

@section('title', $system['title'] . ' - Mulia Special Academy')
@section('description', $system['description'])

@section('content')
<!-- Page Header -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('sistem') }}" class="text-decoration-none">Sistem</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $system['title'] }}</li>
                    </ol>
                </nav>
                <h1 class="section-title">{{ $system['title'] }}</h1>
                <p class="section-subtitle">{{ $system['description'] }}</p>
            </div>
        </div>
    </div>
</section>

<!-- System Detail Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- System Image -->
            <div class="col-lg-6 mb-5">
                <div class="system-detail-image">
                    <img src="{{ $system['image'] }}" alt="{{ $system['title'] }}" class="img-fluid rounded shadow">
                    <div class="image-overlay-icon">
                        <i class="{{ $system['icon'] }}"></i>
                    </div>
                </div>
            </div>
            
            <!-- System Information -->
            <div class="col-lg-6 mb-5">
                <div class="system-info">
                    <h2 class="system-title">{{ $system['title'] }}</h2>
                    <p class="system-description">{{ $system['details'] }}</p>
                    
                    <div class="system-actions mt-4">
                        <a href="{{ route('kontak') }}" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-calendar-alt me-2"></i>Konsultasi Sistem
                        </a>
                        <a href="{{ route('sistem') }}" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Sistem
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- System Features & Benefits -->
<!-- <section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5">
                <div class="system-section">
                    <h3 class="section-title">Fitur Utama</h3>
                    <ul class="features-list">
                        @foreach($system['features'] as $feature)
                        <li class="feature-item">
                            <i class="fas fa-check-circle text-success me-3"></i>
                            <span>{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div> -->
            
            <!-- <div class="col-lg-6 mb-5">
                <div class="system-section">
                    <h3 class="section-title">Manfaat</h3>
                    <ul class="benefits-list">
                        @foreach($system['benefits'] as $benefit)
                        <li class="benefit-item">
                            <i class="fas fa-star text-warning me-3"></i>
                            <span>{{ $benefit }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- System Gallery -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">Galeri {{ $system['title'] }}</h2>
        <p class="section-subtitle text-center mb-5">Lihat implementasi sistem {{ $system['title'] }} dalam kegiatan pembelajaran</p>
        
        <!-- Gallery Grid -->
        <div class="gallery-grid">
            @foreach($system['gallery'] as $index => $image)
            <div class="gallery-item" onclick="openLightbox('{{ $image }}')">
                <img src="{{ $image }}" alt="{{ $system['title'] }} {{ $index + 1 }}" class="img-fluid rounded">
                <div class="gallery-item-overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightboxModal" class="lightbox-modal" onclick="closeLightbox()">
    <div class="lightbox-content" onclick="event.stopPropagation()">
        <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
        <img id="lightboxImage" src="" alt="" class="lightbox-image">
        <div class="lightbox-caption">
            <p id="lightboxCaption"></p>
        </div>
    </div>
</div>

<!-- Related Systems -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Sistem Lainnya</h2>
        <div class="row">
            @php
            $relatedSystems = [
                'one-on-one' => 'One-on-One',
                'stimulasi-bertahap' => 'Stimulasi Bertahap',
                'prompting-system' => 'Prompting System',
                'evaluasi-komprehensif' => 'Evaluasi Komprehensif',
                'kolaborasi-orang-tua' => 'Kolaborasi Orang Tua'
            ];
            @endphp
            
            @foreach($relatedSystems as $slug => $title)
                @if($slug !== $system['slug'])
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card system-card h-100">
                        <div class="system-image">
                            <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text={{ urlencode($title) }}" alt="{{ $title }}" class="img-fluid">
                            <div class="image-overlay">
                                <i class="fas fa-eye fa-2x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $title }}</h5>
                            <p class="card-text">Lihat detail sistem {{ $title }} yang diterapkan di Mulia Special Academy.</p>
                            <a href="{{ route('sistem.show', $slug) }}" class="btn btn-outline-primary">
                                <i class="fas fa-info-circle me-2"></i>Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-3">Tertarik dengan Sistem {{ $system['title'] }}?</h3>
                <p class="mb-0">Hubungi kami untuk konsultasi lebih lanjut tentang bagaimana sistem {{ $system['title'] }} dapat membantu perkembangan anak Anda.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('kontak') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-calendar-alt me-2"></i>Konsultasi Gratis
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

<script>
// Lightbox Functions
function openLightbox(imageSrc) {
    const modal = document.getElementById('lightboxModal');
    const lightboxImage = document.getElementById('lightboxImage');
    const lightboxCaption = document.getElementById('lightboxCaption');
    
    lightboxImage.src = imageSrc;
    lightboxCaption.textContent = '{{ $system["title"] }}';
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    const modal = document.getElementById('lightboxModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Close lightbox with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeLightbox();
    }
});

// Initialize gallery
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth transitions to gallery items
    const galleryItems = document.querySelectorAll('.gallery-item');
    galleryItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
});
</script>
