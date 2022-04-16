@extends('layouts.admin')

@section('title',' Tambah Progres Proyek')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3 mt-4">
        <h1 class="h3 text-black">Tambah Progres</h1>
    </div>

    <div class="row">
        <div class="col-md-8 text-black">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 text-black">{{$project->project_name}}</h1>
                    </div>
                    <form action="/progres" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="period" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control @error('period') is-invalid @enderror" name="period" id="period" placeholder="Tanggal" value="{{ old('period')}}">
                            <div class="invalid-feedback">
                                Silahkan Masukan Tanggal Progres
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="progress" class="col-sm-3 col-form-label">Progres</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control @error('progress') is-invalid @enderror" name="progress" id="progress" placeholder="Progres" value="{{ old('progress')}}">
                            <div class="invalid-feedback">
                                Silahkan Masukan Progres
                            </div>
                        </div>
                    </div>
                    @php
                        $test = DB::table("progresses")->where('project_id',$project->id)->get()->sum("progress");
                        $test1 = DB::table("progresses")->where('project_id',$project->id)->get()->sum("act_cost");
                    @endphp
                    
                <input type="number" name="test" value="{{ $test }}" hidden>
                <input type="number" name="test1" value="{{ $test1 }}" hidden>

                    <div class="form-group row">
                        <label for="act_cost" class="col-sm-3 col-form-label">Biaya Pengeluaran</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control @error('act_cost') is-invalid @enderror" name="act_cost" id="act_cost" placeholder="Biaya Pengeluaran" value="{{ old('act_cost')}}">
                            <div class="invalid-feedback">
                                Silahkan Masukan Biaya Pengeluaran
                            </div>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" name="id" value="{{ $project->id }}">
                    {{-- <div class="form-group row">
                        <label for="outstanding_issues" class="col-sm-3 col-form-label">Guna Pengeluaran</label>
                        <div class="col-sm">
                            <input type="text" class="form-control @error('outstanding_issues') is-invalid @enderror" name="outstanding_issues" id="outstanding_issues" placeholder="Guna Pengeluaran" value="{{ old('outstanding_issues')}}">
                            <div class="invalid-feedback">
                                Silahkan Masukan Guna Pengeluaran
                            </div>
                        </div>
                    </div> --}}

                    <div class="row justify-content-center">
                        <div class="col-2">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection