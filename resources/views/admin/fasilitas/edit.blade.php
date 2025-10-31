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
                            <img src="{{ asset('storage/images/fasilitas/' . $fasilitas->gambar) }}" 
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

                        <input type="file" 
                            class="form-control @error('gambar') is-invalid @enderror"
                            id="gambar" 
                            name="gambar" 
                            accept="image/*">
                        <input type="hidden" id="gambar_cropped" name="gambar_cropped">
                        <div class="form-help">Gambar fasilitas yang akan ditampilkan di website. Format: JPG, PNG, GIF. Maksimal 2MB. Kosongkan jika tidak ingin mengubah gambar.</div>
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
    const currentImage = document.getElementById('currentImage');
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

                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file maksimal 2MB!');
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

                    // Initialize cropper
                    cropperImage.onload = function() {
                        if (cropper) {
                            cropper.destroy();
                        }
                        cropper = new Cropper(cropperImage, {
                            aspectRatio: NaN,
                            viewMode: 1,
                            preview: '#preview',
                            guides: true,
                            center: true,
                            highlight: false,
                            cropBoxMovable: true,
                            cropBoxResizable: true,
                            toggleDragModeOnDblclick: false,
                            responsive: true,
                            ready: function() {
                                updateDimensions();
                            },
                            crop: function() {
                                updateDimensions();
                            }
                        });

                        // Setup controls - use cloneNode to remove old listeners
                        const aspectRatioEl = document.getElementById('aspectRatio');
                        if (aspectRatioEl) {
                            const newAspectRatio = aspectRatioEl.cloneNode(true);
                            aspectRatioEl.parentNode.replaceChild(newAspectRatio, aspectRatioEl);
                            newAspectRatio.addEventListener('change', function() {
                                const value = this.value;
                                if (value === 'NaN') {
                                    cropper.setAspectRatio(NaN);
                                } else {
                                    cropper.setAspectRatio(eval(value));
                                }
                            });
                        }

                        // Rotate buttons
                        const rotateLeftBtn = document.getElementById('rotateLeftBtn');
                        if (rotateLeftBtn) {
                            const newRotateLeft = rotateLeftBtn.cloneNode(true);
                            rotateLeftBtn.parentNode.replaceChild(newRotateLeft, rotateLeftBtn);
                            newRotateLeft.addEventListener('click', function() {
                                cropper.rotate(-90);
                            });
                        }

                        const rotateRightBtn = document.getElementById('rotateRightBtn');
                        if (rotateRightBtn) {
                            const newRotateRight = rotateRightBtn.cloneNode(true);
                            rotateRightBtn.parentNode.replaceChild(newRotateRight, rotateRightBtn);
                            newRotateRight.addEventListener('click', function() {
                                cropper.rotate(90);
                            });
                        }

                        // Flip buttons
                        const flipHorizontalBtn = document.getElementById('flipHorizontalBtn');
                        if (flipHorizontalBtn) {
                            const newFlipH = flipHorizontalBtn.cloneNode(true);
                            flipHorizontalBtn.parentNode.replaceChild(newFlipH, flipHorizontalBtn);
                            newFlipH.addEventListener('click', function() {
                                cropper.scaleX(-cropper.imageData.scaleX);
                            });
                        }

                        const flipVerticalBtn = document.getElementById('flipVerticalBtn');
                        if (flipVerticalBtn) {
                            const newFlipV = flipVerticalBtn.cloneNode(true);
                            flipVerticalBtn.parentNode.replaceChild(newFlipV, flipVerticalBtn);
                            newFlipV.addEventListener('click', function() {
                                cropper.scaleY(-cropper.imageData.scaleY);
                            });
                        }

                        // Reset button
                        const resetBtn = document.getElementById('resetBtn');
                        if (resetBtn) {
                            const newReset = resetBtn.cloneNode(true);
                            resetBtn.parentNode.replaceChild(newReset, resetBtn);
                            newReset.addEventListener('click', function() {
                                cropper.reset();
                                const aspectRatioEl = document.getElementById('aspectRatio');
                                if (aspectRatioEl) aspectRatioEl.value = 'NaN';
                            });
                        }

                        // Crop button
                        const cropImageBtn = document.getElementById('cropImageBtn');
                        if (cropImageBtn) {
                            const newCropBtn = cropImageBtn.cloneNode(true);
                            cropImageBtn.parentNode.replaceChild(newCropBtn, cropImageBtn);
                            newCropBtn.addEventListener('click', function() {
                                if (cropper) {
                                    const canvas = cropper.getCroppedCanvas({
                                        width: 1200,
                                        height: 1200,
                                        imageSmoothingEnabled: true,
                                        imageSmoothingQuality: 'high',
                                    });
                                    
                                    canvas.toBlob(function(blob) {
                                        const reader = new FileReader();
                                        reader.onload = function(e) {
                                            const base64 = e.target.result;
                                            imageCroppedInput.value = base64;
                                            previewImg.src = base64;
                                            imagePreview.style.display = 'block';
                                            
                                            if (currentImage) {
                                                currentImage.style.display = 'none';
                                            }
                                            
                                            if (cropperModal) {
                                                cropperModal.hide();
                                            }
                                        };
                                        reader.readAsDataURL(blob);
                                    }, 'image/jpeg', 0.9);
                                }
                            });
                        }
                    };
                };
                reader.readAsDataURL(file);
            }
        });

        // Remove image
        if (removeImageBtn) {
            removeImageBtn.addEventListener('click', function() {
                imageInput.value = '';
                imageCroppedInput.value = '';
                imagePreview.style.display = 'none';
                previewImg.src = '';
                if (cropper) {
                    cropper.destroy();
                    cropper = null;
                }
                if (currentImage) {
                    currentImage.style.display = 'block';
                }
            });
        }

        // Update dimensions
        function updateDimensions() {
            if (cropper) {
                const cropBoxData = cropper.getCropBoxData();
                document.getElementById('dimensions').textContent = 
                    Math.round(cropBoxData.width) + ' x ' + Math.round(cropBoxData.height);
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
