@extends('layouts.login')

@section('title','Login')
    
@section('content')

    
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-8 col-md-3 ml-auto mr-auto pt-auto pb-auto mt-5">
            <div class="card">
                <div class="card-body">
                    
                <!-- Nested Row within Card Body -->
                    <div class="pt-4 px-5">
                        <div class="text-center pb-3">
                            <img src="{{url('backend/img/logo4.png')}}"></<img>
                        </div>

                        @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {!! session('error') !!}
                            </div>
                        @elseif (Session::has('lupas'))
                            <div class="alert alert-info" role="alert">
                                {!! session('lupas') !!}
                            </div>
                        @endif

                        <form class="user" action="/postlogin" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Username
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Password
                                </div>
                            </div>

                            <div class=" mt-2">
                                <a href="/lupapassword"> Lupa Password </a>
                            </div>
                            
                            <div class="row justify-content-center">
                                <div class="col-6 mt-3">
                                    <button type="submit" class="btn btn-black text-white btn-block"> LOGIN </button>
                                </div>
                            </div>
                        </form>

                        

                        <div class="copyright text-center mt-5">
                            <h6>
                                Copyright &copy; <a id="footercolor" href="https://www.ultranesia.com/" target="_blank">Ultranesia</a>
                                <script>
                                document.write(new Date().getFullYear());
                                </script>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection

@section('script')
<script>
    $(".alert").fadeTo(2000, 400).slideUp(1000, function(){
    $(".alert").slideUp(1000);
});
</script>
@endsection

