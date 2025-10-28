@extends('admin.layouts.app')

@section('title', 'Galeri Sistem')
@section('page-title', 'Galeri Sistem')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-images me-2"></i>Galeri Sistem
                    </h5>
                    <a href="{{ route('admin.galeri-sistem.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Gambar
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if($galeri->count() > 0)
                <div class="row">
                    @foreach($galeri as $item)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <div class="card-img-top-container">
                                <img src="{{ $item->image_url }}"
                                    alt="Galeri Sistem"
                                    class="card-img-top"
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-overlay">
                                    <div class="card-overlay-content">
                                        <a href="{{ route('admin.galeri-sistem.show', $item) }}"
                                            class="btn btn-sm btn-outline-light me-1">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.galeri-sistem.edit', $item) }}"
                                            class="btn btn-sm btn-outline-light me-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.galeri-sistem.destroy', $item) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">{{ $item->sistem->nama ?? 'Sistem Tidak Ditemukan' }}</h6>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-{{ $item->status === 'active' ? 'success' : 'secondary' }}">
                                        {{ $item->status === 'active' ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                    <small class="text-muted">#{{ $item->urutan }}</small>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        {{ $item->created_at->format('d M Y') }}
                                    </small>
                                    <form action="{{ route('admin.galeri-sistem.toggle-status', $item) }}"
                                        method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-sm btn-{{ $item->status === 'active' ? 'warning' : 'success' }}">
                                            <i class="fas fa-{{ $item->status === 'active' ? 'eye-slash' : 'eye' }}"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-5">
                    <i class="fas fa-images fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada gambar galeri</h5>
                    <p class="text-muted">Klik tombol "Tambah Gambar" untuk menambahkan gambar pertama</p>
                    <a href="{{ route('admin.galeri-sistem.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Gambar Pertama
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card-img-top-container {
        position: relative;
        overflow: hidden;
    }

    .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .card-img-top-container:hover .card-overlay {
        opacity: 1;
    }

    .card-overlay-content {
        display: flex;
        gap: 5px;
    }

    .card-overlay .btn {
        border-radius: 50%;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }
</style>
@endsection