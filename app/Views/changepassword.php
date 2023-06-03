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
    <!-- FEATHER -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/template/assets/feather-icons/feather.css" rel="stylesheet" />
    <!-- DashForge CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/public/template/assets/css/dashforge.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/template/assets/css/dashforge.auth.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/template/assets/css/dashforge.demo.css">
    <style>
        body {
            font-family: Poppins, sans-serif;
            /* font-family: 'Quicksand', sans-serif !important;  */
        }

        .textt {
            color: #0168fa;
            height: 32px;
            float: left;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Inter UI", Roboto, sans-serif;
            margin-left: 10px;
            margin-right: 10px;
        }

        .number {
            width: 32px;
            height: 32px;
            float: left;
            border-color: #0168fa;
            background-color: #0168fa;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Inter UI", Roboto, sans-serif;
            border-radius: 100%;
        }

        .numberdisabled {
            color: #97a3b9;
            border: 2px solid #97a3b9;
            width: 32px;
            height: 32px;
            float: left;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Inter UI", Roboto, sans-serif;
            border-radius: 100%;
            margin-left: 10px;
        }

        .textdisabled {
            color: #97a3b9;
            height: 32px;
            float: left;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Inter UI", Roboto, sans-serif;
            margin-left: 10px;
        }

        .arrow {
            color: #97a3b9;
            font-size: 17px;
            width: 32px;
            height: 32px;
            float: left;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Inter UI", Roboto, sans-serif;
        }

        ul {
            list-style-type: none;
            padding-left: 0px;
        }

        .logo {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 20%;
        }

        #token {
            font-size: 30px;
            font-weight: 700;
            border: none;
            text-align: center;
        }

        #token:focus {
            border: none;
            box-shadow: none;
        }

        .form-control.is-invalid {
            border: 1px solid !important;
            border-color: #dc3545 !important;
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

    <div class="content content-fixed content-auth pt-3">
        <div class="container">
            <div class="card">
                <div class="card-header mx-0">
                    <ul class="steps">
                        <li class="step-item complete">
                            <a href="" class="step-link">
                                <span class="step-number">1</span>
                                <span class="step-title">Forgot Password</span>
                            </a>
                        </li>
                        <li class="step-item complete">
                            <a href="" class="step-link">
                                <span class="step-number">2</span>
                                <span class="step-title">Verification</span>
                            </a>
                        </li>
                        <li class="step-item active">
                            <a href="" class="step-link">
                                <span class="step-number">3</span>
                                <span class="step-title">Change Password</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('login/changePassword') ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row d-flex justify-content-center">
                            <div class="pd-t-5 wd-100p col-sm-auto col-lg-7">
                                <img src="<?= base_url(); ?>/public/template/assets/img/logo3.png" class="logo">
                                <h4 class="tx-color-01 mg-b-5 d-flex justify-content-center" style="text-align: center;">Change your password for</h4>
                                <p class="tx-color-01 tx-16 mg-b-20 d-flex justify-content-center" style="text-align: center;"><?= session()->get('reset_email'); ?></p>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password1" id="password1" class="form-control <?= ($validation->hasError('password1')) ? 'is-invalid' : ''; ?>" placeholder="New password" value="<?= old('password1'); ?>">
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('password1'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Repeat Password</label>
                                    <input type="password" name="password2" id="password2" class="form-control <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" placeholder="Repeat password" value="<?= old('password2'); ?>">
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('password2'); ?>
                                    </div>
                                </div>

                                <div class="form-check mb-2" id="chck">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="Toggle()">
                                    <label class="form-check-label" for="exampleCheck1">Show Password</label>
                                </div>
                                <button class="btn btn-brand-02 btn-block mb-2" type="submit">Reset Password</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- container -->
    </div><!-- content -->
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
        function Toggle() {
            var temp = document.getElementById("password1");
            var temp2 = document.getElementById("password2");
            if (temp.type === "password" && temp2.type === "password") {
                temp.type = "text";
                temp2.type = "text";
            } else {
                temp.type = "password";
                temp2.type = "password";
            }
        }
        $(document).ready(function() {
            <?php if (session()->getFlashdata('verif_b')) : ?>
                <?php if (session()->getFlashdata('success')) : ?>
                    Swal.fire({
                        title: 'mosk',
                        text: <?= session()->getFlashdata('verif_b') ?>,
                        icon: 'success',
                        confirmButtonColor: '#007bff',
                        //    cancelButtonColor: '#d33',
                    });
                <?php endif; ?>
            <?php endif ?>
        });
        $(document).ready(function() {
            <?php if (session()->getFlashdata('error')) : ?>
                <?php if (session()->getFlashdata('success')) : ?>
                    Swal.fire({
                        title: 'Failed!',
                        text: '<?= session()->getFlashdata('error') ?>, <?= session()->getFlashdata('word') ?>',
                        icon: 'warning',
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
                        title: 'Berhasil!',
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