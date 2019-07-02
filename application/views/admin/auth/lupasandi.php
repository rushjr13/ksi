<p class="mb-4 text-center">Kami mengerti, banyak hal terjadi. Cukup masukkan alamat email Anda di bawah ini dan kami akan mengirimkan Anda tautan untuk mereset kata sandi Anda!</p>
<form class="user" action="<?=base_url('auth/lupasandi') ?>" method="post">
  <div class="form-group">
    <input type="text" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukkan Alamat Email...">
  </div>
  <button type="submit" class="btn btn-primary btn-user btn-block">Atur Ulang Kata Sandi</button>
</form>
<hr>
<div class="text-center">
  <a class="small" href="<?=base_url('auth/daftar') ?>">Buat Akun Baru!</a>
</div>
<div class="text-center">
  <a class="small" href="<?=base_url('auth') ?>">Sudah memiliki akun? Masuk!</a>
</div>