@extends('admin.layouts.app')

@section('title', 'Edit Program')
@section('page-title', 'Edit Program')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.program.index') }}">Program</a></li>
        <li class="breadcrumb-item active">Edit Program</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">Edit Program</h1>
            <p class="page-subtitle">Perbarui informasi program: {{ $program->nama }}</p>
        </div>
        <a href="{{ route('admin.program.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.program.update', $program) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Program <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" name="nama" value="{{ old('nama', $program->nama) }}" required>
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tujuan_program" class="form-label">Tujuan Program <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('tujuan_program') is-invalid @enderror"
                            id="tujuan_program" name="tujuan_program" rows="4" required>{{ old('tujuan_program', $program->tujuan_program) }}</textarea>
                        @error('tujuan_program')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        @if($program->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/images/media/' . $program->gambar) }}"
                                alt="{{ $program->nama }}"
                                class="img-thumbnail"
                                id="currentImage"
                                style="width: 100%; max-width: 200px;">
                            <div class="form-text">Gambar saat ini</div>
                        </div>
                        @endif
                        <div class="d-flex gap-2 mb-2">
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                id="gambar" name="gambar" accept="image/*">
                            <button type="button" class="btn btn-outline-primary" id="selectFromLibraryBtn">
                                <i class="fas fa-images me-1"></i>Pilih dari Media Library
                            </button>
                        </div>
                        <input type="hidden" id="gambar_cropped" name="gambar_cropped">
                        <input type="hidden" id="gambar_from_library" name="gambar_from_library">
                        @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Format: JPG, PNG, GIF. Kosongkan jika tidak ingin mengubah gambar.</div>
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

                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('admin.program.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update Program
                </button>
            </div>
        </form>
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