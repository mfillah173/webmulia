@extends('layouts.app')

@section('title', 'Sistem Pembelajaran - Mulia Special Academy')
@section('description', 'Sistem pembelajaran yang komprehensif dan terintegrasi untuk anak berkebutuhan khusus di Mulia Special Academy')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="section-title">Sistem Pembelajaran MSA</h1>
                <p class="section-subtitle">Pendekatan pembelajaran yang holistik dan terintegrasi untuk mengoptimalkan perkembangan anak berkebutuhan khusus</p>
            </div>
        </div>
    </div>
</section>

<!-- Learning Philosophy -->
<!-- <section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="mb-4">Filosofi Pembelajaran Kami</h2>
                <p class="lead">"Setiap anak adalah individu yang unik dengan potensi yang tak terbatas"</p>
                <p>Di Mulia Special Academy, kami percaya bahwa setiap anak berkebutuhan khusus memiliki kemampuan dan potensi yang dapat dikembangkan melalui pendekatan yang tepat. Sistem pembelajaran kami dirancang untuk:</p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-heart text-primary me-2"></i>Menghormati keunikan setiap anak</li>
                    <li><i class="fas fa-heart text-primary me-2"></i>Mengembangkan potensi secara optimal</li>
                    <li><i class="fas fa-heart text-primary me-2"></i>Membangun kepercayaan diri</li>
                    <li><i class="fas fa-heart text-primary me-2"></i>Mempersiapkan masa depan yang mandiri</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <div class="feature-icon" style="width: 120px; height: 120px; font-size: 3rem;">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Sistem Pembelajaran MSA -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <a href="{{ route('sistem.show', 'one-on-one') }}" class="text-decoration-none">
                    <div class="card h-100 system-card text-center">
                        <div class="system-image">
                            <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text=One-on-One+Learning" alt="One-on-One Learning" class="img-fluid">
                            <div class="image-overlay">
                                <i class="fas fa-user fa-3x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">One-on-One</h4>
                            <p>Pembelajaran individual yang disesuaikan dengan kebutuhan dan kemampuan setiap anak untuk memastikan perhatian penuh dan perkembangan optimal. Program ini menerapkan rasio guru-siswa 1:1 dengan program pembelajaran personal, monitoring perkembangan individual, dan penyesuaian metode pembelajaran sesuai kebutuhan masing-masing anak.</p>
                            
                            <div class="mt-3">
                                <span class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle me-2"></i>Lihat Detail
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-6 mb-4">
                <a href="{{ route('sistem.show', 'stimulasi-bertahap') }}" class="text-decoration-none">
                    <div class="card h-100 system-card text-center">
                        <div class="system-image">
                            <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text=Stimulasi+Bertahap" alt="Stimulasi Bertahap" class="img-fluid">
                            <div class="image-overlay">
                                <i class="fas fa-chart-line fa-3x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Stimulasi Bertahap</h4>
                            <p>Sistem stimulasi yang terstruktur dan bertahap sesuai dengan tahap perkembangan anak untuk memastikan pembelajaran yang efektif. Program ini dimulai dengan assessment awal kemampuan, dilanjutkan dengan perencanaan tahap pembelajaran, progres bertahap sesuai kemampuan, serta evaluasi dan penyesuaian berkala untuk hasil optimal.</p>
                            
                            <div class="mt-3">
                                <span class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle me-2"></i>Lihat Detail
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-6 mb-4">
                <a href="{{ route('sistem.show', 'prompting-system') }}" class="text-decoration-none">
                    <div class="card h-100 system-card text-center">
                        <div class="system-image">
                            <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text=Prompting+System" alt="Prompting System" class="img-fluid">
                            <div class="image-overlay">
                                <i class="fas fa-lightbulb fa-3x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Prompting System</h4>
                            <p>Sistem prompting yang sistematis untuk membantu anak belajar dengan memberikan bantuan yang tepat pada waktu yang tepat. Program ini menerapkan visual prompting, verbal prompting, physical prompting, dan fading prompts secara bertahap untuk mengembangkan kemandirian anak dalam belajar.</p>
                            
                            <div class="mt-3">
                                <span class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle me-2"></i>Lihat Detail
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-6 mb-4">
                <a href="{{ route('sistem.show', 'evaluasi-komprehensif') }}" class="text-decoration-none">
                    <div class="card h-100 system-card text-center">
                        <div class="system-image">
                            <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text=Evaluasi+Komprehensif" alt="Evaluasi Komprehensif" class="img-fluid">
                            <div class="image-overlay">
                                <i class="fas fa-clipboard-check fa-3x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Evaluasi Harian, Bulanan, Semester</h4>
                            <p>Sistem evaluasi yang komprehensif untuk memantau kemajuan pembelajaran dan menyesuaikan program sesuai kebutuhan anak. Program ini mencakup evaluasi harian perkembangan, laporan bulanan kemajuan, assessment semester komprehensif, dan penyesuaian program pembelajaran berdasarkan hasil evaluasi yang dilakukan secara berkala.</p>
                            
                            <div class="mt-3">
                                <span class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle me-2"></i>Lihat Detail
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-12 mb-4">
                <a href="{{ route('sistem.show', 'kolaborasi-orang-tua') }}" class="text-decoration-none">
                    <div class="card h-100 system-card text-center">
                        <div class="system-image">
                            <img src="https://via.placeholder.com/800x300/ff8c00/ffffff?text=Kolaborasi+Orang+Tua" alt="Kolaborasi Orang Tua" class="img-fluid">
                            <div class="image-overlay">
                                <i class="fas fa-handshake fa-3x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Kolaborasi Orang Tua</h4>
                            <p>Kerjasama erat dengan orang tua untuk memastikan konsistensi pembelajaran di rumah dan sekolah, serta memberikan dukungan optimal bagi perkembangan anak. Program ini meliputi konsultasi rutin dengan orang tua, pelatihan teknik pembelajaran di rumah, sharing progress dan perkembangan, workshop parenting khusus, dukungan psikologis keluarga, dan komunikasi terbuka dan transparan antara sekolah dan keluarga.</p>
                            
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

<!-- Daily Schedule -->
<!-- <section class="py-5">
    <div class="container">
        <h2 class="section-title">Jadwal Harian</h2>
        <p class="section-subtitle">Struktur pembelajaran yang terorganisir untuk memaksimalkan efektivitas</p>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="fas fa-sun me-2"></i>Kindergarten Schedule</h4>
                    </div>
                    <div class="card-body">
                        <div class="schedule-item">
                            <div class="time">08:00 - 08:30</div>
                            <div class="activity">Morning Circle & Greeting</div>
                        </div>
                        <div class="schedule-item">
                            <div class="time">08:30 - 09:15</div>
                            <div class="activity">Sensory Play & Free Play</div>
                        </div>
                        <div class="schedule-item">
                            <div class="time">09:15 - 10:00</div>
                            <div class="activity">Structured Learning</div>
                        </div>
                        <div class="schedule-item">
                            <div class="time">10:00 - 10:30</div>
                            <div class="activity">Snack Time & Break</div>
                        </div>
                        <div class="schedule-item">
                            <div class="time">10:30 - 11:15</div>
                            <div class="activity">Therapy Sessions</div>
                        </div>
                        <div class="schedule-item">
                            <div class="time">11:15 - 12:00</div>
                            <div class="activity">Outdoor Activities</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0"><i class="fas fa-graduation-cap me-2"></i>Primary School Schedule</h4>
                    </div>
                    <div class="card-body">
                        <div class="schedule-item">
                            <div class="time">08:00 - 08:30</div>
                            <div class="activity">Morning Assembly</div>
                        </div>
                        <div class="schedule-item">
                            <div class="time">08:30 - 09:30</div>
                            <div class="activity">Academic Subjects</div>
                        </div>
                        <div class="schedule-item">
                            <div class="time">09:30 - 10:00</div>
                            <div class="activity">Break & Snack</div>
                        </div>
                        <div class="schedule-item">
                            <div class="time">10:00 - 11:00</div>
                            <div class="activity">Life Skills Training</div>
                        </div>
                        <div class="schedule-item">
                            <div class="time">11:00 - 12:00</div>
                            <div class="activity">Therapy & Support</div>
                        </div>
                        <div class="schedule-item">
                            <div class="time">12:00 - 12:30</div>
                            <div class="activity">Lunch & Social Time</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Teaching Methods -->
<!-- <section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title">Metode Pengajaran</h2>
        <p class="section-subtitle">Berbagai pendekatan pembelajaran yang disesuaikan dengan kebutuhan setiap anak</p>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="d-flex">
                    <div class="feature-icon me-4" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="fas fa-puzzle-piece"></i>
                    </div>
                    <div>
                        <h4>Structured Teaching</h4>
                        <p>Pengajaran yang terstruktur dengan langkah-langkah yang jelas dan konsisten untuk membantu anak memahami konsep dengan lebih baik.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="d-flex">
                    <div class="feature-icon me-4" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="fas fa-gamepad"></i>
                    </div>
                    <div>
                        <h4>Play-Based Learning</h4>
                        <p>Pembelajaran melalui bermain yang menyenangkan untuk meningkatkan motivasi dan engagement anak dalam proses belajar.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="d-flex">
                    <div class="feature-icon me-4" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div>
                        <h4>Visual Learning</h4>
                        <p>Penggunaan visual aids, gambar, dan simbol untuk membantu anak memahami konsep dan mengikuti instruksi.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="d-flex">
                    <div class="feature-icon me-4" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <div>
                        <h4>Sensory Integration</h4>
                        <p>Pendekatan yang mengintegrasikan berbagai stimulus sensorik untuk membantu anak memproses informasi dengan lebih efektif.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Assessment & Evaluation -->
<!-- <section class="py-5">
    <div class="container">
        <h2 class="section-title">Penilaian & Evaluasi</h2>
        <p class="section-subtitle">Sistem penilaian yang komprehensif untuk memantau kemajuan pembelajaran</p>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="feature-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <h4>Penilaian Formatif</h4>
                    <p>Penilaian berkelanjutan selama proses pembelajaran untuk memberikan feedback dan penyesuaian program.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="feature-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h4>Penilaian Sumatif</h4>
                    <p>Penilaian akhir untuk mengukur pencapaian tujuan pembelajaran dalam periode tertentu.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="feature-icon">
                        <i class="fas fa-video"></i>
                    </div>
                    <h4>Portfolio Assessment</h4>
                    <p>Koleksi karya dan dokumentasi kemajuan anak untuk memberikan gambaran perkembangan yang komprehensif.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Multi-Disciplinary Team</h4>
                    <p>Penilaian oleh tim multidisiplin untuk memberikan perspektif yang holistik tentang perkembangan anak.</p>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Parent Involvement -->
<!-- <section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="mb-4">Keterlibatan Orang Tua</h2>
                <p class="lead">Orang tua adalah mitra penting dalam proses pembelajaran anak</p>
                <p>Kami melibatkan orang tua secara aktif dalam perencanaan program pembelajaran, monitoring kemajuan anak, konsultasi dan konseling, pelatihan keterampilan parenting, serta kegiatan sekolah bersama untuk memastikan perkembangan anak yang optimal dan berkelanjutan.</p>
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <div class="feature-icon" style="width: 120px; height: 120px; font-size: 3rem;">
                        <i class="fas fa-home"></i>
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
                <h3 class="mb-3">Ingin Tahu Lebih Banyak tentang Sistem Pembelajaran Kami?</h3>
                <p class="mb-0">Jadwalkan konsultasi dengan tim kami untuk memahami bagaimana sistem pembelajaran kami dapat membantu anak Anda berkembang optimal.</p>
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

@section('styles')
<style>
.schedule-item {
    display: flex;
    margin-bottom: 15px;
    padding: 10px;
    background: #f8f9fa;
    border-radius: 8px;
}

.schedule-item .time {
    font-weight: bold;
    color: var(--primary-color);
    min-width: 100px;
    margin-right: 15px;
}

.schedule-item .activity {
    flex: 1;
}
</style>
@endsection
