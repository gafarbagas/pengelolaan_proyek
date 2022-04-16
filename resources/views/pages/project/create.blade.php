@extends('layouts.admin')

@section('title',' Tambah Data Proyek')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-black">Tambah Data Proyek</h1>
    </div>
    
    <div class="row">
        <div class="col-xl text-black">
            <div class="card">
                <div class="card-body">
                    <form action="/proyek" method="POST">
                    @csrf
                        
                        <div class="form-group row">
                            <label for="project_code" class="col-sm-3 col-form-label">Kode Proyek</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control @error('project_code') is-invalid @enderror" name="project_code" id="project_code" placeholder="Kode Proyek" value="{{ old('project_code') }}">
                                @error('project_code')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="project_name" class="col-sm-3 col-form-label">Nama Proyek</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('project_name') is-invalid @enderror" name="project_name" id="project_name" placeholder="Nama Proyek" value="{{ old('project_name') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Nama Proyek
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="client_name" class="col-sm-3 col-form-label">Nama Klien</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" id="client_name" placeholder="Nama Klien"value="{{ old('client_name') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Nama Klien
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="developer" class="col-sm-3 col-form-label">Pengembang</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('developer_id') is-invalid @enderror" name="developer_id" id="developer" placeholder="Nama Pengembang">
                                    <option value="">Pilih Pengembang</option>
                                        @foreach (\App\Developer::orderBy('developer_name','asc')->get() as $dev)
                                                <option value="{{ $dev->id }}" @if (old('developer_id') == "$dev->id") {{ 'selected' }} @endif>{{ $dev->developer_name }}</option>
                                        @endforeach
                                    <div class="invalid-feedback">
                                        Silahkan Masukan Nama Pengembang
                                    </div>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">Nilai Kontrak</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="Nilai Kontrak" value="{{ old('price') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Nilai Kontrak
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="project_start" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control @error('project_start') is-invalid @enderror" name="project_start" id="project_start" placeholder="Tanggal Mulai" value="{{ old('project_start') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Tanggal Mulai
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="project_finish" class="col-sm-3 col-form-label">Tanggal Selesai</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control @error('project_finish') is-invalid @enderror" name="project_finish" id="project_finist" placeholder="Tanggal Selesai" value="{{ old('project_finish') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Tanggal Selesai
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pj" class="col-sm-3 col-form-label">Penanggung Jawab</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control @error('pj') is-invalid @enderror"" name="pj" id="pj" placeholder="Penanggung Jawab" value="{{ old('pj') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Penanggung Jawab
                                </div>
                            </div>
                        </div>
                            
                
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Tambah</button>
                                </div>
                            </div>
                        </div>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-xl mb-4 mt-4 text-black">
            <div class="d-sm-flex align-items-center mb-4">
                <h1 class="h3 mb-0 text-black"> Tambah Data Proyek</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="/proyek" method="POST">
                    @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="project_code">Kode Proyek</label>
                                <input type="text" class="form-control @error('project_code') is-invalid @enderror" name="project_code" id="project_code" placeholder="Kode Proyek" value="{{ old('project_code') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Kode Proyek
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="project_name">Nama Proyek</label>
                                <input type="text" class="form-control @error('project_name') is-invalid @enderror" name="project_name" id="project_name" placeholder="Nama Proyek" value="{{ old('project_name') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Nama Proyek
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="client_name">Nama Klien</label>
                                <input type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" id="client_name" placeholder="Nama Klien"value="{{ old('client_name') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Nama Klien
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="rupiah">Nilai Kontrak</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="rupiah" placeholder="Nilai Kontrak" value="{{ old('price') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Nilai Kontrak
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="project_start">Tanggal Mulai</label>
                                <input type="date" class="form-control @error('project_start') is-invalid @enderror" name="project_start" id="project_start" placeholder="Tanggal Mulai" value="{{ old('project_start') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Tanggal Mulai
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="project_finish">Tanggal Selesai</label>
                                <input type="date" class="form-control @error('project_finish') is-invalid @enderror" name="project_finish" id="project_finist" placeholder="Tanggal Selesai" value="{{ old('project_finish') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Tanggal Selesai
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pj">Penanggung Jawab</label>
                                <input type="text" class="form-control @error('pj') is-invalid @enderror"" name="pj" id="pj" placeholder="Penanggung Jawab" value="{{ old('pj') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Penanggung Jawab
                                </div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-3">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    
</div>
<!-- /.container-fluid -->
@endsection