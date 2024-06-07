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
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <style>
        .card-custom {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: 0.3s;
            margin-bottom: 20px;
            padding: 20px;
            position: relative;
        }
        .card-custom:hover {
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            transform: translateY(-10px);
        }
        .badge-custom {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.9em;
            position: absolute;
            top: -10px;
            left: 20px;
        }
        .img-fluid {
            border-radius: 10px;
            max-height: 200px;
            object-fit: cover;
            width: 100%;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            margin: 5px 0;
            border-radius: 20px;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .btn-gradient-primary {
            background: linear-gradient(to right, #007bff 0%, #0056b3 100%);
            border: none;
            color: white;
            border-radius: 20px;
            padding: 10px 20px;
        }
        .btn-gradient-success {
            background: linear-gradient(to right, #00b09b 0%, #96c93d 100%);
            border: none;
            color: white;
            border-radius: 20px;
            padding: 10px 20px;
        }
        .text-center {
            margin-bottom: 15px;
        }
        .card-body {
            padding: 20px;
            position: relative;
        }
        .container-card {
            position: relative;
            padding-top: 20px;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="#"><img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="#"><img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a href="/cart" class="mdi mdi-cart-outline nav-link"></a>
                </li>
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">David Greymaax</p>
                        </div>
                    </a>
                </li>
                <li class="nav-item nav-logout d-none d-lg-block">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile">
                            <span class="login-status online"></span>
                            <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                            <span class="font-weight-bold mb-2">David Grey. H</span>
                            <span class="text-secondary text-small">Project Manager</span>
                        </div>
                        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="menu-title">List Daftar Menu</span>
                        <i class="mdi mdi-food menu-icon"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <a href="{{ route('rekomendasiMakanan.index') }}" class="btn btn-gradient-primary btn-rounded btn-fw">Lihat Rekomendasi Makanan</a>
                    </div>
                </div>
                <h3 class="mb-3 text-center">List Daftar Menu</h3>
                <div class="row">
                    @if (session('success'))
                    <div class="alert alert-success" style="text-align: center">
                        {{ session('success') }}
                    </div>
                    @endif
                    @foreach ($daftarmenu as $menu)
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card card-custom">
                                <div class="card-body">
                                    <h4 class="text-center">{{ $menu->namaMenu }}</h4>
                                    <div class="text-center">
                                        @if($menu->gambarMenu)
                                            <img src="{{ asset('images/' . $menu->gambarMenu) }}" alt="" class="img-fluid mb-3">
                                        @else
                                            <img src="{{ asset('images/dummy-image.png') }}" alt="dummy" class="img-fluid mb-3">
                                            <p class="text-center">Tidak ada foto</p>
                                        @endif
                                    </div>
                                    <p class="text-center">{{ $menu->deskripsiMenu }}</p>
                                    <p class="text-center">Harga: {{ $menu->harga }}</p>
                                    <p class="text-center">Kategori: {{ $menu->kategoriMenu }}</p>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-gradient-primary btn-rounded btn-fw mb-2">Beli</button>
                                        {{-- <button type="button" class="btn btn-gradient-success btn-rounded btn-fw mb-2 mdi mdi-cart">Tambah ke Keranjang</button> --}}
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                            <input type="hidden" name="quantity" value="1"> <!-- Default quantity -->
                                            <button type="submit" class="btn btn-gradient-success btn-rounded btn-fw mb-2 mdi mdi-cart">Tambah ke Keranjang</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      @endforeach
                  </div>
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
