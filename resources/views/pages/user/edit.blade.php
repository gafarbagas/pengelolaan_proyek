@extends('layouts.admin')

@section('title',' Ubah Data Pengguna')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-black">Ubah Data Pengguna</h1>
    </div>

    <div class="row">
        <div class="col-md-7 text-black">
            <div class="card">
                <div class="card-body">
                    <form action="/pengguna/{{$user->id}}" method="POST" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama" value="{{ $user->name }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Nama
                                </div>
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="role_id" class="col-sm-3 col-form-label">Hak Akses</label>
                            <div class="col-sm-3">
                                <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" id="role_id">
                                    @foreach (\App\Role::orderBy('role_name','asc')->get() as $role)
                                                <option value="{{ $role->id }}" {{$role->id == $user->role_id ? 'selected' : ''}}>{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan Masukan Hak Akses
                                </div>
                            </div>
                        </div>
                            
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" value="{{ $user->username }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="avatar" class="col-sm-3 col-form-label">Foto Profil</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file @error('avatar') is-invalid @enderror" name="avatar" id="avatar">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Kata Sandi</label>
                            <div class="col-sm-9">
                                <a href="/pengguna/{{$user->id}}/ubahkatasandi" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Ubah Kata Sandi <i class="fa fa-key"></i></a>
                            </div>
                        </div>
                    
                        <div class="row justify-content-center mt-4">
                            <div class="col-3">
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

