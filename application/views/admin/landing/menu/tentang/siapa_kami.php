<div class="tab-pane fade show active" id="v-pills-siapa" role="tabpanel" aria-labelledby="v-pills-siapa-tab">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Siapa Kami</h6>
    </div>
    <form id="formsiapakami" action="<?=base_url('landing/menu/tentang/siapa_kami') ?>" method="post">
      <div class="card-body">
        <input type="hidden" class="form-control" id="idsiapakami" name="idsiapakami" value="<?=$siapa_kami['id'] ?>">
        <textarea class="form-control" id="ketsiapakami" name="ketsiapakami" rows="5" placeholder="Apa Itu KSI" required><?=$siapa_kami['ket'] ?></textarea>
      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-sm btn-circle btn-primary" id="simpan" name="simpan" title="Simpan">
          <i class="fa fa-fw fa-save"></i>
        </button>
      </div>
    </form>
  </div>
</div>