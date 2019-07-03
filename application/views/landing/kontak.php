<!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2><?=$judul ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?=base_url() ?>">Beranda</a></li>
            <li><a href="#" class="active"><?=$judul ?></a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- Map -->
    <div class="contact_map">
        <iframe src="<?=$pengaturan['map'] ?>"></iframe>
    </div>
    <!-- End Map -->

    <!-- All contact Info -->
    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row">
                <div class="col-sm-6 contact_info">
                    <h2>Informasi Kontak Kami</h2>
                    <p>Hubungi kami jika ada yang ingin anda tanyakan atau ingin info tentang Kebijakan Strategi & Informasi</p>
                    <div class="location">
                        <div class="location_laft">
                            <a class="f_location" href="#">Alamat</a>
                            <a href="#">Telpon</a>
                            <a href="#">Email</a>
                        </div>
                        <div class="address">
                            <a href="#"><?=$pengaturan['alamat'] ?></a>
                            <a href="#"><?=$pengaturan['telpon'] ?></a>
                            <a href="#"><?=$pengaturan['email'] ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 contact_info send_message">
                    <h2>Kirim Kami Sebuah Pesan</h2>
                    <?= $this->session->flashdata('info'); ?>
                    <form class="form-inline contact_box" action="<?=base_url('kontak') ?>" method="post">
                        <?php echo form_error('nama_lengkap', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
                        <input type="text" class="form-control input_box" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap *" value="<?=set_value('nama_lengkap') ?>">
                        <?php echo form_error('email', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
                        <input type="text" class="form-control input_box" id="email" name="email" placeholder="Alamat Email *"  value="<?=set_value('email') ?>">
                        <?php echo form_error('perihal', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
                        <input type="text" class="form-control input_box" id="perihal" name="perihal" placeholder="Perihal *"  value="<?=set_value('perihal') ?>">
                        <?php echo form_error('isi_pesan', '<small class="text-danger ml-3" style="font-style:italic;">', '</small>'); ?>
                        <textarea class="form-control input_box" id="isi_pesan" name="isi_pesan" placeholder="Masukkkan Pesan Anda *"  value="<?=set_value('isi_pesan') ?>"></textarea>
                        <button type="submit" class="btn btn-default">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End All contact Info -->
