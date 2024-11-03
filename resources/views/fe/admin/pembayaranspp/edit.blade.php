@extends('fe.admin.layout.app')

@section('title', 'Edit Pembayaran SPP')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Edit Pembayaran SPP</h1>

    <form action="{{ route('fe.admin.pembayaranspp.update', $pembayaran->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for updating the resource -->
        
        <div class="form-group">
            <label for="siswa_id">Siswa</label>
            <select class="form-control" id="siswa_id" name="siswa_id" required>
                <option value="">Pilih Siswa</option>
                @foreach ($siswa as $siswaItem)
                    <option value="{{ $siswaItem->id }}" {{ $siswaItem->id == $pembayaran->siswa_id ? 'selected' : '' }}>
                        {{ $siswaItem->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="tgl_bayar">Tanggal Bayar</label>
            <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" value="{{ $pembayaran->tgl_bayar }}" required>
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
        <a href="{{ route('fe.admin.pembayaranspp.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
