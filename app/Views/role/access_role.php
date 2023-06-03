<table id="example2" class="table" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Akses</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($menu as $tampil) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $tampil['title']; ?></td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input position-static" type="checkbox" <?= check_access($role['role_id'], $tampil['menu_id']); ?> data-role="<?= $role['role_id']; ?>" data-menu="<?= $tampil['menu_id']; ?>">
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>