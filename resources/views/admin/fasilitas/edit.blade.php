@extends('admin.layouts.app')

@section('title', 'Edit Fasilitas')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.fasilitas.index') }}">Fasilitas</a></li>
        <li class="breadcrumb-item active">Edit Fasilitas</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="page-header-content">
        <div class="page-header-text">
            <h1 class="page-title">Edit Fasilitas</h1>
            <p class="page-subtitle">Perbarui informasi fasilitas: {{ $fasilitas->nama }}</p>
        </div>
        <div class="page-header-actions">
            <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="form-card">
            <div class="form-card-header">
                <h3 class="form-card-title">
                    <i class="fas fa-building me-2"></i>Informasi Fasilitas
                </h3>
                <p class="form-card-subtitle">Lengkapi informasi fasilitas sekolah</p>
            </div>

            <form action="{{ route('admin.fasilitas.update', $fasilitas->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-card-body">
                    <!-- Nama Fasilitas -->
                    <div class="form-group">
                        <label for="nama" class="form-label required">
                            <i class="fas fa-tag me-1"></i>Nama Fasilitas
                        </label>
                        <input type="text"
                            class="form-control @error('nama') is-invalid @enderror"
                            id="nama"
                            name="nama"
                            value="{{ old('nama', $fasilitas->nama) }}"
                            placeholder="Contoh: Ruang Terapi"
                            required>
                        <div class="form-help">Nama fasilitas yang akan ditampilkan di website</div>
                        @error('nama')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div class="form-group">
                        <label for="gambar" class="form-label">
                            <i class="fas fa-image me-1"></i>Gambar Fasilitas
                        </label>

                        @if($fasilitas->gambar)
                        <div id="currentImage" class="mb-3">
                            <img src="{{ asset('storage/images/media/' . $fasilitas->gambar) }}"
                                alt="{{ $fasilitas->nama }}"
                                class="img-fluid rounded"
                                style="max-height: 200px;">
                            <div class="form-help mt-2">Foto saat ini</div>
                        </div>
                        @endif

                        <div id="imagePreview" class="mb-3" style="display: none;">
                            <img id="previewImg" src="" alt="Preview" style="max-width: 100%; height: auto; border-radius: 4px;">
                            <div class="mt-2">
                                <button type="button" class="btn btn-sm btn-outline-danger" id="removeImageBtn">
                                    <i class="fas fa-trash me-1"></i>Hapus
                                </button>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mb-2">
                            <input type="file"
                                class="form-control @error('gambar') is-invalid @enderror"
                                id="gambar"
                                name="gambar"
                                accept="image/*">
                            <button type="button" class="btn btn-outline-primary" id="selectFromLibraryBtn">
                                <i class="fas fa-images me-1"></i>Pilih dari Media Library
                            </button>
                        </div>
                        <input type="hidden" id="gambar_cropped" name="gambar_cropped">
                        <input type="hidden" id="gambar_from_library" name="gambar_from_library">
                        <div class="form-help">Gambar fasilitas yang akan ditampilkan di website. Format: JPG, PNG, GIF.</div>
                        @error('gambar')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-card-footer">
                    <div class="form-actions">
                        <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Fasilitas
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
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

        // Function to insert image from library
        window.insertImageFromLibrary = function(imagePath, imageName) {
            // Set preview image
            previewImg.src = imagePath;
            imagePreview.style.display = 'block';

            // Hide current image if exists
            const currentImage = document.getElementById('currentImage');
            if (currentImage) {
                currentImage.style.display = 'none';
            }

            // Set hidden input for library image
            const gambarFromLibrary = document.getElementById('gambar_from_library');
            if (gambarFromLibrary) {
                gambarFromLibrary.value = imagePath;
            }

            // Clear file input
            if (imageInput) {
                imageInput.value = '';
            }

            // Clear cropped input
            if (imageCroppedInput) {
                imageCroppedInput.value = '';
            }
        };

        // Open media library in modal
        const selectFromLibraryBtn = document.getElementById('selectFromLibraryBtn');
        if (selectFromLibraryBtn) {
            selectFromLibraryBtn.addEventListener('click', function() {
                const mediaLibraryModal = new bootstrap.Modal(document.getElementById('mediaLibraryModal'));
                const mediaLibraryContent = document.getElementById('mediaLibraryContent');

                // Load content via AJAX
                fetch('{{ route("admin.media-library.grid") }}')
                    .then(response => response.text())
                    .then(html => {
                        mediaLibraryContent.innerHTML = html;
                        // Execute script in loaded content
                        const scripts = mediaLibraryContent.querySelectorAll('script');
                        scripts.forEach(oldScript => {
                            const newScript = document.createElement('script');
                            Array.from(oldScript.attributes).forEach(attr => {
                                newScript.setAttribute(attr.name, attr.value);
                            });
                            newScript.appendChild(document.createTextNode(oldScript.innerHTML));
                            oldScript.parentNode.replaceChild(newScript, oldScript);
                        });
                        mediaLibraryModal.show();
                    })
                    .catch(error => {
                        console.error('Error loading media library:', error);
                        mediaLibraryContent.innerHTML = '<div class="alert alert-danger">Gagal memuat media library</div>';
                        mediaLibraryModal.show();
                    });
            });
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

            // Handle form submit - ensure cropped image is sent
            document.querySelector('form').addEventListener('submit', function(e) {
                if (imageCroppedInput.value) {
                    // Remove original file input so only cropped data is sent
                    imageInput.disabled = true;
                }
            });
        }
    });
</script>
@endsection

@section('styles')
<style>
    /* Form Design System */
    :root {
        --primary-color: #ff8c00;
        --primary-dark: #ff6b35;
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
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

    /* Form Card */
    .form-card {
        background: white;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--gray-200);
        overflow: hidden;
    }

    .form-card-header {
        padding: var(--spacing-xl);
        border-bottom: 1px solid var(--gray-200);
        background: var(--gray-50);
    }

    .form-card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: var(--spacing-sm);
    }

    .form-card-subtitle {
        color: var(--gray-500);
        margin-bottom: 0;
    }

    .form-card-body {
        padding: var(--spacing-xl);
    }

    .form-card-footer {
        padding: var(--spacing-xl);
        border-top: 1px solid var(--gray-200);
        background: var(--gray-50);
    }

    /* Form Groups */
    .form-group {
        margin-bottom: var(--spacing-xl);
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: var(--spacing-sm);
        font-size: 0.875rem;
    }

    .form-label.required::after {
        content: ' *';
        color: var(--danger-color);
    }

    .form-control {
        border: 1px solid var(--gray-300);
        border-radius: var(--border-radius);
        padding: var(--spacing-md);
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        outline: none;
    }

    .form-control.is-invalid {
        border-color: var(--danger-color);
    }

    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }

    .form-help {
        font-size: 0.75rem;
        color: var(--gray-500);
        margin-top: var(--spacing-sm);
    }

    .invalid-feedback {
        display: block;
        font-size: 0.75rem;
        color: var(--danger-color);
        margin-top: var(--spacing-sm);
    }

    /* File Upload */
    .file-upload-area {
        border: 2px dashed var(--gray-300);
        border-radius: var(--border-radius);
        padding: var(--spacing-2xl);
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
    }

    .file-upload-area:hover {
        border-color: var(--primary-color);
        background: rgba(59, 130, 246, 0.05);
    }

    .file-upload-area.is-invalid {
        border-color: var(--danger-color);
    }

    .file-upload-content {
        pointer-events: none;
    }

    .file-upload-icon {
        font-size: 2rem;
        color: var(--gray-400);
        margin-bottom: var(--spacing-md);
    }

    .file-upload-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: var(--spacing-sm);
    }

    .file-upload-subtitle {
        color: var(--gray-500);
        margin-bottom: var(--spacing-sm);
    }

    .file-upload-info {
        font-size: 0.75rem;
        color: var(--gray-400);
        margin-bottom: 0;
    }

    .file-upload-input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .file-preview {
        display: flex;
        align-items: center;
        gap: var(--spacing-md);
        padding: var(--spacing-md);
        border: 1px solid var(--gray-200);
        border-radius: var(--border-radius);
        background: var(--gray-50);
    }

    .preview-image {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: var(--border-radius);
    }

    .file-preview-info {
        flex: 1;
    }

    .file-name {
        font-weight: 500;
        color: var(--gray-700);
        font-size: 0.875rem;
    }

    .file-size {
        font-size: 0.75rem;
        color: var(--gray-500);
    }

    /* Form Sections */
    .form-section {
        margin-top: var(--spacing-2xl);
        padding-top: var(--spacing-xl);
        border-top: 1px solid var(--gray-200);
    }

    .form-section-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: var(--spacing-sm);
    }

    .form-section-subtitle {
        color: var(--gray-500);
        margin-bottom: var(--spacing-lg);
        font-size: 0.875rem;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        gap: var(--spacing-md);
        justify-content: flex-end;
    }

    /* Help Card */
    .help-card {
        background: white;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--gray-200);
        margin-bottom: var(--spacing-xl);
        overflow: hidden;
    }

    .help-card-header {
        padding: var(--spacing-lg);
        border-bottom: 1px solid var(--gray-200);
        background: var(--gray-50);
    }

    .help-card-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 0;
    }

    .help-card-body {
        padding: var(--spacing-lg);
    }

    .help-item {
        margin-bottom: var(--spacing-lg);
    }

    .help-item:last-child {
        margin-bottom: 0;
    }

    .help-item-title {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: var(--spacing-sm);
    }

    .help-item-text {
        font-size: 0.75rem;
        color: var(--gray-500);
        margin-bottom: 0;
        line-height: 1.4;
    }

    /* Preview Card */
    .preview-card {
        background: white;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--gray-200);
        overflow: hidden;
    }

    .preview-card-header {
        padding: var(--spacing-lg);
        border-bottom: 1px solid var(--gray-200);
        background: var(--gray-50);
    }

    .preview-card-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 0;
    }

    .preview-card-body {
        padding: var(--spacing-lg);
    }

    .preview-content {
        border: 1px solid var(--gray-200);
        border-radius: var(--border-radius);
        overflow: hidden;
    }

    .preview-image-placeholder {
        height: 120px;
        background: var(--gray-100);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: var(--gray-400);
    }

    .preview-image-placeholder i {
        font-size: 2rem;
        margin-bottom: var(--spacing-sm);
    }

    .preview-image-placeholder p {
        font-size: 0.75rem;
        margin-bottom: 0;
    }

    .preview-text {
        padding: var(--spacing-md);
    }

    .preview-title {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: var(--spacing-sm);
    }

    .preview-description {
        font-size: 0.75rem;
        color: var(--gray-600);
        margin-bottom: 0;
        line-height: 1.4;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header-content {
            flex-direction: column;
            align-items: flex-start;
            gap: var(--spacing-md);
        }

        .form-actions {
            flex-direction: column;
        }

        .form-actions .btn {
            width: 100%;
        }
    }
</style>
@endsection