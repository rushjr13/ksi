<div class="row justify-content-center">
	<div class="col-5">
		<div class="card shadow mb-4">
	        <div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-fw fa-user-edit"></i> <?=$pengguna['nama_lengkap'] ?></h6>
	        </div>
			<form action="<?=base_url('admin/pengguna/detail/').$pengguna['id_pengguna'] ?>" method="post">
		        <div class="card-body">
					<div class="form-group row">
						<div class="col-6">
							<input type="text" class="form-control" id="username" name="username" placeholder="Nama Pengguna" value="<?=$pengguna['username'] ?>" readonly>
						</div>
						<div class="col-6">
							<input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" value="<?=$pengguna['password'] ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-6">
							<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?=$pengguna['nama_lengkap'] ?>">
							<?php echo form_error('nama_lengkap', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
						</div>
						<div class="col-6">
							<input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email" value="<?=$pengguna['email'] ?>">
							<?php echo form_error('email', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<label>Jenis Kelamin</label>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="jk" id="jkl" value="Laki-laki" <?php if($pengguna['jk']=='Laki-laki'){echo 'checked';} ?>>
							  <label class="form-check-label" for="jkl">
							    Laki-laki
							  </label>
							</div>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="jk" id="jkp" value="Perempuan" <?php if($pengguna['jk']=='Perempuan'){echo 'checked';} ?>>
							  <label class="form-check-label" for="jkp">
							    Perempuan
							  </label>
							</div>
							<?php echo form_error('jk', '<small class="text-danger" style="font-style:italic;">', '</small>'); ?>
						</div>
						<div class="col-6">
							<label>Level Pengguna</label>
						    <select class="form-control" id="id_level" name="id_level">
						    	<option value="">-- Pilih Level --</option>
						    	<?php foreach ($level as $l): ?>
							      <option value="<?=$l['id_level'] ?>" <?php if($pengguna['id_level']==$l['id_level']){echo 'selected';} ?>><?=$l['nama_level'] ?></option>
						    	<?php endforeach; ?>
						    </select>
						    <?php echo form_error('id_level', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
						</div>
					</div>
				</div>
		        <div class="card-footer text-right">
		          <a href="<?=base_url('admin/pengguna') ?>" class="btn btn-sm btn-circle btn-secondary" title="Kembali"><i class="fa fa-fw fa-reply"></i></a>
		          <button type="submit" class="btn btn-sm btn-circle btn-info" title="Perbarui"><i class="fa fa-fw fa-edit"></i></button>
		        </div>
			</form>
	     </div>
	</div>
</div>