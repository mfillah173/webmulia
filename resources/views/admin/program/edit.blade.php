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
                            <img src="{{ asset('storage/images/program/' . $program->gambar) }}"
                                alt="{{ $program->nama }}"
                                class="img-thumbnail"
                                id="currentImage"
                                style="width: 100%; max-width: 200px;">
                            <div class="form-text">Gambar saat ini</div>
                        </div>
                        @endif
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                            id="gambar" name="gambar" accept="image/*">
                        <input type="hidden" id="gambar_cropped" name="gambar_cropped">
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
                            cropper.scaleX(-cropper.imageData.scaleX);
                        });

                        document.getElementById('flipVerticalBtn').addEventListener('click', function() {
                            cropper.scaleY(-cropper.imageData.scaleY);
                        });

                        // Reset button
                        document.getElementById('resetBtn').addEventListener('click', function() {
                            cropper.reset();
                            document.getElementById('aspectRatio').value = 'NaN';
                        });

                        // Crop button
                        document.getElementById('cropImageBtn').addEventListener('click', function() {
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
                                        
                                        // Hide current image if exists
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
                if (currentImage) {
                    currentImage.style.display = 'block';
                }
                if (cropper) {
                    cropper.destroy();
                    cropper = null;
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