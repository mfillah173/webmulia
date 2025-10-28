@extends('admin.layouts.app')

@section('title', 'Detail Berita')
@section('page-title', 'Detail Berita')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-eye me-2"></i>Detail Berita
                    </h5>
                    <div class="btn-group">
                        <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Edit
                        </a>
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @if($berita->gambar)
                        <div class="image-container">
                            <img src="{{ $berita->image_url }}"
                                alt="{{ $berita->judul }}"
                                class="img-fluid rounded">
                        </div>
                        @else
                        <div class="image-container bg-light d-flex align-items-center justify-content-center"
                            style="height: 300px;">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="info-section">
                            <h6 class="info-title">
                                <i class="fas fa-heading me-2"></i>Judul
                            </h6>
                            <p class="info-value">{{ $berita->judul }}</p>

                            <h6 class="info-title">
                                <i class="fas fa-tag me-2"></i>Kategori
                            </h6>
                            <p class="info-value">
                                <span class="badge bg-primary">{{ $berita->kategori }}</span>
                            </p>

                            <h6 class="info-title">
                                <i class="fas fa-calendar me-2"></i>Tanggal
                            </h6>
                            <p class="info-value">{{ $berita->tanggal->format('d M Y') }}</p>

                            <h6 class="info-title">
                                <i class="fas fa-toggle-on me-2"></i>Status
                            </h6>
                            <p class="info-value">
                                <span class="badge bg-{{ $berita->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ $berita->status === 'active' ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </p>

                            <h6 class="info-title">
                                <i class="fas fa-sort me-2"></i>Urutan
                            </h6>
                            <p class="info-value">#{{ $berita->urutan }}</p>

                            <h6 class="info-title">
                                <i class="fas fa-link me-2"></i>Slug
                            </h6>
                            <p class="info-value">{{ $berita->slug }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <h6 class="info-title">
                        <i class="fas fa-edit me-2"></i>Konten
                    </h6>
                    <div class="content-preview">
                        {!! $berita->konten !!}
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <form action="{{ route('admin.berita.toggle-status', $berita) }}"
                        method="POST"
                        class="d-inline">
                        @csrf
                        <button type="submit"
                            class="btn btn-{{ $berita->status === 'active' ? 'warning' : 'success' }}">
                            <i class="fas fa-{{ $berita->status === 'active' ? 'eye-slash' : 'eye' }} me-2"></i>
                            {{ $berita->status === 'active' ? 'Sembunyikan' : 'Tampilkan' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.berita.destroy', $berita) }}"
                        method="POST"
                        class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-2"></i>Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-info-circle me-2"></i>Informasi Tambahan
                </h5>
            </div>
            <div class="card-body">
                <div class="info-item">
                    <i class="fas fa-calendar text-primary me-2"></i>
                    <strong>Dibuat</strong>
                    <p class="text-muted mb-0">{{ $berita->created_at->format('d M Y H:i') }}</p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-edit text-success me-2"></i>
                    <strong>Terakhir Diupdate</strong>
                    <p class="text-muted mb-0">{{ $berita->updated_at->format('d M Y H:i') }}</p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-link text-info me-2"></i>
                    <strong>URL Slug</strong>
                    <p class="text-muted mb-0">{{ $berita->slug }}</p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-sort text-warning me-2"></i>
                    <strong>Urutan</strong>
                    <p class="text-muted mb-0">#{{ $berita->urutan }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .image-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .image-container img {
        max-width: 100%;
        height: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .info-section {
        padding: 20px 0;
    }

    .info-title {
        font-size: 14px;
        font-weight: 600;
        color: var(--gray-600);
        margin-bottom: 5px;
        margin-top: 20px;
    }

    .info-title:first-child {
        margin-top: 0;
    }

    .info-value {
        font-size: 16px;
        color: var(--gray-800);
        margin-bottom: 0;
    }

    .info-item {
        padding: 15px 0;
        border-bottom: 1px solid var(--gray-200);
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .content-preview {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #e9ecef;
    }

    .content-preview h1,
    .content-preview h2,
    .content-preview h3,
    .content-preview h4,
    .content-preview h5,
    .content-preview h6 {
        color: var(--gray-800);
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .content-preview p {
        margin-bottom: 15px;
        line-height: 1.6;
    }

    .content-preview img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
    }
</style>
@endsection