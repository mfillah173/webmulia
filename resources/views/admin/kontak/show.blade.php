@extends('admin.layouts.app')

@section('title', 'Detail Kontak')
@section('page-title', 'Detail Kontak')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.kontak.index') }}">Kontak</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">Detail Pesan Kontak</h1>
            <p class="page-subtitle">{{ $kontak->nama }}</p>
        </div>
        <a href="{{ route('admin.kontak.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <!-- Pesan -->
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-envelope me-2"></i>{{ $kontak->subjek }}</h5>
                    @if($kontak->status === 'unread')
                    <span class="badge bg-warning text-dark">Baru</span>
                    @else
                    <span class="badge bg-light text-dark">Sudah Dibaca</span>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="message-content">
                    <p style="white-space: pre-wrap;">{{ $kontak->pesan }}</p>
                </div>
            </div>
            <div class="card-footer text-muted">
                <small>
                    <i class="fas fa-clock me-1"></i>Dikirim pada: {{ $kontak->created_at->format('d M Y, H:i') }}
                    ({{ $kontak->created_at->diffForHumans() }})
                </small>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Info Pengirim -->
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-user me-2"></i>Informasi Pengirim</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th width="100">Nama:</th>
                        <td>{{ $kontak->nama }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>
                            <a href="mailto:{{ $kontak->email }}">{{ $kontak->email }}</a>
                        </td>
                    </tr>
                    @if($kontak->telepon)
                    <tr>
                        <th>Telepon:</th>
                        <td>
                            <a href="tel:{{ $kontak->telepon }}">{{ $kontak->telepon }}</a>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <th>Status:</th>
                        <td>
                            @if($kontak->status === 'unread')
                            <span class="badge bg-warning text-dark">Belum Dibaca</span>
                            @elseif($kontak->status === 'read')
                            <span class="badge bg-info">Sudah Dibaca</span>
                            @else
                            <span class="badge bg-success">Dibalas</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Actions -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-cogs me-2"></i>Aksi</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <!-- Email Reply Button -->
                    <a href="mailto:{{ $kontak->email }}?subject=Re: {{ $kontak->subjek }}"
                        class="btn btn-primary w-100">
                        <i class="fas fa-reply me-2"></i>Balas via Email
                    </a>

                    @if($kontak->telepon)
                    <!-- WhatsApp Button -->
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $kontak->telepon) }}"
                        target="_blank"
                        class="btn btn-success w-100">
                        <i class="fab fa-whatsapp me-2"></i>Hubungi via WhatsApp
                    </a>
                    @endif

                    <!-- Delete Button -->
                    <form action="{{ route('admin.kontak.destroy', $kontak) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash me-2"></i>Hapus Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Technical Info -->
        @if($kontak->ip_address || $kontak->user_agent)
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Info Teknis</h5>
            </div>
            <div class="card-body">
                @if($kontak->ip_address)
                <p class="mb-2"><small><strong>IP Address:</strong><br>{{ $kontak->ip_address }}</small></p>
                @endif
                @if($kontak->user_agent)
                <p class="mb-0"><small><strong>User Agent:</strong><br>{{ Str::limit($kontak->user_agent, 80) }}</small></p>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
@endsection