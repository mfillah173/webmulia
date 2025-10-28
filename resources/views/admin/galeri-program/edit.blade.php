@extends('admin.layouts.app')

@section('title', 'Edit Gambar Galeri Program')
@section('page-title', 'Edit Gambar Galeri Program')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-edit me-2"></i>Edit Gambar Galeri Program
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.galeri-program.update', $galeriProgram) }}" method="POST" enctype="multipart/form-data" id="galeriForm">
                    @csrf
                    @method('PUT')

                    <!-- Program -->
                    <div class="form-group">
                        <label for="program_id" class="form-label required">
                            <i class="fas fa-list me-1"></i>Program
                        </label>
                        <select class="form-select @error('program_id') is-invalid @enderror" id="program_id" name="program_id" required>
                            <option value="">Pilih Program</option>
                            @foreach($programs as $program)
                            <option value="{{ $program->id }}" {{ old('program_id', $galeriProgram->program_id) == $program->id ? 'selected' : '' }}>
                                {{ $program->nama }}
                            </option>
                            @endforeach
                        </select>
                        <div class="form-help">Pilih program mana yang akan ditambahkan galerinya</div>
                        @error('program_id')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Gambar Saat Ini -->
                    @if($galeriProgram->gambar)
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-image me-1"></i>Gambar Saat Ini
                        </label>
                        <div class="current-image">
                            <img src="{{ $galeriProgram->image_url }}"
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
                            <option value="active" {{ old('status', $galeriProgram->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status', $galeriProgram->status) == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        <div class="form-help">Status tampil di website. Urutan: {{ $galeriProgram->urutan }} (otomatis)</div>
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
                    <a href="{{ route('admin.galeri-program.index') }}" class="btn btn-outline-secondary">
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
                    <strong>Program Terpilih</strong>
                    <p class="text-muted mb-0">{{ $galeriProgram->program->nama ?? 'Program Tidak Ditemukan' }}</p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-sort text-success me-2"></i>
                    <strong>Urutan</strong>
                    <p class="text-muted mb-0">#{{ $galeriProgram->urutan }} (otomatis berdasarkan waktu upload)</p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-calendar text-info me-2"></i>
                    <strong>Dibuat</strong>
                    <p class="text-muted mb-0">{{ $galeriProgram->created_at->format('d M Y H:i') }}</p>
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