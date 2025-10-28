@extends('admin.layouts.app')

@section('title', 'Edit Program')
@section('page-title', 'Edit Program')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-0">Edit Program</h4>
        <p class="text-muted mb-0">Edit program: {{ $program->nama }}</p>
    </div>
    <a href="{{ route('admin.program.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.program.update', $program) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Program <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" name="nama" value="{{ old('nama', $program->nama) }}" required>
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                            id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $program->deskripsi) }}</textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tujuan" class="form-label">Tujuan Program <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('tujuan') is-invalid @enderror"
                            id="tujuan" name="tujuan" rows="4" required>{{ old('tujuan', $program->tujuan) }}</textarea>
                        @error('tujuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="metode" class="form-label">Metode Pembelajaran <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('metode') is-invalid @enderror"
                            id="metode" name="metode" rows="4" required>{{ old('metode', $program->metode) }}</textarea>
                        @error('metode')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        @if($program->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/images/program/' . $program->gambar) }}"
                                alt="{{ $program->nama }}"
                                class="img-thumbnail"
                                style="width: 100%; max-width: 200px;">
                            <div class="form-text">Gambar saat ini</div>
                        </div>
                        @endif
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                            id="gambar" name="gambar" accept="image/*">
                        @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB</div>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="active" {{ old('status', $program->status) === 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status', $program->status) === 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="active" {{ old('status', $program->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status', $program->status) == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Urutan: {{ $program->urutan }} (otomatis berdasarkan waktu pembuatan)</div>
                    </div>

                    <div class="mb-3">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control @error('meta_description') is-invalid @enderror"
                            id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $program->meta_description) }}</textarea>
                        @error('meta_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Maksimal 160 karakter</div>
                    </div>

                    <div class="mb-3">
                        <label for="meta_keywords" class="form-label">Meta Keywords</label>
                        <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror"
                            id="meta_keywords" name="meta_keywords"
                            value="{{ old('meta_keywords', is_array($program->meta_keywords) ? implode(', ', $program->meta_keywords) : $program->meta_keywords) }}"
                            placeholder="keyword1, keyword2, keyword3">
                        @error('meta_keywords')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Pisahkan dengan koma</div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.program.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection