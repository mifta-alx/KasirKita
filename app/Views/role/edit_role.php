<form class="parsley-style-1" data-parsley-validate novalidate role="form" method="post" action="<?= base_url('role/ubahdata/' . $role['role_id']) ?>">
<?= csrf_field(); ?>
    <div class="form-group">
        <label for="Role">Role</label>
        <input type="text" class="form-control <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>" id="role" name="role" placeholder="Role" value="<?= old('role', $role['role']) ?>">
        <div class=" invalid-feedback">
            <?= $validation->getError('role'); ?>
        </div>
    </div>
    <button type="submit" name="simpan" class="btn btn-primary btn-icon-split mr-1">
                            <span class="icon">
                                <i class="las la-save" style="font-size: 18px"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </button>
    <a href="<?= base_url('role') ?>" type="cancel" name="batal" class="btn btn-danger btn-icon-split">
                            <span class="icon">
                                <i class="las la-times" style="font-size: 18px"></i>
                            </span>
                            <span class="text">Batal</span>
                        </a>
</form>
</div>