@extends('layouts.app')

@section('title', 'Program Pembelajaran - Mulia Special Academy')
@section('description', 'Program pembelajaran khusus yang dirancang untuk anak berkebutuhan khusus di Mulia Special Academy')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="section-title">Program Pembelajaran</h1>
                <p class="section-subtitle">Program pembelajaran yang dirancang khusus untuk mengembangkan potensi dan kemampuan anak berkebutuhan khusus</p>
            </div>
        </div>
    </div>
</section>

<!-- Programs Overview -->
<section class="py-5">
    <div class="container">
        <div class="row">
            @forelse($programs as $program)
            <!-- Program Card -->
            <div class="col-lg-6 mb-5">
                <div class="card h-100 program-card">
                    @if($program->gambar)
                    <div class="program-image">
                        <img src="{{ asset('storage/images/program/' . $program->gambar) }}" alt="{{ $program->nama }}">
                    </div>
                    @else
                    <div class="program-image program-image-placeholder">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    @endif
                    
                    <div class="card-body">
                        <h3 class="program-title">{{ $program->nama }}</h3>
                        @if($program->deskripsi)
                        <p class="program-subtitle">{{ \Str::limit($program->deskripsi, 80) }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <!-- Default Programs jika database kosong -->
            <div class="col-lg-6 mb-5">
                <div class="card h-100 program-card">
                    <div class="program-image program-image-placeholder">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="card-body">
                        <h3 class="program-title">BELUM ADA PROGRAM</h3>
                        <p class="program-subtitle">Silakan tambahkan program dari panel admin</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Specialized Programs -->
<!-- <section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title">Program Khusus</h2>
        <p class="section-subtitle">Program tambahan yang mendukung perkembangan optimal anak</p>
        
        <div class="row">
           
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">
                        <i class="fas fa-hand-holding-heart fa-2x mb-2"></i>
                        <h4>Sensory Integration</h4>
                    </div>
                    <div class="card-body">
                        <p>Program untuk mengintegrasikan informasi sensorik dan meningkatkan kemampuan anak dalam memproses stimulus dari lingkungan melalui terapi sensorik, aktivitas vestibular, dan stimulasi proprioceptive yang terstruktur dan terprogram.</p>
                    </div>
                </div>
            </div>

            
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">
                        <i class="fas fa-comments fa-2x mb-2"></i>
                        <h4>Terapi Komunikasi</h4>
                    </div>
                    <div class="card-body">
                        <p>Program untuk mengembangkan kemampuan komunikasi verbal dan non-verbal anak melalui terapi wicara, augmentative communication, dan social communication yang disesuaikan dengan kebutuhan komunikasi masing-masing anak.</p>
                    </div>
                </div>
            </div>

            
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">
                        <i class="fas fa-brain fa-2x mb-2"></i>
                        <h4>Dukungan Perilaku</h4>
                    </div>
                    <div class="card-body">
                        <p>Program untuk mengelola dan mengubah perilaku yang tidak diinginkan menjadi perilaku yang positif melalui pendekatan Applied Behavior Analysis (ABA), positive reinforcement, dan behavior modification yang sistematis dan terukur.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Learning Methods -->
<!-- <section class="py-5">
    <div class="container">
        <h2 class="section-title">Metode Pembelajaran</h2>
        <p class="section-subtitle">Pendekatan pembelajaran yang disesuaikan dengan kebutuhan setiap anak</p>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="d-flex">
                    <div class="feature-icon me-4" style="width: 60px; height: 60px; font-size: 1.5rem;">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h4>Individualized Education Plan (IEP)</h4>
                        <p>Setiap anak memiliki rencana pendidikan yang disesuaikan dengan kemampuan, kebutuhan, dan tujuan pembelajaran mereka.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="d-flex">
                    <div class="feature-icon me-4" style="width: 60px; height: 60px; font-size: 1.5rem;">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h4>Small Group Learning</h4>
                        <p>Pembelajaran dalam kelompok kecil untuk memastikan perhatian yang optimal dan interaksi yang efektif.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="d-flex">
                    <div class="feature-icon me-4" style="width: 60px; height: 60px; font-size: 1.5rem;">
                        <i class="fas fa-gamepad"></i>
                    </div>
                    <div>
                        <h4>Play-Based Learning</h4>
                        <p>Pembelajaran melalui bermain yang menyenangkan dan bermakna untuk meningkatkan motivasi dan engagement.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="d-flex">
                    <div class="feature-icon me-4" style="width: 60px; height: 60px; font-size: 1.5rem;">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div>
                        <h4>Multi-Sensory Approach</h4>
                        <p>Pendekatan pembelajaran yang melibatkan berbagai indera untuk meningkatkan pemahaman dan retensi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->



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
                    <i class="fas fa-phone me-2"></i>Konsultasi Gratis
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
/* Program Card Styling - Simple & Clean seperti screenshot */
.program-card {
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    border-radius: 8px;
    background: #fff;
}

.program-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

/* Program Card Image - Auto Height untuk gambar full */
.program-image {
    position: relative;
    width: 100%;
    overflow: hidden;
    background: #f5f5f5;
    min-height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.program-image img {
    width: 100%;
    height: auto;
    max-height: 600px;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.program-card:hover .program-image img {
    transform: scale(1.05);
}

/* Placeholder jika tidak ada gambar */
.program-image-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--secondary-orange) 100%);
}

.program-image-placeholder i {
    font-size: 5rem;
    color: rgba(255, 255, 255, 0.5);
}

/* Card Body - Simple & Clean */
.program-card .card-body {
    padding: 2rem 1.5rem;
    background: #fff;
}

/* Program Title - Bold seperti "MAINAN BARU" */
.program-title {
    font-size: 1rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    line-height: 1.3;
}

/* Program Subtitle - Warna orange seperti "BALABALANDAD" */
.program-subtitle {
    font-size: 1rem;
    color: var(--primary-orange);
    font-weight: 500;
    margin-bottom: 0;
    line-height: 1.5;
}

/* Responsive - Tablet */
@media (max-width: 991.98px) {
    .program-image {
        min-height: 250px;
    }
    
    .program-image img {
        max-height: 500px;
    }
    
    .program-title {
        font-size: 0.95rem;
    }
    
    .program-card .card-body {
        padding: 1.5rem 1.25rem;
    }
}

/* Responsive - Mobile */
@media (max-width: 767.98px) {
    .program-image {
        min-height: 350px;
    }
    
    .program-image img {
        max-height: 600px;
        width: 100%;
    }
    
    .program-title {
        font-size: 0.9rem;
    }
    
    .program-subtitle {
        font-size: 0.85rem;
    }
    
    .program-card .card-body {
        padding: 1.25rem 1rem;
    }
}
</style>
@endsection
