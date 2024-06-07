<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>JajanGO</title>
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
  <style>
    .centered-image {
        display: block;
        margin: 0 auto;
        border-radius: 50%;
        width: 150px;
        height: 150px;
        object-fit: cover;
    }
    .edit-image-container {
        text-align: center;
        position: relative;
    }
    .edit-icon {
        position: absolute;
        bottom: 10px;
        right: 190px;
        background: white;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .edit-icon i {
        font-size: 15px;
        color: black;
    }
    .d-none {
        display: none;
    }
    /* Responsif */
    @media (max-width: 767px) {
        .centered-image-container {
            width: 100%;
        }
        .centered-image {
            width: 100px;
            height: 100px;
        }
        .edit-icon {
            right: calc(44% - 15px); /* Setengah dari lebar ikon */
            bottom: 5px;
        }
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
            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
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
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">David</span>
                <span class="text-secondary text-small">Pedagang</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
        </ul>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Edit Profil Pedagang </h3>
          </div>
          <div class="card card-custom">
            <div class="card">
              <div class="card-body">
                <div class="container">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('pedagang.update', $pedagang->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <h4 class="card-title text-black">Nama Toko: </h4>
                            <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="{{ $pedagang->nama_toko }}" required>
                        </div>

                        <div class="mb-3">
                            <h4 class="card-title text-black">Alamat Toko: </h4>
                            <input type="text" class="form-control" id="alamat_toko" name="alamat_toko" value="{{ $pedagang->alamat_toko }}" required>
                        </div>

                        <div class="mb-3">
                            <h4 class="card-title text-black">No Telepon Pedagang: </h4>
                            <input type="text" class="form-control" id="no_telepon_pedagang" name="no_telepon_pedagang" value="{{ $pedagang->no_telepon_pedagang }}" required>
                        </div>

                        <div class="mb-3">
                            <h4 class="card-title text-black">Username Pedagang: </h4>
                            <input type="text" class="form-control" id="username_pedagang" name="username_pedagang" value="{{ $pedagang->username_pedagang }}" required>
                        </div>

                        <div class="mb-3">
                            <h4 class="card-title text-black">Password: </h4>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="mb-3">
                            <h4 class="card-title text-black">Konfirmasi Password: </h4>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>

                        <div class="mb-3">
                            <h4 class="card-title text-black">Deskripsi Toko: </h4>
                            <textarea class="form-control" id="deskripsi_toko" name="deskripsi_toko">{{ $pedagang->deskripsi_toko }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
          <footer class="footer">
          </footer>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets/js/misc.js') }}"></script>
  <script>
    document.getElementById('imageUpload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profileImage').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
  </script>
</body>
</html>