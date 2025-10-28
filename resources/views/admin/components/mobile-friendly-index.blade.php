{{--
    Template Universal untuk Mobile-Friendly Admin Index
    Usage: @include('admin.components.mobile-friendly-index', [
        'items' => $items,
        'itemName' => 'berita',
        'itemDisplayName' => 'Berita',
        'itemIcon' => 'fas fa-newspaper',
        'itemRoute' => 'admin.berita',
        'itemModel' => 'Berita',
        'filters' => [
            'status' => ['active', 'inactive'],
            'category' => ['Pendidikan', 'Kegiatan', 'Pengumuman', 'Prestasi', 'Lainnya']
        ],
        'dataAttributes' => [
            'status' => 'status',
            'category' => 'kategori',
            'name' => 'judul',
            'date' => 'created_at'
        ]
    ])
--}}

<!-- Search & Filter Section -->
<div class="search-filter-section mb-4">
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Cari {{ strtolower($itemDisplayName) }}..." id="searchInput">
            </div>
        </div>
        @if(isset($filters['status']))
        <div class="col-md-3 mb-3">
            <div class="filter-group">
                <label class="filter-label">Status:</label>
                <select class="filter-select" id="statusFilter">
                    <option value="">Semua Status</option>
                    @foreach($filters['status'] as $status)
                    <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif
        @if(isset($filters['category']))
        <div class="col-md-3 mb-3">
            <div class="filter-group">
                <label class="filter-label">Kategori:</label>
                <select class="filter-select" id="categoryFilter">
                    <option value="">Semua Kategori</option>
                    @foreach($filters['category'] as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif
    </div>
</div>

@if($items->count() > 0)
<!-- Quick Actions -->
<div class="quick-actions mb-3">
    <div class="d-flex flex-wrap gap-2">
        <button class="btn btn-outline-primary btn-sm" onclick="showAll()">
            <i class="fas fa-list me-1"></i>Semua
        </button>
        @if(isset($filters['status']))
        @foreach($filters['status'] as $status)
        <button class="btn btn-outline-{{ $status === 'active' ? 'success' : 'secondary' }} btn-sm" onclick="filterByStatus('{{ $status }}')">
            <i class="fas fa-{{ $status === 'active' ? 'eye' : 'eye-slash' }} me-1"></i>{{ ucfirst($status) }}
        </button>
        @endforeach
        @endif
        <button class="btn btn-outline-info btn-sm" onclick="sortByDate()">
            <i class="fas fa-calendar me-1"></i>Terbaru
        </button>
    </div>
</div>

<!-- Results Count -->
<div class="results-info mb-3">
    <small class="text-muted">
        <i class="fas fa-info-circle me-1"></i>
        Menampilkan <span id="resultsCount">{{ $items->count() }}</span> dari {{ $items->total() }} {{ strtolower($itemDisplayName) }}
    </small>
</div>

<div class="row" id="{{ $itemName }}Grid">
    @foreach($items as $item)
    <div class="col-md-6 col-lg-4 mb-4 {{ $itemName }}-item"
        @if(isset($dataAttributes['status'])) data-status="{{ $item->{$dataAttributes['status']} }}" @endif
        @if(isset($dataAttributes['category'])) data-category="{{ $item->{$dataAttributes['category']} }}" @endif
        @if(isset($dataAttributes['name'])) data-name="{{ strtolower($item->{$dataAttributes['name']}) }}" @endif
        @if(isset($dataAttributes['date'])) data-date="{{ $item->{$dataAttributes['date']}->timestamp }}" @endif>
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-icon">
                    <i class="{{ $itemIcon }}"></i>
                </div>
                <div class="{{ $itemName }}-status">
                    <form action="{{ route($itemRoute . '.toggle-status', $item) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="status-toggle {{ $item->status === 'active' ? 'status-active' : 'status-inactive' }}">
                            <i class="fas {{ $item->status === 'active' ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="card-body">
                @if(isset($item->gambar) && $item->gambar)
                <div class="card-image mb-3">
                    <img src="{{ $item->image_url }}" alt="{{ $item->{$dataAttributes['name'] ?? 'nama'} }}" class="img-fluid rounded">
                </div>
                @endif

                <h5 class="card-title">{{ $item->{$dataAttributes['name'] ?? 'nama'} }}</h5>

                @if(isset($dataAttributes['description']) && $item->{$dataAttributes['description']})
                <p class="card-text">{{ Str::limit($item->{$dataAttributes['description']}, 100) }}</p>
                @endif

                <div class="card-meta">
                    @if(isset($dataAttributes['order']) && $item->{$dataAttributes['order']})
                    <div class="meta-item">
                        <i class="fas fa-sort me-1"></i>
                        <span>Urutan: {{ $item->{$dataAttributes['order']} }}</span>
                    </div>
                    @endif
                    <div class="meta-item">
                        <i class="fas fa-calendar me-1"></i>
                        <span>{{ $item->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <div class="btn-group">
                        <a href="{{ route($itemRoute . '.show', $item) }}"
                            class="btn btn-outline-info btn-sm"
                            title="Lihat Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route($itemRoute . '.edit', $item) }}"
                            class="btn btn-outline-warning btn-sm"
                            title="Edit {{ $itemDisplayName }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>

                    <form action="{{ route($itemRoute . '.destroy', $item) }}"
                        method="POST"
                        class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus {{ strtolower($itemDisplayName) }} ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus {{ $itemDisplayName }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    {{ $items->links() }}
</div>
@else
<div class="text-center py-5">
    <div class="empty-state">
        <i class="{{ $itemIcon }} empty-icon"></i>
        <h3 class="empty-title">Belum ada {{ strtolower($itemDisplayName) }}</h3>
        <p class="empty-text">Mulai dengan menambahkan {{ strtolower($itemDisplayName) }} pertama Anda.</p>
        <a href="{{ route($itemRoute . '.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah {{ $itemDisplayName }}
        </a>
    </div>
</div>
@endif

<!-- Mobile UX Styles -->
<style>
    /* CSS Variables untuk konsistensi */
    :root {
        --primary-color: #007bff;
        --success-color: #28a745;
        --warning-color: #ffc107;
        --danger-color: #dc3545;
        --gray-50: #f8f9fa;
        --gray-200: #e9ecef;
        --gray-300: #dee2e6;
        --gray-400: #ced4da;
        --gray-600: #6c757d;
        --gray-800: #343a40;
        --spacing-sm: 0.5rem;
        --spacing-md: 1rem;
        --spacing-lg: 1.5rem;
        --spacing-xl: 2rem;
        --spacing-2xl: 3rem;
        --border-radius: 0.375rem;
    }

    /* Search & Filter Section */
    .search-filter-section {
        background: var(--gray-50);
        padding: var(--spacing-lg);
        border-radius: var(--border-radius);
        border: 1px solid var(--gray-200);
    }

    .search-box {
        position: relative;
    }

    .search-icon {
        position: absolute;
        left: var(--spacing-md);
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-600);
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
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .filter-group {
        display: flex;
        flex-direction: column;
        gap: var(--spacing-sm);
    }

    .filter-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--gray-800);
    }

    .filter-select {
        padding: var(--spacing-sm) var(--spacing-md);
        border: 1px solid var(--gray-300);
        border-radius: var(--border-radius);
        font-size: 0.875rem;
        background: white;
        transition: all 0.2s ease;
    }

    .filter-select:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    /* Quick Actions */
    .quick-actions {
        background: white;
        padding: var(--spacing-md);
        border-radius: var(--border-radius);
        border: 1px solid var(--gray-200);
    }

    .quick-actions .btn {
        font-size: 0.75rem;
        padding: var(--spacing-sm) var(--spacing-md);
    }

    /* Results Info */
    .results-info {
        background: var(--gray-50);
        padding: var(--spacing-sm) var(--spacing-md);
        border-radius: var(--border-radius);
        border: 1px solid var(--gray-200);
    }

    /* Card Styling */
    .card-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--primary-color);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.125rem;
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
        background: var(--success-color);
        color: white;
    }

    .status-inactive {
        background: var(--gray-400);
        color: white;
    }

    .status-toggle:hover {
        transform: scale(1.1);
    }

    .card-header {
        background: var(--gray-50);
        border-bottom: 1px solid var(--gray-200);
        padding: var(--spacing-md);
    }

    .card-footer {
        background: var(--gray-50);
        border-top: 1px solid var(--gray-200);
        padding: var(--spacing-md);
    }

    .card-meta {
        display: flex;
        flex-direction: column;
        gap: var(--spacing-sm);
        margin-top: var(--spacing-md);
    }

    .meta-item {
        display: flex;
        align-items: center;
        font-size: 0.875rem;
        color: var(--gray-600);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: var(--spacing-2xl);
    }

    .empty-icon {
        font-size: 4rem;
        color: var(--gray-400);
        margin-bottom: var(--spacing-lg);
    }

    .empty-title {
        color: var(--gray-800);
        margin-bottom: var(--spacing-md);
    }

    .empty-text {
        color: var(--gray-600);
        margin-bottom: var(--spacing-lg);
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .search-filter-section {
            padding: var(--spacing-md);
        }

        .quick-actions .btn {
            font-size: 0.7rem;
            padding: var(--spacing-sm);
        }

        .card-header {
            padding: var(--spacing-sm);
        }

        .card-footer {
            padding: var(--spacing-sm);
        }

        /* Mobile: Single column layout */
        .col-md-6.col-lg-4 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .card-meta {
            flex-direction: row;
            flex-wrap: wrap;
        }
    }

    /* Animation untuk filter */
    . {
            {
            $itemName
        }
    }

    -item {
        transition: all 0.3s ease;
    }

    . {
            {
            $itemName
        }
    }

    -item.hidden {
        display: none;
    }

    /* Loading state */
    .loading {
        opacity: 0.6;
        pointer-events: none;
    }
</style>

<!-- Mobile UX JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const categoryFilter = document.getElementById('categoryFilter');
        const itemGrid = document.getElementById('{{ $itemName }}Grid');
        const itemItems = document.querySelectorAll('.{{ $itemName }}-item');
        const resultsCount = document.getElementById('resultsCount');

        // Search functionality
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                filterItems();
            });
        }

        // Status filter
        if (statusFilter) {
            statusFilter.addEventListener('change', function() {
                filterItems();
            });
        }

        // Category filter
        if (categoryFilter) {
            categoryFilter.addEventListener('change', function() {
                filterItems();
            });
        }

        // Filter function
        function filterItems() {
            const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
            const statusValue = statusFilter ? statusFilter.value : '';
            const categoryValue = categoryFilter ? categoryFilter.value : '';

            let visibleCount = 0;

            itemItems.forEach(function(item) {
                const name = item.dataset.name || '';
                const status = item.dataset.status || '';
                const category = item.dataset.category || '';

                let show = true;

                // Search filter
                if (searchTerm && !name.includes(searchTerm)) {
                    show = false;
                }

                // Status filter
                if (statusValue && status !== statusValue) {
                    show = false;
                }

                // Category filter
                if (categoryValue && category !== categoryValue) {
                    show = false;
                }

                if (show) {
                    item.classList.remove('hidden');
                    visibleCount++;
                } else {
                    item.classList.add('hidden');
                }
            });

            // Update results count
            if (resultsCount) {
                resultsCount.textContent = visibleCount;
            }
        }

        // Quick action functions
        window.showAll = function() {
            if (searchInput) searchInput.value = '';
            if (statusFilter) statusFilter.value = '';
            if (categoryFilter) categoryFilter.value = '';
            filterItems();
        };

        window.filterByStatus = function(status) {
            if (statusFilter) {
                statusFilter.value = status;
                filterItems();
            }
        };

        window.sortByDate = function() {
            const items = Array.from(itemItems);
            items.sort(function(a, b) {
                return parseInt(b.dataset.date) - parseInt(a.dataset.date);
            });

            items.forEach(function(item) {
                itemGrid.appendChild(item);
            });
        };

        // Initialize
        filterItems();
    });
</script>