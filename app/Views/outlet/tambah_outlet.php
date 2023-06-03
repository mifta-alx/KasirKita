<form class="parsley-style-1" data-parsley-validate novalidate kategori="form" method="post" action="<?= base_url('outlet/tambahdata') ?>">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="nama_outlet">Nama Outlet</label>
        <input type="text" class="form-control <?= ($validation->hasError('nama_outlet')) ? 'is-invalid' : ''; ?>" id="nama_outlet" autocomplete="off" name="nama_outlet" placeholder="Nama Outlet" value="<?= old('nama_outlet') ?>">
        <div class=" invalid-feedback">
            <?= $validation->getError('nama_outlet'); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" placeholder="Alamat" value="<?= old('alamat') ?>" rows="2"></textarea>
        <div class=" invalid-feedback">
            <?= $validation->getError('alamat'); ?>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="telpon">No. Telepon</label>
            <div class="input-group" id="show_hide_telpon">
                <div class="input-group-append">
                    <button class="input-group-text" type="button" tabindex="-1">+62</button>
                </div>
                <input type="text" class="form-control telpon <?= ($validation->hasError('telpon')) ? 'is-invalid' : ''; ?>" id="telpon" name="telpon" placeholder="No. Telepon" value="<?= old('telpon') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('telpon'); ?>
                </div>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="kota_kabupaten">Kota Kabupaten</label>
            <select class="form-control select2" id="kota_kabupaten" style="width: 100%;" name="kota_kabupaten">
                <option selected disabled>Pilih Kota Kabupaten</option>
                <?php foreach ($kota as $kt) : ?>
                    <option value="<?= $kt['kota_id'] ?>"><?= $kt['kota_kabupaten'] ?>, Provinsi <?= $kt['provinsi'] ?></option>
                <?php endforeach ?>
            </select>
            <div class="invalid-feedback">
                <?= $validation->getError('kota_kabupaten'); ?>
            </div>
            <input type="hidden" name="kota" id="kota">
            <input type="hidden" name="provinsi" id="provinsi">
        </div>
    </div>

    <button type="submit" name="simpan" class="btn btn-primary btn-icon-split mr-1">
        <span class="icon">
            <i class="las la-save" style="font-size: 18px"></i>
        </span>
        <span class="text">Simpan</span>
    </button>
    <a href="<?= base_url('outlet') ?>" type="cancel" name="batal" class="btn btn-danger btn-icon-split">
        <span class="icon">
            <i class="las la-times" style="font-size: 18px"></i>
        </span>
        <span class="text">Batal</span>
    </a>
</form>
</div>