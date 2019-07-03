<?php $jlh_pesan = $this->db->count_all_results('email_masuk') ?>
<div class="row justify-content-md-center">
  <div class="col-6">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="row">
          <div class="col-6">
            <h4 class="m-0 font-weight-bold text-primary"><i class="fas fa-envelope fa-fw"></i> Pesan <small>(<?php $this->db->where('status_em', 0); echo $this->db->count_all_results('email_masuk') ?> Pesan Belum Dibaca)</small></h4>
          </div>
          <div class="col-6 text-right">
            <?php if($jlh_pesan>0){ ?>
              <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-circle btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-trash"></i></button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#sudahbacaModal">Hapus Pesan Yang Sudah Dibaca</a>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#semuaModal">Hapus Semua Pesan</a>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="card-body">
        <?php if($jlh_pesan<1){ ?>
          <div class="alert alert-secondary text-center" role="alert">Tidak Ada Email / Pesan Masuk</div>
        <?php }else{ ?>
          <div class="list-group">
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
              <a href="<?=base_url('pesan/lihat/').$em['id_em'] ?>" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <?php if($em['status_em']==0){ ?>
                    <h5 class="mb-1 text-primary font-weight-bold"><?=$em['perihal_em'] ?></h5>
                    <small><?=$tgl_em2 ?> <span class="badge badge-pill badge-primary"><i class="fa fa-fw fa-check"></i></span></small>
                  <?php }else{ ?>
                    <h5 class="mb-1 text-success"><?=$em['perihal_em'] ?></h5>
                    <small><?=$tgl_em2 ?> <span class="badge badge-pill badge-success" style="font-style: italic">R</span></small>
                  <?php } ?>
                </div>
                <small><?=$em['nama_pengirim'] ?> (<?=$em['email_pengirim'] ?>)</small>
              </a>
            <?php endforeach; ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hapus Sudah Baca-->
<div class="modal fade" id="sudahbacaModal" tabindex="-1" role="dialog" aria-labelledby="sudahbacaModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sudahbacaModalTitle">Hapus Email / Pesan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('pesan/hapus/sudah_dibaca') ?>" method="post">
        <div class="modal-body">
          <p>Anda yakin ingin menghapus email / pesan yang telah dibaca?</p>
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
        <h5 class="modal-title" id="semuaModalTitle">Hapus Email / Pesan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('pesan/hapus/semua') ?>" method="post">
        <div class="modal-body">
          <p>Anda yakin ingin menghapus semua email / pesan?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>