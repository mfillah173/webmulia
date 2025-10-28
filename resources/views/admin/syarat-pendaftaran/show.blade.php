@extends('admin.layouts.app')

@section('title', 'Detail Syarat Pendaftaran')
@section('page-title', 'Detail Syarat Pendaftaran')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-0">Detail Syarat Pendaftaran</h4>
        <p class="text-muted mb-0">{{ $syaratPendaftaran->nama_syarat }}</p>
    </div>
    <div>
        <a href="{{ route('admin.syarat-pendaftaran.edit', $syaratPendaftaran) }}" class="btn btn-warning">
            <i class="fas fa-edit me-2"></i>Edit
        </a>
        <a href="{{ route('admin.syarat-pendaftaran.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Informasi Syarat Pendaftaran</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Jenjang:</label>
                    <div>
                        <span class="badge {{ $syaratPendaftaran->jenjang === 'kindergarten' ? 'bg-primary' : 'bg-success' }}">
                            {{ $syaratPendaftaran->jenjang === 'kindergarten' ? 'Kindergarten' : 'Primary School' }}
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Syarat:</label>
                    <p class="mb-0">{{ $syaratPendaftaran->nama_syarat }}</p>
                </div>

                @if($syaratPendaftaran->deskripsi)
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi:</label>
                    <p class="mb-0">{{ $syaratPendaftaran->deskripsi }}</p>
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
                        <span class="badge {{ $syaratPendaftaran->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                            {{ $syaratPendaftaran->status === 'active' ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Urutan:</label>
                    <p class="mb-0">{{ $syaratPendaftaran->urutan }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Dibuat:</label>
                    <p class="mb-0">{{ $syaratPendaftaran->created_at->format('d F Y, H:i') }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Terakhir Diupdate:</label>
                    <p class="mb-0">{{ $syaratPendaftaran->updated_at->format('d F Y, H:i') }}</p>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Aksi</h5>

                <div class="d-grid gap-2">
                    <form action="{{ route('admin.syarat-pendaftaran.toggle-status', $syaratPendaftaran) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn {{ $syaratPendaftaran->status === 'active' ? 'btn-warning' : 'btn-success' }} w-100">
                            <i class="fas fa-toggle-{{ $syaratPendaftaran->status === 'active' ? 'off' : 'on' }} me-2"></i>
                            {{ $syaratPendaftaran->status === 'active' ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.syarat-pendaftaran.destroy', $syaratPendaftaran) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus syarat ini?')">
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