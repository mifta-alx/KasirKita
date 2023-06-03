<style>
    .card {
        border: none !important;
    }

    .btn-number {
        border-radius: 5px !important;
    }

    .input-number {
        border: none;
        text-align: center;
        /* width: 50px !important; */
    }

    #gambarproduk:hover {
        /* transform: translateY(-15px); */
        transform: scale(1.2);
    }

    #gambarproduk {
        transition: 0.6s;
    }

    .circle {
        display: grid;
        place-items: center;
        background-color: var(--primary);
        border-radius: 50%;
    }
    .parent{
        display: grid;
        border-radius: 50%;
        background-color: var(--primary);
        place-items: center ;
    }
    .child{
        color: #fff;
        /* padding: 14px;*/
        padding: 15px 14px 15px 14px;
        font-size: 11px;
    }
    .diskon {
        position: absolute;
    }



    .btn-next {
        border-radius: 50%;
        background-color: #5b9dfc;
        color: white;
        /* box-shadow: 0 0 0 0.5rem rgb(1 104 250 / 20%); */
    }

    .btn-next:hover {
        border-radius: 50%;
        background-color: #3f7bd2;
        color: white;
        /* box-shadow: 0 0 0 0.5rem rgb(1 104 250 / 20%); */
    }

    .info {
        position: fixed;
        bottom: 40px;
        right: 40px;
        z-index: 999;
    }

    .min,
    .plus {
        /* margin: 0 10px;
        width: 20px;
        height: 20px; */
        /* background-color: #828282; */
        /* border-radius: 50%; */
        display: flex;
        justify-content: center;
        align-items: center;
        /* color: #eaeaeaea; */
        cursor: pointer;
        color: #fff;
        background-color: #0168fa;
        border-color: #0168fa;
        display: inline-block;
        font-weight: 400;
        /* color: #001737; */
        text-align: center;
        vertical-align: middle;
        user-select: none;
        /* background-color: transparent; */
        /* border: 1px solid transparent; */
        padding: 0.46875rem 0.9375rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;

    }

    .disable {
        /* background-color: #adadad; */
        /* background-color: #5b9dfc; */
        opacity: 0.65;
        color: #fff;
        background-color: #0168fa;
        border-color: #0168fa;
        cursor: not-allowed;
    }

    /* .disable:hover{
        background-color: #5b9dfc;
    } */

    .submit {
        margin-top: 10px;
        margin-left: 10px;
    }

    .user-data {
        /* position: relative;
    flex: 1 1 auto;
    width: 5%;
    margin-bottom: 0; */
        display: block;
        width: 25%;
        height: calc(1.5em + 0.9375rem + 2px);
        padding: 0.46875rem 0.625rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1.5;
        color: #596882;
        background-color: #fff;
        background-clip: padding-box;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        border: none;
        text-align: center;
    }

    .user-data:focus-visible {
        border: none !important;
        outline: none !important;
    }

    .off-canvas {
        width: 360px !important;
        /* box-shadow: ; */
    }

    .off-canvas.show {
        box-shadow: 0 0 18px rgb(28 39 60 / 20%) !important;
    }

    .backdrop {
        opacity: 10 !important;
        z-index: 1001 !important;
    }
</style>

<?php if (session()->get('role_id') !== '5') { ?>
    <div class="row">
        <?php foreach ($produkuser as $tampil2) : ?>

            <div class="card col-lg-3 mb-4 mt-2" id="show">
                <?php if ($tampil2['diskon_persen'] !== '0') { ?>
                    <div class="diskon d-flex justify-content-start mg-l-30">
                        <div class="parent">
                                <div class="child"><?= $tampil2['diskon_persen'] ?>%</div>
                        </div>
                    </div>
                <?php } ?>
                <div class="brand-logo d-flex justify-content-center mb-2 mg-t-10">
                    <img src="<?= base_url('public/template/assets/img/produk/' . $tampil2['gambar']); ?>" id="gambarproduk" height="120px">
                </div>
                <div class="txt d-flex justify-content-center">
                    <h5><?= $tampil2['nama_produk']; ?></h5>
                </div>
                <div class="price d-flex justify-content-center">
                    <h6 class="text-primary">Rp <?php echo number_format($tampil2['total'], 0, '.', '.'); ?></h6>
                    <?php if ($tampil2['diskon'] !== '0') { ?>
                        &nbsp;<h6 style="text-decoration: line-through; color: #b4bdce;">Rp <?php echo number_format($tampil2['harga_jual'], 0, '.', '.'); ?></h6>
                    <?php } ?>
                </div>
                <!-- <div class="kategori d-flex justify-content-center">
                <h6><?= $tampil2['id_kategori']; ?></h6>
            </div> -->
                <div class="row d-flex justify-content-center mt-1 mb-4">
                    <div class="col-7 d-flex justify-content-center">
                        <!-- <div class="input-group">
                        <span class="input-group-prepend">
                            <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                <span class="las la-minus"></span>
                            </button>
                        </span>
                        <input type="text" name="quant[1]" class="form-control input-number" value="0" min="0" max="100" readonly>
                        <span class="input-group-append">
                            <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                <span class="las la-plus"></span>
                            </button>
                        </span>
                    </div> -->
                        <div class="form row mt-3 d-flex justify-content-center">

                            <div class="min disable">
                                -
                            </div>
                            <input name="data" class="user-data" 
                            data-id="<?= $tampil2['id_produk']; ?>" 
                            data-nama_produk="<?= $tampil2['nama_produk']; ?>" 
                            data-total="<?= $tampil2['total']; ?>" 
                            data-harga_jual="<?= $tampil2['harga_jual']; ?>"
                            data-diskon="<?= $tampil2['diskon']; ?>" value="0" readonly />
                            <div class="plus">
                                +
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="pagination justify-content-center">
        <?= $pager->links('produk2', 'produk_pagination') ?>
    </div>
<?php } ?>
<?php if (session()->get('role_id') == '5') { ?>
    <div class="row">
        <?php foreach ($produk as $tampil) : ?>

            <div class="card col-lg-3 mb-4 mt-2" id="show">
                <?php if ($tampil['diskon_persen'] !== '0') { ?>
                    <div class="diskon d-flex justify-content-start mg-l-30">
                        <div class="circle">
                            <p class="text-white d-flex align-content-center flex-wrap m-0 p-3 tx-12">
                                <?= $tampil['diskon_persen'] ?>%
                            </p>
                        </div>
                    </div>
                <?php } ?>
                <div class="brand-logo d-flex justify-content-center mb-2 mg-t-10">
                    <img src="<?= base_url('public/template/assets/img/produk/' . $tampil['gambar']); ?>" id="gambarproduk" height="120px">
                </div>
                <div class="txt d-flex justify-content-center">
                    <h5><?= $tampil['nama_produk']; ?></h5>
                </div>
                <div class="price d-flex justify-content-center">
                    <h6 class="text-primary">Rp <?php echo number_format($tampil['total'], 0, '.', '.'); ?></h6>
                    <?php if ($tampil['diskon'] !== '0') { ?>
                        &nbsp;<h6 style="text-decoration: line-through; color: #b4bdce;">Rp <?php echo number_format($tampil['harga_jual'], 0, '.', '.'); ?></h6>
                    <?php } ?>
                </div>
                <!-- <div class="kategori d-flex justify-content-center">
                <h6><?= $tampil['id_kategori']; ?></h6>
            </div> -->
                <div class="row d-flex justify-content-center mt-1 mb-4">
                    <div class="col-7 d-flex justify-content-center">
                        <div class="form row mt-3 d-flex justify-content-center">

                            <div class="min disable">
                                -
                            </div>
                            <input name="data" class="user-data" data-id="<?= $tampil['id_produk']; ?>" data-nama_produk="<?= $tampil['nama_produk']; ?>" data-total="<?= $tampil['total']; ?>" value="0" readonly />
                            <div class="plus">
                                +
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="pagination justify-content-center">
        <?= $pager->links('produk', 'produk_pagination') ?>
    </div>
<?php } ?>
<div class="next">
    <div id="offCanvas2" class="off-canvas off-canvas-overlay off-canvas-right">
        <a href="#" class="close"><i data-feather="x"></i></a>
        <p style="font-size: 20px; text-align:center; font-weight: 700; margin-top: 16px; margin-bottom: 0px;
            letter-spacing: -1px;
            color: inherit;
            align-items: center;  color: #031a61;">Kasir
            <span style="display: inline-block; font-weight: 400; color: #0168fa;">Kita</span></p>

        <div class="pd-x-20 ht-100p tx-11">
            <h5 class="tx-inverse mg-t-5 mg-b-5">Pesanan</h5>
            <hr>
            <div id="data"></div>
            <div class="result">
            <hr style="display: none;" id="garis">
                <div class="row">
                    <div class="col-5" id="r_nama_produk" style="font-weight: 500;"></div>
                    <div class="col-2" id="r_jumlah" style="font-weight: 500;"></div>
                    <div class="col-3" id="r_harga" style="font-weight: 500;"></div>
                    <div class="col-2" id="r_total" style="font-weight: 500;"></div>
                </div>
                <div class="row">
                    <div class="col-10" id="totaldisc" style="font-weight: 500;"></div>
                    <div class="col-2" id="totaldiskon" style="font-weight: 500;"></div>
                </div>
                <div class="row">
                    <div class="col-10" id="txtotalbelanja" style="font-weight: 500;"></div>
                    <div class="col-2" id="totalbelanja" style="font-weight: 500;"></div>
                </div>
            </div>
            <!-- <hr> -->
            <div class="bawah">
            Nama Pelanggan : <input type="text" class="form-control mb-2" placeholder="Nama Pelanggan" name="nama_pelanggan">
            Nominal Tunai : <input type="text" class="form-control mb-2" placeholder="Tunai" name="nominal_tunai">
            <a href="" class="btn btn-primary mb-1 tx-13" style="width: 100%;"><i class="las la-money-bill-wave-alt tx-15"></i> Bayar</a>
            <a href="" class="btn btn-secondary tx-13" style="width: 100%;"><i class="las la-print tx-15"></i> Cetak Struk</a>
            </div>
            </div>
        </div>
    </div>
    <div class="info">
        <a href="#offCanvasMenu" class="btn btn-next off-canvas-menu submit">
            <i class="las la-arrow-right tx-26 py-2"></i></a>
    </div>
</div>
</div>