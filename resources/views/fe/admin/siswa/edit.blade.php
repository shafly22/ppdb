@extends('fe.admin.layout.app') <!-- Ganti sesuai dengan layout yang Anda gunakan -->

@section('title', 'Edit Data Siswa')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Edit Data Siswa</h1>

    <form action="{{ route('fe.admin.siswa.update', $siswa->id) }}" method="POST">
        @csrf
        <!-- Form input untuk nama -->
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama }}" required>
        </div>
        <!-- Form input untuk NISN -->
        <div class="form-group">
            <label for="nisn">NISN</label>
            <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $siswa->nisn }}" required>
        </div>
        <!-- Form input untuk Kelas -->
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $siswa->kelas }}" required>
        </div>
        <!-- Form input untuk Alamat -->
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required>{{ $siswa->alamat }}</textarea>
        </div>
        <!-- Tombol submit -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('fe.admin.siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
