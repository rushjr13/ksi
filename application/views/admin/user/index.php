<div class="row justify-content-center">
  <?php foreach ($pengguna as $p): ?>
  <?php if($p['status']==1){ $w_status = 'success'; $sts = 'Aktif'; } else { $w_status = 'danger'; $sts = 'Belum/Tidak Aktif'; } ?>
    <div class="col-3">
      <div class="card shadow border-<?=$w_status?> mb-3">
        <div class="card-body text-<?=$w_status?>">
          <div class="row no-gutters">
            <div class="col-md-3 mr-3 text-center">
              <?php if($p['foto']){ ?>
                <img src="<?=base_url('assets/admin/img/pengguna/').$p['foto'] ?>" class="card-img img-responsive rounded-circle" alt="<?=$p['nama_lengkap'] ?>">
              <?php } else { ?>
                <?php if($p['jk']=='Laki-laki'){ ?>
                  <img src="<?=base_url('assets/admin/img/user_l.png') ?>" class="card-img img-responsive" alt="<?=$p['nama_lengkap'] ?>">
                <?php } else { ?>
                  <img src="<?=base_url('assets/admin/img/user_p.png') ?>" class="card-img img-responsive" alt="<?=$p['nama_lengkap'] ?>">
                <?php } ?>
              <?php } ?>
            </div>
            <div class="col-md-8">
              <h5 class="card-title">
                <strong><?=strtoupper($p['nama_lengkap']) ?></strong>
              </h5>
              <small><?=$p['username'] ?> - <?=$p['nama_level'] ?></small>
              <p class="card-text"><small class="text-muted"><?=$p['email'] ?></small></p>
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <small>
            <a href="<?=base_url('admin/pengguna/detail/').$p['id_pengguna'] ?>" class="text-info ml-3"  title="Lihat & Ubah Data <?=$p['nama_lengkap'] ?>"><i class="fa fa-fw fa-edit"></i></a>
            <?php if($p['status']==1){ ?>
              <a href="<?=base_url('admin/pengguna/status/').$p['id_pengguna'] ?>" class="text-danger ml-3" title="Non Aktifkan <?=$p['nama_lengkap'] ?>"><i class="fa fa-fw fa-power-off"></i></a>
              <!-- <button type="button" class="btn btn-sm btn-circle btn-default text-danger" data-toggle="modal" data-target="#statusModal" data-id="<?=$p['id_pengguna'] ?>" data-nama="<?=$p['nama_lengkap'] ?>" data-ket="Non Aktifkan" data-status="0" title="Non Aktifkan <?=$p['nama_lengkap'] ?>"><i class="fa fa-fw fa-power-off"></i></button> -->
            <?php } else { ?>
              <a href="<?=base_url('admin/pengguna/status/').$p['id_pengguna'] ?>" class="text-success ml-3" title="Aktifkan <?=$p['nama_lengkap'] ?>"><i class="fa fa-fw fa-check"></i></a>
              <!-- <button type="button" class="btn btn-sm btn-circle btn-default text-success" data-toggle="modal" data-target="#statusModal" data-id="<?=$p['id_pengguna'] ?>" data-nama="<?=$p['nama_lengkap'] ?>" data-ket="Aktifkan" data-status="1" title="Aktifkan <?=$p['nama_lengkap'] ?>"><i class="fa fa-fw fa-check"></i></button> -->
            <?php } ?>
            <a href="<?=base_url('admin/pengguna/hapus/').$p['id_pengguna'] ?>" class="text-danger ml-3" title="Hapus <?=$p['nama_lengkap'] ?>"><i class="fa fa-fw fa-trash"></i></a>
          </small>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <div class="col-3">
    <div class="text-primary text-center mt-4">
      <a href="<?=base_url('admin/pengguna/tambah') ?>" title="Tambah Pengguna">
          <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;" src="<?=base_url('assets/admin/')?>img/undraw/svg/add_user.svg" alt="">
      </a>
    </div>
  </div>
</div>

<!-- Modal Status -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="statusModalLabel">Status Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formstatus" action="" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id">
            <input type="hidden" class="form-control" id="nama" name="nama">
            <input type="hidden" class="form-control" id="ket" name="ket">
            <input type="hidden" class="form-control" id="status" name="status">
            <p id="isi">Anda ingin mengubah status pengguna ini?</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" id="tblstatus" class="btn btn-sm btn-circle btn-info" title="Ubah Status"><i id="icontblstatus" class="fa fa-fw fa-edit"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>