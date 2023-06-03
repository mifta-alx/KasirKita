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
        foreach ($menu as $tampil) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $tampil['menu_id']; ?></td>
                <td><?= $tampil['title']; ?></td>
                <td><?= $tampil['url']; ?></td>
                <td><i data-feather="<?= $tampil['icon']; ?>"></i>&nbsp;<?= $tampil['icon']; ?></td>
                <td>
                <?php if ($tampil['is_active'] == 1) {
                    echo "<i class='las la-check text-success' style='font-size: 20px; font-weight:800;'></i>";
                }else{
                    echo "<i class='las la-times text-danger' style='font-size: 20px; font-weight:800;'></i>";
                } ?></td>
                <td>
                    <div class="btn-group">
                        <a href="<?= base_url('menu/edit/' . $tampil['menu_id']); ?>" class="btn btn-sm btn-primary">
                            <i class="feather-edit-3"></i>
                        </a>
                        <a href="javascript:void(0)" onclick="hapus('<?= $tampil['menu_id']; ?>')" class="btn btn-sm btn-danger btn-delete" data-menu_id="<?= $tampil['menu_id']; ?>" id="btn-delete">
                            <i class="feather-trash-2"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>