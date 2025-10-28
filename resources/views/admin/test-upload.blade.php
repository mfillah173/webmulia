@extends('admin.layouts.app')

@section('title', 'Test Upload')
@section('page-title', 'Test Upload')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Test Upload Gambar</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.test-upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Pilih Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload Test</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Debug Info</h5>
            </div>
            <div class="card-body">
                <h6>Directory Status:</h6>
                <ul>
                    <li>Program: {{ file_exists(storage_path('app/public/images/program')) ? '✅ Ada' : '❌ Tidak Ada' }}</li>
                    <li>Sistem: {{ file_exists(storage_path('app/public/images/sistem')) ? '✅ Ada' : '❌ Tidak Ada' }}</li>
                    <li>Fasilitas: {{ file_exists(storage_path('app/public/images/fasilitas')) ? '✅ Ada' : '❌ Tidak Ada' }}</li>
                </ul>

                <h6>Storage Link:</h6>
                <ul>
                    <li>Public Storage: {{ file_exists(public_path('storage')) ? '✅ Ada' : '❌ Tidak Ada' }}</li>
                    <li>Public Images: {{ file_exists(public_path('storage/images')) ? '✅ Ada' : '❌ Tidak Ada' }}</li>
                </ul>

                <h6>Files in Program:</h6>
                @if(file_exists(storage_path('app/public/images/program')))
                @php
                $files = scandir(storage_path('app/public/images/program'));
                $files = array_diff($files, ['.', '..']);
                @endphp
                @if(count($files) > 0)
                <ul>
                    @foreach($files as $file)
                    <li>{{ $file }}</li>
                    @endforeach
                </ul>
                @else
                <p class="text-muted">Tidak ada file</p>
                @endif
                @else
                <p class="text-danger">Directory tidak ada</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection