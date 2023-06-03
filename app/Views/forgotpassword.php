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
            width: 50%;
        }

        /* 
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
        } */
    </style>
</head>

<body>

    <header class="navbar navbar-header navbar-header-fixed">
        <a href="" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
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
            <!-- <div class="mx-wd-300 wd-sm-450 ht-100p d-flex flex-column align-items-center justify-content-center">
                <div class="wd-80p wd-sm-300 mg-b-15"><img src="<?= base_url(); ?>/public/template/assets/img/logo3.png" class="img-fluid" alt=""></div>
                <h4 class="tx-20 tx-sm-24">Reset your password</h4>
                <p class="tx-color-03 mg-b-30 tx-center">Enter your email address and we will send you a link to reset your password.</p>
                <form action="<?= base_url('login/forgotpassword'); ?>" method="POST">
                    <div class="wd-100p d-flex flex-column flex-sm-row mg-b-40">
                        <input type="text" name="email" class="form-control wd-sm-250 flex-fill" placeholder="Enter email address" value="<?= set_value('email'); ?>">
                        <button type="submit" class="btn btn-brand-02 mg-sm-l-10 mg-t-10 mg-sm-t-0">Reset Password</button>
                    </div>
                </form>
                <span class="tx-14 tx-color-03"> <a href="<?= base_url('login'); ?>">Back to login</a></span>
            </div> -->
            <div class="card">
                <div class="card-header mx-0">
                <ul class="steps">
                        <li class="step-item active">
                            <a href="" class="step-link">
                                <span class="step-number">1</span>
                                <span class="step-title">Forgot Password</span>
                            </a>
                        </li>
                        <li class="step-item">
                            <a href="" class="step-link">
                                <span class="step-number">2</span>
                                <span class="step-title">Verification</span>
                            </a>
                        </li>
                        <li class="step-item">
                            <a href="" class="step-link">
                                <span class="step-number">3</span>
                                <span class="step-title">Change Password</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('login/forgotpassword'); ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row d-flex justify-content-center">
                            <div class="pd-t-3 wd-100p col-sm-auto col-lg-5">
                                <img src="<?= base_url(); ?>/public/template/assets/img/logo3.png" class="logo">
                                <h4 class="tx-color-01 mg-b-5 d-flex justify-content-center" style="text-align: center;">Reset Your Password</h4>
                                <p class="tx-color-03 mg-b-30 tx-center">Enter your email address and we will send you a link to reset your password.</p>
                                <div class="wd-100p d-flex flex-column flex-sm-row mg-b-40">
                                    <input type="text" name="email" class="form-control wd-sm-250 flex-fill" placeholder="Enter email address" value="<?= set_value('email'); ?>">
                                    <button type="submit" class="btn btn-brand-02 mg-sm-l-10 mg-t-10 mg-sm-t-0">Reset Password</button>
                                </div>
                                <span class="tx-13 mg-t-20 tx-center d-flex justify-content-center"> <a href="<?= base_url('login'); ?>">Back to login</a></span>
                            </div>
                        </div><!-- sign-wrapper -->
                    </form>
                </div>
            </div>
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
    <script>
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
    </script>
</body>

</html>