@extends('fe.admin.layout.app')

@section('title', 'Tambah Pembayaran PPDB')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Tambah Pembayaran PPDB</h1>

    <form action="{{ route('fe.admin.pembayaranppdb.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="pendaftar_id">Pendaftar</label>
            <select class="form-control" id="pendaftar_id" name="pendaftar_id" required>
                <option value="">Pilih Pendaftar</option>
                @foreach ($pendaftar as $pendaftarItem)
                    <option value="{{ $pendaftarItem->id }}">{{ $pendaftarItem->nama }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="tgl_bayar">Tanggal Bayar</label>
            <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" required>
        </div>
        
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>
        
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="lunas">Lunas</option>
                <option value="belum lunas">Belum Lunas</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('fe.admin.pembayaranppdb.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
