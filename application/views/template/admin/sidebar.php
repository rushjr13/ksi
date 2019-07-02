<body id="page-top" onload="startTime()">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url() ?>">
        <div class="sidebar-brand-icon">
          <img src="<?=base_url('assets/admin/img/').$pengaturan['icon'] ?>" width="30">
        </div>
        <div class="sidebar-brand-text mx-3"><img src="<?=base_url('assets/admin/img/').$pengaturan['logo'] ?>" width="150"></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Beranda -->
      <li class="nav-item <?php if($judul=='Beranda'){echo 'active';} ?>">
        <?php if($pengguna_masuk['id_level']==1){ ?>
          <a class="nav-link" href="<?=base_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span>
          </a>
        <?php } else { ?>
          <a class="nav-link" href="<?=base_url('user') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span>
          </a>
        <?php } ?>
      </li>

      <!-- <li class="nav-item <?php if($judul=='Obrolan'){echo 'active';} ?>">
        <?php if($pengguna_masuk['id_level']==1){ ?>
          <a class="nav-link" href="<?=base_url('admin/obrolan') ?>">
            <i class="fas fa-fw fa-comments"></i>
            <span>Obrolan</span>
          </a>
        <?php } else { ?>
          <a class="nav-link" href="<?=base_url('user/obrolan') ?>">
            <i class="fas fa-fw fa-comments"></i>
            <span>Obrolan</span>
          </a>
        <?php } ?>
      </li> -->

      <?php foreach ($menu as $mn): ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          <?=$mn['nama_menu'] ?>
        </div>

        <?php
          $this->db->select('*');
          $this->db->from('submenu');
          $this->db->join('menu', 'menu.id_menu = submenu.id_menu');
          $this->db->where('submenu.id_menu', $mn['id_menu']);
          $this->db->where('submenu.status', 1);
          $submenu_by_menu = $this->db->get()->result_array();
        ?>

        <?php foreach ($submenu_by_menu as $sm) : ?>

          <!-- Nav Item - Charts -->
          <li class="nav-item <?php if($judul==$sm['nama_submenu']){echo 'active';} ?>">
            <a class="nav-link" href="<?=base_url().$sm['url'] ?>">
              <i class="fas fa-fw <?=$sm['icon'] ?>"></i>
              <span><?=$sm['nama_submenu'] ?></span></a>
          </li>
        
        <?php endforeach; ?>
      <?php endforeach; ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block mb-0">

      <!-- Nav Item - Charts -->
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-fw fa-sign-out-alt"></i>
              <span>Keluar</span></a>
          </li>

      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->