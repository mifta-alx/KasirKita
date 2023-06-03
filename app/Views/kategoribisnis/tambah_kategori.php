<form class="parsley-style-1" data-parsley-validate novalidate kategori="form" method="post" action="<?= base_url('kategoribisnis/tambahdata') ?>">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="Kategori">Kategori</label>
        <input type="text" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori" placeholder="Kategori" value="<?= old('kategori') ?>">
        <div class=" invalid-feedback">
            <?= $validation->getError('kategori'); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="icon">Icon</label>
        <input type="text" class="form-control <?= ($validation->hasError('icon')) ? 'is-invalid' : ''; ?>" id="icon" name="icon" placeholder="Icon" value="<?= old('icon') ?>">
        <div class=" invalid-feedback">
            <?= $validation->getError('icon'); ?>
        </div>
    </div>
    <button type="submit" name="simpan" class="btn btn-primary btn-icon-split mr-1">
        <span class="icon">
            <i class="las la-save" style="font-size: 18px"></i>
        </span>
        <span class="text">Simpan</span>
    </button>
    <a href="<?= base_url('kategoribisnis') ?>" type="cancel" name="batal" class="btn btn-danger btn-icon-split">
        <span class="icon">
            <i class="las la-times" style="font-size: 18px"></i>
        </span>
        <span class="text">Batal</span>
    </a>
</form>
</div>