<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>JajanGo</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
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
                  <p class="mb-1 text-black">David</p>
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
                  <span class="font-weight-bold mb-2">David</span>
                  <span class="text-secondary text-small">Pedagang</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="daftarmenu">
                <span class="menu-title">Home</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{id}">
                <span class="menu-title">Profile</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="menu/{id}/edit">
                <span class="menu-title">Daftar Menu</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="informasipesanan">
                <span class="menu-title">Informasi Pesanan</span>
                <i class="mdi mdi-newspaper menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">
                <span class="menu-title">Kode Promo</span>
                <i class="mdi mdi-ticket-percent menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <form id="logout-form" action="{{ route('logoutpedagang') }}" method="POST" style="display: none;">
                @csrf
              </form>
              <a class="nav-link" href="{{ route('logoutpedagang') }}" 
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
                        <h3 class="page-title"> Buat Kode Promo </h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Kode Promo</h4>
                                    <p class="card-description"> Buat Kode Promo Toko Anda </p>
                                    <form class="forms-sample" action="/diskon/{{ $diskon->id }}/perform" method="POST">
                                    @csrf
                                    @method('PUT')
                                <form class="forms-sample">
                                    <div class="form-group row">
                                            <label for="kodeKupon" class="col-sm-3 col-form-label">Kode Promo</label>
                                            <div class="col-sm-9">
                                                <input dusk="kodeKupon" type="text" class="form-control" id="kodeKupon" name='kodeKupon'
                                                    value="{{ $diskon->namaMenu }}"disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kodeKupon" class="col-sm-3 col-form-label">Kode Promo</label>
                                            <div class="col-sm-9">
                                                <input dusk="kodeKupon" type="text" class="form-control" id="kodeKupon" name='kodeKupon'
                                                value="{{ $diskon->kodeKupon }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="persentaseDiskon" class="col-sm-3 col-form-label">Persentase Diskon</label>
                                            <div class="col-sm-9">
                                                <input dusk="persentaseDiskon" type="number" class="form-control" id="persentaseDiskon" name='persentaseDiskon'
                                                value="{{ $diskon->persentaseDiskon }}">
                                            </div>
                                        </div>
                                        <button dusk="submit" type="submit" class="btn btn-gradient-primary me-2">Tambahkan Kode Promo</button>
                                        <a href="/diskon/daftardiskon" class="btn btn-light" >Cancel</a>
                                        @if(session('success'))
                                            <div class="alert alert-success mt-2">
                                                {{ session('success') }}
                                            </div>

                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
</body>

</html>
