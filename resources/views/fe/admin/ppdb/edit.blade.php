@extends('fe.admin.layout.app')

@section('title', 'Edit Pendaftar')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Edit Pendaftar PPDB</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('fe.admin.ppdb.update', $pendaftar->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $pendaftar->nama) }}" required>
    </div>
    
    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="">Pilih</option>
            <option value="Laki-laki" {{ $pendaftar->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ $pendaftar->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pendaftar->tanggal_lahir) }}" required>
    </div>
    
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat', $pendaftar->alamat) }}</textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('fe.admin.ppdb.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
