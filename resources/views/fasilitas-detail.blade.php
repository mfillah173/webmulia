@extends('layouts.app')

@section('title', $facility['title'] . ' - Mulia Special Academy')
@section('description', $facility['description'])

@section('content')
<!-- Page Header -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('fasilitas') }}" class="text-decoration-none">Fasilitas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $facility['title'] }}</li>
                    </ol>
                </nav>
                <h1 class="section-title">{{ $facility['title'] }}</h1>
                <p class="section-subtitle">{{ $facility['description'] }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Facility Detail Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Facility Image -->
            <div class="col-lg-6 mb-5">
                <div class="facility-detail-image">
                    <img src="{{ $facility['image'] }}" alt="{{ $facility['title'] }}" class="img-fluid rounded shadow">
                    <div class="image-overlay-icon">
                        <i class="{{ $facility['icon'] }}"></i>
                    </div>
                </div>
            </div>
            
            <!-- Facility Information -->
            <div class="col-lg-6 mb-5">
                <div class="facility-info">
                    <h2 class="facility-title">{{ $facility['title'] }}</h2>
                    <p class="facility-description">{{ $facility['details'] }}</p>
                    
                    <div class="facility-features">
                        <h3 class="features-title">Fitur Utama</h3>
                        <ul class="features-list">
                            @foreach($facility['features'] as $feature)
                            <li class="feature-item">
                                <i class="fas fa-check-circle text-success me-3"></i>
                                <span>{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="facility-actions mt-4">
                        <a href="{{ route('kontak') }}" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-calendar-alt me-2"></i>Jadwalkan Kunjungan
                        </a>
                        <a href="{{ route('fasilitas') }}" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Fasilitas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


        <!-- Gallery Grid -->
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="text-center mb-4">Semua Gambar</h3>
                <div class="gallery-grid">
                    <div class="gallery-item" onclick="openLightbox('{{ $facility['image'] }}')">
                        <img src="{{ $facility['image'] }}" alt="{{ $facility['title'] }}" class="img-fluid rounded">
                        <div class="gallery-item-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                    
                    <div class="gallery-item" onclick="openLightbox('https://via.placeholder.com/800x600/ff8c00/ffffff?text={{ urlencode($facility['title']) }}+1')">
                        <img src="https://via.placeholder.com/400x300/ff8c00/ffffff?text={{ urlencode($facility['title']) }}+1" alt="{{ $facility['title'] }} 1" class="img-fluid rounded">
                        <div class="gallery-item-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                    
                    <div class="gallery-item" onclick="openLightbox('https://via.placeholder.com/800x600/ff8c00/ffffff?text={{ urlencode($facility['title']) }}+2')">
                        <img src="https://via.placeholder.com/400x300/ff8c00/ffffff?text={{ urlencode($facility['title']) }}+2" alt="{{ $facility['title'] }} 2" class="img-fluid rounded">
                        <div class="gallery-item-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                    
                    <div class="gallery-item" onclick="openLightbox('https://via.placeholder.com/800x600/ff8c00/ffffff?text={{ urlencode($facility['title']) }}+3')">
                        <img src="https://via.placeholder.com/400x300/ff8c00/ffffff?text={{ urlencode($facility['title']) }}+3" alt="{{ $facility['title'] }} 3" class="img-fluid rounded">
                        <div class="gallery-item-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                    
                    <div class="gallery-item" onclick="openLightbox('https://via.placeholder.com/800x600/ff8c00/ffffff?text={{ urlencode($facility['title']) }}+4')">
                        <img src="https://via.placeholder.com/400x300/ff8c00/ffffff?text={{ urlencode($facility['title']) }}+4" alt="{{ $facility['title'] }} 4" class="img-fluid rounded">
                        <div class="gallery-item-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                    
                    <div class="gallery-item" onclick="openLightbox('https://via.placeholder.com/800x600/ff8c00/ffffff?text={{ urlencode($facility['title']) }}+5')">
                        <img src="https://via.placeholder.com/400x300/ff8c00/ffffff?text={{ urlencode($facility['title']) }}+5" alt="{{ $facility['title'] }} 5" class="img-fluid rounded">
                        <div class="gallery-item-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
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

<!-- Related Facilities -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Fasilitas Lainnya</h2>
        <div class="row">
            @php
            $relatedFacilities = [
                'ruang-belajar-one-on-one' => 'Ruang Belajar One-on-One',
                'ruang-terapi' => 'Ruang Terapi',
                'playground' => 'Playground',
                'ruang-konsultasi' => 'Ruang Konsultasi',
                'toilet' => 'Toilet',
                'kolam-renang' => 'Kolam Renang'
            ];
            @endphp
            
            @foreach($relatedFacilities as $slug => $title)
                @if($slug !== $facility['slug'])
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card facility-card h-100">
                        <div class="facility-image">
                            <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text={{ urlencode($title) }}" alt="{{ $title }}" class="img-fluid">
                            <div class="image-overlay">
                                <i class="fas fa-eye fa-2x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $title }}</h5>
                            <p class="card-text">Lihat detail fasilitas {{ $title }} yang tersedia di Mulia Special Academy.</p>
                            <a href="{{ route('fasilitas.show', $slug) }}" class="btn btn-outline-primary">
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
                <h3 class="mb-3">Ingin Melihat Fasilitas {{ $facility['title'] }} Secara Langsung?</h3>
                <p class="mb-0">Jadwalkan kunjungan ke Mulia Special Academy untuk melihat fasilitas {{ $facility['title'] }} dan bertemu dengan tim pengajar.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('kontak') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-calendar-alt me-2"></i>Jadwalkan Kunjungan
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

<script>
// Gallery Functions
function changeMainImage(imageSrc, thumbnailElement) {
    // Update main image
    document.getElementById('mainGalleryImage').src = imageSrc;
    
    // Update active thumbnail
    document.querySelectorAll('.thumbnail-item').forEach(item => {
        item.classList.remove('active');
    });
    thumbnailElement.classList.add('active');
}

function openLightbox(imageSrc) {
    const modal = document.getElementById('lightboxModal');
    const lightboxImage = document.getElementById('lightboxImage');
    const lightboxCaption = document.getElementById('lightboxCaption');
    
    lightboxImage.src = imageSrc;
    lightboxCaption.textContent = '{{ $facility["title"] }}';
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
