@extends('layouts.admin')

@section('title','Data Proyek')

@section('style')
    <link rel="stylesheet" href="backend/vendor/datatables/dataTables.bootstrap4.min.css">
@endsection
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    

    <!-- Content Row -->
    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-black">Data Proyek</h1>
    </div>

    <div class="row">
        <div class="col-md text-black">

            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                        @if (auth()->user()->role_id != '2')
                            <a href="{{ route ('create')}}" class="d-none d-sm-inline-block btn btn-sm btn-black shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
                        @endif
                        <a href="{{ route ('projectreport')}}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-black shadow-sm ml-1"><i class="fas fa-download fa-sm text-white-50"></i> Laporan</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm text-black" width="100%" cellspacing="0" id="projecttable">
                            <thead class="thead">
                                <tr>
                                    <th width=25px>No.</th>
                                    <th>Kode Proyek</th>
                                    <th>Nama Proyek</th>
                                    <th>Klien</th>
                                    <th>Status</th>
                                    @if (auth()->user()->role_id == '1')
                                        <th width=98px>Aksi</th>
                                    @elseif (auth()->user()->role_id == '2')
                                        <th width=40px>Aksi</th>
                                    @elseif (auth()->user()->role_id == '3')
                                        <th width=64px>Aksi</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{$loop->iteration}}.</td>
                                        <td>{{ $project -> project_code }}</td>
                                        <td>{{ $project -> project_name }}</td>
                                        <td>{{ $project -> client_name }}</td>
                                        <td>{{ $project->status->status_name}}</td>
                                        
                                        <td>
                                            <a href="/proyek/{{$project->id}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm ml-1"><i class="fa fa-eye"></i></a>
                                            @if (auth()->user()->role_id != '2')
                                                <a href=" /proyek/{{$project->id}}/edit " class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fa fa-pencil-alt"></i></a>
                                                @if (auth()->user()->role_id == '1')
                                                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#delete{{$project->id}}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="delete{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <form action="/proyek/{{$project->id}}" method="post" class="d-inline">
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