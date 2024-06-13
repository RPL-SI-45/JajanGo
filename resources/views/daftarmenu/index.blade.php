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
              <a class="nav-link" href="/pedagang/daftarmenu">
                <span class="menu-title">Home</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
             @foreach ($pedagang as $pedagangItem)
              <a class="nav-link" href="{{ route('pedagang.show', $pedagangItem->id) }}">
            @endforeach
                <span class="menu-title">Profile</span>
                <i class="mdi mdi-contacts menu-icon"></i>
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
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card" style="align-items: center">
                  <div class="card-body" style="width: min-content; align-content:center">
                    <h3 class="mb-3" style="text-align: center">List Daftar Menu</h3>
                    <a href="/pedagang/daftarmenu/create" class="btn btn-light mb-3">Tambah Menu</a>
                    @foreach ($daftarmenu as $d)
                    <div class="card mb-2" style="width: 15rem; align-items: center; background-color: #F6F5F2">
                        @if($d->gambarMenu)
                            <img src="{{ asset('images/' . $d->gambarMenu) }}" alt="" class="mt-2" style="max-width: 100px;">
                        @else
                            Tidak ada foto
                        @endif
                        <div class="card-body">
                          <h1 class="card-title">{{  $d->namaMenu  }}</h1>
                          <p class="card-text">{{  $d->deskripsiMenu  }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item" style="background-color: #F6F5F2">Harga : {{  $d->harga  }}</li>
                          <li class="list-group-item" style="background-color: #F6F5F2">Kategori : {{  $d->kategoriMenu  }}</li>
                        </ul>
                        <div class="card-body">
                          <a href="{{  route('menu.edit', $d->id)  }}" class="card-link"><button class="btn btn-gradient-info btn-rounded btn-fw mb-3">Edit</button></a><br>
                          <form action="{{  route('menu.destroy', $d->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-gradient-danger btn-rounded btn-fw mb-3">Hapus</button>
                          </form>
                          <form action="{{ route('menu.toggleRecommendation', $d->id) }}" method="post">
                              @csrf
                              <button type="submit" class="btn btn-gradient-info btn-rounded btn-fw mb-3">
                                  {{ $d->recommended ? 'Unrecommend' : 'Recommend' }}
                              </button>
                          </form>
                          <form action="{{ route('menu.toggleRecommendation', $d->id) }}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-gradient-danger btn-rounded btn-fw mb-3">Remove Recommendation</button>
                          </form>
                        </div>
                      </div>
                      @endforeach
                    {{-- <table class="table">
                        <thead>
                          <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Kategori Menu</th>
                            <th>Foto</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($daftarmenu as $d)
                            <tr>
                                <td>{{  $d->namaMenu  }}</td>
                                <td>{{  $d->harga  }}</td>
                                <td>{{  $d->deskripsiMenu  }}</td>
                                <td>{{  $d->kategoriMenu  }}</td>
                                <td>
                                    @if($d->gambarMenu)
                                        <img src="{{ asset('images/' . $d->gambarMenu) }}" alt="">
                                    @else
                                        Tidak ada foto
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table> --}}
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
