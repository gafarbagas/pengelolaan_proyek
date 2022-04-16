@extends('layouts.admin')

@section('title',' Tambah Data Pengguna')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-black">Tambah Data Pengguna</h1>
    </div>

    <div class="row">
        <div class="col-md-7 text-black">
            <div class="card">
                <div class="card-body">
                    <form action="/pengguna" method="POST">
                    @csrf
                        
                        <div class="form-group row">
                            <label for="name"  class="col-sm-5 col-form-label">Nama</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama" value="{{ old('name') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Nama
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role"  class="col-sm-5 col-form-label">Hak Akses</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" id="role" value="{{ old('role_id') }}">
                                    <option value="">Pilih Hak Akses</option>
                                    @foreach (\App\Role::orderBy('role_name','asc')->get() as $role)
                                        <option value="{{ $role->id }}" @if (old('role_id') == "$role->id") {{ 'selected' }} @endif>{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan Masukan Hak Akses
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="username"  class="col-sm-5 col-form-label">Username</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"  class="col-sm-5 col-form-label">Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password"value="{{ old('password') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Password
                                </div>
                            </div>
                        </div>
                            
                
                        <div class="row justify-content-center">
                            <div class="col-3">
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


