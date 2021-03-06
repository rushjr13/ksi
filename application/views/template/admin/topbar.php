    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <marquee class="text-primary"><strong>Selamat Datang di Sistem Informasi <?=$pengaturan['nama_web'] ?></strong></marquee>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Tanggal -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-calendar-check fa-fw"></i>
                <small class="text-primary"><strong><?=$hari_sekarang.', '.$tgl_sekarang ?></strong></small>
              </a>
            </li>

            <!-- Nav Item - Waktu -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-clock fa-fw"></i>
                <small class="text-primary"><strong><span id="txt"></span>
                  <?php
                    date_default_timezone_set('Asia/Makassar');
                    $a = date ("H");
                    if (($a>=1) && ($a<=11)){
                      $saat = "Pagi";
                    } else if(($a>11) && ($a<=15)) {
                      $saat = "Siang";
                    } else if (($a>15) && ($a<=18)) {
                      $saat = "Sore";
                    } else {
                      $saat = "Malam";
                    }
                    echo ' '.$saat;
                  ?>
                </strong></small>
              </a>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!-- Counter - Alerts -->
                <?php
                  $this->db->where('baca', 0);
                  $jlh_pemberitahuan=$this->db->count_all_results('pemberitahuan');
                ?>
                <?php if($jlh_pemberitahuan<1){ ?>
                  <i class="fas fa-bell fa-fw"></i>
                <?php } else { ?>
                  <i class="fas fa-bell fa-fw"></i>
                  <span class="badge badge-danger badge-counter"><?=$jlh_pemberitahuan ?></span>
                <?php } ?>

              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Pemberitahuan
                </h6>
                <?php foreach ($pemberitahuan as $berita): ?>
                  <a class="dropdown-item d-flex align-items-center" href="<?=base_url('pemberitahuan/lihat/').$berita['id_pemberitahuan'] ?>">
                    <div>
                      <!-- Tanggal Indonesia Berdasarkan Fungsi time() - 1560990566 -->
                      <?php 
                        date_default_timezone_set('Asia/Makassar');
                        $tgl = date('d', $berita['tgl_pemberitahuan']);
                        $bln = date('F', $berita['tgl_pemberitahuan']);
                        $thn = date('Y', $berita['tgl_pemberitahuan']);
                        $jam = date('H', $berita['tgl_pemberitahuan']);
                        $mnt = date('i', $berita['tgl_pemberitahuan']);
                        $dtk = date('s', $berita['tgl_pemberitahuan']);
                        $saat = date('a', $berita['tgl_pemberitahuan']);

                        if($bln=='January'){
                            $bulan='Januari';
                        } else if($bln=='February'){
                            $bulan='Februari';
                        } else if($bln=='March'){
                            $bulan='Maret';
                        } else if($bln=='April'){
                            $bulan='April';
                        } else if($bln=='May'){
                            $bulan='Mei';
                        } else if($bln=='June'){
                            $bulan='Juni';
                        } else if($bln=='July'){
                            $bulan='Juli';
                        } else if($bln=='August'){
                            $bulan='Agustus';
                        } else if($bln=='September'){
                            $bulan='September';
                        } else if($bln=='October'){
                            $bulan='Oktober';
                        } else if($bln=='November'){
                            $bulan='November';
                        } else if($bln=='December'){
                            $bulan='Desember';
                        }

                        $tgl_pemberitahuan = $tgl.' '.$bulan.' '.$thn;
                        $tgl_pemberitahuan2 = $tgl.' '.$bulan.' '.$thn.' - '.$jam.':'.$mnt.':'.$dtk;
                      ?>
                      <div class="small text-gray-500"><?=$tgl_pemberitahuan2 ?></div>
                      <?php if($berita['baca']==0){ ?>
                        <span class="font-weight-bold"><?=$berita['isi_pemberitahuan'] ?></span>
                      <?php } else { ?>
                        <span><?=$berita['isi_pemberitahuan'] ?></span>
                      <?php } ?>
                    </div>
                  </a>
                <?php endforeach; ?>
                <a class="dropdown-item text-center small text-gray-500" href="<?=base_url('pemberitahuan') ?>">Lihat Semua Pemberitahuan</a>
              </div>
            </li>

            <?php if($pengguna_masuk['id_level']==1){ ?>
              <!-- Nav Item - Messages -->
              <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <!-- Counter - Messages -->
                  <?php
                    $this->db->where('status_em', 0);
                    $jlh_email=$this->db->count_all_results('email_masuk');
                  ?>
                  <?php if($jlh_email<1){ ?>
                    <i class="fas fa-envelope fa-fw"></i>
                  <?php } else { ?>
                    <i class="fas fa-envelope fa-fw"></i>
                    <span class="badge badge-danger badge-counter"><?=$jlh_email ?></span>
                  <?php } ?>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                  <h6 class="dropdown-header">
                    Email / Pesan Masuk
                  </h6>
                  <?php foreach ($email_masuk as $em): ?>
                    <!-- Tanggal Indonesia Berdasarkan Fungsi time() - 1560990566 -->
                    <?php 
                      date_default_timezone_set('Asia/Makassar');
                      $tgl = date('d', $em['tgl_em']);
                      $bln = date('F', $em['tgl_em']);
                      $thn = date('Y', $em['tgl_em']);
                      $jam = date('H', $em['tgl_em']);
                      $mnt = date('i', $em['tgl_em']);
                      $dtk = date('s', $em['tgl_em']);
                      $saat = date('a', $em['tgl_em']);

                      if($bln=='January'){
                          $bulan='Januari';
                      } else if($bln=='February'){
                          $bulan='Februari';
                      } else if($bln=='March'){
                          $bulan='Maret';
                      } else if($bln=='April'){
                          $bulan='April';
                      } else if($bln=='May'){
                          $bulan='Mei';
                      } else if($bln=='June'){
                          $bulan='Juni';
                      } else if($bln=='July'){
                          $bulan='Juli';
                      } else if($bln=='August'){
                          $bulan='Agustus';
                      } else if($bln=='September'){
                          $bulan='September';
                      } else if($bln=='October'){
                          $bulan='Oktober';
                      } else if($bln=='November'){
                          $bulan='November';
                      } else if($bln=='December'){
                          $bulan='Desember';
                      }

                      $tgl_em = $tgl.' '.$bulan.' '.$thn;
                      $tgl_em2 = $tgl.' '.$bulan.' '.$thn.' - '.$jam.':'.$mnt.':'.$dtk;
                    ?>
                    <a class="dropdown-item d-flex align-items-center" href="<?=base_url('pesan/lihat/').$em['id_em'] ?>">
                      <div class="font-weight-bold">
                        <div class="small text-gray-500"><?=$em['nama_pengirim'] ?> (<?=$em['email_pengirim'] ?>)</div>
                        <?php if($em['status_em']==0){ ?>
                          <span class="font-weight-bold"><?=$em['perihal_em'] ?></span>
                        <?php }else{ ?>
                          <span><?=$em['perihal_em'] ?></span>
                        <?php } ?>
                        <div class="small text-gray-500"><?=$tgl_em2 ?></div>
                      </div>
                    </a>
                  <?php endforeach ?>
                  <a class="dropdown-item text-center small text-gray-500" href="<?=base_url('pesan') ?>">Lihat Semua Pesan</a>
                </div>
              </li>
            <?php } ?>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$pengguna_masuk['nama_lengkap'] ?></span>
                <?php if($pengguna_masuk['foto']){ ?>
                  <img class="img-profile rounded-circle" src="<?=base_url('assets/admin/img/pengguna/').$pengguna_masuk['foto'] ?>">
                <?php } else { ?>
                  <?php if($pengguna_masuk['jk']=="Laki-laki"){ ?>
                    <img class="img-profile rounded-circle" src="<?=base_url('assets/admin/img/user_l.png') ?>">
                  <?php } else { ?>
                    <img class="img-profile rounded-circle" src="<?=base_url('assets/admin/img/user_p.png') ?>">
                  <?php } ?>
                <?php } ?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?=base_url('pengguna/profil') ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil Saya
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Pengaturan
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$judul ?></h1>
          </div>

          <?= $this->session->flashdata('info'); ?>