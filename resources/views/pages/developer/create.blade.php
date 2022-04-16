@extends('layouts.admin')

@section('title',' Tambah Data Pengembang')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-black">Tambah Data Pengembang</h1>
    </div>

    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body text-black">
                    <form action="/pengembang" method="POST">
                    @csrf

                        <div class="form-group row">
                            <label for="developer_code" class="col-sm-3 col-form-label">Kode Pengembang</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('developer_code') is-invalid @enderror" name="developer_code" id="developer_code" placeholder="Kode Pengembang" value="{{ old('developer_code') }}">
                                @error('developer_code')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-3">
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category" value="{{ old('category_id') }}">
                                    <option value="">Pilih Kategori</option>
                                    @foreach (\App\Category::orderBy('category_name','asc')->get() as $cat)
                                        <option value="{{ $cat->id }}"@if (old('category_id') == "$cat->id") {{ 'selected' }} @endif>{{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan Masukan Nama
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control @error('developer_name') is-invalid @enderror" name="developer_name" id="name" placeholder="Nama" value="{{ old('developer_name') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Nama
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Email
                                </div>
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="telp" class="col-sm-3 col-form-label">No. Telepon</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" placeholder="No. Telepon"value="{{ old('telp') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan No. Telepon
                                </div>
                            </div>
                        </div>
                            
                
                        <div class="row justify-content-center">
                            <div class="col-sm-2">
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
</div>
<!-- /.container-fluid -->
@endsection


