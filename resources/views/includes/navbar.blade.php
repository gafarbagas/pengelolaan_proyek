<!-- Topbar -->
<nav class="navbar navbar-expand bg-black topbar static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>

<!-- Topbar Navbar -->

<a class="navbar-brand text-white text-uppercase"><b>sistem informasi pengelolaan data proyek</b></a>

<ul class="navbar-nav ml-auto">

  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-white small">{{auth()->user()->name}}</span>
      <img class="img-profile rounded-circle" src="/images/{{ Auth::user()->avatar}}" style="width: 32px; height:32px">
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="{{ url ('/profil')}}">
        <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
        Profil
      </a>
      <a class="dropdown-item" href="{{ url ('/ubahkatasandi')}}">
        <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
        Ubah Kata Sandi
      </a>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Keluar
      </a>
    </div>
  </li>

</ul>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda ingin keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Pilih "Keluar" apabila sudah yakin semua pekerjaan sudah selesai.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-danger" href="/logout">Keluar</a>
      </div>
    </div>
  </div>
</div>

</nav>
<!-- End of Topbar -->