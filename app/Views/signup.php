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

    <link href="<?= base_url(); ?>/public/template/lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/public/template/lib/prismjs/themes/prism-vs.css" rel="stylesheet">
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

        .form-check-input .is-invalid {
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
                    <!-- <ul>
                        <li>
                            <span class="number">1</span>
                            <span class="textt">Registrasi</span>
                        </li>
                        <li>
                        <span class="arrow"><i class="feather-arrow-right"></i></span>
                        </li>
                        <li>
                            <span class="numberdisabled">2</span>
                            <span class="textdisabled">Verifikasi</span>
                        </li>
                    </ul> -->
                    <ul class="steps">
                        <li class="step-item active">
                            <a href="" class="step-link">
                                <span class="step-number">1</span>
                                <span class="step-title">Registration</span>
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
                                <span class="step-title">Category</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('login/register') ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row d-flex justify-content-center">
                            <div class="pd-t-5 wd-100p col-sm-auto col-lg-10">
                                <h4 class="tx-color-01 mg-b-5">Create New Account</h4>
                                <p class="tx-color-03 tx-16 mg-b-20">It's free to signup and only takes a minute.</p>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input id="nama_pengguna" name="nama_pengguna" type="text" class="form-control <?= ($validation->hasError('nama_pengguna')) ? 'is-invalid' : ''; ?>" placeholder="Nama" value="<?= old('nama_pengguna'); ?>" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_pengguna'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input id="username" name="username" type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" placeholder="Username" value="<?= old('username'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input id="email" name="email" type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Email" value="<?= old('email'); ?>">
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="d-flex justify-content-between mg-b-5">
                                        <label class="mg-b-0-f">Password</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-0">
                                            <input id="password1" name="password1" type="password" class="form-control <?= ($validation->hasError('password1')) ? 'is-invalid' : ''; ?>" placeholder="Enter Your Password" value="<?= old('password1'); ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('password1'); ?>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <input id="password2" name="password2" type="password" class="form-control <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" placeholder="Confirmation" value="<?= old('password2'); ?>">
                                            <div class=" invalid-feedback">
                                                <?= $validation->getError('password2'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <input id="tgl" name="tgl" type="hidden" class="form-control" value="<?= old('tgl'); ?>">
                                    <input id="bulan" name="bulan" type="hidden" class="form-control" value="<?= old('bulan'); ?>">
                                    <input id="tahun" name="tahun" type="hidden" class="form-control" value="<?= old('tahun'); ?>">

                                </div>
                                <div class="form-group mb-1">
                                    <div class="custom-control custom-checkbox" id="chck">
                                        <input type="checkbox" class="custom-control-input" id="exampleCheck1" onclick="Toggle()">
                                        <label class="custom-control-label" for="exampleCheck1">Show Password</label>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input <?= ($validation->hasError('checkbox')) ? 'is-invalid' : ''; ?>" id="customCheck1" value="" onclick="check()" name="checkbox">
                                        <label class="custom-control-label <?= ($validation->hasError('checkbox')) ? 'is-invalid' : ''; ?>" for="customCheck1">I Agree With Terms of Use & Privacy Policy</label>
                                    </div>
                                </div>
                                <div class="form-group row d-none">
                                    <div class="col-3">
                                        <!-- <label for="gambar">Pilih Foto</label> -->
                                        <!-- <div class="col-sm-2"> -->
                                        <img src="<?= base_url() ?>/public/template/assets/img/admin.png" class="img-thumbnail img-preview">
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" name="image" onchange="previewJPG()">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('image'); ?>
                                            </div>
                                            <label class="custom-file-label" for="customFile">Pilih foto</label>
                                        </div>
                                        <small class="form-text text-muted">Format: JPG/JPEG/PNG</small>
                                    </div>
                                </div>
                                <div class="form-group tx-12">
                                    By clicking <strong>Create an account</strong> below, you agree to our terms of service and privacy statement.
                                </div><!-- form-group -->

                                <button class="btn btn-brand-02 btn-block" type="submit">Create Account</button>
                                <div class="tx-13 mg-t-20 tx-center">Already have an account? <a href="<?= base_url('Login'); ?>">Sign In</a></div>
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
    <script src="<?= base_url(); ?>/public/template/lib/jquery-steps/build/jquery.steps.min.js"></script>
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
        var d = new Date();
        var weekday = new Array(7);
        weekday[0] = "Minggu";
        weekday[1] = "Senin";
        weekday[2] = "Selasa";
        weekday[3] = "Rabu";
        weekday[4] = "Kamis";
        weekday[5] = "Jum'at";
        weekday[6] = "Sabtu";

        var n = weekday[d.getDay()];

        var bulan = new Array(12);
        bulan[0] = "Januari";
        bulan[1] = "Februari";
        bulan[2] = "Maret";
        bulan[3] = "April";
        bulan[4] = "Mei";
        bulan[5] = "Juni";
        bulan[6] = "Juli";
        bulan[7] = "Agustus";
        bulan[8] = "September";
        bulan[9] = "Oktober";
        bulan[10] = "November";
        bulan[11] = "Desember";

        var b = bulan[d.getMonth()];
        var t = d.getDate();
        var t2 = d.getUTCFullYear();

        let tgl = document.getElementById('tgl');
        let bln = document.getElementById('bulan');
        let thn = document.getElementById('tahun');
        $('#tgl').val(t);
        $('#bulan').val(b);
        $('#tahun').val(t2);


        function check() {
            // Get the checkbox
            var checkBox = document.getElementById("customCheck1");
            if (checkBox.checked == true) {
                $('#customCheck1').val('1');
            } else {
                $('#customCheck1').val(' ');
            }
        }
    </script>
</body>

</html>