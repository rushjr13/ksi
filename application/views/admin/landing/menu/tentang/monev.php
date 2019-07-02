<?php

  $b = date('m');
  $t = date('Y');

  if($b=='01'){
      $bulan='Januari';
  } else if($b=='02'){
      $bulan='Februari';
  } else if($b=='03'){
      $bulan='Maret';
  } else if($b=='04'){
      $bulan='April';
  } else if($b=='05'){
      $bulan='Mei';
  } else if($b=='06'){
      $bulan='Juni';
  } else if($b=='07'){
      $bulan='Juli';
  } else if($b=='08'){
      $bulan='Agustus';
  } else if($b=='09'){
      $bulan='September';
  } else if($b=='10'){
      $bulan='Oktober';
  } else if($b=='11'){
      $bulan='November';
  } else if($b=='12'){
      $bulan='Desember';
  }

  $bln = $bulan.' '.$t;

?>
<div class="tab-pane fade" id="v-pills-monev" role="tabpanel" aria-labelledby="v-pills-monev-tab">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Monitoring & Evaluasi - Target & Realisasi <?=$bln ?></h6>
    </div>
    <form action="<?=base_url('landing/menu/tentang/') ?>" method="post">
      <div class="card-body">
        <div class="form-group row">
          <label for="pagu" class="col-sm-2 col-form-label">Pagu Anggaran</label>
          <div class="col-sm-2">
            <div class="input-group">
              <input type="text" class="form-control text-right" id="pagu" name="pagu" placeholder="Pagu Anggaran" value="<?=number_format($monev['pagu'],0,',','.') ?>" readonly>
              <div class="input-group-append">
                <button class="btn btn-secondary" type="button" id="tbl_ubahpagu" data-toggle="modal" data-target="#ubahpaguModal" data-id="<?=$monev['id'] ?>" data-pagu="<?=$monev['pagu'] ?>" title="Ubah Pagu Anggaran"><i class="fa fa-fw fa-pencil-alt"></i></button>
              </div>
            </div>
          </div>
          <label for="tf" class="col-sm-2 col-form-label text-right">Target Fisik</label>
          <div class="col-sm-2">
            <div class="input-group">
              <input type="text" class="form-control text-center" id="tf" name="tf" placeholder="Target Fisik" value="<?=$monev['tf'] ?>" readonly>
              <div class="input-group-append">
                <button class="btn btn-secondary" type="button" id="tbl_ubahtf" data-toggle="modal" data-target="#ubahtfModal" data-id="<?=$monev['id'] ?>" data-pagu="<?=$monev['tf'] ?>" title="Ubah Target Fisik"><i class="fa fa-fw fa-pencil-alt"></i></button>
              </div>
            </div>
          </div>
          <label for="tk" class="col-sm-2 col-form-label text-right">Target Keuangan</label>
          <div class="col-sm-2">
            <div class="input-group">
              <input type="text" class="form-control text-center" id="tk" name="tk" placeholder="Target Keuangan" value="<?=$monev['tk'] ?>" readonly>
              <div class="input-group-append">
                <button class="btn btn-secondary" type="button" id="tbl_ubahtk" data-toggle="modal" data-target="#ubahtkModal" data-id="<?=$monev['id'] ?>" data-pagu="<?=$monev['tk'] ?>" title="Ubah Target Keuangan"><i class="fa fa-fw fa-pencil-alt"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="realisasi" class="col-sm-2 col-form-label">Realisasi Anggaran</label>
          <div class="col-sm-2">
            <div class="input-group">
              <input type="text" class="form-control text-right" id="realisasipagu" name="realisasipagu" placeholder="Realisasi Anggaran" value="<?=number_format($monev['realisasi_pagu'],0,',','.') ?>" readonly>
              <div class="input-group-append">
                <button class="btn btn-secondary" type="button" id="tbl_ubahrealisasipagu" data-toggle="modal" data-target="#ubahrealisasipaguModal" data-id="<?=$monev['id'] ?>" data-pagu="<?=$monev['realisasi_pagu'] ?>" title="Ubah Realisasi Anggaran"><i class="fa fa-fw fa-pencil-alt"></i></button>
              </div>
            </div>
          </div>
          <label for="rf" class="col-sm-2 col-form-label text-right">Realisasi Fisik</label>
          <div class="col-sm-2">
            <div class="input-group">
              <input type="text" class="form-control text-center" id="rf" name="rf" placeholder="Realisasi Fisik" value="<?=$monev['rf'] ?>" readonly>
              <div class="input-group-append">
                <button class="btn btn-secondary" type="button" id="tbl_ubahrf" data-toggle="modal" data-target="#ubahrfModal" data-id="<?=$monev['id'] ?>" data-pagu="<?=$monev['rf'] ?>" title="Ubah Realisasi Fisik"><i class="fa fa-fw fa-pencil-alt"></i></button>
              </div>
            </div>
          </div>
          <label for="rk" class="col-sm-2 col-form-label text-right">Realisasi Keuangan</label>
          <div class="col-sm-2">
            <div class="input-group">
              <input type="text" class="form-control text-center" id="rk" name="rk" placeholder="Realisasi Keuangan" value="<?=$monev['rk'] ?>" readonly>
              <div class="input-group-append">
                <button class="btn btn-secondary" type="button" id="tbl_ubahrk" data-toggle="modal" data-target="#ubahrkModal" data-id="<?=$monev['id'] ?>" data-pagu="<?=$monev['rk'] ?>" title="Ubah Realisasi Keuangan"><i class="fa fa-fw fa-pencil-alt"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="sisa" class="col-sm-2 col-form-label">Sisa Anggaran</label>
          <div class="col-sm-2">
            <input type="text" class="form-control text-center" id="sisa" name="sisa" placeholder="Sisa Anggaran" value="<?=number_format($monev['pagu']-$monev['realisasi_pagu'],0,',','.') ?>" readonly>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal Ubah Pagu-->
<div class="modal  fade" id="ubahpaguModal" tabindex="-1" role="dialog" aria-labelledby="ubahpaguModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahpaguModalLabel">Ubah Pagu Anggaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formubahpagu" action="<?=base_url('landing/menu/tentang/ubah_pagu') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id_monev" name="id_monev" value="<?=$monev['id'] ?>">
            <input type="number" class="form-control" id="pagu_monev" name="pagu_monev" placeholder="Pagu Anggaran" value="<?=$monev['pagu'] ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-info" title="Perbarui"><i class="fa fa-fw fa-edit"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah Realisasi Anggaran-->
<div class="modal  fade" id="ubahrealisasipaguModal" tabindex="-1" role="dialog" aria-labelledby="ubahrealisasipaguModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahrealisasipaguModalLabel">Ubah Realisasi Anggaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formubahrealisasipagu" action="<?=base_url('landing/menu/tentang/ubah_realisasipagu') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id_monev" name="id_monev" value="<?=$monev['id'] ?>">
            <input type="number" class="form-control" id="realisasipagu_monev" name="realisasipagu_monev" placeholder="Realisasi Anggaran" value="<?=$monev['realisasi_pagu'] ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-info" title="Perbarui"><i class="fa fa-fw fa-edit"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah Target Fisik-->
<div class="modal  fade" id="ubahtfModal" tabindex="-1" role="dialog" aria-labelledby="ubahtfModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahtfModalLabel">Ubah Target Fisik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formubahtf" action="<?=base_url('landing/menu/tentang/ubah_tf') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id_monev" name="id_monev" value="<?=$monev['id'] ?>">
            <input type="text" class="form-control" id="tf_monev" name="tf_monev" placeholder="Target Fisik" value="<?=$monev['tf'] ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-info" title="Perbarui"><i class="fa fa-fw fa-edit"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah Realisasi Fisik-->
<div class="modal  fade" id="ubahrfModal" tabindex="-1" role="dialog" aria-labelledby="ubahrfModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahrfModalLabel">Ubah Realisasi Fisik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formubahrf" action="<?=base_url('landing/menu/tentang/ubah_rf') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id_monev" name="id_monev" value="<?=$monev['id'] ?>">
            <input type="text" class="form-control" id="rf_monev" name="rf_monev" placeholder="Realisasi Fisik" value="<?=$monev['rf'] ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-info" title="Perbarui"><i class="fa fa-fw fa-edit"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah Target Keuangan-->
<div class="modal  fade" id="ubahtkModal" tabindex="-1" role="dialog" aria-labelledby="ubahtkModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahtkModalLabel">Ubah Target Keuangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formubahtk" action="<?=base_url('landing/menu/tentang/ubah_tk') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id_monev" name="id_monev" value="<?=$monev['id'] ?>">
            <input type="text" class="form-control" id="tk_monev" name="tk_monev" placeholder="Target Keuangan" value="<?=$monev['tk'] ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-info" title="Perbarui"><i class="fa fa-fw fa-edit"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah Realisasi Keuangan-->
<div class="modal  fade" id="ubahrkModal" tabindex="-1" role="dialog" aria-labelledby="ubahrkModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahrkModalLabel">Ubah Realisasi Keuangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formubahrk" action="<?=base_url('landing/menu/tentang/ubah_rk') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id_monev" name="id_monev" value="<?=$monev['id'] ?>">
            <input type="text" class="form-control" id="rk_monev" name="rk_monev" placeholder="Realisasi Keuangan" value="<?=$monev['rk'] ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-info" title="Perbarui"><i class="fa fa-fw fa-edit"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>