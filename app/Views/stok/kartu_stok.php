<table id="example2" class="table" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Produk</th>
        <th>Kategori</th>
        <th>Stok Awal</th>
        <th>Stok Masuk</th>
        <th>Stok Keluar</th>
        <th>Penjualan</th>
        <th>Transfer</th>
        <!-- <th>Penyesuaian</th> -->
        <th>Stok Akhir</th>
        <!-- <th>Satuan</th> -->
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($users as $tampil) {
      ?>
      <?php $akhir = $tampil['stok_awal']+$tampil['stok_masuk']-$tampil['stok_keluar']; ?>z
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $tampil['nama_produk']; ?></td>
          <td><?= $tampil['kategori']; ?></td>
          <td><?= $tampil['stok_awal']; ?></td>
          <td><?= $tampil['stok_masuk']; ?></td>
          <td><?= $tampil['stok_keluar']; ?></td>
          <td><?= $tampil['penjualan']; ?></td>
          <td><?= $tampil['transfer']; ?></td>
          <td><?= $akhir; ?></td>
        </tr>
      <?php } ?>
    </tbody>
</table>