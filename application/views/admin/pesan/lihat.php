<div class="row justify-content-md-center">
  <div class="col-6">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="row">
          <div class="col-6">
            <h4 class="m-0 font-weight-bold text-primary"><i class="fas fa-bell fa-fw"></i> Detail Pemberitahuan</h4>
          </div>
          <div class="col-6 text-right">
            <a href="<?=base_url('pemberitahuan') ?>" class="btn btn-sm btn-circle btn-secondary" title="Kembali"><i class="fa fa-fw fa-undo"></i></a>
            <button type="button" class="btn btn-circle btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal" title="Hapus Pemberitahuan Ini"><i class="fa fa-fw fa-trash"></i></button>
          </div>
        </div>
      </div>
        <?php 
          date_default_timezone_set('Asia/Makassar');
          $tgl = date('d', $pemberitahuan_id['tgl_pemberitahuan']);
          $bln = date('F', $pemberitahuan_id['tgl_pemberitahuan']);
          $thn = date('Y', $pemberitahuan_id['tgl_pemberitahuan']);
          $jam = date('H', $pemberitahuan_id['tgl_pemberitahuan']);
          $mnt = date('i', $pemberitahuan_id['tgl_pemberitahuan']);
          $dtk = date('s', $pemberitahuan_id['tgl_pemberitahuan']);
          $saat = date('a', $pemberitahuan_id['tgl_pemberitahuan']);

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
      <div class="card-body">
        <div class="row mb-4">
          <div class="col-6">Tanggal & Waktu : <strong><?=$tgl_pemberitahuan2 ?></strong></div>
          <div class="col-6 text-right">Oleh : <strong><?=$pemberitahuan_id['nama_lengkap'] ?></strong></div>
        </div>
        <div class="form-group">
          <label for="isi">Isi Pemberitahuan :</label>
          <textarea id="isi" name="isi" class="form-control" rows="5" readonly><?=$pemberitahuan_id['isi_pemberitahuan'] ?></textarea>
        </div>
      </div>
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
      <form action="<?=base_url('pemberitahuan/hapus/id/').$pemberitahuan_id['id_pemberitahuan'] ?>" method="post">
        <div class="modal-body">
          <p>Anda yakin ingin menghapus pemberitahuan ini?</p>
          <div class="form-group">
            <input type="hidden" class="form-control text-center" id="id_pemberitahuan" name="id_pemberitahuan" value="<?=$pemberitahuan_id['id_pemberitahuan'] ?>" readonly>
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