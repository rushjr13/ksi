<div class="row justify-content-center">
	<div class="col-5">
		<div class="card shadow mb-4">
	        <div class="card-header py-3">
	          <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-fw fa-edit"></i> Ubah Sub Menu <?=$submenu_id['nama_submenu'] ?></h6>
	        </div>
			<form action="<?=base_url('admin/menu/submenu/ubah/').$submenu_id['id_submenu'] ?>" method="post">
		        <div class="card-body">
					<div class="form-group row">
						<input type="hidden" class="form-control" id="id_submenu" name="id_submenu" value="<?=$submenu_id['id_submenu'] ?>">
						<div class="col-6">
							<label for="namasubmenu">Judul Sub Menu</label>
							<input type="text" class="form-control" id="namasubmenu" name="namasubmenu" placeholder="Judul Sub Menu" value="<?=$submenu_id['nama_submenu'] ?>" autofocus>
							<?php echo form_error('namasubmenu', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
						</div>
						<div class="col-6">
							<label for="menu">Menu</label>
							<select class="form-control" id="menu" name="menu">
								<option value="">-- Pilih Menu --</option>
								<?php foreach ($menu as $mn): ?>
									<option value="<?=$mn['id_menu'] ?>" <?php if($mn['id_menu']==$submenu_id['id_menu']){echo 'selected';} ?>><?=$mn['nama_menu'] ?></option>
								<?php endforeach; ?>
							</select>
							<?php echo form_error('menu', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-6">
							<label for="url">Link/URL Sub Menu</label>
							<input type="text" class="form-control" id="url" name="url" placeholder="Link/URL Sub Menu" value="<?=$submenu_id['url'] ?>">
							<?php echo form_error('url', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
						</div>
						<div class="col-6">
							<label for="icon">Icon Sub Menu</label>
							<div class="row">
								<div class="col-9">
									<input type="text" class="form-control" id="icon" name="icon" placeholder="Link/URL Sub Menu" value="<?=$submenu_id['icon'] ?>">
									<?php echo form_error('icon', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
								</div>
								<div class="col-3 text-center">
									<i class="fa fa-fw <?=$submenu_id['icon'] ?> fa-2x"></i>
								</div>
							</div>
						</div>
					</div>
		        </div>
		        <div class="card-footer text-right">
		          <a href="<?=base_url('admin/menu/submenu') ?>" class="btn btn-sm btn-circle btn-secondary" title="Batal"><i class="fa fa-fw fa-times"></i></a>
		          <button type="submit" class="btn btn-sm btn-circle btn-info" title="Perbarui"><i class="fa fa-fw fa-edit"></i></button>
		        </div>
			</form>
	     </div>
	</div>
</div>