@extends('layouts.app')

@section('title', $program['title'] . ' - Mulia Special Academy')
@section('description', $program['description'])

@section('content')
<!-- Page Header -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('program') }}" class="text-decoration-none">Program</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $program['title'] }}</li>
                    </ol>
                </nav>
                <h1 class="section-title">{{ $program['title'] }}</h1>
                <p class="section-subtitle">{{ $program['subtitle'] }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Program Detail Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Program Image -->
            <div class="col-lg-6 mb-5">
                <div class="program-detail-image">
                    <img src="{{ $program['image'] }}" alt="{{ $program['title'] }}" class="img-fluid rounded shadow">
                    <div class="image-overlay-icon">
                        <i class="{{ $program['icon'] }}"></i>
                    </div>
                </div>
            </div>
            
            <!-- Program Information -->
            <div class="col-lg-6 mb-5">
                <div class="program-info">
                    <h2 class="program-title">{{ $program['title'] }}</h2>
                    <p class="program-description">{{ $program['description'] }}</p>
                    
                    <!-- Program Details -->
                    <!-- <div class="program-details">
                        <div class="detail-item">
                            <i class="fas fa-clock text-primary me-3"></i>
                            <span class="detail-label">Durasi:</span>
                            <span class="detail-value">{{ $program['duration'] }}</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt text-primary me-3"></i>
                            <span class="detail-label">Rentang Usia:</span>
                            <span class="detail-value">{{ $program['age_range'] }}</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-calendar-week text-primary me-3"></i>
                            <span class="detail-label">Frekuensi:</span>
                            <span class="detail-value">{{ $program['frequency'] }}</span>
                        </div>
                    </div> -->
                    
                    <div class="program-actions mt-4">
                        <a href="{{ route('kontak') }}" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-calendar-alt me-2"></i>Konsultasi Program
                        </a>
                        <a href="{{ route('program') }}" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Program
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Program Objectives & Methods -->
<!-- <section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5">
                <div class="program-section">
                    <h3 class="section-title">Tujuan Program</h3>
                    <ul class="objectives-list">
                        @foreach($program['objectives'] as $objective)
                        <li class="objective-item">
                            <i class="fas fa-check-circle text-success me-3"></i>
                            <span>{{ $objective }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div> -->
            
            <!-- <div class="col-lg-6 mb-5">
                <div class="program-section">
                    <h3 class="section-title">Metode Pembelajaran</h3>
                    <ul class="methods-list">
                        @foreach($program['methods'] as $method)
                        <li class="method-item">
                            <i class="fas fa-star text-warning me-3"></i>
                            <span>{{ $method }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Program Gallery -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">Galeri {{ $program['title'] }}</h2>
        <p class="section-subtitle text-center mb-5">Lihat aktivitas dan kegiatan dalam program {{ $program['title'] }}</p>
        
        <!-- Gallery Grid -->
        <div class="gallery-grid">
            @foreach($program['gallery'] as $index => $image)
            <div class="gallery-item" onclick="openLightbox('{{ $image }}')">
                <img src="{{ $image }}" alt="{{ $program['title'] }} {{ $index + 1 }}" class="img-fluid rounded">
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

<!-- Related Programs -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Program Lainnya</h2>
        <div class="row">
            @php
            $relatedPrograms = [
                'toilet-training-program' => 'Toilet Training Program',
                'pengembangan-akidah-akhlaq' => 'Pengembangan Akidah Akhlaq',
                'terapi-perilaku' => 'Terapi Perilaku',
                'terapi-sensori' => 'Terapi Sensori',
                'stimulasi-tahap-perkembangan' => 'Stimulasi Tahap Perkembangan'
            ];
            @endphp
            
            @foreach($relatedPrograms as $slug => $title)
                @if($slug !== $program['slug'])
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card program-card h-100">
                        <div class="program-image">
                            <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text={{ urlencode($title) }}" alt="{{ $title }}" class="img-fluid">
                            <div class="image-overlay">
                                <i class="fas fa-eye fa-2x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $title }}</h5>
                            <p class="card-text">Lihat detail program {{ $title }} yang tersedia di Mulia Special Academy.</p>
                            <a href="{{ route('program.show', $slug) }}" class="btn btn-outline-primary">
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
                <h3 class="mb-3">Tertarik dengan Program {{ $program['title'] }}?</h3>
                <p class="mb-0">Hubungi kami untuk konsultasi lebih lanjut tentang program {{ $program['title'] }} yang sesuai dengan kebutuhan anak Anda.</p>
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
    lightboxCaption.textContent = '{{ $program["title"] }}';
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
