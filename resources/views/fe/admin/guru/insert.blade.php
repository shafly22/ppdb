@extends('fe.admin.layout.app')
@section('title', 'Tambah Data Guru')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Tambah Data Guru</h1>
     <!-- Basic Card Example -->
     <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Guru</h6>
            </div>
        <div class="card-body">
            <form action="{{route('guru.add.insert')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control">
                    @error('nama')
                        {{$message}}
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nip</label>
                    <input type="number" name="nip" class="form-control">
                    @error('nip')
                    {{$message}}
                @enderror
                </div>
                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input type="text" name="mata_pelajaran" class="form-control">
                    @error('mata_pelajaran')
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