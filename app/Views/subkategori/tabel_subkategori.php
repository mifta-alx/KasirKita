<table id="example2" class="table" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Subkategori Id</th>
      <th>Kategori</th>
      <th>Subkategori</th>
      <th>URL</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach ($kategori as $tampil) {
    ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $tampil['subkategori_id']; ?></td>
        <td><?= $tampil['kategori']; ?></td>
        <td><?= $tampil['subkategori']; ?></td>
        <td><?= $tampil['url']; ?></td>
        <td>
          <div class="btn-group">
            <a href="<?= base_url('subkategori/edit/' . $tampil['subkategori_id']); ?>" class="btn btn-sm btn-primary">
              <i class="feather-edit-3"></i>
            </a>
            <a href="javascript:void(0)" onclick="hapus('<?= $tampil['subkategori_id']; ?>')" class="btn btn-sm btn-danger btn-delete" data-subkategori_id="<?= $tampil['subkategori_id']; ?>" id="btn-delete">
              <i class="feather-trash-2"></i>
            </a>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
</div>