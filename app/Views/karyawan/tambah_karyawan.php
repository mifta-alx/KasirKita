<style>
    .klik {
        background-color: #0168fa;
        border-radius: 25px;
        color: white;
    }

    .card-body:hover {
        background-color: #0168fa;
        border-radius: 25px;
        color: white;
    }

    .card-body:hover .card-title {
        color: white;
    }

    .klik .card-title {
        color: white;
    }

    .card {
        border-radius: 25px;
        box-shadow: 0 0.15rem 1.75rem 0 rgb(58 59 69 / 15%);
    }

    .card.is-invalid {
        border-color: #dc3545 !important;
        box-shadow: 0 0.15rem 1.75rem 0 rgb(58 59 69 / 15%);
    }

    .eye {
        background-color: transparent;
        border-left: none;
        border-top-right-radius: 0.25rem !important;
        border-bottom-right-radius: 0.25rem !important;
    }

    .eye.is-invalid {
        background-color: transparent;
        border-left: none;
        border-right: 1px solid #dc3545;
        border-bottom: 1px solid #dc3545;
        border-top: 1px solid #dc3545;
        color: #dc3545;
    }

    #Password {
        border-right: none;
    }
</style>
<div class="row mb-3">
    <div class="col-6">
        <div class="card <?= ($validation->hasError('role_id')) ? 'is-invalid' : ''; ?>">
            <div class="card-body kasir" id="kasir">
                <h6 class="card-title tx-22">Kasir</h6>
                <p class="card-text tx-12">Karyawan ini bertugas sebagai kasir, mereka hanya mendapatkan hak akses di aplikasi kasir</p>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card <?= ($validation->hasError('role_id')) ? 'is-invalid' : ''; ?>">
            <div class="card-body staff" id="staff">
                <h6 class="card-title tx-22">Staff</h6>
                <p class="card-text tx-12">Dapat mengakses aplikasi kasir dan backend pada web kasirkita untuk melakukan manajemen data</p>
            </div>
        </div>
    </div>
</div>
<form action="<?= base_url('karyawan/save'); ?>" method="post">
    <?= csrf_field(); ?>
    <div class="hal-form d-none" id="hal-form">
        <div class="form-group">
            <label for="Nama" id="nama">Nama</label>
            <input type="text" class="form-control <?= ($validation->hasError('nama_karyawan')) ? 'is-invalid' : ''; ?>" id="nama_karyawan" name="nama_karyawan" placeholder="Nama" value="<?= old('nama_karyawan') ?>">
            <div class=" invalid-feedback">
                <?= $validation->getError('nama_karyawan'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="Username" value="<?= old('username') ?>">
            <div class=" invalid-feedback">
                <?= $validation->getError('username'); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email" value="<?= old('email') ?>">
                <div class=" invalid-feedback">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <div class="input-group" id="show_hide_password">
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Password" id="Password" autocomplete="off" name="password" value="<?= old('password') ?>">
                    <div class="input-group-append">
                        <button class="input-group-text eye <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" type="button" tabindex="-1"><i class="fa fa-eye mata" aria-hidden="true"></i></button>
                    </div>
                    <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="outlet">Outlet</label>
            <select class="form-control <?= ($validation->hasError('outlet_id')) ? 'is-invalid' : ''; ?> select2" id="outlet" style="width: 100%;" name="outlet_id">
                <option selected disabled>Pilih Outlet</option>
                <?php foreach ($dataoutlet as $outlet) : ?>
                    <option value="<?= $outlet['outlet_id'] ?>"><?= $outlet['nama_outlet'] ?></option>
                <?php endforeach ?>
            </select>
            <div class=" invalid-feedback">
                <?= $validation->getError('outlet_id'); ?>
            </div>
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="role_id" name="role_id" placeholder="role_id" value="<?= old('role_id') ?>">
            <input type="hidden" class="form-control" id="image" name="image" placeholder="gambar" value="admin.png">
            <input type="hidden" class="form-control" id="is_active" name="is_active" placeholder="gambar" value="1">
            <input type="hidden" class="form-control" id="nama_bisnis" name="nama_bisnis" placeholder="" value="<?= session()->get('nama_bisnis'); ?>">
            <input id="tgl" name="tgl" type="hidden" class="form-control" value="<?= old('tgl'); ?>">
            <input id="bulan" name="bulan" type="hidden" class="form-control" value="<?= old('bulan'); ?>">
            <input id="tahun" name="tahun" type="hidden" class="form-control" value="<?= old('tahun'); ?>">
            <input type="hidden" class="form-control" id="kota_kabupaten" name="kota_kabupaten" placeholder="" value="<?= session()->get('kota_kabupaten'); ?>">
            <input type="hidden" class="form-control" id="provinsi" name="provinsi" placeholder="" value="<?= session()->get('provinsi'); ?>">
            <input type="hidden" class="form-control" id="kategori" name="kategori" placeholder="" value="<?= session()->get('kategori'); ?>">
            <input type="hidden" class="form-control" id="subkategori" name="subkategori" placeholder="" value="<?= session()->get('subkategori'); ?>">
        </div>
        <button type="submit" name="simpan" class="btn btn-primary btn-icon-split mr-1" id="btn-simpan">
            <span class="icon">
                <i class="las la-save" style="font-size: 18px"></i>
            </span>
            <span class="text">Simpan</span>
        </button>
        <a href="<?= base_url('karyawan/index') ?>" type="cancel" name="batal" class="btn btn-danger btn-icon-split">
            <span class="icon">
                <i class="las la-times" style="font-size: 18px"></i>
            </span>
            <span class="text">Batal</span>
        </a>
    </div>
</form>
</div>