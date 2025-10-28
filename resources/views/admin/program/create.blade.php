@extends('admin.layouts.app')

@section('title', 'Tambah Program')
@section('page-title', 'Tambah Program')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.program.index') }}">Program</a></li>
        <li class="breadcrumb-item active">Tambah Program</li>
    </ol>
</nav>

<!-- Page Header -->
<div class="page-header mb-4">
    <div class="page-header-content">
        <div class="page-header-text">
            <h1 class="page-title">Tambah Program Baru</h1>
            <p class="page-subtitle">Buat program pembelajaran baru untuk website</p>
        </div>
        <div class="page-header-actions">
            <a href="{{ route('admin.program.index') }}" class="btn btn-outline-secondary">
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
                    <i class="fas fa-graduation-cap me-2"></i>Informasi Program
                </h3>
                <p class="form-card-subtitle">Lengkapi informasi dasar program pembelajaran</p>
            </div>

            <form action="{{ route('admin.program.store') }}" method="POST" enctype="multipart/form-data" id="programForm">
                @csrf

                <div class="form-card-body">
                    <!-- Nama Program -->
                    <div class="form-group">
                        <label for="nama" class="form-label required">
                            <i class="fas fa-tag me-1"></i>Nama Program
                        </label>
                        <input type="text"
                            class="form-control @error('nama') is-invalid @enderror"
                            id="nama"
                            name="nama"
                            value="{{ old('nama') }}"
                            placeholder="Contoh: Toilet Training Program"
                            required
                            autocomplete="off">
                        <div class="form-help">Nama program yang akan ditampilkan di website</div>
                        @error('nama')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="form-group">
                        <label for="deskripsi" class="form-label required">
                            <i class="fas fa-align-left me-1"></i>Deskripsi Program
                        </label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                            id="deskripsi"
                            name="deskripsi"
                            rows="4"
                            placeholder="Jelaskan program pembelajaran secara detail..."
                            required>{{ old('deskripsi') }}</textarea>
                        <div class="form-help">Deskripsi lengkap tentang program pembelajaran</div>
                        @error('deskripsi')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Tujuan -->
                    <div class="form-group">
                        <label for="tujuan" class="form-label">
                            <i class="fas fa-bullseye me-1"></i>Tujuan Program
                        </label>
                        <textarea class="form-control @error('tujuan') is-invalid @enderror"
                            id="tujuan"
                            name="tujuan"
                            rows="3"
                            placeholder="Apa tujuan dari program ini?">{{ old('tujuan') }}</textarea>
                        <div class="form-help">Tujuan dan manfaat program pembelajaran</div>
                        @error('tujuan')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Metode -->
                    <div class="form-group">
                        <label for="metode" class="form-label">
                            <i class="fas fa-cogs me-1"></i>Metode Pembelajaran
                        </label>
                        <textarea class="form-control @error('metode') is-invalid @enderror"
                            id="metode"
                            name="metode"
                            rows="3"
                            placeholder="Bagaimana metode pembelajaran yang digunakan?">{{ old('metode') }}</textarea>
                        <div class="form-help">Metode dan pendekatan pembelajaran yang digunakan</div>
                        @error('metode')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div class="form-group">
                        <label for="gambar" class="form-label">
                            <i class="fas fa-image me-1"></i>Gambar Program
                        </label>

                        <input type="file"
                            class="form-control @error('gambar') is-invalid @enderror"
                            id="gambar"
                            name="gambar"
                            accept="image/*">

                        <div class="form-help">Gambar utama program yang akan ditampilkan di website. Format: JPG, PNG, GIF. Maksimal 2MB</div>
                        @error('gambar')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="status" class="form-label required">
                            <i class="fas fa-toggle-on me-1"></i>Status
                        </label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        <div class="form-help">Status tampil di website. Urutan akan diatur otomatis berdasarkan waktu pembuatan.</div>
                        @error('status')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="form-card-footer">
                    <div class="form-actions">
                        <a href="{{ route('admin.program.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="fas fa-save me-2"></i>Simpan Program
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Help Card -->
        <div class="help-card">
            <div class="help-card-header">
                <h4 class="help-card-title">
                    <i class="fas fa-lightbulb me-2"></i>Tips & Panduan
                </h4>
            </div>
            <div class="help-card-body">
                <div class="help-item">
                    <h6 class="help-item-title">Nama Program</h6>
                    <p class="help-item-text">Gunakan nama yang jelas dan mudah dipahami oleh orang tua siswa.</p>
                </div>

                <div class="help-item">
                    <h6 class="help-item-title">Deskripsi</h6>
                    <p class="help-item-text">Jelaskan program secara detail agar orang tua memahami manfaatnya.</p>
                </div>

                <div class="help-item">
                    <h6 class="help-item-title">Gambar</h6>
                    <p class="help-item-text">Gunakan gambar berkualitas tinggi yang relevan dengan program.</p>
                </div>

                <div class="help-item">
                    <h6 class="help-item-title">SEO</h6>
                    <p class="help-item-text">Isi meta description dan keywords untuk optimasi mesin pencari.</p>
                </div>
            </div>
        </div>

        <!-- Preview Card -->
        <div class="preview-card">
            <div class="preview-card-header">
                <h4 class="preview-card-title">
                    <i class="fas fa-eye me-2"></i>Preview
                </h4>
            </div>
            <div class="preview-card-body">
                <div class="preview-content">
                    <div class="preview-image-placeholder" id="previewImagePlaceholder">
                        <i class="fas fa-image"></i>
                        <p>Gambar akan muncul di sini</p>
                    </div>
                    <div class="preview-text">
                        <h5 class="preview-title" id="previewTitle">Nama Program</h5>
                        <p class="preview-description" id="previewDescription">Deskripsi program akan muncul di sini...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Form Design System */
    :root {
        --primary-color: #3b82f6;
        --primary-dark: #2563eb;
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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Meta description counter
        const metaDesc = document.getElementById('meta_description');
        const metaDescCount = document.getElementById('metaDescCount');

        if (metaDesc && metaDescCount) {
            metaDesc.addEventListener('input', function() {
                metaDescCount.textContent = this.value.length;
                if (this.value.length > 160) {
                    metaDescCount.style.color = 'var(--danger-color)';
                } else {
                    metaDescCount.style.color = 'var(--gray-500)';
                }
            });
        }

        // Live preview
        const namaInput = document.getElementById('nama');
        const deskripsiInput = document.getElementById('deskripsi');
        const previewTitle = document.getElementById('previewTitle');
        const previewDescription = document.getElementById('previewDescription');

        if (namaInput && previewTitle) {
            namaInput.addEventListener('input', function() {
                previewTitle.textContent = this.value || 'Nama Program';
            });
        }

        if (deskripsiInput && previewDescription) {
            deskripsiInput.addEventListener('input', function() {
                previewDescription.textContent = this.value || 'Deskripsi program akan muncul di sini...';
            });
        }

        // Form validation
        const form = document.getElementById('programForm');
        const submitBtn = document.getElementById('submitBtn');

        if (form && submitBtn) {
            form.addEventListener('submit', function(e) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...';
                submitBtn.disabled = true;
            });
        }
    });
</script>
@endsection