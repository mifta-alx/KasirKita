<style>
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
<form class="parsley-style-1" data-parsley-validate novalidate role="form" method="post" action="<?= base_url('pengguna/ubahdata/' . $pengguna['id_pengguna']) ?>">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="Nama">Nama</label>
        <input type="text" class="form-control <?= ($validation->hasError('nama_pengguna')) ? 'is-invalid' : ''; ?>" id="nama_pengguna" name="nama_pengguna" placeholder="Nama" value="<?= old('nama_pengguna', $pengguna['nama_pengguna']) ?>">
        <div class=" invalid-feedback">
            <?= $validation->getError('nama_pengguna'); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="Username">Username</label>
        <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="Nama" value="<?= old('username', $pengguna['username']) ?>">
        <div class=" invalid-feedback">
            <?= $validation->getError('username'); ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email" value="<?= old('email', $pengguna['email']) ?>">
            <div class=" invalid-feedback">
                <?= $validation->getError('email'); ?>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <div class="input-group" id="show_hide_password">
                <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="Password" autocomplete="off" name="password" value="<?= old('password', $pengguna['password']) ?>">
                <div class="input-group-append">
                    <button class="input-group-text eye <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" type="button" tabindex="-1"><i style="margin-right: 5px" class="fa fa-eye mata" aria-hidden="true"></i></button>
                </div>
                <div class="invalid-feedback">
                    <?= $validation->getError('password'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Level</label>
        <select style="text-transform: capitalize;" class="custom-select  <?= ($validation->hasError('role_id')) ? 'is-invalid' : ''; ?>" name="role_id" id="role_id">
            <option disabled selected>Pilih Level</option>
            <?php foreach ($role as $tampil) : ?>
                <option value="<?= $tampil['role_id']; ?>"><?= $tampil['role']; ?></option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback">
            <?= $validation->getError('role_id'); ?>
        </div>
    </div>
    <!-- <div class="form-group">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1">Agree with Terms of Use and Privacy Policy</label>
        </div>
    </div> -->
    <button type="submit" name="simpan" class="btn btn-primary btn-icon-split mr-1">
        <span class="icon">
            <i class="las la-save" style="font-size: 18px"></i>
        </span>
        <span class="text">Simpan</span>
    </button>
    <a href="<?= base_url('pengguna/index') ?>" type="cancel" name="batal" class="btn btn-danger btn-icon-split">
        <span class="icon">
            <i class="las la-times" style="font-size: 18px"></i>
        </span>
        <span class="text">Batal</span>
    </a>
</form>
</div>