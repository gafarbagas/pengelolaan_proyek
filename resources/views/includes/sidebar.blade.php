<!-- Sidebar -->
<ul class="navbar-nav bg-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
{{-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route ('home')}}">
  <div class="sidebar-brand-text mx-3"><img src="{{url('backend/img/logo1.png')}}" width="150px"></div>
</a> --}}

<a class="sidebar-brand d-flex align-items-center bg-black justify-content-center" href="{{route ('home')}}">
  <div class="sidebar-brand-icon">
    <img src="{{url('backend/img/logo6.png')}}" style="height: 30px;">
  </div>
  <div class="sidebar-brand-text mx-2">Ultranesia</div>
</a>

<!-- Nav Item - Dashboard -->
<li class="nav-item {{Request::is('/')?' active bg-hover':''}}">
  <a class="nav-link" href="{{url ('/')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Beranda</span></a>
</li>

@if (auth()->user()->role_id == '3')
<li class="nav-item {{Request::is('proyek*')?'active bg-hover':''}}">
  <a class="nav-link" href="{{url ('/proyek')}}">
    <i class="fas fa-fw fa-clipboard-list"></i>
    <span>Proyek</span></a>
</li>

<li class="nav-item {{Request::is('progres*')?'active bg-hover':''}}">
  <a class="nav-link" href="{{url('/progres')}}">
    <i class="fas fa-fw fa-spinner"></i>
    <span>Progress</span></a>
</li>
    
@else
  <li class="nav-item {{Request::is('pengguna*')?'active bg-hover':''}}">
    <a class="nav-link" href="{{url ('/pengguna')}}">
      <i class="fas fa-fw fa-user"></i>
      <span>Pengguna</span></a>
  </li>

  <li class="nav-item {{Request::is('pengembang*')?'active bg-hover':''}}">
    <a class="nav-link" href="{{url ('/pengembang')}}">
      <i class="fas fa-fw fa-users"></i>
      <span>Pengembang</span></a>
  </li>

  <li class="nav-item {{Request::is('proyek*')?'active bg-hover':''}}">
    <a class="nav-link" href="{{url ('/proyek')}}">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Proyek</span></a>
  </li>
  
  <li class="nav-item {{Request::is('progres*')?'active bg-hover':''}}">
    <a class="nav-link" href="{{url('/progres')}}">
      <i class="fas fa-fw fa-spinner"></i>
      <span>Progress</span></a>
  </li>
@endif

{{-- @if (auth()->user()->role = 'admin')
<li class="nav-item {{Request::is('pengguna')?'active bg-hover':''}}">
  <a class="nav-link" href="{{url ('pengguna')}}">
    <i class="fas fa-fw fa-user"></i>
    <span>Data Pengguna</span></a>
</li>

<li class="nav-item {{Request::is('proyek')?'active bg-hover':''}}">
  <a class="nav-link" href="{{url ('proyek')}}">
    <i class="fas fa-fw fa-clipboard-list"></i>
    <span>Data Proyek</span></a>
</li>

<li class="nav-item {{Request::is('progres')?'active bg-hover':''}}">
  <a class="nav-link" href="{{url('/progres')}}">
    <i class="fas fa-fw fa-spinner"></i>
    <span>Progress</span></a>
</li>
@endif --}}

<!-- Nav Item - Pages Collapse Menu -->
{{-- <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Pages</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Login Screens:</h6>
      <a class="collapse-item" href="{{route ('login')}}">Login</a>
      <a class="collapse-item" href="{{route ('register')}}">Register</a>
      <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
      <div class="collapse-divider"></div>
      <h6 class="collapse-header">Other Pages:</h6>
      <a class="collapse-item" href="404.html">404 Page</a>
      <a class="collapse-item" href="blank.html">Blank Page</a>
    </div>
  </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="{{ route('projects')}}">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Charts</span></a>
</li> --}}


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->