<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>JajanGo</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="#"><img src="../../assets/images/logo-mini.svg" alt="logo" />
            <span style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif; font-size: 25px; margin-left: 10px;">JajanGo</span>
          </a>
          <a class="navbar-brand brand-logo-mini" href="#"><img src="../../assets/images/logo-mini.svg" alt="logo" />
            <span style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif; font-size: 10px; margin-left: 10px;">JajanGo</span>
          </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          {{-- <input type="text" class="form-control bg-transparent border-0" placeholder="Cari Toko"> --}}
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="../../assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">Riziq</p>
                </div>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="../../assets/images/faces/face1.jpg" alt="image">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">Riziq</span>
                  <span class="text-secondary text-small">Pembeli</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/home">
                <span class="menu-title">Home</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">
                <span class="menu-title">Profile</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lacakpesanan/lacakpesananuser">
                <span class="menu-title">Pelacakan Pesanan</span>
                <i class="mdi mdi-clock-fast menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="riwayatPesanan">
                <span class="menu-title">Riwayat Pesanan</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <form id="logout-form" action="{{ route('logoutuser') }}" method="POST" style="display: none;">
                @csrf
              </form>
              <a class="nav-link" href="{{ route('logoutuser') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="menu-title">Logout</span>
                <i class="mdi mdi-logout menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <a href="/menu" class="btn btn-gradient-primary btn-rounded btn-fw">Lihat Daftar Menu</a>
                    </div>
                </div>
                <h3 class="mb-3 text-center">Daftar Promo</h3>
                <div class="row">
                    @foreach ($diskon as $menu)
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card card-custom">
                                <div class="card-body">
                                    <h4 class="text-center">{{ $menu->namaMenu }}</h4>
                                    <div class="text-center">

                                            @if ($menu->daftarMenu)
                                                <img src="{{ asset('images/' . $menu->daftarMenu->gambarMenu) }}" alt="" class="img-fluid mb-3">
                                            @else
                                                <p class="text-center">Gambar tidak tersedia</p>

                                            @endif
                                            @php
                                            $harga = $menu->daftarMenu->harga;
                                            $persentaseDiskon = $menu->persentaseDiskon / 100;
                                            $hargaDiskon = $harga - ($harga * $persentaseDiskon);
                                            @endphp
                                            <p class="text-center">Harga Setelah Diskon: {{ number_format($hargaDiskon, 2) }}</p>
                                            </div>
                                            <p class="text-center">{{ $menu->deskripsiMenu }}</p>
                                            <p class="text-center">Harga: {{ $menu->daftarMenu->harga }}</p>
                                            <p class="text-center">Kategori: {{ $menu->daftarMenu->kategoriMenu }}</p>
                                            <p class="text-center">Kode Kupon: {{ $menu->kodeKupon }}</p>
                                            <p class="text-center">Diskon: {{ $menu->persentaseDiskon }}%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <footer class="footer">
            </footer>
        </div>
    </div>
</div>
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<script src="{{ asset('assets/js/file-upload.js') }}"></script>
</body>
</html>
