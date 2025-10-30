@extends('admin.layouts.app')

@section('title', 'Tambah FAQ')
@section('page-title', 'Tambah FAQ')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.faq.index') }}">FAQ</a></li>
        <li class="breadcrumb-item active">Tambah FAQ</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header mb-4">
    <h1 class="page-title">Tambah FAQ Baru</h1>
    <p class="page-subtitle">Tambahkan pertanyaan yang sering ditanyakan</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.faq.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="pertanyaan" class="form-label">Pertanyaan <span class="text-danger">*</span></label>
                <textarea class="form-control @error('pertanyaan') is-invalid @enderror"
                    id="pertanyaan" name="pertanyaan" rows="3" required>{{ old('pertanyaan') }}</textarea>
                @error('pertanyaan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jawaban" class="form-label">Jawaban <span class="text-danger">*</span></label>
                <textarea class="form-control @error('jawaban') is-invalid @enderror"
                    id="jawaban" name="jawaban" rows="5" required>{{ old('jawaban') }}</textarea>
                @error('jawaban')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan
                </button>
                <a href="{{ route('admin.faq.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection