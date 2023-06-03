<style>
#btn-logout:hover{
  background-color: transparent;
    color: #0168fa;
}
</style>
<header class="navbar navbar-header navbar-header-fixed">
  <a href="" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
  <div class="navbar-brand">
    <a href="" class="df-logo">Kasir<span>Kita</span></a>
  </div><!-- navbar-brand -->
  <div id="navbarMenu" class="navbar-menu-wrapper">
    <div class="navbar-menu-header">
      <a href="" class="df-logo">Kasir<span>Kita</span></a>
      <a id="mainMenuClose" href=""><i data-feather="x"></i></a>
    </div><!-- navbar-menu-header -->
    <ul class="nav navbar-menu">
      <!-- <li class="nav-label pd-l-20 pd-lg-l-25 d-lg-none">Main Navigation</li> -->
        <?php 
          $role_id = session()->get('role_id');
          $queryMenu = "SELECT *
          FROM `user_menu` JOIN `user_access_menu`
            ON `user_menu`.`menu_id` = `user_access_menu`.`menu_id`
         WHERE `user_access_menu`.`role_id` = $role_id 
         AND `user_menu`.`is_active` = 1 
         ORDER BY `user_access_menu`.`menu_id` ASC ";

         $menu = $db->query($queryMenu)->getResultArray();
         ?>
         <?php foreach($menu as $m) : ?>
        <?php if ($m['url'] !== '-') : ?>
        <li class="nav-item <?= ($title == $m['title']) ? "active" : " "; ?>">
          <a href="<?= base_url($m['url']); ?>" class="nav-link"><i data-feather="<?= $m['icon']; ?>"></i> <?= $m['title']; ?></a>
        </li>
        <?php endif ?>

          <!-- SUB MENU SESUSAI MENU -->
          <?php
          $menuId = $m['menu_id'];
            $querySubMenu = "SELECT *
            FROM `user_sub_menu` JOIN `user_menu` 
              ON `user_sub_menu`.`menu_id` = `user_menu`.`menu_id`
           WHERE `user_sub_menu`.`menu_id` = $menuId
           AND `user_sub_menu`.`sub_is_active` = 1
          ";
          $subMenu = $db->query($querySubMenu)->getResultArray();
          // var_dump($subMenu);
          // die();
          ?>
          <?php if($m['url'] == '-') :?>
        <li class="nav-item with-sub <?= ($title == $m['title']) ? "active" : " "; ?>" id="nv-sub">
          <a class="nav-link drpdwn" style="cursor: pointer;"><i data-feather="package"></i><?= $m['title']; ?></a>
          <ul class="navbar-menu-sub <?= ($title == $m['title']) ? "active" : " "; ?>">
            <?php foreach($subMenu as $sm) : ?>
            <li class="nav-sub-item">
              <a href="<?= base_url($sm['sub_url']); ?>" class="nav-sub-link"><i data-feather="<?= $sm['sub_icon']; ?>"></i><?= $sm['sub_title']; ?></a>
            </li>
            <?php endforeach ?>
          </ul>
        </li>
          <?php endif ?>

        <?php endforeach ?>
  </div><!-- navbar-menu-wrapper -->
  <div class="navbar-right">
    <!-- dropdown -->
    <div class="dropdown dropdown-profile">
      <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static">
        <div class="avatar avatar-sm"><img src="<?= base_url(); ?>/public/template/assets/img/<?= session()->get('image'); ?>" class="rounded-circle" alt=""></div>
      </a><!-- dropdown-link -->
      <div class="dropdown-menu dropdown-menu-right tx-13">
        <div class="avatar avatar-lg mg-b-15"><img src="<?= base_url(); ?>/public/template/assets/img/<?= session()->get('image'); ?>" class="rounded-circle" alt=""></div>
        <h6 class="tx-semibold mg-b-5" style="text-transform: capitalize;"><?= (session()->get('nama_pengguna')); ?></h6>
        <p class="mg-b-25 tx-12 tx-color-03" style="text-transform: capitalize;">
          <?php if (session()->get('role_id') == 1) {
            echo 'admin';
          } elseif (session()->get('role_id') == 2) {
            echo 'user';
          } elseif (session()->get('role_id') == 3) {
            echo 'superuser';
          } elseif (session()->get('role_id') == 4) {
            echo 'kasir';
          }elseif (session()->get('role_id') == 5) {
            echo 'staff'; }?></p>

        <a href="" class="dropdown-item"><i data-feather="edit-3"></i> Edit Profile</a>
        <a href="page-profile-view.html" class="dropdown-item"><i data-feather="user"></i> View Profile</a>
        <div class="dropdown-divider"></div>
        <a href="" class="dropdown-item"><i data-feather="settings"></i>Account Settings</a>
        <a href="" class="dropdown-item"><i data-feather="settings"></i>Privacy Settings</a>
        <a id="btn-logout" class="dropdown-item" style="cursor: pointer;"><i data-feather="log-out"></i>Sign Out</a>
      </div><!-- dropdown-menu -->
    </div><!-- dropdown -->
  </div><!-- navbar-right -->
  <div class="navbar-search">
    <div class="navbar-search-header">
      <input type="search" class="form-control" placeholder="Type and hit enter to search...">
      <button class="btn"><i data-feather="search"></i></button>
      <a id="navbarSearchClose" href="" class="link-03 mg-l-5 mg-lg-l-10"><i data-feather="x"></i></a>
    </div><!-- navbar-search-header -->
    <div class="navbar-search-body">
      <label class="tx-10 tx-medium tx-uppercase tx-spacing-1 tx-color-03 mg-b-10 d-flex align-items-center">Recent Searches</label>
      <ul class="list-unstyled">
        <li><a href="dashboard-one.html">modern dashboard</a></li>
        <li><a href="app-calendar.html">calendar app</a></li>
        <li><a href="../../collections/modal.html">modal examples</a></li>
        <li><a href="../../components/el-avatar.html">avatar</a></li>
      </ul>

      <hr class="mg-y-30 bd-0">

      <label class="tx-10 tx-medium tx-uppercase tx-spacing-1 tx-color-03 mg-b-10 d-flex align-items-center">Search Suggestions</label>

      <ul class="list-unstyled">
        <li><a href="dashboard-one.html">cryptocurrency</a></li>
        <li><a href="app-calendar.html">button groups</a></li>
        <li><a href="../../collections/modal.html">form elements</a></li>
        <li><a href="../../components/el-avatar.html">contact app</a></li>
      </ul>
    </div><!-- navbar-search-body -->
  </div><!-- navbar-search -->
</header><!-- navbar -->
<div class="content content-fixed">
  <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item" id="homepage1"><a href="#"><?= $homepage; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page" id="currentpage"><?= $currentpage; ?></li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1" id="homepage2" style="text-transform: capitalize;"><?= $homepage; ?>
          <?php if ($currentpage == 'Role Access') { ?>
            <?= $role['role']; ?></h4>
      <?php } ?>
      </div>
      <?php //if (($currentpage == 'Analisis Aplikasi') || ($currentpage == 'Data Role') || ($currentpage == 'Data Pengguna') || ($currentpage == 'Data Menu')) { ?>
        <div class="d-none d-md-block">
          <?php if ($base == 'Table') { ?>
          <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
          <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
          <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
          
          <?php if ($currentpage == 'Data Role') { ?>
            <a class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" href="<?= base_url('Role/tambah'); ?>"><i data-feather="plus" class="wd-10 mg-r-5"></i> Tambah Data</a>
          <?php } elseif ($currentpage == 'Data Menu') { ?>
            <a class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" href="<?= base_url('Menu/tambah'); ?>"><i data-feather="plus" class="wd-10 mg-r-5"></i> Tambah Data</a>
          <?php } elseif ($currentpage == 'Data Kategori') { ?>
            <a class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" href="<?= base_url('KategoriBisnis/tambah'); ?>"><i data-feather="plus" class="wd-10 mg-r-5"></i> Tambah Data</a>
          <?php } elseif ($currentpage == 'Data SubKategori') { ?>
            <a class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" href="<?= base_url('Subkategori/tambah'); ?>"><i data-feather="plus" class="wd-10 mg-r-5"></i> Tambah Data</a>
          <?php } elseif ($currentpage == 'Data Karyawan') { ?>
            <a class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5 btn-tambah" id="btn-tambah" href="<?= base_url('karyawan/create'); ?>"><i data-feather="plus" class="wd-10 mg-r-5"></i> Tambah Data</a>
          <?php } elseif ($currentpage == 'Data Produk') { ?>
            <a class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" id="btn-tambah" href="<?= base_url('produk/create'); ?>"><i data-feather="plus" class="wd-10 mg-r-5"></i> Tambah Data</a>
          <?php } elseif ($currentpage == 'Data Outlet') { ?>
            <a class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" id="btn-tambah" href="<?= base_url('outlet/tambah'); ?>"><i data-feather="plus" class="wd-10 mg-r-5"></i> Tambah Data</a>
          <?php } elseif ($currentpage == 'Data Sub Menu') { ?>
            <a class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" id="btn-tambah" href="<?= base_url('submenu/tambah'); ?>"><i data-feather="plus" class="wd-10 mg-r-5"></i> Tambah Data</a>
          <?php } elseif ($currentpage == 'Data Pelanggan') { ?>
            <a class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" id="btn-tambah" href="<?= base_url('pelanggan/create'); ?>"><i data-feather="plus" class="wd-10 mg-r-5"></i> Tambah Data</a>
          <?php } elseif ($currentpage == 'Data Stok Masuk') { ?>
            <!-- <a class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" id="btn-tambah" href="<?= base_url('submenu/tambah'); ?>"><i data-feather="plus" class="wd-10 mg-r-5"></i> Tambah Data</a> -->
            <a href="#modal3" class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" data-toggle="modal"><i data-feather="plus" class="wd-10 mg-r-5"></i> Tambah Data</a>
          <?php } ?>
          <?php } ?>
        </div>
      <!-- <?php //} ?> -->
    </div>