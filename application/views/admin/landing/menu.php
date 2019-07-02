<div class="row justify-content-center">
  <div class="col-6">
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
              <h4><i class="fa fa-fw fa-list"></i> Menu Landing Page</h4>
            </div>
            <div class="col-6 text-right">
              <button type="button" class="btn btn-sm btn-circle btn-primary" id="tambah" data-toggle="modal" data-target="#tambahModal" title="Tambah Menu Landing">
                <i class="fa fa-fw fa-plus"></i>
              </button>
            </div> 
          </div>
        </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width="5%" class="text-center">#</th>
                <th>MENU LANDING</th>
                <th>LINK / URL</th>
                <th width="20%" class="text-center">OPSI</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th class="text-center">#</th>
                <th>MENU LANDING</th>
                <th>LINK / URL</th>
                <th class="text-center">OPSI</th>
              </tr>
            </tfoot>
            <tbody>
              <?php $no = 1; foreach ($menulanding as $ml): ?>
                <tr>
                  <td class="text-center"><?=$no++ ?></td>
                  <td><a href="<?=base_url('landing/menu/').$ml['url_ml'] ?>"><?=$ml['nama_ml'] ?></a></td>
                  <td><a href="<?=base_url().$ml['url_ml'] ?>" target="_blank"><?=base_url().$ml['url_ml'] ?></a></td>
                  <td class="text-center">
                    <?php if($ml['status_ml']==1){ ?>
                      <button type="button" class="btn btn-sm btn-circle btn-success" id="status" data-toggle="modal" data-target="#statusModal" data-id="<?=$ml['id_ml'] ?>" data-nama="<?=$ml['nama_ml'] ?>" data-ket="Non Aktifkan" data-status="0" title="Non Aktifkan Menu Landing <?=$ml['nama_ml'] ?>">
                        <i class="fa fa-fw fa-check"></i>
                      </button>
                    <?php } else { ?>
                      <button type="button" class="btn btn-sm btn-circle btn-danger" id="status" data-toggle="modal" data-target="#statusModal" data-id="<?=$ml['id_ml'] ?>" data-nama="<?=$ml['nama_ml'] ?>" data-ket="Aktifkan" data-status="1" title="Aktifkan Menu Landing <?=$ml['nama_ml'] ?>">
                        <i class="fa fa-fw fa-power-off"></i>
                      </button>
                    <?php } ?>
                    <button type="button" class="btn btn-sm btn-circle btn-info" id="ubah" data-toggle="modal" data-target="#ubahModal" data-id="<?=$ml['id_ml'] ?>" data-nama="<?=$ml['nama_ml'] ?>" data-home="<?=base_url() ?>" data-url="<?=$ml['url_ml'] ?>" title="Ubah Menu Landing <?=$ml['nama_ml'] ?>">
                      <i class="fa fa-fw fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-circle btn-danger" id="hapus" data-toggle="modal" data-target="#hapusModal" data-id="<?=$ml['id_ml'] ?>" data-nama="<?=$ml['nama_ml'] ?>" title="Hapus Menu Landing <?=$ml['nama_ml'] ?>">
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