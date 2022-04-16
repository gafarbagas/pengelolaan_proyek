@extends('layouts.admin')

@section('title','Progres Proyek')
    
@section('style')
    <link rel="stylesheet" href="backend/vendor/datatables/dataTables.bootstrap4.min.css">
@endsection

@section ('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-black">Data Progres</h1>
    </div>

    <!-- Content Row -->
    <div class="row text-black">
        <div class="col-md">
            <div class="card">
                <div class="card-body">             

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm text-black" width="100%" cellspacing="0" id="projecttable">
                            <thead class="thead">
                                <tr>
                                    <th width=20px>No.</th>
                                    <th>Kode Proyek</th>
                                    <th>Nama</th>
                                    <th>Progres</th>
                                    <th>Sisa</th>
                                    @if (auth()->user()->role_id != '2')
                                        <th width=98px>Aksi</th>
                                    @else
                                        <th width=64px>Aksi</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $loop -> iteration }}.</td>
                                        <td>{{ $project -> project_code }}</td>
                                        <td>{{ $project -> project_name }}</td>
                                        @php
                                            $test = DB::table("progresses")->where('project_id',$project->id)->get()->sum("progress");
                                        @endphp
                                        <td>{{ $test }}%</td>
                                        <td>{{ $project->target-$test }}%</td>
                                        <td>
                                            <a href="/progres/{{$project->id}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm ml-1"><i class="fa fa-eye"></i></a>
                                            @if (auth()->user()->role_id != '2')
                                                @if ($project->status_id !=1)
                                                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-default shadow-sm " disable><i class="fa fa-plus"></i></a>
                                                @elseif ($test == 100)
                                                    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-outline-dark shadow-sm" data-toggle="modal" data-target="#view{{$project->id}}"><i class="fa fa-plus"></i></a> --}}
                                                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" disabled><i class="fa fa-plus"></i></a>
                                                @else
                                                <a href="/progres/{{$project->id}}/tambah" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fa fa-plus"></i></a>
                                                @endif
                                            @endif
                                            {{-- <a href="/progres/{{$project->id}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fa fa-eye"></i></a> --}}
                                            <a href="/progres/{{$project->id}}/laporan" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-print"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="view{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{$project->project_name}} sudah mencapai {{$test}}% progres. 
                                                </div>
                                                <div class="modal-footer">
                                                    Silahkan ubah status proyek menjadi selesai.
                                                </div>
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
<!-- Button trigger modal -->


{{-- @foreach ($projects as $project)
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modal{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Progres</h5>
                <button type="button" class="close" data-dismiss="test" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered table-hover table-sm text-black" width="100%" cellspacing="0">
                    <thead class="thead">
                        <tr>
                            
                            <th>Nama</th>
                            <th>Target</th>
                            <th>Progres</th>
                            <th width=98px>Aksi</th>
                        </tr>
                        <tr>
                            @foreach ($projects as $project)
                                <td>{{$project->project_name}}</td>                                
                                    <td>
                                        <ul>
                                            @foreach ($project->progress as $progres)
                                                <li>
                                                    {{$progres->target}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($project->progress as $progres)
                                                <li>
                                                    {{$progres->progress}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                            @endforeach
                        </tr>
                    </thead>
                </table>
            </div>      
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endforeach --}}