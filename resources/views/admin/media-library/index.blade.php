@extends('admin.layouts.app')

@section('title', 'Media Library')
@section('page-title', 'Media Library')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Media Library</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">Media Library</h1>
            <p class="page-subtitle">Kelola semua gambar yang telah diupload</p>
        </div>
    </div>
</div>
<!-- Upload Form -->
<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title mb-3">
            <i class="fas fa-upload me-2"></i>Upload Gambar Baru
        </h5>
        <form action="{{ route('admin.media-library.store') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
            @csrf
            <div class="row g-3">
                <div class="col-md-8">
                    <input type="file"
                        class="form-control @error('gambar') is-invalid @enderror"
                        id="gambar"
                        name="gambar"
                        accept="image/*">
                    <input type="hidden" id="gambar_cropped" name="gambar_cropped">
                    <div class="form-text">Format: JPG, PNG, GIF, WebP.</div>
                    @error('gambar')
                    <div class="invalid-feedback">
                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                    </div>
                    @enderror
                    <div id="imagePreview" class="mt-3" style="display: none;">
                        <div class="card">
                            <div class="card-body p-2">
                                <img id="previewImg" src="" alt="Preview" style="max-width: 100%; height: auto; border-radius: 4px;">
                                <div class="mt-2">
                                    <button type="button" class="btn btn-sm btn-outline-danger" id="removeImageBtn">
                                        <i class="fas fa-trash me-1"></i>Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100" id="submitBtn">
                        <i class="fas fa-upload me-2"></i>Upload Gambar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Search -->
<div class="card mb-4">
    <div class="card-body">
        <label class="form-label">Cari Gambar</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-search"></i></span>
            <input type="text" class="form-control" id="searchInput" placeholder="Cari nama file...">
        </div>
    </div>
</div>

@if(count($paginatedImages) > 0)
<!-- Media Grid -->
<div class="row g-3 mb-4" id="mediaGrid">
    @foreach($paginatedImages as $image)
    <div class="col-md-3 col-lg-2 media-item"
        data-name="{{ strtolower($image['name']) }}">
        <div class="card h-100 media-card">
            <div class="position-relative">
                <img src="{{ $image['path'] }}"
                    class="card-img-top"
                    alt="{{ $image['name'] }}"
                    style="height: 150px; object-fit: cover; cursor: pointer;"
                    data-path="{{ $image['path'] }}"
                    data-name="{{ $image['name'] }}"
                    onclick="handleImageSelect('{{ $image['path'] }}', '{{ $image['name'] }}')">
                <div class="position-absolute top-0 end-0 m-2">
                    <button type="button"
                        class="btn btn-sm btn-danger delete-image-btn"
                        data-path="{{ $image['storage_path'] }}"
                        data-name="{{ $image['name'] }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-2">
                <p class="card-text mb-1" style="font-size: 0.75rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $image['name'] }}">
                    {{ $image['name'] }}
                </p>
                <div class="d-flex justify-content-between text-muted" style="font-size: 0.7rem;">
                    <span>{{ $image['size_formatted'] }}</span>
                    <span>{{ $image['extension'] }}</span>
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
            <a class="page-link" href="?page={{ $currentPage - 1 }}">Previous</a>
        </li>
        @endif

        @for($i = 1; $i <= $totalPages; $i++)
            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
            <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
            </li>
            @endfor

            @if($currentPage < $totalPages)
                <li class="page-item">
                <a class="page-link" href="?page={{ $currentPage + 1 }}">Next</a>
                </li>
                @endif
    </ul>
</nav>
@endif

@else
<!-- Empty State -->
<div class="card">
    <div class="card-body text-center py-5">
        <i class="fas fa-images fa-4x text-muted mb-3"></i>
        <h5 class="text-muted">Tidak ada gambar</h5>
        <p class="text-muted">Belum ada gambar yang diupload</p>
    </div>
</div>
@endif

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        const searchInput = document.getElementById('searchInput');
        if (searchInput) {
            searchInput.addEventListener('keyup', function() {
                const searchTerm = this.value.toLowerCase();
                const mediaItems = document.querySelectorAll('.media-item');

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

        // Delete image
        document.querySelectorAll('.delete-image-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const path = this.getAttribute('data-path');
                const name = this.getAttribute('data-name');

                if (confirm('Apakah Anda yakin ingin menghapus gambar "' + name + '"?')) {
                    fetch('{{ route("admin.media-library.delete") }}', {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                path: path
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert(data.message);
                                location.reload();
                            } else {
                                alert('Error: ' + data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan saat menghapus gambar');
                        });
                }
            });
        });

        // Handle image selection
        window.handleImageSelect = function(imagePath, imageName) {
            // Jika dibuka dari popup window (dari form), langsung kirim ke parent
            if (window.opener && typeof window.opener.insertImageFromLibrary === 'function') {
                window.opener.insertImageFromLibrary(imagePath, imageName);
                window.close();
                return;
            }

            // Jika dibuka langsung (bukan popup), tidak perlu aksi apapun
            // User bisa melihat dan menghapus gambar di media library
        };

        // Image Cropper
        const imageInput = document.getElementById('gambar');
        const imageCroppedInput = document.getElementById('gambar_cropped');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        const removeImageBtn = document.getElementById('removeImageBtn');
        let cropper = null;
        let cropperModal = null;

        // Initialize modal
        if (typeof bootstrap !== 'undefined') {
            cropperModal = new bootstrap.Modal(document.getElementById('imageCropperModal'));
        }

        // Handle file input change
        if (imageInput) {
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    if (!file.type.match('image.*')) {
                        alert('Silakan pilih file gambar!');
                        imageInput.value = '';
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Show cropper modal
                        const cropperImage = document.getElementById('cropperImage');
                        cropperImage.src = e.target.result;

                        if (cropperModal) {
                            cropperModal.show();
                        }

                        // Initialize cropper setelah gambar dimuat
                        cropperImage.onload = function() {
                            if (cropper) {
                                cropper.destroy();
                            }

                            cropper = new Cropper(cropperImage, {
                                aspectRatio: 1,
                                viewMode: 1,
                                preview: '#preview',
                                guides: true,
                                center: true,
                                highlight: false,
                                cropBoxMovable: true,
                                cropBoxResizable: true,
                                toggleDragModeOnDblclick: false,
                                responsive: true,
                                autoCropArea: 0.8,
                                minContainerWidth: 400,
                                minContainerHeight: 400,
                                ready: function() {
                                    updateDimensions();
                                },
                                crop: function() {
                                    updateDimensions();
                                }
                            });

                            // Aspect ratio change
                            document.getElementById('aspectRatio').addEventListener('change', function() {
                                const value = this.value;
                                if (value === 'NaN') {
                                    cropper.setAspectRatio(NaN);
                                } else {
                                    cropper.setAspectRatio(eval(value));
                                }
                            });

                            // Rotate buttons
                            document.getElementById('rotateLeftBtn').addEventListener('click', function() {
                                cropper.rotate(-90);
                            });

                            document.getElementById('rotateRightBtn').addEventListener('click', function() {
                                cropper.rotate(90);
                            });

                            // Flip buttons
                            document.getElementById('flipHorizontalBtn').addEventListener('click', function() {
                                const scaleX = cropper.getData().scaleX;
                                cropper.scaleX(scaleX === 1 ? -1 : 1);
                            });

                            document.getElementById('flipVerticalBtn').addEventListener('click', function() {
                                const scaleY = cropper.getData().scaleY;
                                cropper.scaleY(scaleY === 1 ? -1 : 1);
                            });

                            // Reset button
                            document.getElementById('resetBtn').addEventListener('click', function() {
                                cropper.reset();
                                document.getElementById('aspectRatio').value = '1';
                                cropper.setAspectRatio(1);
                            });

                            // Crop button
                            document.getElementById('cropImageBtn').addEventListener('click', function() {
                                if (cropper) {
                                    const canvas = cropper.getCroppedCanvas({
                                        width: 800,
                                        height: 800,
                                        imageSmoothingEnabled: true,
                                        imageSmoothingQuality: 'high',
                                    });

                                    if (canvas) {
                                        canvas.toBlob(function(blob) {
                                            const reader = new FileReader();
                                            reader.onload = function(e) {
                                                const base64 = e.target.result;
                                                imageCroppedInput.value = base64;
                                                previewImg.src = base64;
                                                imagePreview.style.display = 'block';

                                                if (cropperModal) {
                                                    cropperModal.hide();
                                                }
                                            };
                                            reader.readAsDataURL(blob);
                                        }, 'image/jpeg', 0.9);
                                    }
                                }
                            });
                        };
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Remove image
            removeImageBtn.addEventListener('click', function() {
                imageInput.value = '';
                imageCroppedInput.value = '';
                imagePreview.style.display = 'none';
                previewImg.src = '';
                if (cropper) {
                    cropper.destroy();
                    cropper = null;
                }
            });

            // Update dimensions
            function updateDimensions() {
                if (cropper) {
                    const data = cropper.getData();
                    document.getElementById('dimensions').textContent =
                        Math.round(data.width) + ' x ' + Math.round(data.height);
                }
            }

            // Handle form submit
            if (uploadForm) {
                uploadForm.addEventListener('submit', function(e) {
                    if (imageCroppedInput.value) {
                        imageInput.disabled = true;
                    }
                });
            }
        }
    });
</script>
@endsection

@section('styles')
<style>
    .media-card {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .media-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .media-card img {
        transition: transform 0.2s;
    }

    .media-card:hover img {
        transform: scale(1.05);
    }

    #selectedImagePreview {
        max-height: 300px;
        width: 100%;
        object-fit: contain;
    }
</style>
@endsection