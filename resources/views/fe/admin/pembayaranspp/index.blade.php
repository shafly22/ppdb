@extends('fe.admin.layout.app')

@section('title', 'Daftar Pembayaran SPP')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Pembayaran SPP</h1>

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
            <a href="{{ route('fe.admin.pembayaranspp.create') }}" class="btn btn-primary btn-sm"><i>+ Tambah Pembayaran</i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Siswa</th>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayaranSpp as $pembayaran)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pembayaran->siswa->nama }}</td>
                                <td>{{ $pembayaran->tgl_bayar }}</td>
                                <td>{{ $pembayaran->jumlah }}</td>
                                <td>{{ $pembayaran->status }}</td>
                                <td>
                                    <a href="{{ route('fe.admin.pembayaranspp.edit', $pembayaran->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('fe.admin.pembayaranspp.destroy', $pembayaran->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pembayaran ini?')">Delete</button>
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
