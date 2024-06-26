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
                        <h3 class="page-title"> Detail Pesanan </h3>
                    </div>
                    <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-description"> Mohon untuk check kembali pesanan kamu </p>
                <form id="checkoutForm" action="/pembayaran" method="GET">
                <?php $totalHargaSemuaPesanan = 0; ?>
    @foreach($pesanan as $item)
        <?php $totalHargaItem = $item->menu->harga * $item->quantity; ?>
        <?php $totalHargaSemuaPesanan += $totalHargaItem; ?>
    <div class="card shadow mb-3">
        <div class="card-body">
            <h5 class="card-title">Nama Pesanan: {{ $item->menu->namaMenu}}</h5>
            <p class="card-text">Harga per item: {{ $item->menu->harga }}</p>
            <p class="card-text">Quantity: {{ $item->quantity}}</p>
            <p class="card-text">Total: Rp {{ number_format($item->menu->harga * $item->quantity, 2, ',', '.') }}</p>
        </div>
    </div>
    @endforeach
    <div class="form-check form-check-flat form-check-primary">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" required> Apakah pesanan kamu sudah benar?
        </label>
    </div>
    <p class="total-harga-semua">Total Harga Semua Pesanan: Rp {{ number_format($totalHargaSemuaPesanan, 2, ',', '.') }}</p>
    <button type="submit" id="submitButton" class="btn btn-gradient-primary me-2">Pesan Sekarang</button>
    <a href="/cart/index" class="btn btn-light" >Cancel</a>
</form>

            </div>
        </div>
    </div>
</div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    </div>
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
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
