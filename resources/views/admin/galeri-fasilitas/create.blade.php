@extends('admin.layouts.app')

@section('title', 'Tambah Gambar Galeri Fasilitas')
@section('page-title', 'Tambah Gambar Galeri Fasilitas')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-plus-circle me-2"></i>Tambah Gambar Galeri Fasilitas
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.galeri-fasilitas.store') }}" method="POST" enctype="multipart/form-data" id="galeriForm">
                    @csrf

                    <!-- Fasilitas -->
                    <div class="form-group">
                        <label for="fasilitas_id" class="form-label required">
                            <i class="fas fa-list me-1"></i>Fasilitas
                        </label>
                        <select class="form-select @error('fasilitas_id') is-invalid @enderror" id="fasilitas_id" name="fasilitas_id" required>
                            <option value="">Pilih Fasilitas</option>
                            @foreach($fasilitas as $fasilita)
                            <option value="{{ $fasilita->id }}" {{ old('fasilitas_id') == $fasilita->id ? 'selected' : '' }}>
                                {{ $fasilita->nama }}
                            </option>
                            @endforeach
                        </select>
                        <div class="form-help">Pilih fasilitas mana yang akan ditambahkan galerinya</div>
                        @error('fasilitas_id')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div class="form-group">
                        <label for="gambar" class="form-label required">
                            <i class="fas fa-image me-1"></i>Gambar
                        </label>
                        <input type="file"
                            class="form-control @error('gambar') is-invalid @enderror"
                            id="gambar"
                            name="gambar"
                            accept="image/*"
                            required>
                        <div class="form-help">Format: JPG, PNG, GIF. Maksimal 2MB</div>
                        @error('gambar')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="status" class="form-label required">
                            <i class="fas fa-toggle-on me-1"></i>Status
                        </label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        <div class="form-help">Status tampil di website. Urutan akan diatur otomatis.</div>
                        @error('status')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="form-actions">
                    <a href="{{ route('admin.galeri-fasilitas.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i>Batal
                    </a>
                    <button type="submit" form="galeriForm" class="btn btn-primary" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Simpan Gambar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-info-circle me-2"></i>Informasi
                </h5>
            </div>
            <div class="card-body">
                <div class="info-item">
                    <i class="fas fa-images text-primary me-2"></i>
                    <strong>Galeri Fasilitas</strong>
                    <p class="text-muted mb-0">Hanya berisi gambar yang akan ditampilkan di bagian customer</p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-sort text-success me-2"></i>
                    <strong>Urutan Otomatis</strong>
                    <p class="text-muted mb-0">Gambar akan diurutkan berdasarkan waktu upload</p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-eye text-info me-2"></i>
                    <strong>Status</strong>
                    <p class="text-muted mb-0">Aktif = tampil di website, Tidak Aktif = disembunyikan</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Form validation
        const form = document.getElementById('galeriForm');
        const submitBtn = document.getElementById('submitBtn');

        if (form && submitBtn) {
            form.addEventListener('submit', function(e) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...';
                submitBtn.disabled = true;
            });
        }
    });
</script>
@endsection