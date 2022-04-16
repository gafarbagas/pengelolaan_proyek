@extends('layouts.admin')

@section('title','Detail Progres Proyek')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mt-4 mb-4 text-black">
        <h1 class="h3 mb-0 text-black">Detail Progres <br>{{$project->project_name}}</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-8 text-black">
            <div class="card">
                <div class="card-body">
                    <a href="/progres/{{$project->id}}/laporan" target="_blank" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fa fa-print"></i> Cetak</a>
                    <div class="row">
                        <div class="col-md">
                            <div class="table-responsive">
                                <table class="table table-borderless text-black">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Progres</th>
                                            <th>Pengeluaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($project->progress as $progres)
                                        @if ($progres->progress == 0) 
                                        <tr></tr>
                                        @else
                                            <tr>
                                                <td>{{\Carbon\Carbon::parse($progres->period)->translatedFormat('d F Y')}}</td>
                                                <td>{{$progres->progress}}%</td>
                                                <td>Rp. {{number_format($progres->act_cost)}},-</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md">
                            <a href="{{route ('progress')}}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection