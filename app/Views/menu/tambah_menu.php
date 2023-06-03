<form class="parsley-style-1" data-parsley-validate novalidate role="form" method="post" action="<?= base_url('menu/tambahdata') ?>">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" placeholder="Title" value="<?= old('title') ?>">
        <div class=" invalid-feedback">
            <?= $validation->getError('title'); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="url">URL</label>
        <input type="text" class="form-control <?= ($validation->hasError('url')) ? 'is-invalid' : ''; ?>" id="url" name="url" placeholder="URL" value="<?= old('url') ?>">
        <div class=" invalid-feedback">
            <?= $validation->getError('url'); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="icon">Icon</label>
        <input type="text" class="form-control <?= ($validation->hasError('icon')) ? 'is-invalid' : ''; ?>" id="icon" name="icon" placeholder="Icon" value="<?= old('icon') ?>">
        <div class=" invalid-feedback">
            <?= $validation->getError('icon'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="is_active" value="" name="is_active" onclick="chck()">
            <label class="custom-control-label" for="is_active">Active</label>
        </div>
    </div>
    <button type="submit" name="simpan" class="btn btn-primary btn-icon-split mr-1">
        <span class="icon">
            <i class="las la-save" style="font-size: 18px"></i>
        </span>
        <span class="text">Simpan</span>
    </button>
    <a href="<?= base_url('menu') ?>" type="cancel" name="batal" class="btn btn-danger btn-icon-split">
        <span class="icon">
            <i class="las la-times" style="font-size: 18px"></i>
        </span>
        <span class="text">Batal</span>
    </a>
</form>
</div>