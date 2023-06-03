<form class="parsley-style-1" data-parsley-validate novalidate subkategori="form" method="post" action="<?= base_url('subkategori/tambahdata') ?>">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="kategori">Kategori</label>
        <select class="form-control select2" id="id_kategori" style="width: 100%;" name="id_kategori">
            <option selected disabled>Pilih Kategori</option>
            <?php foreach ($kategori as $tampil) : ?>
            <option value="<?= $tampil['kategori_id'] ?>"><?= $tampil['kategori'] ?></option>
            <?php endforeach ?>
        </select>
        <div class=" invalid-feedback">
            <?= $validation->getError('kategori'); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="subkategori">Subkategori</label>
        <input type="text" class="form-control <?= ($validation->hasError('subkategori')) ? 'is-invalid' : ''; ?>" id="subkategori" name="subkategori" placeholder="Subkategori" value="<?= old('subkategori') ?>">
        <div class=" invalid-feedback">
            <?= $validation->getError('subkategori'); ?>
        </div>
    </div>
    <button type="submit" name="simpan" class="btn btn-primary btn-icon-split mr-1">
        <span class="icon">
            <i class="las la-save" style="font-size: 18px"></i>
        </span>
        <span class="text">Simpan</span>
    </button>
    <a href="<?= base_url('subkategori') ?>" type="cancel" name="batal" class="btn btn-danger btn-icon-split">
        <span class="icon">
            <i class="las la-times" style="font-size: 18px"></i>
        </span>
        <span class="text">Batal</span>
    </a>
</form>
</div>