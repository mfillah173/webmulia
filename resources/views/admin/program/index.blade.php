@extends('admin.layouts.app')

@section('title', 'Program')
@section('page-title', 'Program')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Program</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">Kelola Program</h1>
            <p class="page-subtitle">Kelola program pembelajaran website</p>
        </div>
        <a href="{{ route('admin.program.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Program
        </a>
    </div>
</div>

<!-- Search -->
<div class="card mb-4">
    <div class="card-body">
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-search"></i></span>
            <input type="text" class="form-control" id="searchInput" placeholder="Cari program...">
        </div>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!-- Programs Grid -->
@if($programs->count() > 0)
<div class="row g-4" id="programsGrid">
    @foreach($programs as $program)
    <div class="col-md-6 col-lg-4 program-item" data-name="{{ strtolower($program->nama) }}">
        <div class="card h-100">
            @if($program->gambar)
            <img src="{{ asset('storage/images/program/' . $program->gambar) }}"
                class="card-img-top"
                alt="{{ $program->nama }}"
                style="height: 200px; object-fit: cover;">
            @else
            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                <i class="fas fa-graduation-cap fa-3x text-muted"></i>
            </div>
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $program->nama }}</h5>
                <p class="card-text">{{ Str::limit($program->deskripsi, 100) }}</p>
            </div>
            <div class="card-footer bg-transparent">
                <div class="d-flex gap-2 justify-content-center">
                    <a href="{{ route('admin.program.show', $program) }}" class="btn btn-sm btn-outline-info">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.program.edit', $program) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.program.destroy', $program) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus program ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-4">
    {{ $programs->links() }}
</div>
@else
<div class="card">
    <div class="card-body text-center py-5">
        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
        <p class="text-muted">Belum ada program. <a href="{{ route('admin.program.create') }}">Tambah program</a></p>
    </div>
</div>
@endif

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        const items = document.querySelectorAll('.program-item');

        items.forEach(item => {
            const name = item.dataset.name;
            if (name.includes(searchValue)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
@endsection