<?= form_open_multipart('admin/pengaturan');?>
<div class="row">
  <!-- Area Chart -->
  <div class="col-xl-4 col-lg-6">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-fw fa-globe"></i> Website</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="form-group">
          <label for="nama_web">Nama Website / Aplikasi</label>
          <input type="text" class="form-control" id="nama_web" name="nama_web" placeholder="Nama Website / Aplikasi" value="<?=$pengaturan['nama_web'] ?>" autofocus>
          <?php echo form_error('nama_web', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="alias">Alias (Singkatan)</label>
          <input type="text" class="form-control" id="alias" name="alias" placeholder="Alias (Singkatan)" value="<?=$pengaturan['alias'] ?>" maxlength="3">
          <?php echo form_error('alias', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="url">Alamat Website / URL</label>
          <input type="text" class="form-control" id="url" name="url" placeholder="Alamat Website / URL" value="<?=$pengaturan['url'] ?>">
          <?php echo form_error('url', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
        </div>
      </div>
    </div>

    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-fw fa-hashtag"></i> Sosial Media</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="form-group">
          <label for="facebook">Nama Pengguna Facebook</label>
          <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Nama Website / Aplikasi" value="<?=$pengaturan['facebook'] ?>">
        </div>
        <div class="form-group">
          <label for="instagram">Nama Pengguna Instagram</label>
          <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Nama Pengguna Instagram" value="<?=$pengaturan['instagram'] ?>">
        </div>
        <div class="form-group">
          <label for="twitter">Nama Pengguna Twitter</label>
          <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Nama Pengguna Twitter" value="<?=$pengaturan['twitter'] ?>">
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-lg-6">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-fw fa-university"></i> Kantor</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="form-group">
          <label for="alamat">Alamat Lengkap</label>
          <textarea class="form-control" id="alamat" name="alamat" placeholder="Nama Website / Aplikasi" rows="3"><?=$pengaturan['alamat'] ?></textarea>
          <?php echo form_error('alamat', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="telpon">Nomor Telepon</label>
          <input type="text" class="form-control" id="telpon" name="telpon" placeholder="Nomor Telepon" value="<?=$pengaturan['telpon'] ?>">
          <?php echo form_error('telpon', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="email">Alamat Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email" value="<?=$pengaturan['email'] ?>">
          <?php echo form_error('email', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="jam_kerja">Jam Kerja</label>
          <input type="text" class="form-control" id="jam_kerja" name="jam_kerja" placeholder="Jam Kerja" value="<?=$pengaturan['jam_kerja'] ?>">
          <?php echo form_error('jam_kerja', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
        </div>
      </div>
    </div>

      <div class="text-center">
        <button type="submit" class="btn btn-lg btn-primary" id="simpan" name="simpan"><i class="fa fa-fw fa-save"></i> Simpan Pengaturan</button>
        <button type="reset" class="btn btn-lg btn-secondary" id="batal" name="batal"><i class="fa fa-fw fa-times"></i> Reset Pengaturan</button>
      </div>
  </div>

  <div class="col-xl-4 col-lg-6">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><i class="far fa-fw fa-image"></i> Logo & Icon Website</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="row justify-content-center mb-3">
          <div class="col-6 text-center">
            <img src="<?=base_url('assets/admin/img/').$pengaturan['logo'] ?>" class="img img-thumbnail" alt="<?=$pengaturan['logo'] ?>"><br>
            <small><?=$pengaturan['logo'] ?></small>
          </div>
        </div>
        <div class="form-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input file-input" id="logo" name="logo">
            <input type="hidden" class="custom-file-input" id="logolama" name="logolama" value="<?=$pengaturan['logo'] ?>">
            <label class="custom-file-label file-label" for="logo" data-browse="Pilih Logo">Pilih logo website dengan format <strong>.png</strong> !</label>
            <small class="text-info" style="font-style: italic;">
              <i class="fa fa-fw fa-info"></i>Kosongkan jika tidak ingin mengubah logo website!<br>
              <i class="fa fa-fw fa-info"></i>Ukuran logo tidak lebih dari <strong>1 MB</strong> atau <strong>1024 KB</strong>!
            </small>
          </div>
        </div>

        <hr>

        <div class="row justify-content-center mb-3">
          <div class="col-6 text-center">
            <img src="<?=base_url('assets/admin/img/').$pengaturan['icon'] ?>" class="img img-thumbnail" alt="<?=$pengaturan['icon'] ?>"><br>
            <small><?=$pengaturan['icon'] ?></small>
          </div>
        </div>
        <div class="form-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input file-input" id="icon" name="icon">
            <input type="hidden" class="custom-file-input" id="iconlama" name="iconlama" value="<?=$pengaturan['icon'] ?>">
            <label class="custom-file-label file-label" for="icon" data-browse="Pilih Icon">Pilih icon website dengan format <strong>.png</strong> !</label>
            <small class="text-info" style="font-style: italic;">
              <i class="fa fa-fw fa-info"></i>Kosongkan jika tidak ingin mengubah icon website!<br>
              <i class="fa fa-fw fa-info"></i>Ukuran icon tidak lebih dari <strong>1 MB</strong> atau <strong>1024 KB</strong>!
            </small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>