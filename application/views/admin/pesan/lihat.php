<div class="row justify-content-md-center">
  <div class="col-6">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="row">
          <div class="col-6">
            <h4 class="m-0 font-weight-bold text-primary"><i class="fas fa-envelope fa-fw"></i> <?=$pesan_id['perihal_em'] ?></h4>
          </div>
          <div class="col-6 text-right">
            <a href="<?=base_url('pesan') ?>" class="btn btn-sm btn-circle btn-secondary" title="Kembali"><i class="fa fa-fw fa-undo"></i></a>
            <a href="#" class="btn btn-sm btn-circle btn-info" title="Balas"><i class="fa fa-fw fa-reply"></i></a>
            <button type="button" class="btn btn-circle btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
          </div>
        </div>
      </div>
        <?php 
          date_default_timezone_set('Asia/Makassar');
          $tgl = date('d', $pesan_id['tgl_em']);
          $bln = date('F', $pesan_id['tgl_em']);
          $thn = date('Y', $pesan_id['tgl_em']);
          $jam = date('H', $pesan_id['tgl_em']);
          $mnt = date('i', $pesan_id['tgl_em']);
          $dtk = date('s', $pesan_id['tgl_em']);
          $saat = date('a', $pesan_id['tgl_em']);

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
      <div class="card-body">
        <div class="mb-4">
          <table class="table table-borderless" width="100%">
            <tbody>
              <tr>
                <td width="13%">Pengirim :</td>
                <th class="text-primary"><?=$pesan_id['nama_pengirim'] ?><br><small>(<?=$pesan_id['email_pengirim'] ?>)</small></th>
                <td class="text-right">Tanggal & Waktu :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="font-weight-bold text-primary"><?=$tgl_em2 ?></span></th>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="form-group">
          <label for="isi" class="ml-3">Isi Email / Pesan :</label>
          <textarea id="isi" name="isi" class="form-control" rows="5" readonly><?=$pesan_id['isi_em'] ?></textarea>
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
        <h5 class="modal-title" id="hapusModalTitle">Hapus <?=$pesan_id['perihal_em'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('pesan/hapus/id/').$pesan_id['id_em'] ?>" method="post">
        <div class="modal-body">
          <p>Anda yakin ingin menghapus email / pesan : <?=$pesan_id['perihal_em'] ?>?</p>
          <div class="form-group">
            <input type="hidden" class="form-control text-center" id="id_em" name="id_em" value="<?=$pesan_id['id_em'] ?>" readonly>
            <input type="hidden" class="form-control text-center" id="perihal_em" name="perihal_em" value="<?=$pesan_id['perihal_em'] ?>" readonly>
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