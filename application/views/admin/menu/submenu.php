<div class="row justify-content-center">
  <div class="col-12">
    <?php echo form_error('namasubmenu', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-fw fa-ban"></i> ',
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>'); ?>
    <?php echo form_error('menu', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-fw fa-ban"></i> ',
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>'); ?>
    <?php echo form_error('url', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-fw fa-ban"></i> ',
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>'); ?>
    <?php echo form_error('icon', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-fw fa-ban"></i> ',
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
              <a href="<?=base_url('admin/menu') ?>" class="btn btn-sm btn-circle btn-secondary" title="Menu Manajemen">
                <i class="fa fa-fw fa-list"></i>
              </a>
              <button type="button" class="btn btn-sm btn-circle btn-primary" data-toggle="modal" data-target="#tambahModal" title="Tambah Sub Menu">
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
                <th width="3%" class="text-center">#</th>
                <th>JUDUL SUB MENU</th>
                <th class="text-center">MENU</th>
                <th width="10%" class="text-center">ICON</th>
                <th width="8%" class="text-center">STATUS</th>
                <th width="8%" class="text-center">OPSI</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th class="text-center">#</th>
                <th>JUDUL</th>
                <th class="text-center">MENU</th>
                <th class="text-center">ICON</th>
                <th class="text-center">STATUS</th>
                <th class="text-center">OPSI</th>
              </tr>
            </tfoot>
            <tbody>
              <?php $no = 1; foreach ($submenu as $sm): ?>
                <tr>
                  <td class="text-center"><?=$no++ ?></td>
                  <td><?=$sm['nama_submenu'] ?><br><small><a href="<?=base_url().$sm['url'] ?>"><?=base_url().$sm['url'] ?></a></small></td>
                  <td class="text-center"><?=$sm['nama_menu'] ?></td>
                  <td class="text-center"><i class="fa fa-fw <?=$sm['icon'] ?>"></i><br><small><?=$sm['icon'] ?></small></td>
                  <td class="text-center">
                    <?php if($sm['status']==1){ ?>
                      <button type="button" class="btn btn-circle btn-success" id="status" data-toggle="modal" data-target="#statusModal" data-id="<?=$sm['id_submenu'] ?>" data-nama="<?=$sm['nama_submenu'] ?>" data-ket="Non Aktifkan" data-status="0" title="Non Aktifkan Sub Menu <?=$sm['nama_submenu'] ?>">
                        <i class="fa fa-fw fa-check"></i>
                      </button>
                    <?php } else { ?>
                      <button type="button" class="btn btn-circle btn-danger" id="status" data-toggle="modal" data-target="#statusModal" data-id="<?=$sm['id_submenu'] ?>" data-nama="<?=$sm['nama_submenu'] ?>" data-ket="Aktifkan" data-status="1" title="Aktifkan Sub Menu <?=$sm['nama_submenu'] ?>">
                        <i class="fa fa-fw fa-power-off"></i>
                      </button>
                    <?php } ?>
                  </td>
                  <td class="text-center">
                    <a href="<?=base_url('admin/menu/submenu/ubah/').$sm['id_submenu'] ?>" class="btn btn-circle btn-info" title="Ubah Sub Menu <?=$sm['nama_submenu'] ?>">
                      <i class="fa fa-fw fa-edit"></i>
                    </a>
                    <button type="button" class="btn btn-circle btn-danger" id="hapus" data-toggle="modal" data-target="#hapusModal" data-id="<?=$sm['id_submenu'] ?>" data-namamenu="<?=$sm['nama_submenu'] ?>" title="Hapus Sub Menu <?=$sm['nama_submenu'] ?>">
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
        <h5 class="modal-title" id="tambahModalLabel">Tambah Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('admin/menu/submenu/tambah') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="namasubmenu" name="namasubmenu" placeholder="Judul Sub Menu">
          </div>
          <div class="form-group">
            <select class="custom-select" id="menu" name="menu">
              <option value="" selected>-- Pilih Menu --</option>
              <?php foreach ($menu as $mn): ?>
                <option value="<?=$mn['id_menu'] ?>"><?=$mn['nama_menu'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="url" name="url" placeholder="Link/URL Sub Menu">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon Sub Menu">
            <small style="font-style: italic;" class="ml-2 text-info">Gunakan icon dari <a href="https://fontawesome.com/" target="_blank">Font Awesome</a></small>
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

<!-- Modal Status -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="statusModalLabel">Ubah Status Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('admin/menu/submenu/status') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id">
            <input type="hidden" class="form-control" id="nama" name="nama">
            <input type="hidden" class="form-control" id="ket" name="ket">
            <input type="hidden" class="form-control" id="status" name="status">
          </div>
          <p id="isi">Anda ingin mengubah status menu ini?</p>
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

    $(document).on("click", "#status", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var ket = $(this).data('ket');
        var status = $(this).data('status');
        $("#statusModal #id").val(id);
        $("#statusModal #nama").val(nama);
        $("#statusModal #ket").val(ket);
        $("#statusModal #status").val(status);
        $("#statusModal #isi").html("Anda yakin ingin <strong>"+ket+"</strong> sub menu <strong>"+nama+"</strong> ?");
        $("#statusModal #formstatus").attr("action","<?php echo base_url() ?>admin/menu/submenu/status");
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