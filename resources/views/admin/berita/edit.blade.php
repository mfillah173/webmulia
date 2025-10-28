@extends('admin.layouts.app')

@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-edit me-2"></i>Edit Berita
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data" id="beritaForm">
                    @csrf
                    @method('PUT')

                    <!-- Judul -->
                    <div class="form-group">
                        <label for="judul" class="form-label required">
                            <i class="fas fa-heading me-1"></i>Judul Berita
                        </label>
                        <input type="text"
                            class="form-control @error('judul') is-invalid @enderror"
                            id="judul"
                            name="judul"
                            value="{{ old('judul', $berita->judul) }}"
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
                            <option value="Pendidikan" {{ old('kategori', $berita->kategori) == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                            <option value="Kegiatan" {{ old('kategori', $berita->kategori) == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                            <option value="Pengumuman" {{ old('kategori', $berita->kategori) == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                            <option value="Prestasi" {{ old('kategori', $berita->kategori) == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                            <option value="Lainnya" {{ old('kategori', $berita->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
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
                            value="{{ old('tanggal', $berita->tanggal->format('Y-m-d')) }}"
                            required>
                        <div class="form-help">Tanggal publikasi berita</div>
                        @error('tanggal')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Gambar Saat Ini -->
                    @if($berita->gambar)
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-image me-1"></i>Gambar Saat Ini
                        </label>
                        <div class="current-image">
                            <img src="{{ $berita->image_url }}"
                                alt="Gambar Saat Ini"
                                class="img-thumbnail"
                                style="max-width: 200px;">
                        </div>
                    </div>
                    @endif

                    <!-- Gambar Baru -->
                    <div class="form-group">
                        <label for="gambar" class="form-label">
                            <i class="fas fa-image me-1"></i>Gambar Baru
                        </label>
                        <input type="file"
                            class="form-control @error('gambar') is-invalid @enderror"
                            id="gambar"
                            name="gambar"
                            accept="image/*">
                        <div class="form-help">Format: JPG, PNG, GIF. Maksimal 2MB. Kosongkan jika tidak ingin mengubah gambar.</div>
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
                            required>{{ old('konten', $berita->konten) }}</textarea>
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
                            <option value="active" {{ old('status', $berita->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status', $berita->status) == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        <div class="form-help">Status tampil di website. Urutan: {{ $berita->urutan }} (otomatis)</div>
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
                        <i class="fas fa-save me-2"></i>Update Berita
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
                    <i class="fas fa-sort text-success me-2"></i>
                    <strong>Urutan</strong>
                    <p class="text-muted mb-0">#{{ $berita->urutan }} (otomatis berdasarkan waktu upload)</p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-calendar text-info me-2"></i>
                    <strong>Dibuat</strong>
                    <p class="text-muted mb-0">{{ $berita->created_at->format('d M Y H:i') }}</p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-edit text-warning me-2"></i>
                    <strong>Terakhir Diupdate</strong>
                    <p class="text-muted mb-0">{{ $berita->updated_at->format('d M Y H:i') }}</p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-link text-primary me-2"></i>
                    <strong>Slug</strong>
                    <p class="text-muted mb-0">{{ $berita->slug }}</p>
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
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengupdate...';
                submitBtn.disabled = true;
            });
        }
    });
</script>
@endsection