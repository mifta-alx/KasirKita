<style>
    .pr_diskon {
        background-color: #fff;
        border-left: none;
        border-top-right-radius: 0.25rem !important;
        border-bottom-right-radius: 0.25rem !important;
    }

    .pr_diskon.is-invalid {
        background-color: #fff;
        ;
        border-left: none;
        border-right: 1px solid #dc3545;
        border-bottom: 1px solid #dc3545;
        border-top: 1px solid #dc3545;
        color: #dc3545;
    }

    #diskon_persen {
        border-right: none;
        color: #596882;
        background-color: #fff;
    }

    .total {
        border-left: none;
        background-color: #fff !important;
        border-top-right-radius: 0.25rem !important;
        border-bottom-right-radius: 0.25rem !important;
    }

    .diskon {
        border-left: none;
        border-top-right-radius: 0.25rem !important;
        border-bottom-right-radius: 0.25rem !important;
    }

    .harga_jual {
        border-left: none;
        border-top-right-radius: 0.25rem !important;
        border-bottom-right-radius: 0.25rem !important;
    }

    .rp {
        background-color: #fff;
        border-top-left-radius: 0.25rem !important;
        border-bottom-left-radius: 0.25rem !important;
        border-right: none;
    }

    .rp.is-invalid {
        background-color: #fff;
        ;
        border-right: none;
        border-left: 1px solid #dc3545;
        border-bottom: 1px solid #dc3545;
        border-top: 1px solid #dc3545;
        color: #dc3545;
    }
</style>
<form class="parsley-style-1" data-parsley-validate novalidate role="form" enctype="multipart/form-data" method="post" action="<?= base_url('produk/tambah_produk') ?>">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="Nama Produk">Nama Produk</label>
        <input type="text" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : ''; ?>" id="nama_produk" name="nama_produk" placeholder="Nama Produk" value="<?= old('nama_produk') ?>">
        <div class=" invalid-feedback">
            <?= $validation->getError('nama_produk'); ?>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputharga_jual4">Harga Jual</label>
            <div class="input-group" id="show_hide_harga_jual">
                <div class="input-group-append">
                    <button class="input-group-text rp <?= ($validation->hasError('harga_jual')) ? 'is-invalid' : ''; ?>" type="button" tabindex="-1">Rp.</button>
                </div>
                <input type="text" class="form-control harga_jual <?= ($validation->hasError('harga_jual')) ? 'is-invalid' : ''; ?>" id="harga_jual" onkeyup="sum()" autocomplete="off" placeholder="Harga Jual" name="harga_jual" value="<?= old('harga_jual') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('harga_jual'); ?>
                </div>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label for="diskon">Diskon</label>
            <div class="input-group" id="show_hide_diskon">
                <div class="input-group-append">
                    <button class="input-group-text rp <?= ($validation->hasError('diskon')) ? 'is-invalid' : ''; ?>" type="button" tabindex="-1">Rp.</button>
                </div>
                <input type="text" class="form-control diskon <?= ($validation->hasError('diskon')) ? 'is-invalid' : ''; ?>" id="diskon" autocomplete="off" onkeyup="sum()" placeholder="Diskon" name="diskon" value="<?= old('diskon') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('diskon'); ?>
                </div>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label for="total">Total</label>
            <div class="input-group" id="show_hide_total">
                <div class="input-group-append">
                    <button class="input-group-text rp <?= ($validation->hasError('total')) ? 'is-invalid' : ''; ?>" type="button" tabindex="-1">Rp.</button>
                </div>
                <input type="text" class="form-control total <?= ($validation->hasError('total')) ? 'is-invalid' : ''; ?>" id="total" autocomplete="off" placeholder="Total" name="total" value="<?= old('total') ?>" readonly>
                <div class="invalid-feedback">
                    <?= $validation->getError('total'); ?>
                </div>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label for="ttl_diskon">Diskon Persen</label>
            <div class="input-group" id="show_hide_ttl_diskon">
                <input type="text" class="form-control diskon_persen <?= ($validation->hasError('diskon_persen')) ? 'is-invalid' : ''; ?>" id="diskon_persen" autocomplete="off" placeholder="Diskon Persen" name="diskon_persen" value="<?= old('diskon_persen') ?>" readonly>
                <div class="input-group-append">
                    <button class="input-group-text pr_diskon <?= ($validation->hasError('diskon_persen')) ? 'is-invalid' : ''; ?>" type="button" tabindex="-1"><i class="las la-percent tx-18"></i></button>
                </div>
                <div class="invalid-feedback">
                    <?= $validation->getError('diskon_persen'); ?>
                </div>
            </div>
        </div>
    </div>

    <?php if (session()->get('role_id') !== '5') { ?>
    <div class="form-group">
        <label for="Kategori">Kategori</label>
        <select id='id_kategori' class="form-control <?= ($validation->hasError('id_kategori')) ? 'is-invalid' : ''; ?> id_kategori" name="id_kategori">
            <option value="" disabled selected>Pilih Kategori</option>
            <?php foreach ($userkategori as $book) : ?>
                <option value="<?= $book['id_kategori']; ?>"><?php echo $book['kategori']; ?></option>
            <?php endforeach; ?>
        </select>
        <div class=" invalid-feedback">
            <?= $validation->getError('id_kategori'); ?>
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
    <?php }elseif(session()->get('role_id') == '5'){ ?>
    <div class="form-group">
        <label for="Kategori">Kategori</label>
        <select id='id_kategori' class="form-control <?= ($validation->hasError('id_kategori')) ? 'is-invalid' : ''; ?> id_kategori" name="id_kategori">
            <option value="" disabled selected>Pilih Kategori</option>
            <?php foreach ($kategori as $book) : ?>
                <option value="<?= $book['id_kategori']; ?>"><?php echo $book['kategori']; ?></option>
            <?php endforeach; ?>
        </select>
        <div class=" invalid-feedback">
            <?= $validation->getError('id_kategori'); ?>
        </div>
    </div>
        <input type="hidden" class="form-control" name="outlet_id" value="<?= session()->get('outlet_id'); ?>">
        <?php } ?>

    <input type="hidden" class="form-control" id="nama_bisnis" name="nama_bisnis" placeholder="" value="<?= session()->get('nama_bisnis'); ?>">
    <div class="form-group">
        <label for="gambar">Gambar Produk</label>
        <div class="row">
            <div class="col-lg-2">
                <img src="<?= base_url() ?>/public/template/assets/img/produk/produk.png" class="img-thumbnail img-preview">
            </div>
            <div class="col-lg-10">
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewJPG()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('gambar'); ?>
                    </div>
                    <label class="custom-file-label" for="customFile">Pilih Gambar Produk </label>
                </div>
                <small class="form-text text-muted">Format: JPG/JPEG/PNG</small>
            </div>
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
</div>