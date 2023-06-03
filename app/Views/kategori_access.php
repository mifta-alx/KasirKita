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
    <link rel="stylesheet" href="<?= base_url(); ?>/public/template/assets/css/dashforge.auth.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/template/assets/css/dashforge.demo.css">
    <link href="<?= base_url(); ?>/public/template/lib/select2/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/template/assets/css/dashforge.css">
    <link href="<?= base_url(); ?>/public/template/lib/jqvmap/jqvmap.min.css" rel="stylesheet">

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
            width: 35%;
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

        optgroup {
            font-weight: 600 !important;
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
                    <ul>
                        <li class="step-item complete">
                            <a href="" class="step-link">
                                <span class="step-number">1</span>
                                <span class="step-title">Registration</span>
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
                                <span class="step-title">Category</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('login/kategori_access') ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row d-flex justify-content-center">
                            <div class="pd-t-5 wd-100p col-sm-auto col-lg-5">
                                <img src="<?= base_url(); ?>/public/template/assets/img/logo3.png" class="logo">
                                <h4 class="tx-color-01 mg-b-5 d-flex justify-content-center" style="text-align: center;">Browse Your Category</h4>
                                <p class="tx-color-03 tx-16 mg-b-20 d-flex justify-content-center" style="text-align: center;">Select One to Select a Category</p>
                                <div class="form-group">
                                    <div id="sidebarMenu">
                                        <div class="sidebar-body">
                                            <div class="form-group">
                                                <label for="nama_bisnis">Nama Bisnis</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('nama_bisnis')) ? 'is-invalid' : ''; ?>" id="nama_bisnis" name="nama_bisnis" placeholder="Nama Bisnis" value="<?= old('nama_bisnis') ?>">
                                                <div class=" invalid-feedback">
                                                    <?= $validation->getError('nama_bisnis'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_outlet">Nama Outlet</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('nama_outlet')) ? 'is-invalid' : ''; ?>" id="nama_outlet" name="nama_outlet" placeholder="Nama Outlet" value="<?= old('nama_outlet') ?>">
                                                <div class=" invalid-feedback">
                                                    <?= $validation->getError('nama_outlet'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat Outlet</label>
                                                <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" placeholder="Alamat" rows="2"><?= old('alamat') ?></textarea>
                                                <div class=" invalid-feedback">
                                                    <?= $validation->getError('alamat'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="telpon">No. Telepon</label>
                                                <input type="text" class="form-control telpon <?= ($validation->hasError('telpon')) ? 'is-invalid' : ''; ?>" id="telpon" name="telpon" placeholder="No. Telepon" value="<?= old('telpon') ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('telpon'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kategori_bisnis">Kategori Bisnis</label>
                                                <select class="custom-select <?= ($validation->hasError('subkategori')) ? 'is-invalid' : ''; ?>" id="subkategori" name="subkategori">
                                                    <?php foreach ($kategori as $tampil) { ?>
                                                    <option selected disabled>Pilih Kategori Bisnis</option>

                                                        <optgroup label="<?= $tampil['kategori'] ?>">
                                                            <?php
                                                            $kategoriId = $tampil['kategori_id'];
                                                            $querySubKategori = "SELECT *
                                                                   FROM `db_access_subkategori` JOIN `db_access_kategori` 
                                                                     ON `db_access_subkategori`.`id_kategori` = `db_access_kategori`.`kategori_id`
                                                                  WHERE `db_access_subkategori`.`id_kategori` = $kategoriId ";
                                                            $subkategori = $db->query($querySubKategori)->getResultArray();
                                                            ?>
                                                            <?php foreach ($subkategori as $show) { ?>
                                                                <option style="text-transform: capitalize;" <?= $show['subkategori'] ?>"><?= $show['subkategori'] ?></option>
                                                            <?php } ?>
                                                        </optgroup>
                                                    <?php } ?>
                                                </select>
                                                <div class=" invalid-feedback">
                                                    <?= $validation->getError('subkategori'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kota_kabupaten">Kota Kabupaten</label>
                                                <select class="custom-select select2 <?= ($validation->hasError('kota_kabupaten')) ? 'is-invalid' : ''; ?>" id="kota_kabupaten" name="kota_kabupaten">
                                                    <option selected disabled>Pilih Kota Kabupaten</option>
                                                    <?php foreach ($kota as $kt) : ?>
                                                        <option value="<?= $kt['kota_id'] ?>"><?= $kt['kota_kabupaten'] ?>, Provinsi <?= $kt['provinsi'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <div class=" invalid-feedback">
                                                    <?= $validation->getError('kota_kabupaten'); ?>
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" name="email" id="email" value="<?= session()->get('get_email'); ?>">
                                            <input type="hidden" name="kota" id="kota">
                                            <input type="hidden" name="provinsi" id="provinsi">
                                            <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                        </div><!-- sidebar-body -->
                                    </div><!-- sidebar -->
                                </div>
                                <div class="tx-13 mg-t-20 tx-center">Already have an account? <a href="<?= base_url('Login'); ?>">Sign In</a></div>
                            </div>
                        </div><!-- sign-wrapper -->
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
    <script src="<?= base_url(); ?>/public/template/lib/select2/js/select2.min.js"></script>
    <script src="<?= base_url(); ?>/public/template/lib/cleave.js/cleave.min.js"></script>
    <script src="<?= base_url(); ?>/public/template/lib/cleave.js/addons/cleave-phone.us.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#subkategori').val(`<?= old('subkategori') ?>`);
            $('#kota_kabupaten').val(`<?= old('kota_kabupaten') ?>`);
            $('#kota_kabupaten').select2({
                allowClear: true,
                placeholder: 'Pilih Kota Kabupaten',
                searchInputPlaceholder: 'Pilih Kota Kabupaten',
            });
            $('#subkategori').select2({
                allowClear: true,
                placeholder: 'Pilih Kategori',
                searchInputPlaceholder: 'Pilih Kategori',
            });
        });

        $("#kota_kabupaten").change(async function() {
            const data = await fetch("<?= base_url(); ?>/Home/datakota/" + $('#kota_kabupaten').val()).then(res => res.json()).then(res => res)
            $('#provinsi').val(data.data[0][0].provinsi)
            // console.log(data);
        });

        $("#kota_kabupaten").change(async function() {
            const data = await fetch("<?= base_url(); ?>/Home/datakota/" + $('#kota_kabupaten').val()).then(res => res.json()).then(res => res)
            $('#kota').val(data.data[0][0].kota_kabupaten)
            console.log(data);
        });
        var cleaveJ = new Cleave('#telpon', {
            blocks: [12],
            uppercase: true,
        });
    </script>
</body>

</html>