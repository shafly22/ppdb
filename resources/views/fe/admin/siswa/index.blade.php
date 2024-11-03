     @extends('fe.admin.layout.app')
        @section('title', 'Data Siswa')
            @section('content')
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Siswa</h1>
        
        @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{route('siswa.insert')}}" class="btn btn-primary btn-sm"><i> + Tambah Siswa</i></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nisn</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1;?>
                            @foreach ($siswa as $row)
                            <tr class="text-center">
                                <td>{{$no++}}</td>
                                <td>{{$row->nama}}</td>
                                <td>{{$row->nisn}}</td>
                                <td>{{$row->kelas}}</td>
                                <td>{{$row->alamat}}</td>
                                <td>
                                    <a href="{{ route('fe.admin.siswa.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    <form action="{{ route('fe.admin.siswa.delete', $row->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
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
       
       
       