@extends('layouts.app')

@section('title', 'Program Pembelajaran - Mulia Special Academy')
@section('description', 'Program pembelajaran khusus yang dirancang untuk anak berkebutuhan khusus di Mulia Special Academy')

@section('content')
<!-- Page Header -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="section-title">LEARNING PROGRAM</h1>
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
                        <img src="{{ asset('storage/images/media/' . $program->gambar) }}" alt="{{ $program->nama }}">
                    </div>
                    @else
                    <div class="program-image program-image-placeholder">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    @endif
                    
                    <div class="card-body">
                        <h3 class="program-title">{{ $program->nama }}</h3>
                        @if($program->tujuan_program)
                        <p class="program-subtitle">{{ $program->tujuan_program }}</p>
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
<!-- <section class="py-5 bg-primary text-white">
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
</section> -->
@endsection

@section('styles')
<style>
/* Program Card Styling - Simple & Clean seperti screenshot */
/* Program Card Styling - Simple & Clean seperti screenshot */
.program-card {
    background: transparent;
    border-radius: 0;
    overflow: visible;
    box-shadow: none;
    transition: 0.35s ease;
    border: none;
}

.program-card:hover {
    transform: translateY(0);
    box-shadow: none;
}

.program-image {
    width: 100%;
    aspect-ratio: 16/9; /* Rasio landscape 16:9 untuk gambar lebar seperti contoh */
    overflow: hidden;
    background: #ffffff; /* background putih untuk gambar Full HD */
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 20px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    margin-bottom: 20px;
}

.program-image img {
    width: 100%;
    height: 100%;
    object-fit: contain; /* tampilkan gambar full tanpa crop */
    transition: .5s ease;
    image-rendering: high-quality;
    image-rendering: -webkit-optimize-contrast;
    -ms-interpolation-mode: bicubic;
    max-width: 100%;
    height: auto;
}

.program-card:hover .program-image img {
    transform: scale(1.0); /* tidak ada zoom agar gambar tetap Full HD */
}

.program-content,
.program-card .card-body {
    padding: 0 30px 30px 30px;
    text-align: center;
}

.program-content h3,
.program-title {
    font-size: 1.8rem !important;
    font-weight: 600;
    color: #2b2b2b;
    margin-bottom: 10px;
    line-height: 1.4;
}

.program-content p {
    font-size: .95rem;
    line-height: 1.55;
    color: #6b6b6b;
    margin-bottom: 18px;
}

.program-subtitle {
    font-size: 1.2rem;
    line-height: 1.7;
    color: #555;
    margin-bottom: 0;
    font-weight: 400;
    text-align: justify;
}

.btn-detail {
    display: inline-block;
    padding: 10px 18px;
    background: #c8a75f;
    color: #fff;
    border-radius: 50px;
    font-weight: 600;
    font-size: .9rem;
    transition: .3s;
    text-decoration: none;
}

.btn-detail:hover {
    background: #b19048;
}

@media(max-width: 768px) {
    .section-title {
        font-size: 1.5rem !important;
    }

    .program-image {
        aspect-ratio: 16/9; /* Rasio landscape 16:9 untuk mobile juga */
        height: auto;
        min-height: 200px; /* Minimal tinggi gambar di mobile */
        border-radius: 15px;
        margin-bottom: 15px;
    }

    .program-content,
    .program-card .card-body {
        padding: 0 25px 25px 25px;
        text-align: center;
    }

    .program-content h3,
    .program-title {
        font-size: 1.6rem !important;
    }

    .program-subtitle {
        font-size: 1.1rem;
        line-height: 1.6;
        text-align: justify;
    }
}

</style>
@endsection