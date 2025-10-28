@extends('admin.layouts.app')

@section('title', 'Edit Sistem')
@section('page-title', 'Edit Sistem')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-0">Edit Sistem</h4>
        <p class="text-muted mb-0">Edit sistem: {{ $sistem->nama }}</p>
    </div>
    <a href="{{ route('admin.sistem.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.sistem.update', $sistem) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Sistem <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" name="nama" value="{{ old('nama', $sistem->nama) }}" required>
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                            id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $sistem->deskripsi) }}</textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="fitur" class="form-label">Fitur <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('fitur') is-invalid @enderror"
                            id="fitur" name="fitur" rows="4" required>{{ old('fitur', $sistem->fitur) }}</textarea>
                        @error('fitur')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="keunggulan" class="form-label">Keunggulan <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('keunggulan') is-invalid @enderror"
                            id="keunggulan" name="keunggulan" rows="4" required>{{ old('keunggulan', $sistem->keunggulan) }}</textarea>
                        @error('keunggulan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        @if($sistem->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/images/sistem/' . $sistem->gambar) }}"
                                alt="{{ $sistem->nama }}"
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
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="active" {{ old('status', $sistem->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status', $sistem->status) == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Urutan akan diatur otomatis berdasarkan waktu pembuatan</div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.sistem.index') }}" class="btn btn-secondary">
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