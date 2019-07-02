<div class="tab-pane fade" id="v-pills-tim" role="tabpanel" aria-labelledby="v-pills-tim-tab">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row">
        <div class="col-md-10">
          <h6 class="m-0 font-weight-bold text-primary align-middle">Pegawai Bagian Kebijakan Strategi & Informasi</h6>
        </div>
        <div class="col-md-2 text-right">
          <button class="btn btn-sm btn-circle btn-primary m-0" type="button" id="tbl_tambahtim" data-toggle="modal" data-target="#tambahtimModal"title="Tambah Pegawai KSI"><i class="fa fa-fw fa-plus"></i></button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>FOTO</th>
            <th>NAMA LENGKAP & NIP</th>
            <th>JABATAN</th>
            <th class="text-center">OPSI</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th class="text-center">#</th>
            <th>FOTO</th>
            <th>NAMA LENGKAP & NIP</th>
            <th>JABATAN</th>
            <th class="text-center">OPSI</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $no=1; foreach ($pegawai as $pg): ?>
            <tr>
              <th class="text-center align-middle" width="3%"><?=$no++ ?></th>
              <td class="text-center align-middle" width="5%">
                <img src="<?=base_url('assets/landing/images/pegawai/').$pg['foto'] ?>" class="img rounded-circle" width="50">
              </td>
              <td class="align-middle"><strong><?=$pg['nama'] ?></strong><br><small>NIP. <?=$pg['nip'] ?></small></td>
              <td class="align-middle"><?=$pg['jabatan'] ?></td>
              <td class="text-center align-middle" width="8%">
                <button type="button" class="btn btn-sm btn-circle btn-info" id="ubahtim" data-toggle="modal" data-target="#ubahtimModal" data-id="<?=$pg['id_pegawai'] ?>" data-nama="<?=$pg['nama'] ?>" data-nip="<?=$pg['nip'] ?>" data-jabatan="<?=$pg['jabatan'] ?>" title="Ubah Data <?=$pg['nama'] ?>">
                  <i class="fa fa-fw fa-edit"></i>
                </button>
                <button type="button" class="btn btn-sm btn-circle btn-danger" id="hapustim" data-toggle="modal" data-target="#hapustimModal" data-id="<?=$pg['id_pegawai'] ?>" data-nama="<?=$pg['nama'] ?>" data-foto="<?=$pg['foto'] ?>" title="Hapus <?=$pg['nama'] ?>">
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