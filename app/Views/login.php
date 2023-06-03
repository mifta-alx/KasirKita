<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>/public/template/assets/img/favicon.png">

  <title>Kasir Kita - <?= $title ?></title>

  <!-- vendor css -->
  <link href="<?= base_url(); ?>/public/template/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/public/template/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <!-- Sweet Alert 2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/template/assets/sweetalert2/sweetalert2.css">
  <!-- LINE AWESOME -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/template/assets/line-awesome/css/line-awesome.min.css">
  <!-- DashForge CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/public/template/assets/css/dashforge.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/public/template/assets/css/dashforge.auth.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/public/template/assets/css/dashforge.demo.css">
  <style>
    body {
      font-family: Poppins, sans-serif;
      /* font-family: 'Quicksand', sans-serif !important;  */
    }

    .eye {
      background-color: transparent;
      border-left: none;
    }

    .eye.is-invalid {
      background-color: transparent;
      border-left: none;
      border-right: 1px solid #dc3545;
      border-bottom: 1px solid #dc3545;
      border-top: 1px solid #dc3545;
    }

    #Password {
      border-right: none;
    }

    .form-control:focus {
      box-shadow: none;
      border: 1px solid #c0ccda;
    }

    .form-control {
      border-radius: 0 !important;
    }
  </style>
</head>

<body>

  <header class="navbar navbar-header navbar-header-fixed">
    <div class="navbar-brand">
      <a class="df-logo">Kasir<span>Kita</span></a>
    </div><!-- navbar-brand -->
    <div id="navbarMenu" class="navbar-menu-wrapper">
      <div class="navbar-menu-header">
        <a class="df-logo">Kasir<span>Kita</span></a>
        <a id="mainMenuClose" href=""><i data-feather="x"></i></a>
      </div><!-- navbar-menu-header -->
    </div><!-- navbar-menu-wrapper -->
  </header><!-- navbar -->

  <div class="content content-fixed content-auth">
    <div class="container">
      <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
        <div class="media-body align-items-center d-none d-lg-flex">
          <div class="mx-wd-600">
            <img src="<?= base_url(); ?>/public/template/assets/img/logo3.png" class="img-fluid" alt="">
          </div>
        </div><!-- media-body -->
        <form method="post" action="<?= base_url('login/cek_login') ?>">
          <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
            <div class="wd-100p">
              <h3 class="tx-color-01 mg-b-5">Sign In</h3>
              <p class="tx-color-03 tx-16 mg-b-40">Welcome back! Please signin to continue.</p>

              <div class="form-group">
                <label>Username</label>
                <input type="text" id="Username" name="Username" class="form-control <?= ($validation->hasError('Username')) ? 'is-invalid' : ''; ?>" value="<?= old('Username'); ?>" placeholder=" Username" autofocus>
                <div class="invalid-feedback">
                  <?= $validation->getError('Username'); ?>
                </div>
              </div>
              <!-- <div class="form-group">
                <div class="d-flex justify-content-between mg-b-5">
                  <label class="mg-b-0-f">Password</label>
                  <a href="<?= base_url('Login/forgot'); ?>" class="tx-13">Forgot password?</a>
                </div>
                <input type="password" id="password" name="Password" class="form-control" placeholder="Password">
              </div>
              <div class="form-check mb-2" id="chck">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="Toggle()">
                <label class="form-check-label" for="exampleCheck1">Show Password</label>
              </div> -->
              <div class="form-group">
                <div class="d-flex justify-content-between mg-b-5">
                  <label class="mg-b-0-f">Password</label>
                  <a href="<?= base_url('Login/forgot'); ?>" class="tx-13">Forgot Password?</a>
                </div>
                <div class="input-group" id="show_hide_password">
                  <input type="password" class="form-control form-control-user <?= ($validation->hasError('Password')) ? 'is-invalid' : ''; ?>" name="Password" id="Password" value="<?= old('Password'); ?>" placeholder="Password">

                  <div class="input-group-append">
                    <button class="input-group-text eye <?= ($validation->hasError('Password')) ? 'is-invalid' : ''; ?>" id="mata" type="button" tabindex="-1"><i style="color: black; font-weight: 700; font-size: 18px;" class="las la-eye" aria-hidden="true"></i></button>
                  </div>
                  <div class=" invalid-feedback">
                    <?= $validation->getError('Password'); ?>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-brand-02 btn-block">Sign In</button>

              <div class="tx-13 mg-t-20 tx-center">Don't have an account? <a href="<?= base_url('Login/signup'); ?>">Create an Account</a></div>
            </div>
          </div><!-- sign-wrapper -->
        </form>
      </div><!-- media -->
    </div><!-- container -->
  </div><!-- content -->

  <footer class="footer">
    <div>
      <span>&copy; <?= date('Y'); ?> KasirKita v1.0.0. </span>
    </div>
  </footer>

  <script src="<?= base_url(); ?>/public/template/lib/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/public/template/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>/public/template/lib/feather-icons/feather.min.js"></script>
  <script src="<?= base_url(); ?>/public/template/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url(); ?>/public/template/lib/prismjs/prism.js"></script>
  <script src="<?= base_url(); ?>/public/template/lib/parsleyjs/parsley.min.js"></script>
  <script src="<?= base_url(); ?>/public/template/assets/js/dashforge.js"></script>

  <!-- append theme customizer -->
  <script src="<?= base_url(); ?>/public/template/lib/js-cookie/js.cookie.js"></script>
  <script src="<?= base_url(); ?>/public/template/assets/js/dashforge.settings.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url() ?>/public/template/assets/sweetalert2/sweetalert2.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#show_hide_password button").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("la-eye");
          $('#show_hide_password i').removeClass("la-eye-slash");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("la-eye");
          $('#show_hide_password i').addClass("la-eye-slash");
        }
      });
    });

    // function Toggle() {
    //   var temp = document.getElementById("password");
    //   if (temp.type === "password") {
    //     temp.type = "text";
    //   } else {
    //     temp.type = "password";
    //   }
    // }
    $(document).ready(function() {
      <?php if (session()->getFlashdata('bahaya')) : ?>
        <?php if (session()->getFlashdata('success')) : ?>
          Swal.fire({
            title: 'Gagal!',
            text: '<?= session()->getFlashdata('bahaya'); ?>',
            icon: 'error'
          });
        <?php endif; ?>
      <?php endif ?>
    });
    $(document).ready(function() {
      <?php if (session()->getFlashdata('bahaya1')) : ?>
        <?php if (session()->getFlashdata('success')) : ?>
          Swal.fire({
            title: 'Gagal!',
            text: '<?= session()->getFlashdata('bahaya1'); ?>, <?= session()->getFlashdata('txt'); ?>',
            icon: 'error'
          });
        <?php endif; ?>
      <?php endif ?>
    });
    $(document).ready(function() {
      <?php if (session()->getFlashdata('msg')) : ?>
        <?php if (session()->getFlashdata('success')) : ?>
          Swal.fire({
            title: 'Success',
            text: 'Register Success',
            icon: 'success',
            confirmButtonColor: '#007bff',
            //    cancelButtonColor: '#d33',
          });
        <?php endif; ?>
      <?php endif ?>
    });
    $(document).ready(function() {
      <?php if (session()->getFlashdata('pesan')) : ?>
        <?php if (session()->getFlashdata('success')) : ?>
          Swal.fire({
            title: 'Congratulations!',
            text: '<?= session()->getFlashdata('pesan') ?>',
            icon: 'success',
            confirmButtonColor: '#007bff',
            //    cancelButtonColor: '#d33',
          });
        <?php endif; ?>
      <?php endif ?>
    });
  </script>
</body>

</html>