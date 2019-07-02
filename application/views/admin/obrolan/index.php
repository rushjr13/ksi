<div class="row">
  <div class="col-3">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-fw fa-comments"></i> <?=$pengguna_masuk['nama_lengkap'] ?></h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <?php foreach ($obrolan_pengguna as $op): ?>
            <a class="nav-link" id="v-pills-<?=$op['username'] ?>-tab" data-toggle="pill" href="#v-pills-<?=$op['username'] ?>" role="tab" aria-controls="v-pills-<?=$op['username'] ?>" aria-selected="true"><?=$op['nama_lengkap'] ?></a>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <?php foreach ($obrolan_pengguna as $op): ?>
      <div class="tab-pane fade show" id="v-pills-<?=$op['username'] ?>" role="tabpanel" aria-labelledby="v-pills-<?=$op['username'] ?>-tab">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><img src="<?=base_url('assets/admin/img/pengguna/').$op['foto'] ?>" class="img rounded-circle" width="25"> <?=$op['nama_lengkap'] ?></h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <form action="<?=base_url('admin/obrolan/kirim') ?>" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="isi_pesan" name="isi_pesan" placeholder="Masukkan Pesan..." autocomplete="off" autofocus required>
                <input type="text" class="form-control" id="id_obrolan" name="id_obrolan" value="<?=$op['id_obrolan'] ?>">
                <input type="text" class="form-control" id="id_pengirim" name="id_pengirim" value="<?=$pengguna_masuk['id_pengguna'] ?>">
                <input type="text" class="form-control" id="id_penerima" name="id_penerima" value="<?=$op['id_pengirim'] ?>">
                <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" value="<?=$op['nama_lengkap'] ?>">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit" id="tbl_kirimpesan" name="tbl_kirimpesan" title="Kirim Pesan"><i class="fa fa-fw fa-paper-plane"></i></button>
                </div>
              </div>
            </form>
            <?php
              $this->db->select('*');
              $this->db->from('pesan');
              $this->db->join('pengguna', 'pengguna.id_pengguna = pesan.id_pengirim');
              $this->db->order_by('pesan.tgl_pesan', 'DESC');
              $this->db->where('pesan.id_obrolan', $op['id_obrolan']);

              // $this->db->where('pesan.id_penerima', $op['id_penerima']);
              $pesan = $this->db->get()->result_array();
            ?>
            <?php foreach ($pesan as $p): ?>
              <?php
                if($p['id_pengirim']!=$pengguna_masuk['id_pengguna']){
                  $posisi = 'float-right';
                  $warna = 'secondary';
                } else {
                  $posisi = 'float-left';
                  $warna = 'success';
                } ?>
                <?php 
                  date_default_timezone_set('Asia/Makassar');
                  $tgl = date('d', $p['tgl_pesan']);
                  $bln = date('F', $p['tgl_pesan']);
                  $thn = date('Y', $p['tgl_pesan']);
                  $jam = date('H', $p['tgl_pesan']);
                  $mnt = date('i', $p['tgl_pesan']);
                  $dtk = date('s', $p['tgl_pesan']);
                  $saat = date('a', $p['tgl_pesan']);

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

                  $tgl_pesan = $tgl.' '.$bulan.' '.$thn;
                  $tgl_pesan2 = $tgl.' '.$bulan.' '.$thn.' - '.$jam.':'.$mnt.':'.$dtk;
                ?>
              <div class="row">
                <div class="col-md">
                  <div class="alert alert-<?=$warna ?> w-75 <?=$posisi ?>" role="alert">
                    <?php
                      if($p['status_pesan']==0){
                        $icon = "<i class='fa fa-fw fa-check'></i>";
                        $warna = "info";
                      } else {
                        $icon = "R";
                        $warna = "success";
                      }
                    ?>
                    <p><small><span class="badge badge-pill badge-<?=$warna ?>"><?=$icon ?></span> <strong><?=$p['nama_lengkap'] ?></strong> || <?=$tgl_pesan2 ?></small></p>
                    <p><?=$p['isi_pesan'] ?></p>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
      <?php endforeach ?>
      <!-- <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            Profil
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            Messages
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Settings</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            Settings
          </div>
        </div>
      </div> -->
    </div>
  </div>
</div>
