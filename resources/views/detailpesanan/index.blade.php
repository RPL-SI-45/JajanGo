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
                <a class="navbar-brand brand-logo" href="../../index.html"><img src="../../assets/images/logo.svg"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="../../index.html"><img
                        src="../../assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="../../assets/images/faces/face1.jpg" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">Antonio Ro Rizki</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                        </div>
                    </li>
                    <li class="nav-item nav-logout d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-power"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-settings d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-format-line-spacing"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
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
                                <span class="font-weight-bold mb-2">Antonio Ro Rizki</span>
                                <span class="text-secondary text-small">User Silver</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.html">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/icons/mdi.html">
                            <span class="menu-title">List Toko</span>
                            <i class="mdi mdi-contacts menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/forms/basic_elements.html">
                            <span class="menu-title">Rekomendasi</span>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item sidebar-actions">
                        <span class="nav-link">
                            <div class="border-bottom">
                                <h6 class="font-weight-normal mb-3">Pesanan</h6>
                            </div>
                            <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Tambah Pesanan</button>
                            <div class="mt-4">
                                <div class="border-bottom">
                                </div>
                        </span>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Detail Pesanan </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Pesanan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Pesanan</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Nama Pedagang</h4>
                                    <p class="card-description"> Mohon untuk check kembali pesanan kamu </p>
                                    <form class="forms-sample">
                                        <div class="form-group row">
                                            <label for="inputnamapesanan" class="col-sm-3 col-form-label">Nama
                                                Pesanan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputnamapesanan"
                                                    placeholder="Input Pesanan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputjumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="inputjumlah"
                                                    placeholder="Input Jumlah" oninput="hitungDiskon()">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputcatatan" class="col-sm-3 col-form-label">Catatan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputcatatan"
                                                    placeholder="Input Catatan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="totalHarga" class="col-sm-3 col-form-label">Total
                                                Harga</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="totalHarga"
                                                    placeholder="Total Harga" oninput="hitungDiskon()">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="diskon" class="col-sm-3 col-form-label">Diskon (%)</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="diskon"
                                                    placeholder="Input Diskon" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hargaSetelahDiskon" class="col-sm-3 col-form-label">Harga
                                                Setelah Diskon</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="hargaSetelahDiskon"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input"> Apakah pesanan kamu
                                                sudah benar?
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-gradient-primary me-2">Pesan
                                            Sekarang</button>
                                        <button type="reset" class="btn btn-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function hitungDiskon() {
                        var totalHarga = parseFloat(document.getElementById("totalHarga").value) || 0;
                        var diskon = 0;

                        if (totalHarga > 100000) {
                            diskon = 10;
                        } else if (totalHarga > 50000) {
                            diskon = 7;
                        } else if (totalHarga > 30000) {
                            diskon = 5;
                        }

                        var hargaSetelahDiskon = totalHarga - (totalHarga * (diskon / 100));
                        document.getElementById("diskon").value = diskon;
                        document.getElementById("hargaSetelahDiskon").value = hargaSetelahDiskon.toFixed(2);
                    }
                </script>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © JajanGo
                            2024</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Hand-crafted & made
                            with <i class="mdi mdi-heart text-danger"></i></span>
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
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
</body>

</html>