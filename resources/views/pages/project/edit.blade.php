@extends('layouts.admin')

@section('title',' Ubah Data Proyek')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-black">Ubah Data Proyek</h1>
    </div>

    <div class="row">
        <div class="col-xl text-black">

            <div class="card">
                <div class="card-body">
                    <form action="/proyek/{{ $project->id}}" method="POST">
                    @method('patch')
                    @csrf

                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-3">
                                <select class="form-control @error('status_id') is-invalid @enderror" name="status_id" id="status">
                                    @foreach (\App\Status::orderBy('status_name')->get() as $stat)
                                                <option value="{{ $stat->id }}" {{$stat->id == $project->status_id ? 'selected' : ''}}>{{ $stat->status_name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan Masukan Status
                                </div>
                            </div>
                        </div>
                            
                        <div class="form-group row">
                            <label for="project_code" class="col-sm-3 col-form-label">Kode Proyek</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control @error('project_code') is-invalid @enderror" name="project_code" id="project_code" placeholder="Kode Proyek" value="{{ $project->project_code }}" readonly>
                                <div class="invalid-feedback">
                                    Silahkan Masukan Kode Proyek
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="project_name" class="col-sm-3 col-form-label">Nama Proyek</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('project_name') is-invalid @enderror" name="project_name" id="project_name" placeholder="Nama Proyek" value="{{ $project->project_name }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Nama Proyek
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="client_name" class="col-sm-3 col-form-label">Nama Klien</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" id="client_name" placeholder="Nama Klien"value="{{ $project->client_name }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Nama Klien
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="developer" class="col-sm-3 col-form-label">Pengembang</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('developer_id') is-invalid @enderror" name="developer_id" id="developer">
                                    @foreach (\App\Developer::orderBy('developer_name','asc')->get() as $dev)
                                                <option value="{{ $dev->id }}" {{$dev->id == $project->developer_id ? 'selected' : ''}}>{{ $dev->developer_name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan Masukan Pengembang
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">Nilai Kontrak</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="Nilai Kontrak" value="{{ $project->price }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Nilai Kontrak
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="project_start" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control @error('project_start') is-invalid @enderror" name="project_start" id="project_start" placeholder="Tanggal Mulai" value="{{ $project->project_start }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Tanggal Mulai
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="project_finish" class="col-sm-3 col-form-label">Tanggal Selesai</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control @error('project_finish') is-invalid @enderror" name="project_finish" id="project_finist" placeholder="Tanggal Selesai" value="{{ $project->project_finish }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Tanggal Selesai
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pj" class="col-sm-3 col-form-label">Penanggung Jawab</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control @error('pj') is-invalid @enderror"" name="pj" id="pj" placeholder="Penanggung Jawab" value="{{ $project->pj }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Penanggung Jawab
                                </div>
                            </div>
                        </div>
                            
                
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