@extends('admin.layouts.app')

@section('title', 'Detail Fasilitas')
@section('page-title', 'Detail Fasilitas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-0">Detail Fasilitas</h4>
        <p class="text-muted mb-0">{{ $fasilitas->nama }}</p>
    </div>
    <div>
        <a href="{{ route('admin.fasilitas.edit', $fasilitas) }}" class="btn btn-warning">
            <i class="fas fa-edit me-2"></i>Edit
        </a>
        <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Informasi Fasilitas</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Fasilitas:</label>
                    <p class="mb-0">{{ $fasilitas->nama }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Slug:</label>
                    <p class="mb-0"><code>{{ $fasilitas->slug }}</code></p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi:</label>
                    <p class="mb-0">{{ $fasilitas->deskripsi }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Fitur:</label>
                    <p class="mb-0">{{ $fasilitas->fitur }}</p>
                </div>

                @if($fasilitas->meta_description)
                <div class="mb-3">
                    <label class="form-label fw-semibold">Meta Description:</label>
                    <p class="mb-0">{{ $fasilitas->meta_description }}</p>
                </div>
                @endif

                @if($fasilitas->meta_keywords && count($fasilitas->meta_keywords) > 0)
                <div class="mb-3">
                    <label class="form-label fw-semibold">Meta Keywords:</label>
                    <div class="mb-0">
                        @foreach($fasilitas->meta_keywords as $keyword)
                        <span class="badge bg-secondary me-1">{{ $keyword }}</span>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detail</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status:</label>
                    <div>
                        <span class="badge {{ $fasilitas->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                            {{ $fasilitas->status === 'active' ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Urutan:</label>
                    <p class="mb-0">{{ $fasilitas->urutan }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Dibuat:</label>
                    <p class="mb-0">{{ $fasilitas->created_at->format('d F Y, H:i') }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Terakhir Diupdate:</label>
                    <p class="mb-0">{{ $fasilitas->updated_at->format('d F Y, H:i') }}</p>
                </div>

                @if($fasilitas->gambar)
                <div class="mb-3">
                    <label class="form-label fw-semibold">Gambar:</label>
                    <div>
                        <img src="{{ asset('storage/images/fasilitas/' . $fasilitas->gambar) }}"
                            alt="{{ $fasilitas->nama }}"
                            class="img-fluid rounded">
                    </div>
                </div>
                @endif
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Aksi</h5>

                <div class="d-grid gap-2">
                    <form action="{{ route('admin.fasilitas.toggle-status', $fasilitas) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn {{ $fasilitas->status === 'active' ? 'btn-warning' : 'btn-success' }} w-100">
                            <i class="fas fa-toggle-{{ $fasilitas->status === 'active' ? 'off' : 'on' }} me-2"></i>
                            {{ $fasilitas->status === 'active' ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.fasilitas.destroy', $fasilitas) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash me-2"></i>Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection