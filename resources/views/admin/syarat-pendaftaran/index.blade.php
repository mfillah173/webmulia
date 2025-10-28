@extends('admin.layouts.app')

@section('title', 'Syarat Pendaftaran')
@section('page-title', 'Syarat Pendaftaran')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-0">Kelola Syarat Pendaftaran</h4>
        <p class="text-muted mb-0">Kelola syarat pendaftaran untuk setiap jenjang</p>
    </div>
    <a href="{{ route('admin.syarat-pendaftaran.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Syarat
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card">
    <div class="card-body">
        @if($syaratPendaftaran->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenjang</th>
                        <th>Nama Syarat</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Urutan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($syaratPendaftaran as $index => $syarat)
                    <tr>
                        <td>{{ $syaratPendaftaran->firstItem() + $index }}</td>
                        <td>
                            <span class="badge {{ $syarat->jenjang === 'kindergarten' ? 'bg-primary' : 'bg-success' }}">
                                {{ $syarat->jenjang === 'kindergarten' ? 'Kindergarten' : 'Primary School' }}
                            </span>
                        </td>
                        <td>{{ $syarat->nama_syarat }}</td>
                        <td>{{ Str::limit($syarat->deskripsi, 50) }}</td>
                        <td>
                            <form action="{{ route('admin.syarat-pendaftaran.toggle-status', $syarat) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm {{ $syarat->status === 'active' ? 'btn-success' : 'btn-secondary' }}">
                                    {{ $syarat->status === 'active' ? 'Aktif' : 'Nonaktif' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <span class="badge bg-primary">{{ $syarat->urutan }}</span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.syarat-pendaftaran.show', $syarat) }}" class="btn btn-sm btn-outline-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.syarat-pendaftaran.edit', $syarat) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.syarat-pendaftaran.destroy', $syarat) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus syarat ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $syaratPendaftaran->links() }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-clipboard-list fa-4x text-muted mb-3"></i>
            <h5 class="text-muted">Belum ada syarat pendaftaran</h5>
            <p class="text-muted">Mulai dengan menambahkan syarat pendaftaran pertama</p>
            <a href="{{ route('admin.syarat-pendaftaran.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Syarat Pertama
            </a>
        </div>
        @endif
    </div>
</div>
@endsection