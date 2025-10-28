@extends('admin.layouts.app')

@section('title', 'Edit Gambar Galeri Sistem')
@section('page-title', 'Edit Gambar Galeri Sistem')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-edit me-2"></i>Edit Gambar Galeri Sistem
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.galeri-sistem.update', $galeriSistem) }}" method="POST" enctype="multipart/form-data" id="galeriForm">
                    @csrf
                    @method('PUT')

                    <!-- Sistem -->
                    <div class="form-group">
                        <label for="sistem_id" class="form-label required">
                            <i class="fas fa-list me-1"></i>Sistem
                        </label>
                        <select class="form-select @error('sistem_id') is-invalid @enderror" id="sistem_id" name="sistem_id" required>
                            <option value="">Pilih Sistem</option>
                            @foreach($sistems as $sistem)
                            <option value="{{ $sistem->id }}" {{ old('sistem_id', $galeriSistem->sistem_id) == $sistem->id ? 'selected' : '' }}>
                                {{ $sistem->nama }}
                            </option>
                            @endforeach
                        </select>
                        <div class="form-help">Pilih sistem mana yang akan ditambahkan galerinya</div>
                        @error('sistem_id')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Gambar Saat Ini -->
                    @if($galeriSistem->gambar)
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-image me-1"></i>Gambar Saat Ini
                        </label>
                        <div class="current-image">
                            <img src="{{ $galeriSistem->image_url }}"
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

                    <!-- Status -->
                    <div class="form-group">
                        <label for="status" class="form-label required">
                            <i class="fas fa-toggle-on me-1"></i>Status
                        </label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="active" {{ old('status', $galeriSistem->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status', $galeriSistem->status) == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        <div class="form-help">Status tampil di website. Urutan: {{ $galeriSistem->urutan }} (otomatis)</div>
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
                    <a href="{{ route('admin.galeri-sistem.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i>Batal
                    </a>
                    <button type="submit" form="galeriForm" class="btn btn-primary" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Update Gambar
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
                    <i class="fas fa-list text-primary me-2"></i>
                    <strong>Sistem Terpilih</strong>
                    <p class="text-muted mb-0">{{ $galeriSistem->sistem->nama ?? 'Sistem Tidak Ditemukan' }}</p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-sort text-success me-2"></i>
                    <strong>Urutan</strong>
                    <p class="text-muted mb-0">#{{ $galeriSistem->urutan }} (otomatis berdasarkan waktu upload)</p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-calendar text-info me-2"></i>
                    <strong>Dibuat</strong>
                    <p class="text-muted mb-0">{{ $galeriSistem->created_at->format('d M Y H:i') }}</p>
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
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengupdate...';
                submitBtn.disabled = true;
            });
        }
    });
</script>
@endsection