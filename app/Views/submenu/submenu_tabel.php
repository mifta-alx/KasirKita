<table id="example2" class="table" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Menu Id</th>
            <th>Title</th>
            <th>URL</th>
            <th>Icon</th>
            <th>Active</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($submenu as $tampil) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $tampil['menu_id']; ?></td>
                <td><?= $tampil['sub_title']; ?></td>
                <td><?= $tampil['sub_url']; ?></td>
                <td><i data-feather="<?= $tampil['sub_icon']; ?>"></i>&nbsp;<?= $tampil['sub_icon']; ?></td>
                <td>
                <?php if ($tampil['sub_is_active'] == 1) {
                    echo "<i class='las la-check text-success' style='font-size: 20px; font-weight:800;'></i>";
                }else{
                    echo "<i class='las la-times text-danger' style='font-size: 20px; font-weight:800;'></i>";
                } ?></td>
                <td>
                    <div class="btn-group">
                        <a href="<?= base_url('submenu/edit/' . $tampil['id']); ?>" class="btn btn-sm btn-primary">
                            <i class="feather-edit-3"></i>
                        </a>
                        <a href="javascript:void(0)" onclick="hapus('<?= $tampil['id']; ?>')" class="btn btn-sm btn-danger btn-delete" data-id="<?= $tampil['id']; ?>" id="btn-delete">
                            <i class="feather-trash-2"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>