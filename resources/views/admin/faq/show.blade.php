@extends('admin.layouts.app')

@section('title', 'Detail FAQ')
@section('page-title', 'Detail FAQ')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.faq.index') }}">FAQ</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">Detail FAQ</h1>
            <p class="page-subtitle">Informasi lengkap FAQ</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.faq.edit', $faq) }}" class="btn btn-primary">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('admin.faq.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Informasi FAQ</h5>
    </div>
    <div class="card-body">
        <table class="table table-borderless">
            <tr>
            </tr>
            <tr>
                <th>Dibuat:</th>
                <td>{{ $faq->created_at->format('d M Y H:i') }}</td>
            </tr>
            <tr>
                <th>Terakhir Diubah:</th>
                <td>{{ $faq->updated_at->format('d M Y H:i') }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="fas fa-question-circle me-2"></i>Pertanyaan</h5>
    </div>
    <div class="card-body">
        <p class="mb-0">{{ $faq->pertanyaan }}</p>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0"><i class="fas fa-check-circle me-2"></i>Jawaban</h5>
    </div>
    <div class="card-body">
        <p class="mb-0">{{ $faq->jawaban }}</p>
    </div>
</div>
@endsection