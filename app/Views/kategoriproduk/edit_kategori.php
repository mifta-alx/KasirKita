<form class="parsley-style-1" data-parsley-validate novalidate role="form" enctype="multipart/form-data" method="post" action="<?= base_url('kategoriproduk/ubahdata/' . $kategori['id_kategori']) ?>">
    <?= csrf_field(); ?>
    
    <div class="form-group">
        <label for="Nama Kategori">Nama Kategori</label>
        <input type="text" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori" placeholder="Kategori" value="<?= old('kategori', $kategori['kategori']) ?>">
        <div class=" invalid-feedback">
            <?= $validation->getError('kategori'); ?>
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
    <button type="submit" name="simpan" class="btn btn-primary btn-icon-split mr-1">
        <span class="icon">
            <i class="las la-save" style="font-size: 18px"></i>
        </span>
        <span class="text">Simpan</span>
    </button>
    <a href="<?= base_url('produk/index') ?>" type="cancel" name="batal" class="btn btn-danger btn-icon-split">
        <span class="icon">
            <i class="las la-times" style="font-size: 18px"></i>
        </span>
        <span class="text">Batal</span>
    </a>
</form>