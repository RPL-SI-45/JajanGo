<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>JajanGO</title>
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
  <style>
    .container-scroller {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .page-body-wrapper {
      display: flex;
      flex: 1;
      overflow: hidden;
    }

    .main-panel {
      display: flex;
      flex-direction: column;
      flex: 1;
      overflow: hidden;
    }

    .content-wrapper {
      flex: 1;
      overflow-y: auto; /* Menambahkan scroll vertikal */
      padding: 20px; /* Padding opsional untuk tampilan lebih baik */
    }

    .card-custom {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      padding: 20px;
      display: flex;
      align-items: justify;
    }

    .card-custom img {
      margin-right: 15px;
      border-radius: 0px;
      flex-shrink: 0;
    }

    .card-custom .content {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .card-custom .content h5 {
      font-size: 16px;
      font-weight: bold;
      color: #333;
      margin: 0;
    }

    .card-custom .content p {
      font-size: 14px;
      color: #777;
      margin: 5px 0;
    }

    .card-custom .content .price {
      font-size: 14px;
      color: #333;
      margin: 5px 0;
    }

    .card-custom .content .date {
      font-size: 12px;
      color: #777;
      margin: 5px 0;
    }
  </style>
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
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="../../assets/images/faces/face1.jpg" alt="image">
                <span class="availability-status online"></span>
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black">Grey S.M</p>
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
                <img src="../../assets/images/faces/face1.jpg" alt="profile">
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">Grey S.M</span>
                <span class="text-secondary text-small">Pedagang</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pedagang/daftarmenu">
              <span class="menu-title">Home</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/informasipesanan">
              <span class="menu-title">Informasi Pesanan</span>
              <i class="mdi mdi-newspaper menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/diskon/daftardiskon">
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
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-newspaper"></i>
              </span> Informasi Pesanan
            </h3>
          </div>
          <div>
          <div>
            @foreach($pesanan as $i)
          <div class="card card-custom">
              <p class="font-weight-bold">Menu :</p>
              <h3>{{$i->namaMenu}}</h3>
              <p class="font-weight-bold">Jumlah : </p>
              <h3>{{$i->quantity}}</h3>
              <hr>
              </div>
            @endforeach
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
