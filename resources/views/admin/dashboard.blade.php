@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Welcome Section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-2">Selamat Datang di Admin Panel</h2>
                        <p class="mb-0">Kelola konten website Mulia Special Academy dengan mudah dan efisien</p>
                    </div>
                    <div>
                        <a href="/" class="btn btn-light" target="_blank">
                            <i class="fas fa-external-link-alt me-2"></i>Lihat Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Overview -->
<div class="row mb-4">
    <div class="col-12">
        <h3 class="mb-3"><i class="fas fa-chart-line me-2"></i>Overview</h3>
    </div>
</div>

<div class="row g-4 mb-5">
    <!-- Program -->
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card border-left-primary shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Program</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_program'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fasilitas -->
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card border-left-success shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Fasilitas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_fasilitas'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-building fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimoni -->
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card border-left-info shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Testimoni</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_testimoni'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card border-left-warning shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">FAQ</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_faq'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-question-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <h3 class="mb-3"><i class="fas fa-bolt me-2"></i>Quick Actions</h3>
    </div>
</div>

<div class="row g-3 mb-5">
    <div class="col-lg-3 col-md-6">
        <a href="{{ route('admin.program.create') }}" class="card text-decoration-none hover-shadow">
            <div class="card-body text-center">
                <i class="fas fa-plus-circle fa-3x text-primary mb-2"></i>
                <h5 class="card-title">Tambah Program</h5>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6">
        <a href="{{ route('admin.fasilitas.create') }}" class="card text-decoration-none hover-shadow">
            <div class="card-body text-center">
                <i class="fas fa-plus-circle fa-3x text-success mb-2"></i>
                <h5 class="card-title">Tambah Fasilitas</h5>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6">
        <a href="{{ route('admin.testimoni.create') }}" class="card text-decoration-none hover-shadow">
            <div class="card-body text-center">
                <i class="fas fa-plus-circle fa-3x text-info mb-2"></i>
                <h5 class="card-title">Tambah Testimoni</h5>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6">
        <a href="{{ route('admin.faq.create') }}" class="card text-decoration-none hover-shadow">
            <div class="card-body text-center">
                <i class="fas fa-plus-circle fa-3x text-warning mb-2"></i>
                <h5 class="card-title">Tambah FAQ</h5>
            </div>
        </a>
    </div>
</div>

<style>
    .border-left-primary {
        border-left: 4px solid #ff8c00 !important;
    }

    .border-left-success {
        border-left: 4px solid #1cc88a !important;
    }

    .border-left-info {
        border-left: 4px solid #36b9cc !important;
    }

    .border-left-warning {
        border-left: 4px solid #f6c23e !important;
    }

    .border-left-secondary {
        border-left: 4px solid #858796 !important;
    }

    .hover-shadow:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }
</style>
@endsection