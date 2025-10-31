@extends('admin.layouts.app')

@section('title', 'Testimoni')
@section('page-title', 'Testimoni')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Testimoni</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">Kelola Testimoni</h1>
            <p class="page-subtitle">Kelola testimoni dari pengguna website</p>
        </div>
        <a href="{{ route('admin.testimoni.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Testimoni
        </a>
    </div>
</div>

<!-- Search -->
<div class="card mb-4">
    <div class="card-body">
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-search"></i></span>
            <input type="text" class="form-control" id="searchInput" placeholder="Cari nama atau jabatan...">
        </div>
    </div>
</div>

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!-- Testimoni Grid -->
@if($testimoni->count() > 0)
<div class="row g-4" id="testimoniGrid">
    @foreach($testimoni as $item)
    <div class="col-md-6 col-lg-4 testimoni-item"
        data-name="{{ strtolower($item->nama_narasumber . ' ' . $item->jabatan) }}">
        <div class="card h-100">
            @if($item->gambar)
            <img src="{{ asset('storage/images/testimoni/' . $item->gambar) }}"
                class="card-img-top"
                alt="{{ $item->nama_narasumber }}"
                style="height: 200px; object-fit: cover;">
            @else
            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                <i class="fas fa-user fa-3x text-muted"></i>
            </div>
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $item->nama_narasumber }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $item->jabatan }}</h6>
                <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
            </div>
            <div class="card-footer bg-transparent">
                <div class="d-flex gap-2 justify-content-center">
                    <a href="{{ route('admin.testimoni.show', $item) }}" class="btn btn-sm btn-outline-info">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                    <a href="{{ route('admin.testimoni.edit', $item) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.testimoni.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-4">
    {{ $testimoni->links() }}
</div>
@else
<div class="card">
    <div class="card-body text-center py-5">
        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
        <p class="text-muted">Belum ada testimoni.</p>
    </div>
</div>
@endif

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        const items = document.querySelectorAll('.testimoni-item');

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