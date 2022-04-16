@extends('layouts.admin')

@section('title','Detail Data Proyek')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-black">Detail Data Proyek</h1>
    </div>

    <div class="row">
        <div class="col-md-8 text-black">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            
                        </div>
                        <div class="col-2">
                            <a href=" {{$project->id}}/edit " class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>
                            <form action="/proyek/{{$project->id}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="table-responsive">
                                <table class="table table-borderless text-black">
                                    
                                    <tbody>
                                        <tr>
                                            <th>Kode Proyek</th>
                                            <td>{{$project->project_code}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Proyek</th>
                                            <td>{{$project->project_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Klien</th>
                                            <td>{{$project->client_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Pengembang</th>
                                            <td>{{ $project->developer->developer_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Mulai</th>
                                            <td>{{\Carbon\Carbon::parse($project->project_start)->translatedFormat('d F Y')}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Selesai</th>
                                            <td>{{\Carbon\Carbon::parse($project->project_finish)->translatedFormat('d F Y')}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nilai Kontrak</th>
                                            <td>Rp. {{number_format ($project->price)}},-</td>
                                        </tr>
                                        <tr>
                                            <th>Penanggung Jawab</th>
                                            <td>{{$project->pj}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md">
                            <a href="{{route ('projects')}}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection