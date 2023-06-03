<form class="parsley-style-1" data-parsley-validate novalidate menu="form" method="post" action="<?= base_url('submenu/ubahdata/' . $submenu['id']) ?>">
    <?= csrf_field(); ?>
    <div class="form-group">
        <label for="Menu">Menu</label>
        <select id='selUser' class="custom-select <?= ($validation->hasError('menu_id')) ? 'is-invalid' : ''; ?>" name="menu_id">
            <option value="" disabled selected>Pilih Menu</option>
            <?php foreach ($menu as $data) : ?>
                <option value="<?php echo $data['menu_id']; ?>"><?php echo $data['title']; ?></option>
            <?php endforeach; ?>
        </select>
        <div class=" invalid-feedback">
            <?= $validation->getError('menu_id'); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control <?= ($validation->hasError('sub_title')) ? 'is-invalid' : ''; ?>" id="sub_title" name="sub_title" placeholder="Title" value="<?= old('sub_title', $submenu['sub_title']) ?>">
        <div class=" invalid-feedback">
            <?= $validation->getError('sub_title'); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="url">URL</label>
        <input type="text" class="form-control <?= ($validation->hasError('sub_url')) ? 'is-invalid' : ''; ?>" id="sub_url" name="sub_url" placeholder="URL" value="<?= old('sub_url', $submenu['sub_url']) ?>">
        <div class=" invalid-feedback">
            <?= $validation->getError('sub_url'); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="icon">Icon</label>
        <input type="text" class="form-control <?= ($validation->hasError('sub_icon')) ? 'is-invalid' : ''; ?>" id="sub_icon" name="sub_icon" placeholder="Icon" value="<?= old('sub_icon', $submenu['sub_icon']) ?>">
        <div class=" invalid-feedback">
            <?= $validation->getError('sub_icon'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="sub_is_active" value="<?= old('sub_is_active', $submenu['sub_is_active']) ?>" <?= ($submenu['sub_is_active'] == 1) ? 'checked' : ''; ?> name="sub_is_active" onclick="chck()">
            <label class="custom-control-label" for="sub_is_active">Active</label>
        </div>
    </div>
    <button type="submit" name="simpan" class="btn btn-primary btn-icon-split mr-1">
        <span class="icon">
            <i class="las la-save" style="font-size: 18px"></i>
        </span>
        <span class="text">Simpan</span>
    </button>
    <a href="<?= base_url('submenu') ?>" type="cancel" name="batal" class="btn btn-danger btn-icon-split">
        <span class="icon">
            <i class="las la-times" style="font-size: 18px"></i>
        </span>
        <span class="text">Batal</span>
    </a>
</form>
</div>