@extends('admin.layouts.app')

@section('title', 'Informasi Kontak')
@section('page-title', 'Informasi Kontak')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Informasi Kontak</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header mb-4">
    <div>
        <h1 class="page-title">Informasi Kontak</h1>
        <p class="page-subtitle">Kelola informasi kontak yang ditampilkan di website</p>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<form action="{{ route('admin.kontak.update') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-lg-8">
            <!-- Informasi Alamat -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Alamat</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                            id="alamat" name="alamat"
                            value="{{ old('alamat', $setting->alamat) }}"
                            placeholder="Contoh: Jl. Medokan Semampir Indah 99-101">
                        @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" class="form-control @error('kota') is-invalid @enderror"
                            id="kota" name="kota"
                            value="{{ old('kota', $setting->kota) }}"
                            placeholder="Contoh: Surabaya, Jawa Timur">
                        @error('kota')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Kontak -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-phone me-2"></i>Kontak</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control @error('telepon') is-invalid @enderror"
                            id="telepon" name="telepon"
                            value="{{ old('telepon', $setting->telepon) }}"
                            placeholder="Contoh: 082 338 414 452">
                        @error('telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" name="email"
                            value="{{ old('email', $setting->email) }}"
                            placeholder="Contoh: msa@saim.sch.id">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Jam Operasional -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-clock me-2"></i>Jam Operasional</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="jam_operasional_senin_jumat" class="form-label">Senin - Jumat</label>
                        <input type="text" class="form-control @error('jam_operasional_senin_jumat') is-invalid @enderror"
                            id="jam_operasional_senin_jumat" name="jam_operasional_senin_jumat"
                            value="{{ old('jam_operasional_senin_jumat', $setting->jam_operasional_senin_jumat) }}"
                            placeholder="Contoh: Senin - Jumat: 08:00 - 16:00">
                        @error('jam_operasional_senin_jumat')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_operasional_sabtu" class="form-label">Sabtu</label>
                        <input type="text" class="form-control @error('jam_operasional_sabtu') is-invalid @enderror"
                            id="jam_operasional_sabtu" name="jam_operasional_sabtu"
                            value="{{ old('jam_operasional_sabtu', $setting->jam_operasional_sabtu) }}"
                            placeholder="Contoh: Sabtu: 09:00 - 12:00">
                        @error('jam_operasional_sabtu')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Google Maps -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-map me-2"></i>Google Maps</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="google_maps_embed" class="form-label">Google Maps Embed Code</label>
                        <textarea class="form-control @error('google_maps_embed') is-invalid @enderror"
                            id="google_maps_embed" name="google_maps_embed"
                            rows="4"
                            placeholder='<iframe src="https://www.google.com/maps/embed?pb=..." width="600" height="450" ...></iframe>'>{{ old('google_maps_embed', $setting->google_maps_embed) }}</textarea>
                        @error('google_maps_embed')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Paste kode embed dari Google Maps</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Social Media -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-share-alt me-2"></i>Social Media</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="facebook" class="form-label">
                            <i class="fab fa-facebook text-primary me-1"></i>Facebook
                        </label>
                        <input type="url" class="form-control @error('facebook') is-invalid @enderror"
                            id="facebook" name="facebook"
                            value="{{ old('facebook', $setting->facebook) }}"
                            placeholder="https://facebook.com/...">
                        @error('facebook')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="instagram" class="form-label">
                            <i class="fab fa-instagram text-danger me-1"></i>Instagram
                        </label>
                        <input type="url" class="form-control @error('instagram') is-invalid @enderror"
                            id="instagram" name="instagram"
                            value="{{ old('instagram', $setting->instagram) }}"
                            placeholder="https://instagram.com/...">
                        @error('instagram')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="twitter" class="form-label">
                            <i class="fab fa-twitter text-info me-1"></i>Twitter
                        </label>
                        <input type="url" class="form-control @error('twitter') is-invalid @enderror"
                            id="twitter" name="twitter"
                            value="{{ old('twitter', $setting->twitter) }}"
                            placeholder="https://twitter.com/...">
                        @error('twitter')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="youtube" class="form-label">
                            <i class="fab fa-youtube text-danger me-1"></i>YouTube
                        </label>
                        <input type="url" class="form-control @error('youtube') is-invalid @enderror"
                            id="youtube" name="youtube"
                            value="{{ old('youtube', $setting->youtube) }}"
                            placeholder="https://youtube.com/...">
                        @error('youtube')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Link Pendaftaran -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-user-plus me-2"></i>Link Pendaftaran</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="admission_link" class="form-label">
                            <i class="fas fa-link text-warning me-1"></i>Link Google Form Admission
                        </label>
                        <input type="url" class="form-control @error('admission_link') is-invalid @enderror"
                            id="admission_link" name="admission_link"
                            value="{{ old('admission_link', $setting->admission_link) }}"
                            placeholder="https://docs.google.com/forms/...">
                        @error('admission_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Link Google Form untuk pendaftaran siswa baru yang akan tampil di tombol ADMISSION</div>
                    </div>
                </div>
            </div>

            <!-- Preview -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-eye me-2"></i>Preview</h5>
                </div>
                <div class="card-body">
                    <div class="preview-info">
                        <p class="mb-2"><i class="fas fa-map-marker-alt text-primary me-2"></i><strong>Alamat:</strong><br>
                            <small id="preview-alamat">{{ $setting->alamat }}<br>{{ $setting->kota }}</small>
                        </p>

                        <p class="mb-2"><i class="fas fa-phone text-success me-2"></i><strong>Telepon:</strong><br>
                            <small id="preview-telepon">{{ $setting->telepon }}</small>
                        </p>

                        <p class="mb-2"><i class="fas fa-envelope text-info me-2"></i><strong>Email:</strong><br>
                            <small id="preview-email">{{ $setting->email }}</small>
                        </p>

                        <p class="mb-0"><i class="fas fa-clock text-warning me-2"></i><strong>Jam Operasional:</strong><br>
                            <small id="preview-jam">{{ $setting->jam_operasional_senin_jumat }}<br>{{ $setting->jam_operasional_sabtu }}</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex gap-2 justify-content-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</form>

<script>
    // Live preview
    document.getElementById('alamat').addEventListener('input', function() {
        document.getElementById('preview-alamat').innerHTML = this.value + '<br>' + document.getElementById('kota').value;
    });
    document.getElementById('kota').addEventListener('input', function() {
        document.getElementById('preview-alamat').innerHTML = document.getElementById('alamat').value + '<br>' + this.value;
    });
    document.getElementById('telepon').addEventListener('input', function() {
        document.getElementById('preview-telepon').textContent = this.value;
    });
    document.getElementById('email').addEventListener('input', function() {
        document.getElementById('preview-email').textContent = this.value;
    });
    document.getElementById('jam_operasional_senin_jumat').addEventListener('input', function() {
        document.getElementById('preview-jam').innerHTML = this.value + '<br>' + document.getElementById('jam_operasional_sabtu').value;
    });
    document.getElementById('jam_operasional_sabtu').addEventListener('input', function() {
        document.getElementById('preview-jam').innerHTML = document.getElementById('jam_operasional_senin_jumat').value + '<br>' + this.value;
    });
</script>
@endsection