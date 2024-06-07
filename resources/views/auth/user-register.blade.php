<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
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
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <h4 style="text-align: center">Daftar Sebagai User</h4>
                <hr>
                <form method="POST" action="{{ url('register/user') }}">
                    @csrf
                    <label for="nama_user">Nama: </label>
                    <input type="text" id="nama_user" name="nama_user" required><br><br>
                    <label for="nomor_telepon_user">Nomor Telepon: </label>
                    <input type="text" id="nomor_telepon_user" name="nomor_telepon_user" required><br><br>
                    <label for="email">Email: </label>
                    <input type="email" id="email" name="email" required><br><br>
                    <label for="username_user">Username: </label>
                    <input type="text" id="username_user" name="username_user" required><br><br>
                    <label for="password">Password: </label>
                    <input type="password" id="password" name="password" required><br><br>
                    <label for="password_confirmation">Confirm Password: </label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required><br><br>
                    <button type="submit">Register </button>
                </form>
                <a href="{{ route('user.login') }}">Login</a>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
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
  </body>
</html>
