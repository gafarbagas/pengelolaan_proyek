<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
  @include('includes.style')
</head>

<body class="mt-5" style="background-color: #D3D3D3">
  

  <div class="container">

    <!-- Outer Row -->
    @yield('content')

  </div>

  @include('includes.script')
  @yield('script')
</body>

</html>
