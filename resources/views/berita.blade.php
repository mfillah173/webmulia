@extends('layouts.app')

@section('title', 'Berita - Mulia Special Academy')
@section('description', 'Berita dan informasi terkini tentang kegiatan, program, dan perkembangan di Mulia Special Academy')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="section-title">Berita & Informasi</h1>
                <p class="section-subtitle">Informasi terkini tentang kegiatan, program, dan perkembangan di Mulia Special Academy</p>
            </div>
        </div>
    </div>
</section>

<!-- Search and Filter -->
<section class="py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto">
                <!-- Search Box -->
                <div class="search-box mb-4">
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="form-control" id="searchInput" placeholder="Cari berita...">
                    </div>
                </div>
                
                <!-- Category Filter -->
                <div class="category-filter text-center">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary active" data-category="all">
                            <i class="fas fa-list me-2"></i>Semua
                        </button>
                        <button type="button" class="btn btn-outline-primary" data-category="kindergarten">
                            <i class="fas fa-baby me-2"></i>Kindergarten
                        </button>
                        <button type="button" class="btn btn-outline-primary" data-category="primary">
                            <i class="fas fa-school me-2"></i>Primary School
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row" id="newsGrid">
            @foreach($berita as $item)
            <div class="col-lg-4 col-md-6 mb-4 news-item" data-category="{{ $item['kategori'] ?? 'all' }}" data-title="{{ strtolower($item['judul']) }}" data-content="{{ strtolower($item['konten']) }}">
                <div class="card news-card h-100">
                    <div class="card-img-top bg-primary d-flex align-items-center justify-content-center" style="height: 200px;">
                        @if($item['id'] == 1)
                            <i class="fas fa-user-plus fa-3x text-white"></i>
                        @elseif($item['id'] == 2)
                            <i class="fas fa-toilet fa-3x text-white"></i>
                        @elseif($item['id'] == 3)
                            <i class="fas fa-palette fa-3x text-white"></i>
                        @else
                            <i class="fas fa-hand-holding-heart fa-3x text-white"></i>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="news-date">{{ \Carbon\Carbon::parse($item['tanggal'])->format('d M Y') }}</span>
                            <span class="badge bg-primary">{{ $item['kategori'] ?? 'General' }}</span>
                        </div>
                        <h5 class="card-title">{{ $item['judul'] }}</h5>
                        <p class="card-text">{{ Str::limit($item['konten'], 120) }}</p>
                        <a href="{{ route('berita.show', $item['id']) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-arrow-right me-1"></i>Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination (if needed) -->
        <div class="row">
            <div class="col-12 text-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                        <li class="page-item active">
                            <span class="page-link">1</span>
                        </li>
                        <li class="page-item disabled">
                            <span class="page-link">Next</span>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Subscription -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-3">Dapatkan Informasi Terbaru</h3>
                <p class="mb-0">Berlangganan newsletter kami untuk mendapatkan informasi terbaru tentang program, kegiatan, dan tips parenting untuk anak berkebutuhan khusus.</p>
            </div>
            <div class="col-lg-4">
                <form class="newsletter-form">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Masukkan email Anda" required>
                        <button class="btn btn-light" type="submit">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Categories -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Kategori Berita</h2>
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 mb-4">
                <div class="card text-center h-100 category-card" data-category="kindergarten">
                    <div class="card-body">
                        <i class="fas fa-baby fa-3x text-primary mb-3"></i>
                        <h5>Kindergarten</h5>
                        <p class="text-muted">Berita dan informasi khusus untuk program Kindergarten (TK A & TK B)</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5 col-md-6 mb-4">
                <div class="card text-center h-100 category-card" data-category="primary">
                    <div class="card-body">
                        <i class="fas fa-school fa-3x text-primary mb-3"></i>
                        <h5>Primary School</h5>
                        <p class="text-muted">Berita dan informasi khusus untuk program Primary School (SD)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('searchInput');
    const categoryButtons = document.querySelectorAll('[data-category]');
    const newsItems = document.querySelectorAll('.news-item');
    const categoryCards = document.querySelectorAll('.category-card');
    
    let currentCategory = 'all';
    let currentSearchTerm = '';
    
    // Search function
    function filterNews() {
        newsItems.forEach(item => {
            const title = item.getAttribute('data-title');
            const content = item.getAttribute('data-content');
            const category = item.getAttribute('data-category');
            
            const matchesSearch = currentSearchTerm === '' || 
                title.includes(currentSearchTerm.toLowerCase()) || 
                content.includes(currentSearchTerm.toLowerCase());
            
            const matchesCategory = currentCategory === 'all' || category === currentCategory;
            
            if (matchesSearch && matchesCategory) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
    
    // Search input event
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            currentSearchTerm = this.value;
            filterNews();
        });
    }
    
    // Category filter buttons
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            currentCategory = this.getAttribute('data-category');
            filterNews();
        });
    });
    
    // Category cards click
    categoryCards.forEach(card => {
        card.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Update button states
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            const targetButton = document.querySelector(`[data-category="${category}"]`);
            if (targetButton) {
                targetButton.classList.add('active');
            }
            
            currentCategory = category;
            filterNews();
            
            // Scroll to news section
            document.getElementById('newsGrid').scrollIntoView({ behavior: 'smooth' });
        });
    });
    
    // Newsletter form submission
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            if (email) {
                alert('Terima kasih! Anda telah berlangganan newsletter kami.');
                this.reset();
            }
        });
    }
});
</script>
@endsection

@section('styles')
<style>
/* Search Box Styling */
.search-box .input-group-text {
    border: none;
    background: var(--orange-gradient) !important;
}

.search-box .form-control {
    border-left: none;
    border-color: #dee2e6;
}

.search-box .form-control:focus {
    border-color: var(--primary-orange);
    box-shadow: 0 0 0 0.2rem rgba(255, 140, 0, 0.25);
}

/* Category Filter Buttons */
.category-filter .btn-group .btn {
    border-radius: 25px;
    margin: 0 5px;
    transition: all 0.3s ease;
}

.category-filter .btn-group .btn.active {
    background: var(--orange-gradient);
    border-color: var(--primary-orange);
    color: white;
}

.category-filter .btn-group .btn:hover {
    background: var(--primary-orange);
    border-color: var(--primary-orange);
    color: white;
}

/* Category Cards */
.category-card {
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(255, 140, 0, 0.2);
    border-color: var(--primary-orange);
}

.category-card:hover .card-body i {
    transform: scale(1.1);
}

.category-card .card-body i {
    transition: transform 0.3s ease;
}

/* News Items Animation */
.news-item {
    transition: all 0.3s ease;
}

.news-item[style*="display: none"] {
    opacity: 0;
    transform: scale(0.8);
}

/* Badge Styling */
.badge.bg-primary {
    background: var(--orange-gradient) !important;
    font-size: 0.75rem;
    padding: 0.4em 0.8em;
}

/* Responsive */
@media (max-width: 768px) {
    .category-filter .btn-group {
        flex-direction: column;
        width: 100%;
    }
    
    .category-filter .btn-group .btn {
        margin: 2px 0;
        border-radius: 8px;
    }
    
    .category-card {
        margin-bottom: 1rem;
    }
}
</style>
@endsection
