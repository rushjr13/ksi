<?php echo form_error('isi_pemberitahuan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa fa-fw fa-exclamation"></i>', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>'); ?>
<div class="row justify-content-md-center">
  <div class="col-6">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="row">
          <div class="col-6">
            <h4 class="m-0 font-weight-bold text-primary"><i class="fas fa-bell fa-fw"></i> Pemberitahuan <small>(<?= $this->db->count_all_results('pemberitahuan') ?>)</small></h4>
          </div>
          <div class="col-6 text-right">
            <button type="button" class="btn btn-circle btn-sm btn-primary" data-toggle="modal" data-target="#tambahModal" title="Tambah Pemberitahuan"><i class="fa fa-fw fa-plus"></i></button>
            <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-circle btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-trash"></i></button>
              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#sudahbacaModal">Hapus Berita Yang Sudah Dibaca</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#semuaModal">Hapus Semua Berita</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
            <tbody>
              <?php foreach ($pemberitahuan as $berita): ?>
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
                $tgl_pemberitahuan2 = $tgl.' '.$bulan.' '.$thn.' - '.$jam.':'.$mnt.':'.$dtk.' '.$saat;
              ?>
                <tr>
                  <?php if($berita['baca']==0){ ?>
                    <td class="align-middle text-center" width="5%">
                        <button type="button" class="btn btn-circle btn-primary"><i class="fa fa-fw fa-check"></i></button>
                    </td>
                    <td>
                      <span class="font-weight-bold"><?=$berita['isi_pemberitahuan'] ?></span><br>
                      <small class="text-muted"><small><?=$tgl_pemberitahuan2 ?> || <?=$berita['nama_lengkap'] ?></small></small><br>
                    </td>
                  <?php } else { ?>
                    <td class="align-middle text-center" width="5%">
                        <button type="button" class="btn btn-circle btn-success"><span class="font-weight-bold" style="font-style: italic">R</span></button>
                    </td>
                    <td>
                      <span><?=$berita['isi_pemberitahuan'] ?></span><br>
                      <small class="text-muted"><small><?=$tgl_pemberitahuan2 ?> || <?=$berita['nama_lengkap'] ?></small></small><br>
                    </td>
                  <?php } ?>
                  <td class="align-middle text-center" width="15%">
                    <a href="<?=base_url('pemberitahuan/lihat/').$berita['id_pemberitahuan'] ?>" class="btn btn-circle btn-info" title="Lihat Berita"><i class="fa fa-fw fa-eye"></i></a>
                    <button type="button" class="btn btn-circle btn-danger" data-toggle="modal" data-target="#hapusModal" title="Hapus Pemberitahuan"><i class="fa fa-fw fa-trash"></i></button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalTitle">Tambah Pemberitahuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('pemberitahuan') ?>" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <div class="col-6">
              <input type="text" class="form-control text-center" id="tgl" name="tgl" value="<?=date('d M Y') ?>" readonly>
              <input type="hidden" class="form-control text-center" id="tgl_pemberitahuan" name="tgl_pemberitahuan" value="<?=time() ?>" readonly>
            </div>
            <div class="col-6">
              <input type="text" class="form-control text-center" id="nama_lengkap" name="nama_lengkap" value="<?=$pengguna_masuk['nama_lengkap'] ?>" readonly>
              <input type="hidden" class="form-control text-center" id="id_pengguna" name="id_pengguna" value="<?=$pengguna_masuk['id_pengguna'] ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" id="isi_pemberitahuan" name="isi_pemberitahuan" rows="5" autofocus></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus Id-->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalTitle">Hapus Pemberitahuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('pemberitahuan/hapus/id/').$berita['id_pemberitahuan'] ?>" method="post">
        <div class="modal-body">
          <p>Anda yakin ingin menghapus pemberitahuan ini?</p>
          <div class="form-group">
            <input type="hidden" class="form-control text-center" id="id_pemberitahuan" name="id_pemberitahuan" value="<?=$berita['id_pemberitahuan'] ?>" readonly>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus Sudah Baca-->
<div class="modal fade" id="sudahbacaModal" tabindex="-1" role="dialog" aria-labelledby="sudahbacaModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sudahbacaModalTitle">Hapus Pemberitahuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('pemberitahuan/hapus/sudah_dibaca') ?>" method="post">
        <div class="modal-body">
          <p>Anda yakin ingin menghapus pemberitahuan yang telah dibaca?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus Semua-->
<div class="modal fade" id="semuaModal" tabindex="-1" role="dialog" aria-labelledby="semuaModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="semuaModalTitle">Hapus Pemberitahuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('pemberitahuan/hapus/semua') ?>" method="post">
        <div class="modal-body">
          <p>Anda yakin ingin menghapus semua pemberitahuan?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>