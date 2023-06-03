<table id="example4" class="table" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Outlet</th>
            <th>Alamat Outlet</th>
            <th>Kota Outlet</th>
            <th>Provinsi Outlet</th>
            <th>No. Telepon Outlet</th>
            <!-- <th width="200px">Pajak Outlet</th> -->
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($outlet as $tampil2) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $tampil2['nama_outlet']; ?></td>
                <td><?= $tampil2['alamat']; ?></td>
                <td><?= $tampil2['provinsi']; ?></td>
                <td><?= $tampil2['kota']; ?></td>
                <td><?= $tampil2['telpon']; ?></td>
                <td>
                    <div class="btn-group">
                        <a href="<?= base_url('outlet/edit/' . $tampil2['outlet_id']); ?>" title="Edit" class="btn btn-sm btn-primary">
                            <i class="feather-edit-3"></i>
                        </a>
                        <a href="javascript:void(0)" onclick="hapus('<?= $tampil2['outlet_id']; ?>')" title="Hapus" class="btn btn-sm btn-danger btn-delete2" data-outlet_id="<?= $tampil2['outlet_id']; ?>" id="btn-delete">
                            <i class="feather-trash-2"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>