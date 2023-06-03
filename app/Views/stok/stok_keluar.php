<a href="#modal3" class="btn btn-primary" data-toggle="modal">Tambah Stok Keluar</a>
<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content tx-14">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel3"><b>TAMBAH STOK KELUAR</b></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
        <form action="<?= base_url('stok_keluar/create'); ?>" method="post">
          <div class="control-group after-add-more">
            <table class="table">
              <tr>
                <td> Nama Produk </td>
                <td> Tanggal Pembelian </td>
                <td> Jumlah </td>
                <td> Harga </td>
                <td></td>
              </tr>
              <tr>
              <input type="hidden" name="kode" value="1777"> 
              <td>
                <select class="form-control" name="id_produk[]">
                  <option class="disable"></option>
                  <?php
                  $no = 1;
                  foreach ($stok as $tampil) {
                  ?>
                    <option value="<?= $tampil['id_produk']; ?>"><?= $tampil['nama_produk']; ?></option>
                  <?php } ?>
                </select>
                  <!-- <select class="select2" name="jurusan[]">
                      <option>Sistem Informasi</option>
                      <option>Informatika</option>
                      <option>Akuntansi</option>
                      <option>DKV</option>
                  </select> -->
                </td>
                <td>
                  <input type="date" name="tgl_pengeluaran[]" class="form-control">
                </td>
                <td>
                  <input type="text" name="jumlah[]" class="form-control">
                </td>
                <td>
                  <input type="text" name="harga[]" class="form-control">
                </td>
                <td>
                  <button class="btn btn-success add-more" type="button">
                    <i data-feather="plus-circle"></i>
                  </button>
                </td>
              </tr>
            </table>
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Batal</button>
        <button type="submit" name="simpan" class="btn btn-primary tx-13">Tambah Stok Keluar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="container">
  <div class="copy invisible">
      <div class="control-group">
      <table class="table">
        <tr>
        <input type="hidden" name="kode" value="5"> 
          <td>
          <select class="form-control" name="id_produk[]">
            <option class="disable"></option>
            <?php
            $no = 1;
            foreach ($stok as $tampil) {
            ?>
              <option value="<?= $tampil['id_produk']; ?>"><?= $tampil['nama_produk']; ?></option>
            <?php } ?>
          </select>
              <!-- <select class="select2" name="jurusan[]">
                  <option>Sistem Informasi</option>
                  <option>Informatika</option>
                  <option>Akuntansi</option>
                  <option>DKV</option>
              </select> -->
          </td>
          <td>
            <input type="date" name="tgl_pengeluaran[]" class="form-control">
          </td>
          <td>
            <input type="text" name="jumlah[]" class="form-control">
          </td>
          <td>
            <input type="text" name="harga[]" class="form-control">
          </td>
          <td>
            <button class="btn btn-danger remove" type="button"><i data-feather="trash-2"></i></button>
          </td>
          
      </table>
    </div>
  </div>
</div>
<table id="example2" class="table" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Waktu Submit</th>
        <th>Kode Stok Keluar</th>
        <th>Jumlah</th>
        <th>Tanggal Pembelian</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($users as $tampil) {
      ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $tampil['tgl_submit']; ?></td>
          <td>SM-<?= $tampil['kode_stok_keluar']; ?></td>
          <td><?= $tampil['jumlah']; ?></td>
          <td><?= $tampil['tgl_pengeluaran']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
</table>