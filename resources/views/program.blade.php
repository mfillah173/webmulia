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
            <!-- Toilet Training Program -->
            <div class="col-lg-6 mb-5">
                <a href="{{ route('program.show', 'toilet-training-program') }}" class="text-decoration-none">
                    <div class="card h-100 program-card">
                        <div class="card-header text-center">
                            <i class="fas fa-toilet fa-3x mb-3"></i>
                            <h2>Toilet Training Program</h2>
                            <p class="mb-0">Program Pelatihan Toilet</p>
                        </div>
                        <div class="card-body">
                            <h4>Tujuan Program:</h4>
                            <p>Program ini bertujuan untuk mengembangkan kemandirian anak dalam menggunakan toilet, meningkatkan kesadaran tubuh, membangun rutinitas yang konsisten, dan meningkatkan kepercayaan diri anak dalam melakukan aktivitas toileting secara mandiri.</p>
                            
                            
                            <div class="mt-3">
                                <span class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle me-2"></i>Lihat Detail
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Pengembangan Akidah Akhlaq -->
            <div class="col-lg-6 mb-5">
                <a href="{{ route('program.show', 'pengembangan-akidah-akhlaq') }}" class="text-decoration-none">
                    <div class="card h-100 program-card">
                        <div class="card-header text-center">
                            <i class="fas fa-mosque fa-3x mb-3"></i>
                            <h2>Pengembangan Akidah Akhlaq</h2>
                            <p class="mb-0">Program Pembentukan Karakter Islami</p>
                        </div>
                        <div class="card-body">
                            <h4>Tujuan Program:</h4>
                            <p>Program ini bertujuan untuk menanamkan nilai-nilai Islam dalam kehidupan sehari-hari, mengembangkan akhlak mulia, membangun karakter yang baik, dan mengenalkan konsep dasar agama Islam kepada anak dengan cara yang mudah dipahami dan diaplikasikan.</p>
                            
                            
                            <div class="mt-3">
                                <span class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle me-2"></i>Lihat Detail
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Terapi Perilaku -->
            <div class="col-lg-6 mb-5">
                <a href="{{ route('program.show', 'terapi-perilaku') }}" class="text-decoration-none">
                    <div class="card h-100 program-card">
                        <div class="card-header text-center">
                            <i class="fas fa-brain fa-3x mb-3"></i>
                            <h2>Terapi Perilaku</h2>
                            <p class="mb-0">Program Modifikasi Perilaku</p>
                        </div>
                        <div class="card-body">
                            <h4>Tujuan Program:</h4>
                            <p>Program ini dirancang untuk mengurangi perilaku yang tidak diinginkan, meningkatkan perilaku positif, mengembangkan keterampilan sosial, dan meningkatkan kemampuan adaptasi anak dalam berbagai situasi dan lingkungan.</p>
                            
                           
                            <div class="mt-3">
                                <span class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle me-2"></i>Lihat Detail
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Terapi Sensori -->
            <div class="col-lg-6 mb-5">
                <a href="{{ route('program.show', 'terapi-sensori') }}" class="text-decoration-none">
                    <div class="card h-100 program-card">
                        <div class="card-header text-center">
                            <i class="fas fa-hand-holding-heart fa-3x mb-3"></i>
                            <h2>Terapi Sensori</h2>
                            <p class="mb-0">Program Integrasi Sensorik</p>
                        </div>
                        <div class="card-body">
                            <h4>Tujuan Program:</h4>
                            <p>Program ini bertujuan untuk meningkatkan kemampuan anak dalam memproses informasi sensorik, mengurangi sensitivitas berlebihan, meningkatkan toleransi terhadap berbagai stimulus, dan mengembangkan kemampuan regulasi diri yang lebih baik.</p>
                            
                           
                            <div class="mt-3">
                                <span class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle me-2"></i>Lihat Detail
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Stimulasi Tahap Perkembangan -->
            <div class="col-lg-12 mb-5">
                <a href="{{ route('program.show', 'stimulasi-tahap-perkembangan') }}" class="text-decoration-none">
                    <div class="card h-100 program-card">
                        <div class="card-header text-center">
                            <i class="fas fa-chart-line fa-3x mb-3"></i>
                            <h2>Stimulasi Tahap Perkembangan</h2>
                            <p class="mb-0">Program Stimulasi Komprehensif</p>
                        </div>
                        <div class="card-body">
                            <h4>Tujuan Program:</h4>
                            <p>Program ini bertujuan untuk mengoptimalkan perkembangan anak sesuai dengan tahap usianya, mengidentifikasi dan mengatasi keterlambatan perkembangan, meningkatkan kemampuan kognitif dan motorik, serta mempersiapkan anak untuk transisi ke tahap perkembangan berikutnya dengan lancar.</p>
                            
                           
                            <div class="mt-3 text-center">
                                <span class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle me-2"></i>Lihat Detail
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
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
