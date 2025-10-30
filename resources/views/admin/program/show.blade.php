@extends('admin.layouts.app')

@section('title', 'Detail Program')
@section('page-title', 'Detail Program')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.program.index') }}">Program</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">Detail Program</h1>
            <p class="page-subtitle">{{ $program->nama }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.program.edit', $program) }}" class="btn btn-primary">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('admin.program.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Informasi Program</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="200">Nama Program:</th>
                        <td>{{ $program->nama }}</td>
                    </tr>
                    <tr>
                        <th>Slug:</th>
                        <td><code>{{ $program->slug }}</code></td>
                    </tr>
                    <tr>
                        <th>Dibuat:</th>
                        <td>{{ $program->created_at->format('d M Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Terakhir Diubah:</th>
                        <td>{{ $program->updated_at->format('d M Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-align-left me-2"></i>Deskripsi Program</h5>
            </div>
            <div class="card-body">
                <p class="mb-0">{{ $program->deskripsi }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-bullseye me-2"></i>Tujuan Program</h5>
            </div>
            <div class="card-body">
                <p class="mb-0">{{ $program->tujuan_program }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-image me-2"></i>Gambar</h5>
            </div>
            <div class="card-body text-center">
                @if($program->gambar)
                <img src="{{ asset('storage/images/program/' . $program->gambar) }}"
                    alt="{{ $program->nama }}"
                    class="img-fluid rounded">
                @else
                <div class="bg-light p-5 rounded">
                    <i class="fas fa-graduation-cap fa-5x text-muted"></i>
                    <p class="text-muted mt-3">Tidak ada gambar</p>
                </div>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-cogs me-2"></i>Aksi</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <form action="{{ route('admin.program.destroy', $program) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus program ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash me-2"></i>Hapus Program
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection