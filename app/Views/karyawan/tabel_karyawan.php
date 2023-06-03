<table id="example2" class="table" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Karyawan</th>
      <th>Outlet</th>
      <th>Username</th>
      <th>Email</th>
      <th>Level</th>
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
        <td><?= $tampil['nama_karyawan']; ?></td>
        <td><?= $tampil['nama_outlet']; ?></td>
        <td><?= $tampil['username']; ?></td>
        <td><?= $tampil['email']; ?></td>
        <td><?= $tampil['role']; ?></td>
        <td>
          <div class="btn-group">
            <a href="<?= base_url('karyawan/edit/' . $tampil['id_karyawan']); ?>" class="btn btn-sm btn-primary">
              <i class="feather-edit-3"></i>
            </a>
            <a href="javascript:void(0)" onclick="hapus('<?= $tampil['id_karyawan']; ?>')" class="btn btn-sm btn-danger btn-delete" data-id_kasir="<?= $tampil['id_karyawan']; ?>" id="btn-delete" name="btn-delete">
              <i class="feather-trash-2"></i>
            </a>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
</div>
<div class="modal fade" id="modalUpgrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content tx-14">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel2">Berlangganan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-4 pr-0">
            <p class="mg-b-0">Apakah Anda Yakin</p>
          </div>
          <div class="col-sm-2 p-0">
            <input type="text p-0" class="form-control nama_kasir" name="nama_kasir" style="text-transform: capitalize; padding-top: 0 !important; padding-left: 0 !important;">
          </div>
          <div class="col-sm-6">
            <p class="mg-b-0">Sudah Membayar?</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary tx-13">Save changes</button>
      </div>
    </div>
  </div>
</div>