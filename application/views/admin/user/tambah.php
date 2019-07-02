<div class="row justify-content-center">
	<div class="col-5">
		<div class="card shadow mb-4">
	        <div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-fw fa-user-plus"></i> Tambah Pengguna</h6>
	        </div>
			<?= form_open_multipart('admin/pengguna/tambah');?>
		        <div class="card-body">
					<div class="form-group row">
						<div class="col-6">
							<input type="text" class="form-control" id="username" name="username" placeholder="Nama Pengguna" value="<?=set_value('username') ?>" autofocus>
							<?php echo form_error('username', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
						</div>
						<div class="col-6">
							<input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" value="123456">
							<small class="text-muted ml-2" style="font-style: italic">Kata Sandi Awal = 123456</small><br>
							<?php echo form_error('password', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-6">
							<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?=set_value('nama_lengkap') ?>">
							<?php echo form_error('nama_lengkap', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
						</div>
						<div class="col-6">
							<input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email" value="<?=set_value('email') ?>">
							<?php echo form_error('email', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<label>Jenis Kelamin</label>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="jk" id="jkl" value="Laki-laki">
							  <label class="form-check-label" for="jkl">
							    Laki-laki
							  </label>
							</div>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="jk" id="jkp" value="Perempuan">
							  <label class="form-check-label" for="jkp">
							    Perempuan
							  </label>
							</div>
							<?php echo form_error('jk', '<small class="text-danger" style="font-style:italic;">', '</small>'); ?>
						</div>
						<div class="col-9">
							<label>Level Pengguna</label>
						    <select class="form-control" id="id_level" name="id_level">
						    	<option value="">-- Pilih Level --</option>
						    	<?php foreach ($level as $l): ?>
							      <option value="<?=$l['id_level'] ?>"><?=$l['nama_level'] ?></option>
						    	<?php endforeach; ?>
						    </select>
						    <?php echo form_error('id_level', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
						</div>
					</div>
				</div>
		        <div class="card-footer text-right">
		          <a href="<?=base_url('admin/pengguna') ?>" class="btn btn-sm btn-circle btn-secondary" title="Kembali"><i class="fa fa-fw fa-reply"></i></a>
		          <button type="submit" class="btn btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
		        </div>
			</form>
	     </div>
	</div>
</div>