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
    <div class="page-header-content">
        <div class="page-header-text">
            <h1 class="page-title">Kelola Program</h1>
            <p class="page-subtitle">Kelola program pembelajaran website</p>
        </div>
        <div class="page-header-actions">
            <a href="{{ route('admin.program.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Program
            </a>
        </div>
    </div>
</div>

<!-- Filters & Search -->
<div class="filters-card mb-4">
    <div class="filters-content">
        <div class="filters-left">
            <div class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Cari program..." id="searchInput">
            </div>
        </div>
        <div class="filters-right">
            <div class="filter-group">
                <label class="filter-label">Status:</label>
                <select class="filter-select" id="statusFilter">
                    <option value="">Semua Status</option>
                    <option value="active">Aktif</option>
                    <option value="inactive">Tidak Aktif</option>
                </select>
            </div>
            <div class="filter-group">
                <label class="filter-label">Urutan:</label>
                <select class="filter-select" id="sortFilter">
                    <option value="urutan_asc">Urutan ↑</option>
                    <option value="urutan_desc">Urutan ↓</option>
                    <option value="nama_asc">Nama A-Z</option>
                    <option value="nama_desc">Nama Z-A</option>
                    <option value="created_desc">Terbaru</option>
                    <option value="created_asc">Terlama</option>
                </select>
            </div>
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
<div class="programs-grid" id="programsGrid">
    @foreach($programs as $program)
    <div class="program-card" data-status="{{ $program->status }}" data-name="{{ strtolower($program->nama) }}">
        <div class="program-card-header">
            <div class="program-image">
                @if($program->gambar)
                <img src="{{ asset('storage/images/program/' . $program->gambar) }}"
                    alt="{{ $program->nama }}"
                    class="program-img">
                @else
                <div class="program-img-placeholder">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                @endif
            </div>
            <div class="program-status">
                <form action="{{ route('admin.program.toggle-status', $program) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="status-toggle {{ $program->status === 'active' ? 'status-active' : 'status-inactive' }}">
                        <i class="fas {{ $program->status === 'active' ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="program-card-body">
            <div class="program-info">
                <h3 class="program-title">{{ $program->nama }}</h3>
                <p class="program-description">{{ Str::limit($program->deskripsi, 100) }}</p>
            </div>

            <div class="program-meta">
                <div class="meta-item">
                    <i class="fas fa-sort-numeric-up me-1"></i>
                    <span>Urutan: {{ $program->urutan }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-calendar me-1"></i>
                    <span>{{ $program->created_at->format('d M Y') }}</span>
                </div>
            </div>
        </div>

        <div class="program-card-footer">
            <div class="program-actions">
                <a href="{{ route('admin.program.show', $program) }}"
                    class="btn btn-outline-info btn-sm"
                    title="Lihat Detail">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('admin.program.edit', $program) }}"
                    class="btn btn-outline-warning btn-sm"
                    title="Edit Program">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.program.destroy', $program) }}"
                    method="POST"
                    class="d-inline"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus program ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="btn btn-outline-danger btn-sm"
                        title="Hapus Program">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Pagination -->
<div class="pagination-wrapper">
    {{ $programs->links() }}
</div>

@else
<!-- Empty State -->
<div class="empty-state">
    <div class="empty-state-content">
        <div class="empty-state-icon">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <h3 class="empty-state-title">Belum ada program</h3>
        <p class="empty-state-subtitle">Mulai dengan menambahkan program pembelajaran pertama</p>
        <a href="{{ route('admin.program.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Program Pertama
        </a>
    </div>
</div>
@endif
@endsection

@section('styles')
<style>
    /* Design System Variables */
    :root {
        --primary-color: #3b82f6;
        --primary-dark: #2563eb;
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --info-color: #06b6d4;
        --gray-50: #f9fafb;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-300: #d1d5db;
        --gray-400: #9ca3af;
        --gray-500: #6b7280;
        --gray-600: #4b5563;
        --gray-700: #374151;
        --gray-800: #1f2937;
        --gray-900: #111827;
        --spacing-xs: 0.25rem;
        --spacing-sm: 0.5rem;
        --spacing-md: 1rem;
        --spacing-lg: 1.5rem;
        --spacing-xl: 2rem;
        --spacing-2xl: 3rem;
        --border-radius: 0.5rem;
        --border-radius-lg: 0.75rem;
        --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    }

    /* Breadcrumb */
    .breadcrumb {
        background: transparent;
        padding: 0;
        margin-bottom: var(--spacing-xl);
    }

    .breadcrumb-item a {
        color: var(--primary-color);
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: var(--gray-600);
    }

    /* Page Header */
    .page-header {
        margin-bottom: var(--spacing-xl);
    }

    .page-header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .page-title {
        font-size: 1.875rem;
        font-weight: 700;
        color: var(--gray-800);
        margin-bottom: var(--spacing-sm);
    }

    .page-subtitle {
        color: var(--gray-500);
        margin-bottom: 0;
    }

    /* Filters */
    .filters-card {
        background: white;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--gray-200);
        padding: var(--spacing-lg);
    }

    .filters-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: var(--spacing-lg);
    }

    .filters-left {
        flex: 1;
    }

    .search-box {
        position: relative;
        max-width: 400px;
    }

    .search-icon {
        position: absolute;
        left: var(--spacing-md);
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-400);
        font-size: 0.875rem;
    }

    .search-input {
        width: 100%;
        padding: var(--spacing-md) var(--spacing-md) var(--spacing-md) 2.5rem;
        border: 1px solid var(--gray-300);
        border-radius: var(--border-radius);
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }

    .search-input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        outline: none;
    }

    .filters-right {
        display: flex;
        gap: var(--spacing-lg);
        align-items: center;
    }

    .filter-group {
        display: flex;
        align-items: center;
        gap: var(--spacing-sm);
    }

    .filter-label {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--gray-600);
        margin-bottom: 0;
    }

    .filter-select {
        padding: var(--spacing-sm) var(--spacing-md);
        border: 1px solid var(--gray-300);
        border-radius: var(--border-radius);
        font-size: 0.875rem;
        background: white;
        min-width: 120px;
    }

    .filter-select:focus {
        border-color: var(--primary-color);
        outline: none;
    }

    /* Programs Grid */
    .programs-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: var(--spacing-xl);
        margin-bottom: var(--spacing-2xl);
    }

    .program-card {
        background: white;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .program-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary-color);
    }

    .program-card-header {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .program-image {
        width: 100%;
        height: 100%;
    }

    .program-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .program-card:hover .program-img {
        transform: scale(1.05);
    }

    .program-img-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--gray-100) 0%, var(--gray-200) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gray-400);
        font-size: 3rem;
    }

    .program-status {
        position: absolute;
        top: var(--spacing-md);
        right: var(--spacing-md);
    }

    .status-toggle {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.875rem;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .status-active {
        background: var(--success-color) !important;
        color: white !important;
    }

    .status-inactive {
        background: var(--gray-400) !important;
        color: white !important;
    }

    .status-toggle:hover {
        transform: scale(1.1);
    }

    .program-card-body {
        padding: var(--spacing-lg);
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .program-info {
        margin-bottom: var(--spacing-md);
    }

    .program-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: var(--spacing-sm);
        line-height: 1.4;
    }

    .program-description {
        font-size: 0.875rem;
        color: var(--gray-600);
        line-height: 1.5;
        margin-bottom: 0;
        word-wrap: break-word;
        word-break: break-word;
        overflow-wrap: break-word;
        hyphens: auto;
    }

    .program-meta {
        margin-top: auto;
        padding-top: var(--spacing-md);
        border-top: 1px solid var(--gray-200);
    }

    .meta-item {
        display: flex;
        align-items: center;
        font-size: 0.75rem;
        color: var(--gray-500);
        margin-bottom: var(--spacing-xs);
    }

    .meta-item:last-child {
        margin-bottom: 0;
    }

    .program-card-footer {
        padding: var(--spacing-lg);
        border-top: 1px solid var(--gray-200);
        background: var(--gray-50);
    }

    .program-actions {
        display: flex;
        gap: var(--spacing-sm);
        justify-content: center;
    }

    .program-actions .btn {
        padding: var(--spacing-sm);
        font-size: 0.875rem;
        border-radius: var(--border-radius);
        transition: all 0.2s ease;
    }

    .program-actions .btn:hover {
        transform: translateY(-1px);
    }

    /* Pagination */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: var(--spacing-2xl);
    }

    .pagination {
        display: flex;
        gap: var(--spacing-sm);
    }

    .page-link {
        padding: var(--spacing-sm) var(--spacing-md);
        border: 1px solid var(--gray-300);
        border-radius: var(--border-radius);
        color: var(--gray-600);
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .page-link:hover {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }

    .page-item.active .page-link {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }

    /* Empty State */
    .empty-state {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 400px;
        background: white;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--gray-200);
    }

    .empty-state-content {
        text-align: center;
        max-width: 400px;
    }

    .empty-state-icon {
        font-size: 4rem;
        color: var(--gray-300);
        margin-bottom: var(--spacing-lg);
    }

    .empty-state-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: var(--spacing-md);
    }

    .empty-state-subtitle {
        color: var(--gray-500);
        margin-bottom: var(--spacing-xl);
    }

    /* Alerts */
    .alert {
        border-radius: var(--border-radius);
        border: none;
        padding: var(--spacing-md) var(--spacing-lg);
        margin-bottom: var(--spacing-lg);
    }

    .alert-success {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
        border-left: 4px solid var(--success-color);
    }

    .alert-danger {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
        border-left: 4px solid var(--danger-color);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header-content {
            flex-direction: column;
            align-items: flex-start;
            gap: var(--spacing-md);
        }

        .filters-content {
            flex-direction: column;
            align-items: stretch;
            gap: var(--spacing-md);
        }

        .filters-right {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-group {
            justify-content: space-between;
        }

        .programs-grid {
            grid-template-columns: 1fr;
            gap: var(--spacing-lg);
        }

        .program-actions {
            flex-wrap: wrap;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const sortFilter = document.getElementById('sortFilter');
        const programsGrid = document.getElementById('programsGrid');
        const programCards = document.querySelectorAll('.program-card');

        // Search functionality
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            filterPrograms();
        });

        // Status filter
        statusFilter.addEventListener('change', function() {
            filterPrograms();
        });

        // Sort functionality
        sortFilter.addEventListener('change', function() {
            sortPrograms();
        });

        function filterPrograms() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value;

            programCards.forEach(card => {
                const programName = card.dataset.name;
                const programStatus = card.dataset.status;

                const matchesSearch = programName.includes(searchTerm);
                const matchesStatus = !statusValue || programStatus === statusValue;

                if (matchesSearch && matchesStatus) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        function sortPrograms() {
            const sortValue = sortFilter.value;
            const cardsArray = Array.from(programCards);

            cardsArray.sort((a, b) => {
                switch (sortValue) {
                    case 'nama_asc':
                        return a.dataset.name.localeCompare(b.dataset.name);
                    case 'nama_desc':
                        return b.dataset.name.localeCompare(a.dataset.name);
                    case 'urutan_asc':
                        return parseInt(a.querySelector('.meta-item span').textContent.split(': ')[1]) -
                            parseInt(b.querySelector('.meta-item span').textContent.split(': ')[1]);
                    case 'urutan_desc':
                        return parseInt(b.querySelector('.meta-item span').textContent.split(': ')[1]) -
                            parseInt(a.querySelector('.meta-item span').textContent.split(': ')[1]);
                    default:
                        return 0;
                }
            });

            // Re-append sorted cards
            cardsArray.forEach(card => {
                programsGrid.appendChild(card);
            });
        }

        // Initialize filters
        filterPrograms();
    });
</script>
@endsection