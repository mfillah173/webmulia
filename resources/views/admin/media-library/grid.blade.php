<!-- Search -->
<div class="mb-3">
    <label class="form-label text-white">Cari Gambar</label>
    <div class="input-group">
        <span class="input-group-text bg-dark border-secondary text-white"><i class="fas fa-search"></i></span>
        <input type="text" class="form-control bg-dark border-secondary text-white" id="searchInputModal" placeholder="Cari nama file...">
    </div>
</div>

@if(count($paginatedImages) > 0)
<!-- Media Grid -->
<div class="row g-3 mb-4" id="mediaGridModal">
    @foreach($paginatedImages as $image)
    <div class="col-md-3 col-lg-2 media-item-modal" 
         data-name="{{ strtolower($image['name']) }}">
        <div class="card h-100 media-card" style="background: #1f2937; border: 1px solid #374151;">
            <div class="position-relative">
                <img src="{{ $image['path'] }}"
                     class="card-img-top selectable-image"
                     alt="{{ $image['name'] }}"
                     style="height: 150px; object-fit: cover; cursor: pointer;"
                     data-path="{{ $image['path'] }}"
                     data-name="{{ $image['name'] }}">
            </div>
            <div class="card-body p-2">
                <p class="card-text mb-1 text-white" style="font-size: 0.75rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $image['name'] }}">
                    {{ $image['name'] }}
                </p>
                <div class="d-flex justify-content-between text-muted" style="font-size: 0.7rem;">
                    <span>{{ $image['size_formatted'] }}</span>
                    <span class="text-uppercase">{{ $image['extension'] }}</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Pagination -->
@if($totalPages > 1)
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        @if($currentPage > 1)
        <li class="page-item">
            <a class="page-link bg-dark border-secondary text-white" href="#" onclick="loadMediaLibraryPage({{ $currentPage - 1 }}); return false;">Previous</a>
        </li>
        @endif
        
        @for($i = 1; $i <= $totalPages; $i++)
            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                <a class="page-link bg-dark border-secondary text-white" href="#" onclick="loadMediaLibraryPage({{ $i }}); return false;">{{ $i }}</a>
            </li>
        @endfor

        @if($currentPage < $totalPages)
            <li class="page-item">
                <a class="page-link bg-dark border-secondary text-white" href="#" onclick="loadMediaLibraryPage({{ $currentPage + 1 }}); return false;">Next</a>
            </li>
        @endif
    </ul>
</nav>
@endif

@else
<div class="card bg-dark border-secondary">
    <div class="card-body text-center py-5">
        <i class="fas fa-images fa-3x text-muted mb-3"></i>
        <p class="text-muted">Belum ada gambar yang diupload</p>
    </div>
</div>
@endif

<script>
(function() {
    // Setup image click handlers using event delegation
    function setupImageHandlers() {
        // Remove old listeners by using event delegation on modal content
        const modalContent = document.getElementById('mediaLibraryContent');
        if (modalContent) {
            // Remove existing listeners
            modalContent.replaceWith(modalContent.cloneNode(true));
            const newModalContent = document.getElementById('mediaLibraryContent');
            
            // Add event delegation for image clicks
            newModalContent.addEventListener('click', function(e) {
                const img = e.target.closest('.selectable-image');
                if (img) {
                    const imagePath = img.getAttribute('data-path');
                    const imageName = img.getAttribute('data-name');
                    
                    // Call parent function
                    if (window.insertImageFromLibrary) {
                        window.insertImageFromLibrary(imagePath, imageName);
                        
                        // Close modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('mediaLibraryModal'));
                        if (modal) {
                            modal.hide();
                        }
                    } else {
                        console.error('insertImageFromLibrary function not found');
                    }
                }
            });
        }
    }

    // Setup search functionality
    function setupSearch() {
        const searchInput = document.getElementById('searchInputModal');
        if (searchInput) {
            // Clone to remove old listeners
            const newSearchInput = searchInput.cloneNode(true);
            searchInput.parentNode.replaceChild(newSearchInput, searchInput);
            
            newSearchInput.addEventListener('keyup', function() {
                const searchTerm = this.value.toLowerCase();
                const mediaItems = document.querySelectorAll('.media-item-modal');
                
                mediaItems.forEach(item => {
                    const name = item.getAttribute('data-name');
                    if (name.includes(searchTerm)) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        }
    }

    // Setup pagination
    window.loadMediaLibraryPage = function(page) {
        const gridUrl = '{{ route("admin.media-library.grid") }}';
        fetch(gridUrl + '?page=' + page)
            .then(response => response.text())
            .then(html => {
                const modalContent = document.getElementById('mediaLibraryContent');
                if (modalContent) {
                    modalContent.innerHTML = html;
                    setupImageHandlers();
                    setupSearch();
                }
            })
            .catch(error => {
                console.error('Error loading page:', error);
            });
    };

    // Initialize when content is loaded
    setupImageHandlers();
    setupSearch();
})();
</script>
