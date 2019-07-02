<?= $this->session->flashdata('info'); ?>
<form class="user" action="<?=base_url('auth') ?>" method="post">
  <div class="form-group">
    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Nama Pengguna..." value="<?php echo set_value('username'); ?>" autofocus>
    <?php echo form_error('username', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
  </div>
  <div class="form-group">
    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Kata Sandi">
    <?php echo form_error('password', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
  </div>
  <button type="submit" class="btn btn-primary btn-user btn-block">Masuk</button>
</form>
<hr>
<div class="text-center">
  <a class="small" href="<?=base_url('auth/lupasandi') ?>">Lupa Kata Sandi?</a>
</div>
<div class="text-center">
  <a class="small" href="<?=base_url('auth/daftar') ?>">Buat Akun Baru!</a>
</div>