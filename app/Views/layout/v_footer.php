<style>
    .footer {
        position: absolute;
        width: 100%;
        padding: 15px 25px;
        bottom: -50px;
    }
</style>
</div>
<footer class="footer">
    <div>
        <span>&copy; <?= date('Y'); ?> KasirKita v1.0.0 </span>
    </div>
</footer>

<!-- <script src="<?= base_url(); ?>/public/template/lib/jquery/jquery.min.js"></script> -->
<script src="<?= base_url(); ?>/public/template/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/feather-icons/feather.min.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/jquery.flot/jquery.flot.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/jquery.flot/jquery.flot.stack.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/jquery.flot/jquery.flot.resize.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/chart.js/Chart.bundle.min.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/select2/js/select2.min.js"></script>
<script src="<?= base_url(); ?>/public/template/assets/js/dashforge.js"></script>
<script src="<?= base_url(); ?>/public/template/assets/js/dashforge.sampledata.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/prismjs/prism.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/parsleyjs/parsley.min.js"></script>


<script src="<?= base_url(); ?>/public/template/lib/jquery.flot/jquery.flot.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/jquery.flot/jquery.flot.pie.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/jquery.flot/jquery.flot.stack.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/jquery.flot/jquery.flot.resize.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/jquery.flot/jquery.flot.threshold.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/jquery.flot/jquery.flot.fillbetween.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/jquery.flot/jquery.flot.crosshair.js"></script>

<script src="<?= base_url(); ?>/public/template/lib/chart.js/Chart.bundle.min.js"></script>
<script src="<?= base_url(); ?>/public/template/assets/js/chart.chartjs.js"></script>
<!-- append theme customizer -->
<script src="<?= base_url(); ?>/public/template/lib/js-cookie/js.cookie.js"></script>
<script src="<?= base_url(); ?>/public/template/assets/js/dashforge.settings.js"></script>

<!-- Toastr -->
<script src="<?= base_url() ?>/public/template/assets/toastr/toastr.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>/public/template/assets/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/cleave.js/cleave.min.js"></script>
<script src="<?= base_url(); ?>/public/template/lib/cleave.js/addons/cleave-phone.us.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- <script src="<?= base_url() ?>/public/template/vendor/chart.js/package/dist/chart.min.js"></script> -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script> -->

<script>
    // $('.drpdwn').click(function() {
    //     if ($('#nv-sub').hasClass('show')) {
    //         $('#nv-sub').removeClass("show");
    //     } else {
    //         $('#nv-sub').addClass("show");
    //     }
    // });
    <?php if ($title == 'Dashboard') { ?>
        var base_url = `<?= base_url() ?>`;

        let tahun = '2021';
        let dataAPI = {
            user: {
                labels: [],
                dataset: [],
            },
            pengguna: {
                labels: [],
                dataset: [],
            },
        }

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false,
            legend: {
                display: false
            },
        }
        var pieOptions = {
            maintainAspectRatio: true,
            responsive: true,
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var allData = data.datasets[tooltipItem.datasetIndex].data;
                        var tooltipLabel = data.labels[tooltipItem.index];
                        var tooltipData = allData[tooltipItem.index];
                        var total = 0;
                        for (var i in allData) {
                            total += allData[i];
                        }
                        var tooltipPercentage = Math.round((tooltipData / total) * 100);
                        return tooltipLabel + ': ' + tooltipData + ' (' + tooltipPercentage + '%)';
                    }
                }
            }
        }
        var roleChart = new Chart($('#roleChart'), {
            type: 'pie',
            data: {
                labels: dataAPI.pengguna.labels,
                datasets: [{
                    data: dataAPI.pengguna.dataset,
                    backgroundColor: ['#3c8dbc', '#00c0ef', ],
                    // backgroundColor: [
                    //     'rgb(116, 222, 0)',
                    //     'rgb(86, 11, 208)',
                    //     'rgb(0, 123, 255)',
                    //     'rgb(0, 204, 204)',
                    //     'rgb(203, 224, 227)',
                    // ],
                }],
                options: pieOptions,

            }
        })
        var tahunChart = new Chart($('#tahunChart'), {
            type: 'bar',
            data: {
                labels: dataAPI.user.labels,
                datasets: [{
                    //   backgroundColor: 'rgba(60,141,188,0.9)',
                    backgroundColor: [
                        'rgb(0 0 205)', //MediumBlue
                        'rgb(0 0 255)', //Blue
                        'rgb(65 105 225)', //RoyalBlue
                        'rgb(123 104 238)', //MediumStateBlue
                        'rgb(100 149 237)', //CornflowerBlue
                        'rgb(30 144 255)', //DodgerBlue
                        'rgb(0 191 255)', //DeepSkyBlue
                        'rgb(135 206 250)', //LightSkyBlue
                        'rgb(135 206 235)', //SkyBlue
                        'rgb(173 216 230)', //LightBlue
                        'rgb(176 224 230)', //PowderBlue
                        'rgb(176 196 222)', //LightSteelBlue
                        // 'rgb(116, 222, 0)',
                        // 'rgb(86, 11, 208)',
                        // 'rgb(0, 123, 255)',
                        // 'rgb(0, 204, 204)',
                        // 'rgb(203, 224, 227)',
                    ],
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    minBarLength: 2,
                    data: dataAPI.user.dataset,
                }]
            },
            options: barChartOptions,

        })

        async function getDataPengguna() {
            const data = await fetch(`${base_url}/home/getDataPengguna/${tahun}`).then(res => res.json()).then(res => res);
            dataAPI.pengguna.labels.splice(0, dataAPI.pengguna.labels.length)
            dataAPI.pengguna.dataset.splice(0, dataAPI.pengguna.dataset.length)
            for (let i in data) {
                dataAPI.pengguna.labels.push(data[i].role);
                dataAPI.pengguna.dataset.push(data[i].jumlah);
            }
            roleChart.update();
        }
        async function getDataUser() {
            const data = await fetch(`${base_url}/home/getDataUser/${tahun}`).then(res => res.json()).then(res => res);
            dataAPI.user.labels.splice(0, dataAPI.user.labels.length)
            dataAPI.user.dataset.splice(0, dataAPI.user.dataset.length)
            for (let i in data) {
                dataAPI.user.labels.push(data[i].bulan);
                dataAPI.user.dataset.push(data[i].total);
            }
            tahunChart.update();
        }

        document.querySelector('#tahun').addEventListener('change', function() {
            tahun = this.value;
            getDataPengguna();
            getDataUser();
        })

        getDataPengguna();
        getDataUser();

    <?php } ?>
</script>

<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
    }
    <?php if (session()->getFlashdata('msg')) : ?>
        <?php if (session()->getFlashdata('success')) : ?>
            toastr.success('<?= session()->getFlashdata('msg'); ?>', 'Success')
        <?php elseif (session()->getFlashdata('success')) : ?>
            toastr.error('<?= session()->getFlashdata('gagal'); ?>', 'Error')
        <?php endif; ?>
    <?php endif ?>
    $(function() {
        'use strict'

        $('#example2').DataTable({
            responsive: true,
            ordering: false,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: 'Show _MENU_ items/page',
            }
        });

        // Select2
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity
        });

    });
</script>
<script type='text/javascript'>
    let btnLogout = document.getElementById("btn-logout");
    btnLogout.addEventListener('click', function() {

        Swal.fire({
            title: "Keluar",
            text: "Anda Yakin Ingin Keluar?",
            icon: "warning",
            showCancelButton: true,
            //  confirmButtonColor: '#3085d6',
            confirmButtonColor: '#0168fa',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Berhasil!',
                    'Anda Berhasil Keluar',
                    'success',
                );
                window.setTimeout(function() {
                    window.location.replace('<?= base_url('login/logout') ?>');
                }, 500);
            }
        })

    });
    $(document).ready(function() {
        <?php if (session()->getFlashdata('bahaya')) : ?>
            <?php if (session()->getFlashdata('success')) : ?>
                Swal.fire({
                    title: 'Gagal!',
                    text: '<?= session()->getFlashdata('bahaya'); ?>',
                    text: "Anda tidak memiliki akses untuk halaman tersebut.",
                    icon: 'error'
                });
            <?php endif; ?>
        <?php endif ?>
    });
    $(document).ready(function() {
        <?php if (session()->getFlashdata('pesan1')) : ?>
            <?php if (session()->getFlashdata('success')) : ?>
                Swal.fire({
                    title: '<?= session()->getFlashdata('pesan1'); ?>',
                    text: 'Selamat Datang <?= session()->get('nama_pengguna'); ?>',
                    icon: 'success',
                    confirmButtonColor: '#0168fa',
                    //    cancelButtonColor: '#d33',
                });
                window.setTimeout(function() {
                    window.location.replace('<?= base_url('home') ?>');
                }, 1100);
            <?php endif; ?>
        <?php endif ?>
    });
    <?php if ($currentpage == 'Data Pengguna') { ?>
        var base_url = "<?= base_url() ?>";
        $("body").on('click', '.btn-delete', function() {
            const id = $(this).data("id_pengguna");
            console.log(id);
            Swal.fire({
                title: "Anda Yakin Ingin?",
                text: "Anda tidak akan dapat mengembalikan ini",
                icon: "warning",
                showCancelButton: true,
                //    confirmButtonColor: '#3085d6',
                confirmButtonColor: '#0168FA',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Berhasil!',
                        'Data Berhasil Dihapus.',
                        'success',
                    );
                    fetch(`${base_url}/pengguna/hapus/${id}`).then(() => {
                        window.location.reload();
                    });
                }
            })
        });
        $(document).ready(function() {
            // get Edit Product
            $('.btn-upgrade').on('click', function() {
                // get data from button edit
                const id_pengguna = $(this).data('id_pengguna');
                const nama_pengguna = $(this).data('nama_pengguna');
                const email = $(this).data('email');
                const username = $(this).data('username');
                const password = $(this).data('password');
                const level = $(this).data('level');
                // Set data to Form Edit
                $('.id_pengguna').val(id_pengguna);
                $('.nama_pengguna').val(nama_pengguna);
                $('.email').val(email);
                $('.username').val(username);
                $('.password').val(password);
                $('.level').val(level);
                // Call Modal Edit
                $('#modalUpgrade').modal('show');
            });

        });
    <?php } ?>
    <?php if ($currentpage == 'Edit Data Pengguna') { ?>
        $(document).ready(() => {
            $('#role_id').val(`<?= old('role_id') ?>`);
            $('#role_id').val(`<?= old('role_id', $pengguna['role_id']) ?>`);
        })
        $(document).ready(function() {
            $("#show_hide_password button").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye");
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye");
                    $('#show_hide_password i').addClass("fa-eye-slash");
                }
            });
        });
    <?php } ?>
    $('.form-check-input').on('click', function() {
        const roleId = $(this).data('role');
        const menuId = $(this).data('menu');
        var base_url = "<?= base_url() ?>";
        console.log(roleId, menuId)

        $.ajax({
            url: '<?= base_url(); ?>/role/changeaccess',
            type: 'post',
            data: {
                role_id: roleId,
                menu_id: menuId,
            },

            success: function() {
                document.location.href = '<?= base_url(); ?>/role/access/' + roleId;
            }
        });
    });
    <?php if ($currentpage == 'Data Role') { ?>
        var base_url = "<?= base_url() ?>";
        $("body").on('click', '.btn-delete', function() {
            const id = $(this).data("role_id");
            console.log(id);
            Swal.fire({
                title: "Anda Yakin Ingin?",
                text: "Anda tidak akan dapat mengembalikan ini",
                icon: "warning",
                showCancelButton: true,
                //    confirmButtonColor: '#3085d6',
                confirmButtonColor: '#0168FA',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Berhasil!',
                        'Data Berhasil Dihapus.',
                        'success',
                    );
                    fetch(`${base_url}/role/hapus/${id}`).then(() => {
                        window.location.reload();
                    });
                }
            })
        });
    <?php } ?>

    <?php if ($currentpage == 'Tambah Data Menu') { ?>

        function chck() {
            // Get the checkbox
            var checkBox = document.getElementById("is_active");
            if (checkBox.checked == true) {
                $('#is_active').val('1');
            } else {
                $('#is_active').val('0');
            }
        }
    <?php } ?>
    <?php if ($currentpage == 'Edit Data Menu') { ?>

        function chck() {
            // Get the checkbox
            var checkBox = document.getElementById("is_active");
            if (checkBox.checked == true) {
                $('#is_active').val('1');
            } else {
                $('#is_active').val('0');
            }
        }
        $(document).ready(function() {
            var checkBox = document.getElementById("is_active");
            if (checkBox.value == 1) {
                checkBox.checked == true;
            } else {
                checkBox.checked == false;
            }
        });
    <?php } ?>

    <?php if ($currentpage == 'Data Menu') { ?>
        var base_url = "<?= base_url() ?>";
        $("body").on('click', '.btn-delete', function() {
            const id = $(this).data("menu_id");
            console.log(id);
            Swal.fire({
                title: "Anda Yakin Ingin?",
                text: "Anda tidak akan dapat mengembalikan ini",
                icon: "warning",
                showCancelButton: true,
                //    confirmButtonColor: '#3085d6',
                confirmButtonColor: '#0168FA',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Berhasil!',
                        'Data Berhasil Dihapus.',
                        'success',
                    );
                    fetch(`${base_url}/menu/hapus/${id}`).then(() => {
                        window.location.reload();
                    });
                }
            })
        });
    <?php } ?>
    <?php if ($homepage == 'Sub Menu Management') { ?>

        function chck() {
            // Get the checkbox
            var checkBox = document.getElementById("sub_is_active");
            if (checkBox.checked == true) {
                $('#sub_is_active').val('1');
            } else {
                $('#sub_is_active').val('0');
            }
        }
        $(document).ready(function() {
            var checkBox = document.getElementById("sub_is_active");
            if (checkBox.value == 1) {
                checkBox.checked == true;
            } else {
                checkBox.checked == false;
            }
        });
    <?php } ?>
    <?php if ($currentpage == 'Edit Data Sub Menu') { ?>

        $(document).ready(() => {
            $('#selUser').val(`<?= old('menu_id', $submenu['menu_id']) ?>`);
        });
    <?php } ?>
    <?php if ($currentpage == 'Tambah Data Kategori') { ?>
        $('#outlet').val(`<?= old('outlet_id') ?>`);
        $('#outlet').select2({
            allowClear: true,
            placeholder: 'Pilih Outlet',
        });
    <?php } ?>
    <?php if ($currentpage == 'Edit Data Kategori') { ?>
        $('#outlet').val(`<?= old('outlet_id', $kategori['outlet_id']) ?>`);
        $('#outlet').select2({
            allowClear: true,
            placeholder: 'Pilih Outlet',
        });
    <?php } ?>
    <?php if ($currentpage == 'Data Kategori') { ?>
        var base_url = "<?= base_url() ?>";
        $("body").on('click', '.btn-delete', function() {
            const id = $(this).data("kategori_id");
            console.log(id);
            Swal.fire({
                title: "Anda Yakin Ingin?",
                text: "Anda tidak akan dapat mengembalikan ini",
                icon: "warning",
                showCancelButton: true,
                //    confirmButtonColor: '#3085d6',
                confirmButtonColor: '#0168FA',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Berhasil!',
                        'Data Berhasil Dihapus.',
                        'success',
                    );
                    fetch(`${base_url}/kategoribisnis/hapus/${id}`).then(() => {
                        window.location.reload();
                    });
                }
            })
        });
    <?php } ?>
    <?php if ($currentpage == 'Data SubKategori') { ?>
        var base_url = "<?= base_url() ?>";
        $("body").on('click', '.btn-delete', function() {
            const id = $(this).data("subkategori_id");
            console.log(id);
            Swal.fire({
                title: "Anda Yakin Ingin?",
                text: "Anda tidak akan dapat mengembalikan ini",
                icon: "warning",
                showCancelButton: true,
                //    confirmButtonColor: '#3085d6',
                confirmButtonColor: '#0168FA',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Berhasil!',
                        'Data Berhasil Dihapus.',
                        'success',
                    );
                    fetch(`${base_url}/subkategori/hapus/${id}`).then(() => {
                        window.location.reload();
                    });
                }
            })
        });
    <?php } ?>
    $(document).ready(function() {
        $('#id_kategori').select2({
            placeholder: 'Pilih Kategori',
            searchInputPlaceholder: 'Pilih Kategori',
            allowClear: true
        });
    });

    <?php if ($currentpage == 'Edit Data Subkategori') { ?>
        $(document).ready(() => {
            $('#edit_kategori').val(`<?= old('id_kategori') ?>`);
            $('#edit_kategori').val(`<?= old('id_kategori', $subkategori['id_kategori']) ?>`);
            $('#edit_kategori').select2({
                allowClear: true
            });

        });
    <?php } ?>
    $(function() {
        $("#tabel-pelanggan").DataTable({
            "responsive": true,
            "autoWidth": false,
            "scrollX": false,
            "ordering": false
        });
    });

    //HALAMAN STOK
    <?php if (($currentpage == 'Data Stok Keluar') || ($currentpage == 'Data Stok Keluar')) { ?>
        $(document).ready(function() {
            $(".add-more").click(function() {
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });
            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", ".remove", function() {
                $(this).parents(".control-group").remove();
            });
        });
    <?php } ?>

    <?php if (($currentpage == 'Tambah Data Produk')) { ?>
        $(document).ready(function() {
            if (diskon = ' ') {
                document.getElementById('diskon').value = '0';
            }
        });

        function sum() {
            var harga_jual = document.getElementById('harga_jual').value;
            var diskon = document.getElementById('diskon').value;
            var total = parseInt(harga_jual) - parseInt(diskon);
            var htg_diskon = ((parseInt(diskon) / parseInt(harga_jual)) * 100);
            // console.log(htg_diskon);
            if (!isNaN(total)) {
                document.getElementById('total').value = total;
                $('#total').val(total);
            }
            if (!isNaN(htg_diskon)) {
                // 2 angka dibelakang koma
                // document.getElementById('diskon_persen').value = htg_diskon.toFixed(2);
                // bulatkan
                document.getElementById('diskon_persen').value = Math.ceil(htg_diskon);
                // $('#diskon_persen').val(htg_diskon.toFixed(2));
            }
        }
        $(document).ready(() => {
            $('#outlet').val(`<?= old('outlet_id') ?>`);
            $('#id_kategori').val(`<?= old('id_kategori') ?>`);
            $('#outlet').select2({
                allowClear: true,
                placeholder: 'Pilih Outlet',
                searchInputPlaceholder: 'Pilih Outlet',
            });
            $('#id_kategori').select2({
                allowClear: true,
                placeholder: 'Pilih Kategori',
                // searchInputPlaceholder: 'Pilih Kategori',
            });
        });
        // Select2
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity
        });
    <?php } ?>

    <?php if (($currentpage == 'Data Produk')) { ?>

        var base_url = `<?= base_url() ?>`;
        $(document).ready(function() {
            var kategori = '';
            var table = $('#example4').DataTable({
                ajax: {
                    url: `${base_url}/produk/data`,
                    type: 'POST',

                    data: function(d) {
                        d.id_kategori = kategori;
                    },
                    "dataSrc": function(json) {
                        for (let i in json.data) {
                            json.data[i].AKSI =
                                `<button class="btn px-0" type="button" id="droprightMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="las la-ellipsis-h tx-20"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="droprightMenuButton">
                <a href="${base_url}/produk/edit/${json.data[i].id_produk}" class="dropdown-item">
                  <i class="feather-edit-3 text-primary"></i> Edit
                </a>
                <a href="javascript:void(0)" onclick="hapus('${json.data[i].id_produk}')" class="dropdown-item btn-delete1" data-id_produk="${json.data[i].id_produk}" id="btn-delete">
                  <i class="feather-trash-2 text-danger"></i> Delete
                </a>
              </div>`;
                            json.data[i].Gambar =
                                `<img src="${base_url}/public/template/assets/img/produk/${json.data[i].gambar}"
                                 id="gambarproduk" width="50px">`;
                            json.data[i].NUMBER = parseInt(i) + 1;
                        }
                        return json.data;
                    },

                },
                "columns": [{
                        "data": "NUMBER"
                    },
                    {
                        "data": "nama_produk"
                    },
                    {
                        "data": "kategori"
                    },
                    {
                        "data": "harga_jual"
                    },
                    {
                        "data": "Gambar"
                    },
                    {
                        "data": "diskon"
                    },
                    {
                        "data": "total"
                    },
                    {
                        "data": "AKSI"
                    },
                ],
                autoWidth: false,
                ordering: false
            });

            $(".kategori_check").click(function() {
                kategori = get_filter_text('kategori_filter');
                table.ajax.reload();
            });

            function get_filter_text(text_id) {
                var filterData = [];
                $('#' + text_id + ':checked').each(function() {
                    filterData.push($(this).val());
                });
                return filterData;
            }
        });
        $(document).ready(function() {
            var kategori = '';
            var table = $('#example4staff').DataTable({
                ajax: {
                    url: `${base_url}/produk/datastaff`,
                    type: 'POST',

                    data: function(d) {
                        d.id_kategori = kategori;
                    },
                    "dataSrc": function(json) {
                        for (let i in json.data) {
                            json.data[i].AKSI =
                                `<button class="btn px-0" type="button" id="droprightMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="las la-ellipsis-h tx-20"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="droprightMenuButton">
                <a href="${base_url}/produk/edit/${json.data[i].id_produk}" class="dropdown-item">
                  <i class="feather-edit-3 text-primary"></i> Edit
                </a>
                <a href="javascript:void(0)" onclick="hapus('${json.data[i].id_produk}')" class="dropdown-item btn-delete1" data-id_produk="${json.data[i].id_produk}" id="btn-delete">
                  <i class="feather-trash-2 text-danger"></i> Delete
                </a>
              </div>`;
                            json.data[i].Gambar =
                                `<img src="${base_url}/public/template/assets/img/produk/${json.data[i].gambar}"
                                 id="gambarproduk" width="50px">`;
                            json.data[i].NUMBER = parseInt(i) + 1;
                        }
                        return json.data;
                    },

                },
                "columns": [{
                        "data": "NUMBER"
                    },
                    {
                        "data": "nama_produk"
                    },
                    {
                        "data": "kategori"
                    },
                    {
                        "data": "harga_jual"
                    },
                    {
                        "data": "Gambar"
                    },
                    {
                        "data": "diskon"
                    },
                    {
                        "data": "total"
                    },
                    {
                        "data": "AKSI"
                    },
                ],
                autoWidth: false,
                ordering: false
            });

            $(".kategori_check2").click(function() {
                kategori = get_filter_text('kategori_filter2');
                table.ajax.reload();
            });

            function get_filter_text(text_id) {
                var filterData = [];
                $('#' + text_id + ':checked').each(function() {
                    filterData.push($(this).val());
                });
                return filterData;
            }
        });
        $('#example3').DataTable({
            responsive: true,
            ordering: false,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: 'Show _MENU_ items/page',
            }

        });
        $(document).ready(function() {
            var base_url = "<?= base_url() ?>";
            $("body").on('click', '.btn-delete1 ', function() {
                const id = $(this).data("id_produk");
                console.log(id);
                Swal.fire({
                    title: "Anda Yakin Ingin?",
                    text: "Anda tidak akan dapat mengembalikan ini",
                    icon: "warning",
                    showCancelButton: true,
                    //    confirmButtonColor: '#3085d6',
                    confirmButtonColor: '#0168FA',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            'Berhasil!',
                            'Data Berhasil Dihapus.',
                            'success',
                        );
                        fetch(`${base_url}/produk/hapus/${id}`).then(() => {
                            window.location.reload();
                        });
                    }
                })
            });
        });
        $(document).ready(function() {
            var base_url = "<?= base_url() ?>";
            $("body").on('click', '.btn-delete2', function() {
                const id = $(this).data("id_kategori");
                console.log(id);
                Swal.fire({
                    title: "Anda Yakin Ingin?",
                    text: "Anda tidak akan dapat mengembalikan ini",
                    icon: "warning",
                    showCancelButton: true,
                    //    confirmButtonColor: '#3085d6',
                    confirmButtonColor: '#0168FA',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            'Berhasil!',
                            'Data Berhasil Dihapus.',
                            'success',
                        );
                        fetch(`${base_url}/kategoriproduk/hapus/${id}`).then(() => {
                            window.location.reload();
                        });
                    }
                })
            });
        });
    <?php } ?>
    <?php if ($currentpage == "Edit Data Produk") { ?>

        function sum() {
            var harga_jual = document.getElementById('harga_jual').value;
            var diskon = document.getElementById('diskon').value;
            var total = parseInt(harga_jual) - parseInt(diskon);
            var htg_diskon = ((parseInt(diskon) / parseInt(harga_jual)) * 100);
            if (!isNaN(total)) {
                document.getElementById('total').value = total;
                $('#total').val(total);
            }
            if (!isNaN(htg_diskon)) {
                // 2 angka dibelakang koma
                // document.getElementById('diskon_persen').value = htg_diskon.toFixed(2);
                // bulatkan
                document.getElementById('diskon_persen').value = Math.ceil(htg_diskon);
                // $('#diskon_persen').val(htg_diskon.toFixed(2));
            }
        }
        $(document).ready(() => {

            $('#id_kategori').val(`<?= old('id_kategori', $produk['id_kategori']) ?>`);
            $('#outlet').val(`<?= old('outlet_id', $produk['outlet_id']) ?>`);
            $('#id_kategori').select2({
                allowClear: true,
                placeholder: 'Pilih Kategori',
            });
            $('#outlet').select2({
                allowClear: true,
                placeholder: 'Pilih Outlet',
            });
        });
    <?php } ?>
    <?php if ($title == "Produk") { ?>

        function previewJPG() {
            const gambar = document.querySelector('#gambar');
            const gambarLabel = document.querySelector('.custom-file-label');
            const gambarPreview = document.querySelector('.img-preview');

            gambarLabel.textContent = gambar.files[0].name;

            const fileJPG = new FileReader();
            fileJPG.readAsDataURL(gambar.files[0]);

            fileJPG.onload = function(e) {
                gambarPreview.src = e.target.result;
            }

        }
        $(document).ready(function() {
            var rupiah = document.getElementById('rupiah');
            rupiah.addEventListener('keyup', function(e) {
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                rupiah.value = formatRupiah(this.value, 'Rp. ');
            });

            /* Fungsi formatRupiah */
            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
        });
    <?php } ?>
    $(document).ready(function() {

        // Initialize select2
        $("#selUser").select2();
        // Read selected option
        $('#but_read').click(function() {
            var username = $('#selUser option:selected').text();
            var userid = $('#selUser').val();
            $('#result').html("id : " + userid + ", name : " + username);

        });
    });

    // KASIR
    <?php if (($currentpage == 'Edit Data Karyawan') || ($currentpage == 'Tambah Data Karyawan')) { ?>
        $(document).ready(function() {
            $("#show_hide_password button").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye");
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye");
                    $('#show_hide_password i').addClass("fa-eye-slash");
                }
            });
        });
        var d = new Date();
        var weekday = new Array(7);
        weekday[0] = "Minggu";
        weekday[1] = "Senin";
        weekday[2] = "Selasa";
        weekday[3] = "Rabu";
        weekday[4] = "Kamis";
        weekday[5] = "Jum'at";
        weekday[6] = "Sabtu";

        var n = weekday[d.getDay()];

        var bulan = new Array(12);
        bulan[0] = "Januari";
        bulan[1] = "Februari";
        bulan[2] = "Maret";
        bulan[3] = "April";
        bulan[4] = "Mei";
        bulan[5] = "Juni";
        bulan[6] = "Juli";
        bulan[7] = "Agustus";
        bulan[8] = "September";
        bulan[9] = "Oktober";
        bulan[10] = "November";
        bulan[11] = "Desember";

        var b = bulan[d.getMonth()];
        var t = d.getDate();
        var t2 = d.getUTCFullYear();

        let tgl = document.getElementById('tgl');
        let bln = document.getElementById('bulan');
        let thn = document.getElementById('tahun');
        $('#tgl').val(t);
        $('#bulan').val(b);
        $('#tahun').val(t2);
    <?php } ?>
    $(document).ready(function() {
        $(document).on("click", ".kategori", function() {
            $('#kategori').addClass('active')
            $('#btn-tambah').attr("href", "<?= base_url('kategoriproduk/create'); ?>");
            document.getElementById("homepage1").innerHTML = "Kategori";
            document.getElementById("homepage2").innerHTML = "Kategori";
            document.getElementById("currentpage").innerHTML = "Data Kategori";
        });
        $(document).on("click", ".produk", function() {
            $('#btn-tambah').attr("href", "<?= base_url('produk/create'); ?>")
            document.getElementById("homepage1").innerHTML = "Produk";
            document.getElementById("homepage2").innerHTML = "Produk";
            document.getElementById("currentpage").innerHTML = "Data Produk";
        });
    });
    <?php if ($currentpage == "Tambah Data Karyawan") { ?>
        $('.select2').select2({
            placeholder: 'Pilih Outlet',
            searchInputPlaceholder: 'Search options'
        });
        $(document).ready(function() {
            // var anda = localStorage.getItem("hilang");
            // if($('#role_id').val('')){
            //     $("#hal-form").addClass(anda);
            // }else{
            //     $("#hal-form").removeClass(anda);
            // }
            // return false;
            var val = `<?= ($validation->hasError('nama_karyawan')) ?>`;
            console.log(val);
            if (val) {
                $("#hal-form").removeClass('d-none');
            }
            var role = document.getElementById("role_id");
            if (role.value == '4') {
                document.getElementById("homepage2").innerHTML = "Kasir";
                $('.kasir').addClass("klik");
            } else if (role.value == '5') {
                document.getElementById("homepage2").innerHTML = "Staff";
                $('.staff').addClass("klik");
            }
        });

        $('#kasir').click(function() {
            if ($('.kasir').hasClass('klik')) {
                $('.kasir').removeClass("klik");
                $('.hal-form').addClass("d-none")
                $('#role_id').val(' ')
                document.getElementById("homepage2").innerHTML = "Karyawan";
                document.getElementById("nama").innerHTML = "Nama";
            } else {
                $('.kasir').addClass("klik");
                $('.staff').removeClass('klik');
                $('.hal-form').removeClass("d-none");
                $('#role_id').val('4')
                document.getElementById("homepage2").innerHTML = "Kasir";
                document.getElementById("nama").innerHTML = "Nama Kasir";
            }
        });
        $('#staff').click(function() {
            if ($('.staff').hasClass('klik')) {
                $('.staff').removeClass("klik");
                $('.hal-form').addClass("d-none")
                $('#role_id').val('')
                document.getElementById("homepage2").innerHTML = "Karyawan";
                document.getElementById("nama").innerHTML = "Nama";
            } else {
                $('.staff').addClass("klik");
                $('.kasir').removeClass("klik");
                $('.hal-form').removeClass("d-none");
                $('#role_id').val('5')
                document.getElementById("homepage2").innerHTML = "Staff";
                document.getElementById("nama").innerHTML = "Nama Staff";
            }
        });

        // document.querySelector('#kasir').addEventListener('click', (event) => {
        //     event.target.style.background = 'pink';
        // });
        // const password = document.querySelector('input[type="password"]');

        // password.addEventListener('focus', (event) => {
        //     event.target.style.background = 'pink';
        // });

        // password.addEventListener('blur', (event) => {
        //     event.target.style.background = '';
        // });
    <?php } ?>
    <?php if ($currentpage == 'Edit Data Karyawan') { ?>
        $(document).ready(() => {
            $('#outlet').val(`<?= old('outlet_id') ?>`);
            $('#outlet').val(`<?= old('outlet_id', $karyawan['outlet_id']) ?>`);
            $('#outlet').select2({
                allowClear: true
            });
        });
        console.log(`<?= old('outlet_id', $karyawan['outlet_id']) ?>`);
        $('#kasir').click(function() {
            if ($('.kasir').hasClass('klik')) {
                $('.kasir').removeClass("klik");
                $('#role_id').val('')
                document.getElementById("homepage2").innerHTML = "Karyawan";
                document.getElementById("nama").innerHTML = "Nama";
            } else {
                $('.kasir').addClass("klik");
                $('.staff').removeClass('klik');
                $('#role_id').val('4')
                document.getElementById("homepage2").innerHTML = "Kasir";
                document.getElementById("nama").innerHTML = "Nama Kasir";
            }
        });
        $('#staff').click(function() {
            if ($('.staff').hasClass('klik')) {
                $('.staff').removeClass("klik");
                $('#role_id').val('')
                document.getElementById("homepage2").innerHTML = "Karyawan";
                document.getElementById("nama").innerHTML = "Nama";
            } else {
                $('.staff').addClass("klik");
                $('#role_id').val('5')
                $('.kasir').removeClass("klik");
                document.getElementById("homepage2").innerHTML = "Staff";
                document.getElementById("nama").innerHTML = "Nama Staff";
            }
        });
        $(document).ready(function() {
            var role = document.getElementById("role_id");
            if (role.value == '4') {
                document.getElementById("homepage2").innerHTML = "Kasir";
                $('.kasir').addClass("klik");
            } else if (role.value == '5') {
                document.getElementById("homepage2").innerHTML = "Staff";
                $('.staff').addClass("klik");
            }
        });
    <?php } ?>

    <?php if ($currentpage == 'Data Transaksi') { ?>
        let data = []

        const min = document.querySelectorAll('.min');
        const plus = document.querySelectorAll('.plus');
        const submit = document.querySelector('.submit');
        min.forEach((elem) => {
            elem.addEventListener('click', (e) => {
                const parent = e.target.parentNode;
                const input = getParentChildElement(parent);
                if (input.value == 0) return;
                input.value = parseInt(input.value) - 1
                const dataId = input.getAttribute('data-id');
                const nama_produk = input.getAttribute('data-nama_produk');
                const jumlah = input.getAttribute('data-total');
                const harga_jual = input.getAttribute('data-harga_jual');
                const diskon = input.getAttribute('data-diskon');
                editData(dataId, nama_produk, jumlah, harga_jual, diskon, input.value);
                if (input.value == 0)
                    e.target.classList.add('disable')
            })

        })
        plus.forEach((elem) => {

            elem.addEventListener('click', (e) => {
                const parent = e.target.parentNode
                const input = getParentChildElement(parent);
                input.value = parseInt(input.value) + 1;
                const dataId = input.getAttribute('data-id');
                const nama_produk = input.getAttribute('data-nama_produk');
                const jumlah = input.getAttribute('data-total');
                const harga_jual = input.getAttribute('data-harga_jual');
                const diskon = input.getAttribute('data-diskon');
                editData(dataId, nama_produk, jumlah, harga_jual, diskon, input.value);
                if (input.value >= 0)
                    getParentChildElement(parent, "min disable")?.classList.remove('disable')
            })
        })

        function editData(dataId, nama_produk, jumlah, harga_jual, diskon, value) {
            if (value == 0) {
                data = data.filter(({
                    id
                }) => id !== dataId)
                return;
            }
            const find = data.findIndex(({
                id
            }) => id === dataId);

            const totalharga = value * harga_jual;
            const totaldiskon = value * diskon;
            if (find > -1) {
                data[find].value = value
                data[find].nama_produk = nama_produk
                data[find].jumlah = jumlah
                data[find].totalharga = totalharga
                data[find].harga_jual = harga_jual
                data[find].totaldiskon = totaldiskon
            } else {
                data.push({
                    id: dataId,
                    nama_produk: nama_produk,
                    value: parseInt(value),
                    jumlah: parseInt(jumlah),
                    totalharga: totalharga,
                    harga_jual: harga_jual,
                    totaldiskon: totaldiskon
                })
            }
        }

        function getParentChildElement(parent, find = "user-data") {
            let child = null;
            for (let i in parent.childNodes) {
                if (parent.childNodes[i].className == find) {
                    child = parent.childNodes[i];
                    break;
                }
            }
            return child;
        }

        function renderData(data) {
            var discount = data.totaldiskon;
            var tampildisc = (discount !== 0) ? 'Disc.' : '';
            var tampildiskon = (discount !== 0) ? discount : '';

            var number_stringhrgajual = data.harga_jual.toString(),
                sisahrgajual = number_stringhrgajual.length % 3,
                rupiahhrgajual = number_stringhrgajual.substr(0, sisahrgajual),
                ribuanhrgajual = number_stringhrgajual.substr(sisahrgajual).match(/\d{3}/g);

            if (ribuanhrgajual) {
                separatorhrgajual = sisahrgajual ? '.' : '';
                rupiahhrgajual += separatorhrgajual + ribuanhrgajual.join('.');
            }
            var number_stringttlhrga = data.totalharga.toString(),
                sisattlhrga = number_stringttlhrga.length % 3,
                rupiahttlhrga = number_stringttlhrga.substr(0, sisattlhrga),
                ribuanttlhrga = number_stringttlhrga.substr(sisattlhrga).match(/\d{3}/g);

            if (ribuanttlhrga) {
                separatorttlhrga = sisattlhrga ? '.' : '';
                rupiahttlhrga += separatorttlhrga + ribuanttlhrga.join('.');
            }
            var number_stringdiskon = tampildiskon.toString(),
                sisadiskon = number_stringdiskon.length % 3,
                rupiahdiskon = number_stringdiskon.substr(0, sisadiskon),
                ribuandiskon = number_stringdiskon.substr(sisadiskon).match(/\d{3}/g);

            if (ribuandiskon) {
                separatordiskon = sisadiskon ? '.' : '';
                rupiahdiskon += separatordiskon + ribuandiskon.join('.');
            }
            return `
            <div class="row mb-1">
            <div class="col-5 nama_produk" id="nama_produk">${data.nama_produk}</div>
            <div class="col-2 jumlah" id="jumlah">${data.value}</div>
            <div class="col-3 harga" id="harga">${rupiahhrgajual}</div>
            <div class="col-2 total" id="total">${rupiahttlhrga}</div>
            </div>
            
            <div class="row">
            <div class="col-10" id="disc">${tampildisc}</div>
            <div class="col-2" id="diskon">${rupiahdiskon ? '-' + rupiahdiskon : ''}</div>
            </div>
        
            `
        }

        submit.addEventListener('click', () => {
            let html = '';
            data.forEach((val) => {
                html += renderData(val);
                // console.log(html)
            })

            $('.off-canvas').addClass('show');
            var overlay = document.querySelector(".backdrop");
            overlay.style.visibility = "visible";

            document.querySelector('#data').innerHTML = html;
            let dataJumlah = data.reduce((total, num) => ({
                value: parseInt(total.value) + parseInt(num.value)
            }))
            let dataTotal = data.reduce((total, num) => ({
                totalharga: parseInt(total.totalharga) + parseInt(num.totalharga)
            }))
            let dataTotalDiskon = data.reduce((total, num) => ({
                totaldiskon: parseInt(total.totaldiskon) + parseInt(num.totaldiskon)
            }))
            let dataBelanja = dataTotal.totalharga - dataTotalDiskon.totaldiskon;

            var ttlbelanja_string = dataBelanja.toString(),
            ttlbelanjasisa = ttlbelanja_string.length % 3,
            ttlbelanjarupiah = ttlbelanja_string.substr(0, ttlbelanjasisa),
            ttlbelanjaribuan = ttlbelanja_string.substr(ttlbelanjasisa).match(/\d{3}/g);

            if (ttlbelanjaribuan) {
                ttlbelanjaseparator = ttlbelanjasisa ? '.' : '';
                ttlbelanjarupiah += ttlbelanjaseparator + ttlbelanjaribuan.join('.');
            }
            var ttlharga_string = dataTotal.totalharga.toString(),
            ttlhargasisa = ttlharga_string.length % 3,
            ttlhargarupiah = ttlharga_string.substr(0, ttlhargasisa),
            ttlhargaribuan = ttlharga_string.substr(ttlhargasisa).match(/\d{3}/g);

            if (ttlhargaribuan) {
                ttlhargaseparator = ttlhargasisa ? '.' : '';
                ttlhargarupiah += ttlhargaseparator + ttlhargaribuan.join('.');
            }
            var ttldiskon_string = dataTotalDiskon.totaldiskon.toString(),
            ttldiskonsisa = ttldiskon_string.length % 3,
            ttldiskonrupiah = ttldiskon_string.substr(0, ttldiskonsisa),
            ttldiskonribuan = ttldiskon_string.substr(ttldiskonsisa).match(/\d{3}/g);

            if (ttldiskonribuan) {
                ttldiskonseparator = ttldiskonsisa ? '.' : '';
                ttldiskonrupiah += ttldiskonseparator + ttldiskonribuan.join('.');
            }
            document.querySelector('#garis').style.removeProperty('display');
            document.querySelector('#r_nama_produk').innerHTML = 'Total Item';
            document.querySelector('#r_jumlah').innerHTML = dataJumlah.value;
            document.querySelector('#r_total').innerHTML = ttlhargarupiah;
            document.querySelector('#totaldisc').innerHTML = 'Total Disc.';
            document.querySelector('#totaldiskon').innerHTML = ttldiskonrupiah;
            document.querySelector('#txtotalbelanja').innerHTML = 'Total Belanja';
            document.querySelector('#totalbelanja').innerHTML = ttlbelanjarupiah;
        })
        $('.close').on('click', function(e) {
            e.preventDefault();
            var target = $(this).attr('href');
            $('.off-canvas').removeClass('show');
            var overlay = document.querySelector(".backdrop");
            overlay.style.visibility = "hidden";

        });
        $(document).on('click touchstart', function(e) {
            e.stopPropagation();

            // closing of sidebar menu when clicking outside of it
            if (!$(e.target).closest('.off-canvas-menu').length) {
                var offCanvas = $(e.target).closest('.off-canvas').length;
                if (!offCanvas) {
                    $('.off-canvas.show').removeClass('show');
                    var overlay = document.querySelector(".backdrop");
                    overlay.style.visibility = "hidden";
                }
            }
        });
    <?php } ?>


    <?php if ($currentpage == 'Tambah Data Outlet') { ?>
        $(document).ready(function() {
            $('#kota_kabupaten').select2({
                placeholder: 'Pilih Kota',
                allowClear: true
            });
        });
        $("#kota_kabupaten").change(async function() {
            const data = await fetch("<?= base_url(); ?>/Home/datakota/" + $('#kota_kabupaten').val()).then(res => res.json()).then(res => res)
            $('#provinsi').val(data.data[0][0].provinsi)
            console.log(data);
        });

        $("#kota_kabupaten").change(async function() {
            const data = await fetch("<?= base_url(); ?>/Home/datakota/" + $('#kota_kabupaten').val()).then(res => res.json()).then(res => res)
            $('#kota').val(data.data[0][0].kota_kabupaten)
            console.log(data);
        });
        var cleaveJ = new Cleave('#telpon', {
            blocks: [3, 4, 4],
            uppercase: true
        });
    <?php } ?>

    <?php if ($currentpage == 'Edit Data Outlet') { ?>
        $(document).ready(() => {
            $('#kota_kabupaten').val(`<?= old('kota_id') ?>`);
            $('#kota_kabupaten').val(`<?= old('kota_id', $outlet['kota_id']) ?>`);
            $('#kota_kabupaten').select2({
                allowClear: true
            });

            $('#kota').val(`<?= old('kota', $outlet['kota']) ?>`);
            $('#provinsi').val(`<?= old('provinsi', $outlet['provinsi']) ?>`);
        })

        $("#kota_kabupaten").change(async function() {
            const data = await fetch("<?= base_url(); ?>/Home/datakota/" + $('#kota_kabupaten').val()).then(res => res.json()).then(res => res)
            $('#provinsi').val(data.data[0][0].provinsi)
            console.log(data);
        });

        $("#kota_kabupaten").change(async function() {
            const data = await fetch("<?= base_url(); ?>/Home/datakota/" + $('#kota_kabupaten').val()).then(res => res.json()).then(res => res)
            $('#kota').val(data.data[0][0].kota_kabupaten)
            console.log(data);
        });
        var cleaveJ = new Cleave('#telpon', {
            blocks: [3, 4, 4],
            uppercase: true
        });
    <?php } ?>

    <?php if ($currentpage == 'Data Outlet') { ?>
        $('#example4').DataTable({
            responsive: true,
            ordering: false,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: 'Show _MENU_ items/page',
            }

        });

        var base_url = "<?= base_url() ?>";
        $("body").on('click', '.btn-delete2', function() {
            const id = $(this).data("outlet_id");
            console.log(id);
            Swal.fire({
                title: "Anda Yakin Ingin?",
                text: "Anda tidak akan dapat mengembalikan ini",
                icon: "warning",
                showCancelButton: true,
                //    confirmButtonColor: '#3085d6',
                confirmButtonColor: '#0168FA',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Berhasil!',
                        'Data Berhasil Dihapus.',
                        'success',
                    );
                    fetch(`${base_url}/outlet/hapus/${id}`).then(() => {
                        window.location.reload();
                    });
                }
            })
        });
    <?php } ?>
</script>
</body>

</html>