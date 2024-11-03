@extends('fe.admin.layout.app')

@section('title', 'Tambah Pembayaran SPP')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Tambah Pembayaran SPP</h1>

    <form action="{{ route('fe.admin.pembayaranspp.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="siswa_id">Siswa</label>
            <select class="form-control" id="siswa_id" name="siswa_id" required>
                <option value="">Pilih Siswa</option>
                @foreach ($siswa as $siswaItem)
                    <option value="{{ $siswaItem->id }}">{{ $siswaItem->nama }}</option>
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
        <a href="{{ route('fe.admin.pembayaranspp.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
