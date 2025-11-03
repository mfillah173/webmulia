@extends('admin.layouts.app')

@section('title', 'Detail Testimoni')
@section('page-title', 'Detail Testimoni')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.testimoni.index') }}">Testimoni</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">Detail Testimoni</h1>
            <p class="page-subtitle">Informasi lengkap testimoni</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.testimoni.edit', $testimoni) }}" class="btn btn-primary">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('admin.testimoni.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Foto</h5>
            </div>
            <div class="card-body text-center">
                @if($testimoni->gambar)
                <img src="{{ asset('storage/images/media/' . $testimoni->gambar) }}"
                    alt="{{ $testimoni->nama_narasumber }}"
                    class="img-fluid rounded">
                @else
                <div class="bg-light p-5 rounded">
                    <i class="fas fa-user fa-5x text-muted"></i>
                    <p class="text-muted mt-3">Tidak ada foto</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Informasi Testimoni</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="200">Nama Narasumber:</th>
                        <td>{{ $testimoni->nama_narasumber }}</td>
                    </tr>
                    <tr>
                        <th>Jabatan:</th>
                        <td>{{ $testimoni->jabatan }}</td>
                    </tr>
                    <tr>
                        <th>Dibuat:</th>
                        <td>{{ $testimoni->created_at->format('d M Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Terakhir Diubah:</th>
                        <td>{{ $testimoni->updated_at->format('d M Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">Testimoni</h5>
            </div>
            <div class="card-body">
                <p class="mb-0">{{ $testimoni->deskripsi }}</p>
            </div>
        </div>
    </div>
</div>
@endsection