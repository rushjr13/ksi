<?php 
  date_default_timezone_set('Asia/Makassar');
  $hari = date('l', $pengguna_masuk['tgl_daftar']);
  $tgl = date('d', $pengguna_masuk['tgl_daftar']);
  $bln = date('F', $pengguna_masuk['tgl_daftar']);
  $thn = date('Y', $pengguna_masuk['tgl_daftar']);
  $jam = date('H', $pengguna_masuk['tgl_daftar']);
  $mnt = date('i', $pengguna_masuk['tgl_daftar']);
  $dtk = date('s', $pengguna_masuk['tgl_daftar']);
  $saat = date('a', $pengguna_masuk['tgl_daftar']);

  if($hari=='Sunday'){
    $hr='Minggu';
  } else if($hari=='Monday'){
    $hr='Senin';
  } else if($hari=='Tuesday'){
    $hr='Selasa';
  } else if($hari=='Wednesday'){
    $hr='Rabu';
  } else if($hari=='Thursday'){
    $hr='Kamis';
  } else if($hari=='Friday'){
    $hr='Jumat';
  } else if($hari=='Saturday'){
    $hr='Sabtu';
  }

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

  $tgl_daftar = $tgl.' '.$bulan.' '.$thn;
  $tgl_daftar2 = $hr.', '.$tgl.' '.$bulan.' '.$thn.' - '.$jam.':'.$mnt.':'.$dtk.' '.$saat;
?>
<?= form_open_multipart('pengguna/gantikatasandi');?>
<div class="row justify-content-md-center">
  <div class="col-xl-4 col-lg-4">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h4 class="m-0 font-weight-bold text-primary"><i class="far fa-fw fa-image"></i> Foto Profil</h4>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="row justify-content-center mb-3">
          <div class="text-center">
            <img src="<?=base_url('assets/admin/img/pengguna/').$pengguna_masuk['foto'] ?>" class="img img-thumbnail" alt="<?=$pengguna_masuk['foto'] ?>"><br>
            <small><?=$pengguna_masuk['foto'] ?></small>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-8">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3">
        <div class="row">
          <div class="col-8">
            <h4 class="m-0 font-weight-bold text-primary"><i class="fa fa-fw fa-user"></i> <?=$pengguna_masuk['nama_lengkap'] ?> <small class="text-muted"><small>(<?=$tgl_daftar2 ?>)</small></small></h4>
          </div>
          <div class="col-4 text-right">
            <a href="<?=base_url('pengguna/profil') ?>" class="btn btn-sm btn-circle btn-secondary" title="Kembali"><i class="fa fa-fw fa-undo"></i></a>
            <a href="<?=base_url('pengguna/ubahprofil') ?>" class="btn btn-sm btn-circle btn-primary" title="Perbarui Profil"><i class="fa fa-fw fa-user-edit"></i></a>
          </div>
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="form-group row">
          <div class="col-6">
            <label for="username">Nama Pengguna</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Nama Pengguna" value="<?=$pengguna_masuk['username'] ?>" readonly>
          </div>
          <div class="col-6">
            <label for="password">Kata Sandi Lama</label>
            <div class="input-group">
              <input type="hidden" class="form-control" id="passlama" name="passlama" value="<?=$pengguna_masuk['password'] ?>">
              <input type="password" class="form-control" placeholder="Masukkan Kata Sandi Lama" id="password" name="password" autofocus>
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="lihat" name="lihat" title="Tampilkan"><i id="icon" class="fa fa-fw fa-eye"></i></button>
              </div>
            </div>
            <?php echo form_error('password', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            <?php echo form_error('passlama', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-6">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?=$pengguna_masuk['nama_lengkap'] ?>" readonly>
            <input type="hidden" class="form-control" id="id_pengguna" name="id_pengguna" value="<?=$pengguna_masuk['id_pengguna'] ?>">
          </div>
          <div class="col-6">
            <label for="passbaru1">Kata Sandi Baru</label>
            <div class="input-group">
              <input type="password" class="form-control" placeholder="Masukkan Kata Sandi Baru" id="passbaru1" name="passbaru1">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="lihat1" name="lihat1" title="Tampilkan"><i id="icon1" class="fa fa-fw fa-eye"></i></button>
              </div>
            </div>
            <?php echo form_error('passbaru1', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-6">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?=$pengguna_masuk['email'] ?>" readonly>
          </div>
          <div class="col-6">
            <label for="passbaru2">Ulangi Kata Sandi Baru</label>
            <div class="input-group">
              <input type="password" class="form-control" id="passbaru2" name="passbaru2" placeholder="Ulangi Kata Sandi Baru">
            </div>
            <?php echo form_error('passbaru2', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="tgl_daftar">Terdaftar Sejak</label>
          <input type="text" class="form-control" id="tgl_daftar" name="tgl_daftar" placeholder="Terdaftar Sejak" value="<?=$tgl_daftar2 ?>" readonly>
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="button" class="btn btn-circle btn-secondary" id="batal" name="batal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
        <button type="submit" class="btn btn-circle btn-primary" id="simpan" name="simpan" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
      </div>
    </div>
  </div>
</div>
</form>

<script src="<?php echo base_url() ?>assets/admin/js/jquery-1.10.2.js"></script>
<script>

    $(document).on("click", "#lihat", function() {
        $(".input-group #password").attr("type", "text");
        $(".input-group-append #lihat").attr("title", "Sembunyikan");
        $(".input-group-append #icon").attr("class", "fa fa-fw fa-eye-slash");
        $(".input-group-append #lihat").attr("id", "jgnlihat");
    });

    $(document).on("click", "#jgnlihat", function() {
        $(".input-group #password").attr("type", "password");
        $(".input-group-append #jgnlihat").attr("title", "Tampilkan");
        $(".input-group-append #icon").attr("class", "fa fa-fw fa-eye");
        $(".input-group-append #jgnlihat").attr("id", "lihat");
    });

    $(document).on("click", "#lihat1", function() {
        $(".input-group #passbaru1").attr("type", "text");
        $(".input-group-append #lihat1").attr("title", "Sembunyikan");
        $(".input-group-append #icon1").attr("class", "fa fa-fw fa-eye-slash");
        $(".input-group-append #lihat1").attr("id", "jgnlihat1");
    });

    $(document).on("click", "#jgnlihat1", function() {
        $(".input-group #passbaru1").attr("type", "password");
        $(".input-group-append #jgnlihat1").attr("title", "Tampilkan");
        $(".input-group-append #icon1").attr("class", "fa fa-fw fa-eye");
        $(".input-group-append #jgnlihat1").attr("id", "lihat1");
    });

</script>