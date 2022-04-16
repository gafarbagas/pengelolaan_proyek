@extends('layouts.admin')

@section('title','Data Pengguna')

@section('style')
    <link rel="stylesheet" href="backend/vendor/datatables/dataTables.bootstrap4.min.css">
@endsection
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-black">Data Pengguna</h1>
    </div>

    <!-- Content Row -->
    <div class="row text-black">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                        @if (auth()->user()->role_id != '2')
                            <a href="{{ route ('createuser')}}" class="d-none d-sm-inline-block btn btn-sm btn-black shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
                        @endif
                        <a href="{{ route ('userreport')}}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-black shadow-sm ml-1"><i class="fas fa-download fa-sm text-white-50"></i> Laporan</a>
                    </div>
    
                    @if (Session::has('hapus'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {!! session('hapus') !!}
                        </div>
                    @endif
                    
                    @if (Session::has('ubah'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {!! session('ubah') !!}
                        </div>
                    @endif
    
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm text-black" width="100%" cellspacing="0" id="projecttable">
                            <thead class="thead">
                                <tr>
                                    <th width=20px>No.</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Hak Akses</th>
                                    @if (auth()->user()->role_id != '2')
                                        <th width=98px>Aksi</th>
                                    @else
                                        <th width=40px>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
    
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $user -> name }}</td>
                                        <td>{{ $user -> username }}</td>
                                        <td>{{ $user->role->role_name }}</td>
                                        <td>
                                            <a href="/pengguna/{{$user->id}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm ml-1"><i class="fa fa-eye"></i></a>
                                            @if (auth()->user()->role_id == '1')
                                                <a href="/pengguna/{{$user->id}}/edit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fa fa-pencil-alt"></i></a>
                                                @if ($user->id == Auth::user()->id)
                                                    {{-- <button class="d-none d-sm-inline-block btn btn-sm btn-default shadow-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button> --}}
                                                @elseif(auth()->user()->role_id == '1')
                                                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#delete{{$user->id}}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    Anda yakin untuk menghapus data?
                                                    <form action="/pengguna/{{$user->id}}" method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@section('script')
<!-- data tables -->
<script src="{{url('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backend/vendor/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{url('backend/vendor/datatables/buttons.bootstrap4.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#projecttable').DataTable({
            "lengthMenu": [[5,10,25,50,-1], [5,10,25,50,"All"]],
            "language": {
            "sEmptyTable":   "Tidak ada data",
            "sProcessing":   "Sedang memproses...",
            "sLengthMenu":   "Tampilkan _MENU_ data",
            "sZeroRecords":  "Tidak ditemukan data yang sesuai",
            "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 data",
            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
            "sInfoPostFix":  "",
            "sSearch":       "Cari:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Pertama",
                "sPrevious": "<",
                "sNext":     ">",
                "sLast":     "Terakhir"
            }
        }
        });
    });
</script>
@endsection