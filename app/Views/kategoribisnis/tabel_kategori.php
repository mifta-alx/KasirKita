<table id="example2" class="table" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Kategori Id</th>
      <th>Nama Kategori</th>
      <th>Icon</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach ($kategori as $tampil) {
    ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $tampil['kategori_id']; ?></td>
        <td style="text-transform: capitalize;"><?= $tampil['kategori']; ?></td>
        <td><i data-feather="<?= $tampil['icon']; ?>"></i>&nbsp;<?= $tampil['icon']; ?></td>
        <td>
          <div class="btn-group">
            <a href="<?= base_url('kategoribisnis/edit/' . $tampil['kategori_id']); ?>" class="btn btn-sm btn-primary">
              <i class="feather-edit-3"></i>
            </a>
            <a href="javascript:void(0)" onclick="hapus('<?= $tampil['kategori_id']; ?>')" class="btn btn-sm btn-danger btn-delete" data-kategori_id="<?= $tampil['kategori_id']; ?>" id="btn-delete">
              <i class="feather-trash-2"></i>
            </a>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
</div>