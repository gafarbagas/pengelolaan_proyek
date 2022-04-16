@extends('layouts.admin')

@section('title','Detail Data Pengguna')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-6 mt-4 mb-4 text-black">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0">Detail Data Pengguna</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="table-responsive">
                                <table class="table table-borderless text-black">
                                    <div class="profile-header">
                                        <img src="{{asset('images/'.$user->avatar)}}" class="profile-image">
                                    </div>
                                    <tbody>
                                        <tr>
                                            <th>Nama</th>
                                            <td>{{$user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td>{{$user->username}}</td>
                                        </tr>
                                        <tr>
                                            <th>Hak Akses</th>
                                            <td>{{$user->role->role_name}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    

                    
                    <div class="row mt-3">
                        <div class="col-md">
                            <a href="{{route ('users')}}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection