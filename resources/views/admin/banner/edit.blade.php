@extends('admin.layouts.app')

@section('title', 'Edit Banner')
@section('page-title', 'Edit Banner')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.banner.index') }}">Banner Slider</a></li>
        <li class="breadcrumb-item active">Edit Banner</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header mb-4">
    <div>
        <h1 class="page-title">Edit Banner Slider</h1>
        <p class="page-subtitle">Update gambar slider di halaman beranda</p>
    </div>
</div>

<form action="{{ route('admin.banner.update', $banner) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-image me-2"></i>Ganti Gambar Banner</h5>
                </div>
                <div class="card-body">
                    <!-- Gambar Saat Ini -->
                    @if($banner->gambar)
                    <div class="mb-3">
                        <label class="form-label">Gambar Saat Ini</label>
                        <div class="position-relative d-inline-block">
                            <img src="{{ asset('storage/images/media/' . $banner->gambar) }}"
                                alt="Banner {{ $banner->urutan }}"
                                class="img-thumbnail"
                                style="max-width: 100%; max-height: 300px;">
                        </div>
                    </div>
                    @endif

                    <!-- Gambar Baru -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label">
                            <i class="fas fa-image me-1"></i>Ganti Gambar Banner
                        </label>
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
                        <div class="form-text">
                            Kosongkan jika tidak ingin mengganti gambar. Format: JPG, PNG. Ukuran recommended: 1920x700px
                        </div>
                        @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Preview Gambar Baru -->
                    <div id="imagePreview" style="display: none;" class="mb-3">
                        <label class="form-label">Preview Gambar Baru</label>
                        <div class="position-relative d-inline-block">
                            <img id="previewImg" src="" alt="Preview" class="img-thumbnail" style="max-width: 100%; max-height: 400px;">
                            <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2" id="removeImageBtn">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Pengaturan -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Pengaturan</h5>
                </div>
                <div class="card-body">
                    <!-- Urutan -->
                    <div class="mb-3">
                        <label for="urutan" class="form-label">
                            <i class="fas fa-sort-numeric-down me-1"></i>Urutan
                        </label>
                        <input type="number"
                            class="form-control @error('urutan') is-invalid @enderror"
                            id="urutan"
                            name="urutan"
                            value="{{ old('urutan', $banner->urutan) }}"
                            min="0"
                            placeholder="0">
                        <div class="form-text">Urutan tampil banner (0 = paling pertama)</div>
                        @error('urutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status Aktif -->
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="aktif" name="aktif" value="1"
                            {{ old('aktif', $banner->aktif) ? 'checked' : '' }}>
                        <label class="form-check-label" for="aktif">
                            <i class="fas fa-eye me-1"></i>Aktifkan Banner
                        </label>
                        <div class="form-text">Banner hanya akan tampil jika aktif</div>
                    </div>
                </div>
            </div>

            <!-- Panduan -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-lightbulb me-2"></i>Panduan</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Ukuran: 1920x700px</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Format: JPG, PNG</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Rasio: 16:9</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Gunakan gambar berkualitas tinggi</li>
                        <li class="mb-0"><i class="fas fa-check text-success me-2"></i>Atur urutan untuk kontrol tampilan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('admin.banner.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update Banner
                </button>
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Same cropper logic as create page
        const imageInput = document.getElementById('gambar');
        const imageCroppedInput = document.getElementById('gambar_cropped');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        const removeImageBtn = document.getElementById('removeImageBtn');
        let cropper = null;
        let cropperModal = null;

        if (document.getElementById('imageCropperModal')) {
            cropperModal = new bootstrap.Modal(document.getElementById('imageCropperModal'));
        }

        // Function to insert image from library
        window.insertImageFromLibrary = function(imagePath, imageName) {
            previewImg.src = imagePath;
            imagePreview.style.display = 'block';

            const gambarFromLibrary = document.getElementById('gambar_from_library');
            if (gambarFromLibrary) {
                gambarFromLibrary.value = imagePath;
            }

            imageInput.value = '';
            imageCroppedInput.value = '';
        };

        // Open media library in modal
        const selectFromLibraryBtn = document.getElementById('selectFromLibraryBtn');
        if (selectFromLibraryBtn) {
            selectFromLibraryBtn.addEventListener('click', function() {
                const mediaLibraryModal = new bootstrap.Modal(document.getElementById('mediaLibraryModal'));
                const mediaLibraryContent = document.getElementById('mediaLibraryContent');

                fetch('{{ route("admin.media-library.grid") }}')
                    .then(response => response.text())
                    .then(html => {
                        mediaLibraryContent.innerHTML = html;
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

        // Handle file input change (same as create)
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
                        const cropperImage = document.getElementById('cropperImage');
                        cropperImage.src = e.target.result;

                        if (cropperModal) {
                            cropperModal.show();
                        }

                        cropperImage.onload = function() {
                            if (cropper) {
                                cropper.destroy();
                            }

                            cropper = new Cropper(cropperImage, {
                                aspectRatio: 1920/700,
                                viewMode: 1,
                                preview: '#preview',
                                guides: true,
                                center: true,
                                highlight: false,
                                cropBoxMovable: true,
                                cropBoxResizable: true,
                                toggleDragModeOnDblclick: false,
                                responsive: true,
                                autoCropArea: 0.9,
                                minContainerWidth: 400,
                                minContainerHeight: 400,
                                ready: function() {
                                    updateDimensions();
                                },
                                crop: function() {
                                    updateDimensions();
                                }
                            });

                            // Setup cropper controls (same as create)
                            document.getElementById('aspectRatio').addEventListener('change', function() {
                                const value = this.value;
                                if (value === 'NaN') {
                                    cropper.setAspectRatio(NaN);
                                } else {
                                    cropper.setAspectRatio(eval(value));
                                }
                            });

                            document.getElementById('rotateLeftBtn').addEventListener('click', function() {
                                cropper.rotate(-90);
                            });

                            document.getElementById('rotateRightBtn').addEventListener('click', function() {
                                cropper.rotate(90);
                            });

                            document.getElementById('flipHorizontalBtn').addEventListener('click', function() {
                                const scaleX = cropper.getData().scaleX;
                                cropper.scaleX(scaleX === 1 ? -1 : 1);
                            });

                            document.getElementById('flipVerticalBtn').addEventListener('click', function() {
                                const scaleY = cropper.getData().scaleY;
                                cropper.scaleY(scaleY === 1 ? -1 : 1);
                            });

                            document.getElementById('resetBtn').addEventListener('click', function() {
                                cropper.reset();
                                document.getElementById('aspectRatio').value = '1920/700';
                                cropper.setAspectRatio(1920/700);
                            });

                            document.getElementById('cropImageBtn').addEventListener('click', function() {
                                if (cropper) {
                                    const canvas = cropper.getCroppedCanvas({
                                        width: 1920,
                                        height: 700,
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

            function updateDimensions() {
                if (cropper) {
                    const data = cropper.getData();
                    document.getElementById('dimensions').textContent =
                        Math.round(data.width) + ' x ' + Math.round(data.height);
                }
            }
        }
    });
</script>
@endsection

