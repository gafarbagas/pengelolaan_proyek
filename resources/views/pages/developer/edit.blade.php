@extends('layouts.admin')

@section('title',' Ubah Data Pengguna')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-black"> Ubah Data Pengembang</h1>
    </div>

    <div class="row">
        <div class="col-md text-black">
            
            <div class="card">
                <div class="card-body">
                    <form action="/pengembang/{{$developer->id}}" method="POST">
                    @method('patch')
                    @csrf
                        
                        <div class="form-group row">
                            <label for="developer_code" class="col-sm-3 col-form-label">Kode Pengembang</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="developer_code" placeholder="developer_code" value="{{ $developer->developer_code }}" disabled>
                                <div class="invalid-feedback">
                                    Silahkan Masukan Kode Pengembang
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="category_id" class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-3">
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                    @foreach (\App\category::orderBy('category_name','asc')->get() as $cat)
                                                <option value="{{ $cat->id }}" {{$cat->id == $developer->category_id ? 'selected' : ''}}>{{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan Masukan Kategori
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="developer_name" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control @error('developer_name') is-invalid @enderror" name="developer_name" id="developer_name" placeholder="developer_name" value="{{ $developer->developer_name }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan developer_name
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="email" value="{{ $developer->email }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Email
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telp" class="col-sm-3 col-form-label">No. Telepon</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" placeholder="telp" value="{{ $developer->telp }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan No. Telepon
                                </div>
                            </div>
                        </div>
                    
                            
                
                        <div class="row justify-content-center">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Ubah</button>
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


