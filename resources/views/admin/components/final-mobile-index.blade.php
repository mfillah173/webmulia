{{--
    Template Universal untuk Mobile-Friendly Admin Index (Final Version)
    Menghilangkan redundansi filter status dan memperbaiki tombol quick action
    Usage: @include('admin.components.final-mobile-index', [
        'items' => $items,
        'itemName' => 'berita',
        'itemDisplayName' => 'Berita',
        'itemIcon' => 'fas fa-newspaper',
        'itemRoute' => 'admin.berita',
        'itemModel' => 'Berita',
        'filters' => [
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
        <div class="col-md-8 mb-3">
            <div class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Cari {{ strtolower($itemDisplayName) }}..." id="searchInput">
            </div>
        </div>
        @if(isset($filters['category']))
        <div class="col-md-4 mb-3">
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
        <button class="btn btn-primary btn-sm" onclick="showAll()">
            <i class="fas fa-list me-1"></i>Semua
        </button>
        <button class="btn btn-outline-success btn-sm" onclick="filterByStatus('active')">
            <i class="fas fa-eye me-1"></i>Aktif
        </button>
        <button class="btn btn-outline-secondary btn-sm" onclick="filterByStatus('inactive')">
            <i class="fas fa-eye-slash me-1"></i>Tidak Aktif
        </button>
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

    /* Button states for better visual feedback */
    .quick-actions .btn-info {
        background-color: #17a2b8 !important;
        border-color: #17a2b8 !important;
        color: white !important;
    }

    .quick-actions .btn-info:hover {
        background-color: #138496 !important;
        border-color: #117a8b !important;
    }

    .quick-actions .btn-success {
        background-color: var(--success-color) !important;
        border-color: var(--success-color) !important;
        color: white !important;
    }

    .quick-actions .btn-success:hover {
        background-color: #218838 !important;
        border-color: #1e7e34 !important;
    }

    .quick-actions .btn-secondary {
        background-color: var(--gray-400) !important;
        border-color: var(--gray-400) !important;
        color: white !important;
    }

    .quick-actions .btn-secondary:hover {
        background-color: #b3b7bb !important;
        border-color: #adb5bd !important;
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

    /* Status toggle positioning */
    . {
            {
            $itemName
        }
    }

    -status {
        position: absolute;
        top: var(--spacing-md);
        right: var(--spacing-md);
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
        const categoryFilter = document.getElementById('categoryFilter');
        const itemGrid = document.getElementById('{{ $itemName }}Grid');
        const itemItems = document.querySelectorAll('.{{ $itemName }}-item');
        const resultsCount = document.getElementById('resultsCount');

        // Track current status filter
        let currentStatusFilter = '';

        // Search functionality
        if (searchInput) {
            searchInput.addEventListener('input', function() {
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

                // Status filter (from quick actions)
                if (currentStatusFilter && status !== currentStatusFilter) {
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
            if (categoryFilter) categoryFilter.value = '';
            currentStatusFilter = '';
            updateQuickActionButtons('');
            filterItems();
        };

        window.filterByStatus = function(status) {
            currentStatusFilter = status;
            updateQuickActionButtons(status);
            filterItems();
        };

        window.sortByDate = function() {
            // Reset status filter untuk "Terbaru" - tampilkan semua data terbaru
            currentStatusFilter = '';
            updateQuickActionButtons('terbaru');

            // Sort by date (terbaru ke terlama)
            const items = Array.from(itemItems);
            items.sort(function(a, b) {
                return parseInt(b.dataset.date) - parseInt(a.dataset.date);
            });

            // Re-append items dalam urutan baru
            items.forEach(function(item) {
                itemGrid.appendChild(item);
            });

            // Re-apply current filters (search + category) but ignore status
            filterItems();
        };

        // Update quick action button states
        function updateQuickActionButtons(activeAction) {
            // Reset all buttons first
            const semuaBtn = document.querySelector('.quick-actions .btn[onclick*="showAll"]');
            const aktifBtn = document.querySelector('.quick-actions .btn[onclick*="filterByStatus(\'active\')"]');
            const tidakAktifBtn = document.querySelector('.quick-actions .btn[onclick*="filterByStatus(\'inactive\')"]');
            const terbaruBtn = document.querySelector('.quick-actions .btn[onclick*="sortByDate"]');

            // Reset semua tombol ke outline
            if (semuaBtn) {
                semuaBtn.className = 'btn btn-outline-primary btn-sm';
            }
            if (aktifBtn) {
                aktifBtn.className = 'btn btn-outline-success btn-sm';
            }
            if (tidakAktifBtn) {
                tidakAktifBtn.className = 'btn btn-outline-secondary btn-sm';
            }
            if (terbaruBtn) {
                terbaruBtn.className = 'btn btn-outline-info btn-sm';
            }

            // Set active button
            if (activeAction === '' && semuaBtn) {
                semuaBtn.className = 'btn btn-primary btn-sm';
            } else if (activeAction === 'active' && aktifBtn) {
                aktifBtn.className = 'btn btn-success btn-sm';
            } else if (activeAction === 'inactive' && tidakAktifBtn) {
                tidakAktifBtn.className = 'btn btn-secondary btn-sm';
            } else if (activeAction === 'terbaru' && terbaruBtn) {
                terbaruBtn.className = 'btn btn-info btn-sm';
            }
        }

        // Initialize
        filterItems();
    });
</script>