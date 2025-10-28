@extends('admin.layouts.app')

@section('title', 'Detail Gambar Galeri Fasilitas')
@section('page-title', 'Detail Gambar Galeri Fasilitas')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-eye me-2"></i>Detail Gambar Galeri Fasilitas
                    </h5>
                    <div class="btn-group">
                        <a href="{{ route('admin.galeri-fasilitas.edit', $galeriFasilitas) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Edit
                        </a>
                        <a href="{{ route('admin.galeri-fasilitas.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image-container">
                            <img src="{{ $galeriFasilitas->image_url }}"
                                alt="Gambar Galeri Fasilitas"
                                class="img-fluid rounded">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-section">
                            <h6 class="info-title">
                                <i class="fas fa-list me-2"></i>Fasilitas
                            </h6>
                            <p class="info-value">{{ $galeriFasilitas->fasilitas->nama ?? 'Fasilitas Tidak Ditemukan' }}</p>

                            <h6 class="info-title">
                                <i class="fas fa-toggle-on me-2"></i>Status
                            </h6>
                            <p class="info-value">
                                <span class="badge bg-{{ $galeriFasilitas->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ $galeriFasilitas->status === 'active' ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </p>

                            <h6 class="info-title">
                                <i class="fas fa-sort me-2"></i>Urutan
                            </h6>
                            <p class="info-value">#{{ $galeriFasilitas->urutan }}</p>

                            <h6 class="info-title">
                                <i class="fas fa-calendar me-2"></i>Dibuat
                            </h6>
                            <p class="info-value">{{ $galeriFasilitas->created_at->format('d M Y H:i') }}</p>

                            <h6 class="info-title">
                                <i class="fas fa-edit me-2"></i>Terakhir Diupdate
                            </h6>
                            <p class="info-value">{{ $galeriFasilitas->updated_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <form action="{{ route('admin.galeri-fasilitas.toggle-status', $galeriFasilitas) }}"
                        method="POST"
                        class="d-inline">
                        @csrf
                        <button type="submit"
                            class="btn btn-{{ $galeriFasilitas->status === 'active' ? 'warning' : 'success' }}">
                            <i class="fas fa-{{ $galeriFasilitas->status === 'active' ? 'eye-slash' : 'eye' }} me-2"></i>
                            {{ $galeriFasilitas->status === 'active' ? 'Sembunyikan' : 'Tampilkan' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.galeri-fasilitas.destroy', $galeriFasilitas) }}"
                        method="POST"
                        class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
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
                    <i class="fas fa-info-circle me-2"></i>Informasi Fasilitas
                </h5>
            </div>
            <div class="card-body">
                @if($galeriFasilitas->fasilitas)
                <div class="info-item">
                    <i class="fas fa-list text-primary me-2"></i>
                    <strong>{{ $galeriFasilitas->fasilitas->nama }}</strong>
                    <p class="text-muted mb-0">{{ Str::limit($galeriFasilitas->fasilitas->deskripsi, 100) }}</p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-toggle-on text-success me-2"></i>
                    <strong>Status Fasilitas</strong>
                    <p class="text-muted mb-0">
                        <span class="badge bg-{{ $galeriFasilitas->fasilitas->status === 'active' ? 'success' : 'secondary' }}">
                            {{ $galeriFasilitas->fasilitas->status === 'active' ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </p>
                </div>

                <div class="info-item mt-3">
                    <i class="fas fa-sort text-info me-2"></i>
                    <strong>Urutan Fasilitas</strong>
                    <p class="text-muted mb-0">#{{ $galeriFasilitas->fasilitas->urutan }}</p>
                </div>
                @else
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Fasilitas tidak ditemukan atau sudah dihapus
                </div>
                @endif
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
</style>
@endsection