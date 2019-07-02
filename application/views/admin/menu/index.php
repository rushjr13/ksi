<div class="row justify-content-center">
  <div class="col-6">
    <?php echo form_error('namamenu', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-fw fa-ban"></i> ',
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>'); ?>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
          <div class="row">
            <div class="col-6">
              <h4><i class="fa fa-fw fa-list"></i> <?=$judul ?></h4>
            </div>
            <div class="col-6 text-right">
              <a href="<?=base_url('admin/menu/submenu') ?>" class="btn btn-sm btn-circle btn-secondary" title="Sub Menu Manajemen">
                <i class="fa fa-fw fa-list"></i>
              </a>
              <button type="button" class="btn btn-sm btn-circle btn-primary" id="tambah" data-toggle="modal" data-target="#tambahModal" title="Tambah Menu">
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
                <th>MENU</th>
                <th width="15%" class="text-center">OPSI</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th class="text-center">#</th>
                <th>MENU</th>
                <th class="text-center">OPSI</th>
              </tr>
            </tfoot>
            <tbody>
              <?php $no = 1; foreach ($menu as $mn): ?>
                <tr>
                  <td class="text-center"><?=$no++ ?></td>
                  <td><?=$mn['nama_menu'] ?></td>
                  <td class="text-center">
                    <button type="button" class="btn btn-sm btn-circle btn-info" id="ubah" data-toggle="modal" data-target="#ubahModal" data-id="<?=$mn['id_menu'] ?>" data-namamenu="<?=$mn['nama_menu'] ?>" title="Ubah Menu <?=$mn['nama_menu'] ?>">
                      <i class="fa fa-fw fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-circle btn-danger" id="hapus" data-toggle="modal" data-target="#hapusModal" data-id="<?=$mn['id_menu'] ?>" data-namamenu="<?=$mn['nama_menu'] ?>" title="Hapus Menu <?=$mn['nama_menu'] ?>">
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
      <form action="<?=base_url('admin/menu/tambah') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="namamenu" name="namamenu" placeholder="Nama Menu">
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
        <h5 class="modal-title" id="ubahModalLabel">Ubah Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formubah" action="" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id">
            <input type="text" class="form-control" id="namamenu" name="namamenu" placeholder="Nama Menu">
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

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Hapus Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formhapus" action="" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id">
            <input type="hidden" class="form-control" id="namamenu" name="namamenu">
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
        var namamenu = $(this).data('namamenu');
        $("#ubahModal #id").val(id);
        $("#ubahModal #namamenu").val(namamenu);
        $("#ubahModal #formubah").attr("action","<?php echo base_url() ?>admin/menu/ubah");
    });

    $(document).on("click", "#hapus", function() {
        var id = $(this).data('id');
        var namamenu = $(this).data('namamenu');
        $("#hapusModal #id").val(id);
        $("#hapusModal #namamenu").val(namamenu);
        $("#hapusModal #ket").html("Anda yakin ingin menghapus menu <strong>"+namamenu+"</strong> ?");
        $("#hapusModal #formhapus").attr("action","<?php echo base_url() ?>admin/menu/hapus");
    });

</script>