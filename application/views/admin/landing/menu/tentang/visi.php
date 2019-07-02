<div class="tab-pane fade" id="v-pills-visi" role="tabpanel" aria-labelledby="v-pills-visi-tab">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Visi KSI</h6>
    </div>
    <form action="<?=base_url('landing/menu/tentang/visi') ?>" method="post">
      <div class="card-body">
        <input type="hidden" class="form-control" id="idvisi" name="idvisi" value="<?=$visi['id'] ?>">
        <textarea class="form-control" id="ketvisi" name="ketvisi" rows="5" placeholder="Visi KSI" required><?=$visi['ket'] ?></textarea>
      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-sm btn-circle btn-primary" id="simpan" name="simpan" title="Simpan">
          <i class="fa fa-fw fa-save"></i>
        </button>
      </div>
    </form>
  </div>
</div>