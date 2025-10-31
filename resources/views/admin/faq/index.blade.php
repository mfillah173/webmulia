@extends('admin.layouts.app')

@section('title', 'FAQ')
@section('page-title', 'FAQ')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">FAQ</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">Kelola FAQ</h1>
            <p class="page-subtitle">Kelola pertanyaan yang sering ditanyakan</p>
        </div>
        <a href="{{ route('admin.faq.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah FAQ
        </a>
    </div>
</div>

<!-- Search -->
<div class="card mb-4">
    <div class="card-body">
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-search"></i></span>
            <input type="text" class="form-control" id="searchInput" placeholder="Cari pertanyaan...">
        </div>
    </div>
</div>

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!-- FAQ List -->
@if($faq->count() > 0)
<div id="faqList">
    @foreach($faq as $item)
    <div class="card mb-3 faq-item" data-question="{{ strtolower($item->pertanyaan) }}">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ $item->short_question }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text mb-3">{{ $item->short_answer }}</p>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.faq.show', $item) }}" class="btn btn-sm btn-outline-info">
                    <i class="fas fa-eye"></i> Lihat
                </a>
                <a href="{{ route('admin.faq.edit', $item) }}" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('admin.faq.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus FAQ ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-4">
    {{ $faq->links() }}
</div>
@else
<div class="card">
    <div class="card-body text-center py-5">
        <i class="fas fa-question-circle fa-3x text-muted mb-3"></i>
        <p class="text-muted">Belum ada FAQ.</p>
    </div>
</div>
@endif

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        const items = document.querySelectorAll('.faq-item');

        items.forEach(item => {
            const question = item.dataset.question;
            if (question.includes(searchValue)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
@endsection