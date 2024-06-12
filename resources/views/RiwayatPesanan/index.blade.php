<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>JajanGO</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
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
              <a class="nav-link" href="home">
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
          <div class="page-header">
            <h3 class="page-title"> Riwayat Pesanan </h3>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-sm">
                      <thead>
                        <tr>
                          <th>ID Pesanan</th>
                          <th>Nama Menu</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                          <th>Tanggal Selesai</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($pesanan as $p)
                        <tr>
                          <td>{{ $p->id }}</td>
                          <td>{{ $p->namaMenu }}</td>
                          <td>{{ $p->quantity }}</td>
                          <td>{{ $p->harga }}</td>
                          <td>{{ $p->updated_at }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <!-- Add footer content here -->
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  </div>
  <!-- plugins:js -->
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets/js/misc.js') }}"></script>
</body>
</html>
