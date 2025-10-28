@extends('admin.layouts.app')

@section('title', 'Tambah Berita')
@section('page-title', 'Tambah Berita')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-plus-circle me-2"></i>Tambah Berita
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" id="beritaForm">
                    @csrf

                    <!-- Judul -->
                    <div class="form-group">
                        <label for="judul" class="form-label required">
                            <i class="fas fa-heading me-1"></i>Judul Berita
                        </label>
                        <input type="text"
                            class="form-control @error('judul') is-invalid @enderror"
                            id="judul"
                            name="judul"
                            value="{{ old('judul') }}"
                            placeholder="Masukkan judul berita"
                            required>
                        <div class="form-help">Judul yang menarik akan meningkatkan minat pembaca</div>
                        @error('judul')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div class="form-group">
                        <label for="kategori" class="form-label required">
                            <i class="fas fa-tag me-1"></i>Kategori
                        </label>
                        <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Pendidikan" {{ old('kategori') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                            <option value="Kegiatan" {{ old('kategori') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                            <option value="Pengumuman" {{ old('kategori') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                            <option value="Prestasi" {{ old('kategori') == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                            <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        <div class="form-help">Pilih kategori yang sesuai dengan konten berita</div>
                        @error('kategori')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Tanggal -->
                    <div class="form-group">
                        <label for="tanggal" class="form-label required">
                            <i class="fas fa-calendar me-1"></i>Tanggal Berita
                        </label>
                        <input type="date"
                            class="form-control @error('tanggal') is-invalid @enderror"
                            id="tanggal"
                            name="tanggal"
                            value="{{ old('tanggal', date('Y-m-d')) }}"
                            required>
                        <div class="form-help">Tanggal publikasi berita</div>
                        @error('tanggal')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div class="form-group">
                        <label for="gambar" class="form-label">
                            <i class="fas fa-image me-1"></i>Gambar Berita
                        </label>
                        <input type="file"
                            class="form-control @error('gambar') is-invalid @enderror"
                            id="gambar"
                            name="gambar"
                            accept="image/*">
                        <div class="form-help">Format: JPG, PNG, GIF. Maksimal 2MB</div>
                        @error('gambar')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Konten -->
                    <div class="form-group">
                        <label for="konten" class="form-label required">
                            <i class="fas fa-edit me-1"></i>Konten Berita
                        </label>
                        <textarea class="form-control @error('konten') is-invalid @enderror"
                            id="konten"
                            name="konten"
                            rows="10"
                            placeholder="Tulis konten berita di sini..."
                            required>{{ old('konten') }}</textarea>
                        <div class="form-help">Gunakan HTML untuk formatting teks</div>
                        @error('konten')
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
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i>Batal
                    </a>
                    <button type="submit" form="beritaForm" class="btn btn-primary" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Simpan Berita
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
                    <i class="fas fa-newspaper text-primary me-2"></i>
                    <strong>Berita</strong>
                    <p class="text-muted mb-0">Konten berita yang akan ditampilkan di website</p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-sort text-success me-2"></i>
                    <strong>Urutan Otomatis</strong>
                    <p class="text-muted mb-0">Berita akan diurutkan berdasarkan waktu upload</p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-eye text-info me-2"></i>
                    <strong>Status</strong>
                    <p class="text-muted mb-0">Aktif = tampil di website, Tidak Aktif = disembunyikan</p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-tag text-warning me-2"></i>
                    <strong>Kategori</strong>
                    <p class="text-muted mb-0">Pilih kategori yang sesuai untuk pengelompokan</p>
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
        const form = document.getElementById('beritaForm');
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