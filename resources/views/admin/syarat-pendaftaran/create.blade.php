@extends('admin.layouts.app')

@section('title', 'Tambah Syarat Pendaftaran')
@section('page-title', 'Tambah Syarat Pendaftaran')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-0">Tambah Syarat Pendaftaran Baru</h4>
        <p class="text-muted mb-0">Tambahkan syarat pendaftaran untuk jenjang tertentu</p>
    </div>
    <a href="{{ route('admin.syarat-pendaftaran.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.syarat-pendaftaran.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jenjang" class="form-label">Jenjang <span class="text-danger">*</span></label>
                        <select class="form-select @error('jenjang') is-invalid @enderror" id="jenjang" name="jenjang" required>
                            <option value="">Pilih Jenjang</option>
                            <option value="kindergarten" {{ old('jenjang') === 'kindergarten' ? 'selected' : '' }}>Kindergarten</option>
                            <option value="primary" {{ old('jenjang') === 'primary' ? 'selected' : '' }}>Primary School</option>
                        </select>
                        @error('jenjang')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_syarat" class="form-label">Nama Syarat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_syarat') is-invalid @enderror"
                            id="nama_syarat" name="nama_syarat" value="{{ old('nama_syarat') }}" required>
                        @error('nama_syarat')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                            id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="urutan" class="form-label">Urutan <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('urutan') is-invalid @enderror"
                            id="urutan" name="urutan" value="{{ old('urutan', 0) }}" min="0" required>
                        @error('urutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Urutan tampil di halaman website</div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.syarat-pendaftaran.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection