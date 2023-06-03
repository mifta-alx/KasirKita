<table id="example2" class="table" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Role Id</th>
        <th>Role</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($users as $tampil) {
      ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $tampil['role_id']; ?></td>
          <td style="text-transform: capitalize;"><?= $tampil['role']; ?></td>
          <td>
            <div class="btn-group">
              <a href="<?= base_url('role/access/' . $tampil['role_id']); ?>" class="btn btn-sm btn-warning">
                <i class="feather-settings"></i>
              </a>
              <a href="<?= base_url('role/edit/' . $tampil['role_id']); ?>" class="btn btn-sm btn-primary">
                <i class="feather-edit-3"></i>
              </a>
              <a href="javascript:void(0)" onclick="hapus('<?= $tampil['role_id']; ?>')" class="btn btn-sm btn-danger btn-delete" data-role_id="<?= $tampil['role_id']; ?>" id="btn-delete">
                <i class="feather-trash-2"></i>
              </a>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>