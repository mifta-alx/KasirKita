<style>
  .card {
    border: 1px solid rgba(72, 94, 144, 0.10) !important;
  }

  #gambarproduk:hover {
    /* transform: translateY(-15px); */
    transform: scale(1.2);
  }

  #gambarproduk {
    transition: 0.6s;
  }

  th,
  td {
    text-align: center;
  }
  
</style>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active produk" id="produk-tab" data-toggle="tab" href="#produk" role="tab" aria-controls="produk" aria-selected="true">Produk</a>
  </li>
  <li class="nav-item">
    <a class="nav-link kategori" id="kategori-tab" data-toggle="tab" href="#kategori" role="tab" aria-controls="kategori" aria-selected="false">Kategori</a>
  </li>
</ul>
<div class="tab-content bd bd-gray-300 bd-t-0 pd-20" id="myTabContent">
  <div class="tab-pane fade show active" id="produk" role="tabpanel" aria-labelledby="produk-tab">
    <div class="dropdown mb-3">
      <button class="btn dropdown-toggle" type="button" id="dropdownMenuBhutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Kategori
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <?php if (session()->get('role_id') == '5') { ?>
        <?php foreach ($kategori as  $filter) : ?>
          <div class="dropdown-item">
            <input type="checkbox" class="kategori_check2" id="kategori_filter2" value="<?= $filter['id_kategori'] ?>"> <?= $filter['kategori'] ?>
          </div>
        <?php endforeach ?>
        <?php } ?>
      <?php if (session()->get('role_id') !== '5') { ?>
        <?php foreach ($userkategori as  $filter) : ?>
          <div class="dropdown-item">
            <input type="checkbox" class="kategori_check" id="kategori_filter" value="<?= $filter['id_kategori'] ?>"> <?= $filter['kategori'] ?>
          </div>
        <?php endforeach ?>
        <?php } ?>
      </div>
    </div>
      <?php if (session()->get('role_id') !== '5') { ?>
    <table id="example4" class="table" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Kategori</th>
          <th>Harga Jual</th>
          <th>Gambar Produk</th>
          <th>Diskon</th>
          <th>Total</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="tbody">

      </tbody>
    </table>
    <?php } ?>
      <?php if (session()->get('role_id') == '5') { ?>
    <table id="example4staff" class="table" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Kategori</th>
          <th>Harga Jual</th>
          <th>Gambar Produk</th>
          <th>Diskon</th>
          <th>Total</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="tbody">

      </tbody>
    </table>
    <?php } ?>
  </div>
  <div class="tab-pane fade" id="kategori" role="tabpanel" aria-strongledby="kategori-tab">
    <!-- kategori -->
    <div class="tab-content ml-1" id="myTabContent">
      <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
        <?php if (session()->get('role_id') == '4') { ?>
          <table id="example3" class="table" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($kategori as $tampil2) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $tampil2['kategori']; ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?= base_url('kategoriproduk/edit/' . $tampil2['id_kategori']); ?>" class="btn btn-sm btn-primary">
                        <i class="feather-edit-3"></i>
                      </a>
                      <a href="javascript:void(0)" onclick="hapus('<?= $tampil2['id_kategori']; ?>')" class="btn btn-sm btn-danger btn-delete2" data-id_kategori="<?= $tampil2['id_kategori']; ?>" id="btn-delete">
                        <i class="feather-trash-2"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        <?php } ?>
          <table id="example3" class="table" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($userkategori as $tampil2) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $tampil2['kategori']; ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?= base_url('kategoriproduk/edit/' . $tampil2['id_kategori']); ?>" class="btn btn-sm btn-primary">
                        <i class="feather-edit-3"></i>
                      </a>
                      <a href="javascript:void(0)" onclick="hapus('<?= $tampil2['id_kategori']; ?>')" class="btn btn-sm btn-danger btn-delete2" data-id_kategori="<?= $tampil2['id_kategori']; ?>" id="btn-delete">
                        <i class="feather-trash-2"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
</div>