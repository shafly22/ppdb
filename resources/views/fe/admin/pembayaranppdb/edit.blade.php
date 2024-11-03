@extends('fe.admin.layout.app')

@section('title', 'Edit Pembayaran PPDB')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Edit Pembayaran PPDB</h1>

    <form action="{{ route('fe.admin.pembayaranppdb.update', $pembayaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="pendaftar_id">Pendaftar</label>
            <select class="form-control" id="pendaftar_id" name="pendaftar_id" required>
                <option value="">Pilih Pendaftar</option>
                @foreach ($pendaftar as $pendaftarItem)
                    <option value="{{ $pendaftarItem->id }}" {{ $pendaftarItem->id == $pembayaran->pendaftar_id ? 'selected' : '' }}>
                        {{ $pendaftarItem->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="tgl_bayar">Tanggal Bayar</label>
            <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" value="{{ $pembayaran->tgl_bayar->format('Y-m-d') }}" required> <!-- Format tanggal -->
        </div>
        
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $pembayaran->jumlah }}" required>
        </div>
        
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="lunas" {{ $pembayaran->status == 'lunas' ? 'selected' : '' }}>Lunas</option>
                <option value="belum lunas" {{ $pembayaran->status == 'belum lunas' ? 'selected' : '' }}>Belum Lunas</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('fe.admin.pembayaranppdb.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
