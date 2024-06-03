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
        font-size: 18px;
        color: black;
    }
    .d-none {
        display: none;
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
                <span class="font-weight-bold mb-2">David Grey. H</span>
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
            <h3 class="page-title"> Edit Profil </h3>
          </div>
          <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <form action='/profilpedagang/{{$profilpedagang->id}}/update' method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                <div class="edit-image-container">
                    <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="gambarToko" class="centered-image" id="profileImage">
                    <input type="file" name="gambarToko" accept="image/*" class="d-none" id="imageUpload">
                    <label for="imageUpload" class="edit-icon mdi mdi-pencil"></label>
                </div>
                <div class="form-group">
                    <h4 class="card-title text-black">Nama Toko</h4>
                    <div class="add-items d-flex">
                    <input type="text" class="form-control todo-list-input" name="namaToko" placeholder="Masukkan Nama Toko" value="{{ old('namaToko', $profilpedagang->namaToko) }}">
                    </div>
                </div>
                <div class="form-group">
                    <h4 class="card-title text-black">Alamat Toko</h4>
                    <div class="add-items d-flex">
                    <input type="text" class="form-control todo-list-input" name="alamatToko" placeholder="Masukkan Alamat Toko" value="{{ old('alamatToko', $profilpedagang->alamatToko) }}">
                    </div>
                </div>
                
                <div class="form-group">
                    <h4 class="card-title text-black">Deskripsi Toko</h4>
                    <div class="add-items d-flex">
                    <input type="text" class="form-control todo-list-input" name="deskripsiToko" placeholder="Masukkan Deskripsi Toko" value="{{ old('deskripsiToko', $profilpedagang->deskripsiToko) }}">
                    </div>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
                </div>
                </div>
                </form>
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