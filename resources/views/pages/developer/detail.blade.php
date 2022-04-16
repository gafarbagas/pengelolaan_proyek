@extends('layouts.admin')

@section('title','Detail Data Penggunas')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-black">Detail Data Pengembang</h1>
    </div>

    <div class="row">
        <div class="col-md-6 text-black">
            
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="table-responsive">
                                <table class="table table-borderless text-black">
                                    
                                    <tbody>
                                        <tr>
                                            <th>Nama</th>
                                            <td>{{$user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Hak Akses</th>
                                            <td>{{$user->role}}</td>
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
            </>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection