      <div class="tab-pane fade" id="v-pills-misi" role="tabpanel" aria-labelledby="v-pills-misi-tab">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <div class="row">
              <div class="col-md-10">
                <h6 class="m-0 font-weight-bold text-primary align-middle">Misi KSI</h6>
              </div>
              <div class="col-md-2 text-right">
                <button class="btn btn-sm btn-circle btn-primary m-0" type="button" id="tbl_tambahmisi" data-toggle="modal" data-target="#tambahmisiModal"title="Tambah Misi"><i class="fa fa-fw fa-plus"></i></button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-borderless table-hover" id="dataTable1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th>MISI KSI</th>
                  <th class="text-center">OPSI</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th class="text-center">#</th>
                  <th>MISI KSI</th>
                  <th class="text-center">OPSI</th>
                </tr>
              </tfoot>
              <tbody>
                <?php $no=1; foreach ($misi as $m): ?>
                  <tr>
                    <th class="text-center align-middle" width="3%"><?=$no++ ?></th>
                    <td class="align-middle"><strong><?=$m['judul_misi'] ?></strong><br><small><?=$m['ket_misi'] ?></small></td>
                    <td class="text-center align-middle" width="8%">
                      <button type="button" class="btn btn-sm btn-circle btn-info" id="ubahmisi" data-toggle="modal" data-target="#ubahmisiModal" data-id="<?=$m['id_misi'] ?>" data-judul="<?=$m['judul_misi'] ?>" data-ket="<?=$m['ket_misi'] ?>" title="Ubah Misi <?=$m['judul_misi'] ?>">
                        <i class="fa fa-fw fa-edit"></i>
                      </button>
                      <button type="button" class="btn btn-sm btn-circle btn-danger" id="hapusmisi" data-toggle="modal" data-target="#hapusmisiModal" data-id="<?=$m['id_misi'] ?>" data-judul="<?=$m['judul_misi'] ?>" title="Hapus Misi <?=$m['judul_misi'] ?>">
                        <i class="fa fa-fw fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Misi-->
<div class="modal  fade" id="tambahmisiModal" tabindex="-1" role="dialog" aria-labelledby="tambahmisiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahmisiModalLabel">Tambah Misi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formtambahmisi" action="<?=base_url('landing/menu/tentang/tambah_misi') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="judul_misi">Judul</label>
            <input type="text" class="form-control" id="judul_misi" name="judul_misi" placeholder="Judul Misi" autofocus autocomplete="off">
          </div>
          <div class="form-group">
            <label for="ket_misi">Keterangan</label>
            <textarea class="form-control" id="ket_misi" name="ket_misi" placeholder="Keterangan" rows="6"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-primary" title="Tambah"><i class="fa fa-fw fa-save"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah Misi-->
<div class="modal  fade" id="ubahmisiModal" tabindex="-1" role="dialog" aria-labelledby="ubahmisiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahmisiModalLabel">Ubah Misi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formubahmisi" action="<?=base_url('landing/menu/tentang/ubah_misi') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="judul_misi">Judul</label>
            <input type="text" class="form-control" id="judul_misi" name="judul_misi" placeholder="Judul Misi" required autocomplete="off">
            <input type="hidden" class="form-control" id="id_misi" name="id_misi">
          </div>
          <div class="form-group">
            <label for="ket_misi">Keterangan</label>
            <textarea class="form-control" id="ket_misi" name="ket_misi" placeholder="Keterangan" rows="6" required></textarea>
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

<!-- Modal Hapus Misi-->
<div class="modal  fade" id="hapusmisiModal" tabindex="-1" role="dialog" aria-labelledby="hapusmisiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusmisiModalLabel">Hapus Misi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formhapusmisi" action="<?=base_url('landing/menu/tentang/hapus_misi') ?>" method="post">
        <div class="modal-body text-center">
          <input type="hidden" class="form-control" id="id_misi" name="id_misi">
          <input type="hidden" class="form-control" id="judul_misi" name="judul_misi">
          <p id="isi">Pesan Hapus</p>
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

    $(document).on("click", "#ubahmisi", function() {
        var id = $(this).data('id');
        var judul = $(this).data('judul');
        var ket = $(this).data('ket');
        $("#ubahmisiModal #id_misi").val(id);
        $("#ubahmisiModal #judul_misi").val(judul);
        $("#ubahmisiModal #ket_misi").val(ket);
        $("#ubahmisiModal #formubahmisi").attr("action","<?php echo base_url() ?>landing/menu/tentang/ubah_misi");
    });

    $(document).on("click", "#hapusmisi", function() {
        var id = $(this).data('id');
        var judul = $(this).data('judul');
        $("#hapusmisiModal #id_misi").val(id);
        $("#hapusmisiModal #judul_misi").val(judul);
        $("#hapusmisiModal #isi").html("Anda yakin ingin menghapus misi :<br><strong>"+judul+"</strong> ?");
        $("#hapusmisiModal #formhapusmisi").attr("action","<?php echo base_url() ?>landing/menu/tentang/hapus_misi");
    });

</script>