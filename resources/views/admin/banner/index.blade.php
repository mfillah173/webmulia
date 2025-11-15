@extends('admin.layouts.app')

@section('title', 'Banner Slider')
@section('page-title', 'Banner Slider')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Banner Slider</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">Kelola Banner Slider</h1>
            <p class="page-subtitle">Kelola gambar slider yang ditampilkan di halaman beranda</p>
        </div>
        <a href="{{ route('admin.banner.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Banner
        </a>
    </div>
</div>

<!-- Banner List -->
@if($banners->count() > 0)
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width: 80px;">Urutan</th>
                        <th>Gambar</th>
                        <th style="width: 100px;">Status</th>
                        <th style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody id="sortableList">
                    @foreach($banners as $banner)
                    <tr>
                        <td class="text-center">
                            <span class="badge bg-secondary">{{ $banner->urutan }}</span>
                        </td>
                        <td>
                            @if($banner->gambar)
                            <img src="{{ asset('storage/images/media/' . $banner->gambar) }}"
                                alt="Banner {{ $banner->urutan }}"
                                class="img-thumbnail"
                                style="max-height: 80px; width: auto;">
                            @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="width: 120px; height: 80px;">
                                <i class="fas fa-image fa-2x text-muted"></i>
                            </div>
                            @endif
                        </td>
                        <td>
                            @if($banner->aktif)
                            <span class="badge bg-success">Aktif</span>
                            @else
                            <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.banner.edit', $banner) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.banner.destroy', $banner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus banner ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-4">
    {{ $banners->links() }}
</div>
@else
<div class="card">
    <div class="card-body text-center py-5">
        <i class="fas fa-images fa-3x text-muted mb-3"></i>
        <p class="text-muted">Belum ada banner slider.</p>
        <a href="{{ route('admin.banner.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Banner Pertama
        </a>
    </div>
</div>
@endif

<div class="alert alert-info mt-4">
    <i class="fas fa-info-circle me-2"></i>
    <strong>Panduan Gambar Banner:</strong>
    <ul class="mb-0 mt-2">
        <li>Ukuran yang disarankan: 2000x700 pixels (landscape)</li>
        <li>Minimal resolusi: 1500x525 pixels</li>
        <li>Format: JPG, PNG</li>
        <li>Rasio: 2.85:1 (atau lebih lebar)</li>
        <li>Banner akan ditampilkan berurutan sesuai nomor urutan</li>
    </ul>
</div>
@endsection

