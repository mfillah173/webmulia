@extends('admin.layouts.app')

@section('title', 'Tambah Testimoni')
@section('page-title', 'Tambah Testimoni')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.testimoni.index') }}">Testimoni</a></li>
        <li class="breadcrumb-item active">Tambah Testimoni</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header mb-4">
    <h1 class="page-title">Tambah Testimoni Baru</h1>
    <p class="page-subtitle">Tambahkan testimoni baru ke website</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.testimoni.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama_narasumber" class="form-label">Nama Narasumber <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama_narasumber') is-invalid @enderror"
                    id="nama_narasumber" name="nama_narasumber" value="{{ old('nama_narasumber') }}" required>
                @error('nama_narasumber')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                    id="jabatan" name="jabatan" value="{{ old('jabatan') }}" required>
                @error('jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Testimoni <span class="text-danger">*</span></label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                    id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Foto</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                    id="gambar" name="gambar" accept="image/*">
                @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Format: JPG, JPEG, PNG, GIF. Maksimal 2MB</div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan
                </button>
                <a href="{{ route('admin.testimoni.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection