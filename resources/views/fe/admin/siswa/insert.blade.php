@extends('fe.admin.layout.app')
@section('title', 'Tambah Data Siswa')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Tambah Siswa</h1>
     <!-- Basic Card Example -->
     <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Siswa</h6>
            </div>
        <div class="card-body">
            <form action="{{route('siswa.add.insert')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control">
                    @error('nama')
                        {{$message}}
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nisn</label>
                    <input type="number" name="nisn" class="form-control">
                    @error('nisn')
                    {{$message}}
                @enderror
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" name="kelas" class="form-control">
                    @error('kelas')
                    {{$message}}
                @enderror
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                    @error('alamat')
                    {{$message}}
                @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save">Simpan</i></button>
            </form>
        </div>
    </div>
            
        </div>
     </div>
     

@endsection