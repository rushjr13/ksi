<div class="row">
  <div class="col-12">
    <?php echo form_error('nama_ml', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-fw fa-ban"></i> ',
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>'); ?>
    <?php echo form_error('url_ml', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-fw fa-ban"></i> ',
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>'); ?>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
          <div class="row">
            <div class="col-6">
              <h4><i class="fa fa-fw fa-list"></i> <?=$subjudul ?></h4>
            </div>
            <div class="col-6 text-right">
              <a href="<?=base_url('landing/menu') ?>" class="btn btn-sm btn-circle btn-secondary" title="Kembali">
                <i class="fa fa-fw fa-undo"></i>
              </a>
              <a href="<?=base_url('landing/menu/galeri/tambah') ?>" class="btn btn-sm btn-circle btn-primary" title="Tambah Galeri">
                <i class="fa fa-fw fa-plus"></i>
              </a>
            </div> 
          </div>
        </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width="3%" class="text-center">#</th>
                <th class="text-center">GAMBAR</th>
                <th>JUDUL</th>
                <th>ISI</th>
                <th width="8%" class="text-center">OPSI</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">GAMBAR</th>
                <th>JUDUL</th>
                <th>ISI</th>
                <th class="text-center">OPSI</th>
              </tr>
            </tfoot>
            <tbody>
              <?php $no = 1; foreach ($galeri_lengkap as $gl): ?>
              <?php

                    $isi = substr($gl['isi'], 0, 75) . '...';

                    $tgl = substr($gl['tanggal'], 8, 2);
                    $bln = substr($gl['tanggal'], 5, 2);
                    $thn = substr($gl['tanggal'], 0, 4);

                    if($bln=='01'){
                        $bulan='Januari';
                    } else if($bln=='02'){
                        $bulan='Februari';
                    } else if($bln=='03'){
                        $bulan='Maret';
                    } else if($bln=='04'){
                        $bulan='April';
                    } else if($bln=='05'){
                        $bulan='Mei';
                    } else if($bln=='06'){
                        $bulan='Juni';
                    } else if($bln=='07'){
                        $bulan='Juli';
                    } else if($bln=='08'){
                        $bulan='Agustus';
                    } else if($bln=='09'){
                        $bulan='September';
                    } else if($bln=='10'){
                        $bulan='Oktober';
                    } else if($bln=='11'){
                        $bulan='November';
                    } else if($bln=='12'){
                        $bulan='Desember';
                    }

                    $tanggal = $tgl.' '.$bulan.' '.$thn;
                ?>
                <tr>
                  <td class="text-center"><?=$no++ ?></td>
                  <td class="text-center align-middle">
                    <a href="" class="btn btn-sm btn-circle btn-danger" id="gambar" data-toggle="modal" data-target="#gambarModal" data-gambar="<?=$gl['gambar'] ?>" data-judul="<?=$gl['judul'] ?>" data-isi="<?=$gl['isi'] ?>" data-penulis="<?=$gl['nama_lengkap'] ?>" data-hit="<?=$gl['hit'] ?>" data-tanggal="<?=$tanggal ?>" title="Lihat Gambar">
                      <img src="<?=base_url('assets/landing/images/gallery/').$gl['gambar']?>" width="100">
                    </a>
                  </td>
                  <td class="align-middle"><?=$gl['judul'] ?><br><small><?=$tanggal ?> (<i class="fa fa-fw fa-eye"></i> <?=$gl['hit'] ?>)</small></td>
                  <td class="align-middle"><?=$isi ?></td>
                  <td class="text-center align-middle">
                    <a href="<?=base_url('landing/menu/galeri/ubah/').$gl['id'] ?>" class="btn btn-sm btn-circle btn-info" title="Ubah Menu Landing <?=$gl['judul'] ?>">
                      <i class="fa fa-fw fa-edit"></i>
                    </a>
                    <button type="button" class="btn btn-sm btn-circle btn-danger" id="hapus" data-toggle="modal" data-target="#hapusModal" data-id="<?=$gl['id'] ?>" data-gambar="<?=$gl['gambar'] ?>" data-judul="<?=$gl['judul'] ?>" title="Hapus Menu Landing <?=$gl['gambar'] ?>">
                      <i class="fa fa-fw fa-trash"></i>
                    </button>
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

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('landing/menu/tambah') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="nama_ml" name="nama_ml" placeholder="Nama Menu">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="url_ml" name="url_ml" placeholder="Link / URL Menu Landing">
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

<!-- Modal Gambar -->
<div class="modal fade" id="gambarModal" tabindex="-1" role="dialog" aria-labelledby="gambarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="gambarModalLabel">Gambar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center align-middle">
        <img id="gbr" src="" class="img img-thumbnail" width="1000">
        <p id="isi" class="mt-3 ml-3 mr-3">isi Gambar</p>
        <p id="ket" class="mt-3 ml-3 mr-3">
          <i class="fa fa-fw fa-user"></i> <span id="penulis">penulis</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <i class="fa fa-fw fa-calendar"></i> <span id="tanggal">tanggal</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <i class="fa fa-fw fa-eye"></i> <span id="hit">hit</span>
        </p>
      </div>
    </div>
  </div>
</div>

<!-- Modal Ubah -->
<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="ubahModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahModalLabel">Ubah Menu Landing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formubah" action="" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id">
            <input type="text" class="form-control" id="nama_ml" name="nama_ml" placeholder="Nama Menu Landing">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="url_ml" name="url_ml" placeholder="Link/URL Menu Landing">
            <a id="link" href="https://base_url/link" target="_blank"><small id="isi" class="ml-1">https://base_url/link</small></a>
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

<!-- Modal Status -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="statusModalLabel">Ubah Status Menu Landing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('landing/menu/status') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id">
            <input type="hidden" class="form-control" id="nama" name="nama">
            <input type="hidden" class="form-control" id="ket" name="ket">
            <input type="hidden" class="form-control" id="status" name="status">
          </div>
          <p id="isi">Anda ingin mengubah status menu landing ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-info" title="Ubah Status" id="tbl_status"><i class="fa fa-fw fa-edit" id="icon_status"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Hapus Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formhapus" action="" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id">
            <input type="hidden" class="form-control" id="nama" name="nama">
          </div>
          <p id="ket">Anda ingin menghapus menu ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/admin/js/jquery-1.10.2.js"></script>
<script>

    $(document).on("click", "#ubah", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var url = $(this).data('url');
        var home = $(this).data('home');
        $("#ubahModal #id").val(id);
        $("#ubahModal #nama_ml").val(nama);
        $("#ubahModal #url_ml").val(url);
        $("#ubahModal #isi").html("<i class='fa fa-fw fa-link'></i> "+home+url);
        $("#ubahModal #link").attr("href", home+url);
        $("#ubahModal #formubah").attr("action","<?php echo base_url() ?>landing/menu/ubah");
    });

    $(document).on("click", "#gambar", function() {
        var gambar = $(this).data('gambar');
        var judul = $(this).data('judul');
        var tanggal = $(this).data('tanggal');
        var isi = $(this).data('isi');
        var penulis = $(this).data('penulis');
        var hit = $(this).data('hit');
        $("#gambarModal #gambarModalLabel").html(judul);
        $("#gambarModal #isi").html(isi);
        $("#gambarModal #penulis").html(penulis);
        $("#gambarModal #tanggal").html(tanggal);
        $("#gambarModal #hit").html(hit+" kali dilihat");
        $("#gambarModal #gbr").attr("src", "<?php echo base_url() ?>assets/landing/images/gallery/"+gambar);
    });

    $(document).on("click", "#status", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var ket = $(this).data('ket');
        var status = $(this).data('status');
        $("#statusModal #id").val(id);
        $("#statusModal #nama").val(nama);
        $("#statusModal #ket").val(ket);
        $("#statusModal #status").val(status);
        $("#statusModal #isi").html("Anda yakin ingin <strong>"+ket+"</strong> menu landing <strong>"+nama+"</strong> ?");
        $("#statusModal #formstatus").attr("action","<?php echo base_url() ?>landing/menu/status");
    });

    $(document).on("click", "#hapus", function() {
        var id = $(this).data('id');
        var namamenu = $(this).data('namamenu');
        $("#hapusModal #id").val(id);
        $("#hapusModal #namamenu").val(namamenu);
        $("#hapusModal #ket").html("Anda yakin ingin menghapus sub menu <strong>"+namamenu+"</strong> ?");
        $("#hapusModal #formhapus").attr("action","<?php echo base_url() ?>admin/menu/submenu/hapus");
    });

</script>