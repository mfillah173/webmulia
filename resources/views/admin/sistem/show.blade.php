@extends('admin.layouts.app')

@section('title', 'Detail Sistem')
@section('page-title', 'Detail Sistem')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-0">Detail Sistem</h4>
        <p class="text-muted mb-0">{{ $sistem->nama }}</p>
    </div>
    <div>
        <a href="{{ route('admin.sistem.edit', $sistem) }}" class="btn btn-warning">
            <i class="fas fa-edit me-2"></i>Edit
        </a>
        <a href="{{ route('admin.sistem.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Informasi Sistem</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Sistem:</label>
                    <p class="mb-0">{{ $sistem->nama }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Slug:</label>
                    <p class="mb-0"><code>{{ $sistem->slug }}</code></p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi:</label>
                    <p class="mb-0">{{ $sistem->deskripsi }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Fitur:</label>
                    <p class="mb-0">{{ $sistem->fitur }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Keunggulan:</label>
                    <p class="mb-0">{{ $sistem->keunggulan }}</p>
                </div>

                @if($sistem->meta_description)
                <div class="mb-3">
                    <label class="form-label fw-semibold">Meta Description:</label>
                    <p class="mb-0">{{ $sistem->meta_description }}</p>
                </div>
                @endif

                @if($sistem->meta_keywords && count($sistem->meta_keywords) > 0)
                <div class="mb-3">
                    <label class="form-label fw-semibold">Meta Keywords:</label>
                    <div class="mb-0">
                        @foreach($sistem->meta_keywords as $keyword)
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
                        <span class="badge {{ $sistem->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                            {{ $sistem->status === 'active' ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Urutan:</label>
                    <p class="mb-0">{{ $sistem->urutan }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Dibuat:</label>
                    <p class="mb-0">{{ $sistem->created_at->format('d F Y, H:i') }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Terakhir Diupdate:</label>
                    <p class="mb-0">{{ $sistem->updated_at->format('d F Y, H:i') }}</p>
                </div>

                @if($sistem->gambar)
                <div class="mb-3">
                    <label class="form-label fw-semibold">Gambar:</label>
                    <div>
                        <img src="{{ asset('storage/images/sistem/' . $sistem->gambar) }}"
                            alt="{{ $sistem->nama }}"
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
                    <form action="{{ route('admin.sistem.toggle-status', $sistem) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn {{ $sistem->status === 'active' ? 'btn-warning' : 'btn-success' }} w-100">
                            <i class="fas fa-toggle-{{ $sistem->status === 'active' ? 'off' : 'on' }} me-2"></i>
                            {{ $sistem->status === 'active' ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.sistem.destroy', $sistem) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus sistem ini?')">
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