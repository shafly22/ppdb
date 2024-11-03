@extends('fe.admin.layout.app') <!-- Ganti sesuai dengan layout yang Anda gunakan -->

@section('title', 'Edit Data Guru')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Edit Data Guru</h1>

    <form action="{{ route('fe.admin.guru.update', $guru->id) }}" method="POST">
        @csrf
        <!-- Form input untuk nama -->
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $guru->nama }}" required>
        </div>
        <!-- Form input untuk NISN -->
        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $guru->nisn }}" required>
        </div>
        <!-- Form input untuk Kelas -->
        <div class="form-group">
            <label for="mata_pelajaran">Mata Pelajaran</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $guru->kelas }}" required>
        </div>
        <!-- Form input untuk Alamat -->
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required>{{ $guru->alamat }}</textarea>
        </div>
        <!-- Tombol submit -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('fe.admin.guru.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
