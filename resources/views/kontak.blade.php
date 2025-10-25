@extends('layouts.app')

@section('title', 'Kontak - Mulia Special Academy')
@section('description', 'Hubungi Mulia Special Academy untuk informasi lebih lanjut tentang program pembelajaran untuk anak berkebutuhan khusus')

@section('content')
<!-- Page Header -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="section-title">Hubungi Kami</h1>
                <p class="section-subtitle">Kami siap membantu Anda dengan informasi lebih lanjut tentang program pembelajaran untuk anak berkebutuhan khusus</p>
            </div>
        </div>
    </div>
</section>



<!-- Contact Information -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-8 mb-5">
                <div class="contact-form">
                    <h3 class="mb-4">Kirim Pesan</h3>
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('kontak.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label">Nama Lengkap *</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                       id="nama" name="nama" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="telepon" class="form-label">Nomor Telepon *</label>
                                <input type="tel" class="form-control @error('telepon') is-invalid @enderror" 
                                       id="telepon" name="telepon" value="{{ old('telepon') }}" required>
                                @error('telepon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="subjek" class="form-label">Subjek *</label>
                                <select class="form-select @error('subjek') is-invalid @enderror" id="subjek" name="subjek" required>
                                    <option value="">Pilih Subjek</option>
                                    <option value="Informasi Program" {{ old('subjek') == 'Informasi Program' ? 'selected' : '' }}>Informasi Program</option>
                                    <option value="Pendaftaran Siswa" {{ old('subjek') == 'Pendaftaran Siswa' ? 'selected' : '' }}>Pendaftaran Siswa</option>
                                    <option value="Konsultasi" {{ old('subjek') == 'Konsultasi' ? 'selected' : '' }}>Konsultasi</option>
                                    <option value="Kunjungan Sekolah" {{ old('subjek') == 'Kunjungan Sekolah' ? 'selected' : '' }}>Kunjungan Sekolah</option>
                                    <option value="Lainnya" {{ old('subjek') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                @error('subjek')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan *</label>
                            <textarea class="form-control @error('pesan') is-invalid @enderror" 
                                      id="pesan" name="pesan" rows="5" required>{{ old('pesan') }}</textarea>
                            @error('pesan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Details -->
            <div class="col-lg-4">
                <div class="contact-info">
                    <h3 class="mb-4">Informasi Kontak</h3>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Alamat</h5>
                            <p>Jl. Medokan Semampir Indah 99-101<br>Surabaya, Jawa Timur</p>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Telepon</h5>
                            <p>082 338 414 452</p>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Email</h5>
                            <p>msa@saim.sch.id</p>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Jam Operasional</h5>
                            <p>Senin - Jumat: 08:00 - 16:00<br>Sabtu: 08:00 - 12:00</p>
                        </div>
                    </div>
                    
                </div>

                <!-- Quick Links -->
                <div class="quick-links mt-5">
                    <h4 class="mb-3">Link Cepat</h4>
                    <div class="d-grid gap-2">
                        <a href="https://bit.ly/PendaftaranSiswaBaruMuliaSpecialAcademy2025-2026" 
                           class="btn btn-outline-primary" target="_blank">
                            <i class="fas fa-user-plus me-2"></i>Pendaftaran Online
                        </a>
                        <a href="{{ route('program') }}" class="btn btn-outline-success">
                            <i class="fas fa-graduation-cap me-2"></i>Program Pembelajaran
                        </a>
                        <a href="{{ route('fasilitas') }}" class="btn btn-outline-info">
                            <i class="fas fa-building me-2"></i>Fasilitas Sekolah
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Lokasi Sekolah</h2>
        <div class="row">
            <div class="col-12">
                <div class="map-placeholder bg-primary text-white text-center py-5 rounded">
                    <i class="fas fa-map fa-3x mb-3"></i>
                    <h4>Peta Lokasi Mulia Special Academy</h4>
                    <p>Jl. Medokan Semampir Indah 99-101, Surabaya</p>
                    <a href="https://maps.google.com/maps?q=Jl.+Medokan+Semampir+Indah+99-101,+Surabaya" target="_blank" class="btn btn-light">
                        <i class="fas fa-external-link-alt me-2"></i>Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Pertanyaan yang Sering Diajukan</h2>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                Bagaimana cara mendaftarkan anak saya?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Anda dapat mendaftarkan anak melalui link pendaftaran online yang tersedia di website kami, atau datang langsung ke sekolah untuk konsultasi dan pendaftaran. Tim kami akan membantu Anda dengan proses pendaftaran yang mudah dan cepat.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                Apakah ada program konsultasi untuk orang tua?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, kami menyediakan program konsultasi rutin untuk orang tua, termasuk konseling keluarga, pelatihan keterampilan parenting, dan dukungan emosional. Tim konselor kami siap membantu Anda menghadapi berbagai tantangan dalam mengasuh anak berkebutuhan khusus.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                Bagaimana sistem pembelajaran di Mulia Special Academy?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Sistem pembelajaran kami menggunakan pendekatan Individualized Education Plan (IEP) yang disesuaikan dengan kebutuhan setiap anak. Kami menggabungkan pembelajaran akademik, terapi, dan life skills dalam program yang terintegrasi dan komprehensif.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                Apakah sekolah menyediakan transportasi?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, kami menyediakan layanan transportasi sekolah dengan armada yang aman dan nyaman. Sopir dan pendamping yang berpengalaman akan memastikan anak Anda sampai di sekolah dengan selamat dan tepat waktu.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
.contact-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 2rem;
}

.contact-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    margin-right: 1rem;
    flex-shrink: 0;
}

.contact-details h5 {
    color: var(--dark-color);
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.contact-details p {
    color: #666;
    margin-bottom: 0;
}

.map-placeholder {
    min-height: 300px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.quick-links .btn {
    text-align: left;
}

@media (max-width: 768px) {
    .contact-item {
        flex-direction: column;
        text-align: center;
    }
    
    .contact-icon {
        margin-right: 0;
        margin-bottom: 1rem;
    }
}
</style>
@endsection
