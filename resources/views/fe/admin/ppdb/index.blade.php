@extends('fe.admin.layout.app')

@section('title', 'Daftar PPDB')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Daftar Pendaftar PPDB</h1>

@if (session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('fe.admin.ppdb.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Pendaftar</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($pendaftar as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->jenis_kelamin }}</td>
                        <td>{{ $row->tanggal_lahir }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>
                            <a href="{{ route('fe.admin.ppdb.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('fe.admin.ppdb.destroy', $row->id) }}" method="POST" style="display:inline;">
                                @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
