    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2><?=$judul ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?=base_url() ?>">Beranda</a></li>
            <li><a href="#" class="active"><?=$judul ?></a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- About Us Area -->
    <section class="about_us_area about_us_2 row">
        <div class="container">
            <div class="row about_row about_us2_pages">
                <div class="who_we_area col-md-7">
                    <div class="subtittle">
                        <h2>SIAPA KAMI</h2>
                    </div>
                    <p class="text-justify"><?=$siapa_kami['ket'] ?></p>
                    <a href="<?=base_url('kontak') ?>" class="button_all">Hubungi Kami</a>
                </div>
                <div class="col-md-5 our_skill_inner">
                    <div class="single_skill">
                        <h3>Realisasi Fisik</h3>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="<?=$monev['rf'] ?>" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress_parcent"><span class="counter2"><?=$monev['rf'] ?></span>%</div>
                            </div>
                        </div>
                    </div>
                    <div class="single_skill">
                        <h3>Realisasi Keuangan</h3>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="<?=$monev['realisasi_pagu']/$monev['pagu']*100 ?>" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress_parcent"><span class="counter2"><?=number_format($monev['realisasi_pagu']/$monev['pagu']*100, 2 , '.' , ',') ?></span>%</div>
                            </div>
                        </div>
                    </div>
                    <div class="single_skill">
                        <h3>Pagu Anggaran</h3>
                        <h1><?='Rp. '.number_format($monev['pagu'], 2, ',', '.') ?></h1>
                    </div>
                    <hr>
                    <div class="single_skill">
                        <h3>Realisasi Anggaran</h3>
                        <h1><?='Rp. '.number_format($monev['realisasi_pagu'], 2, ',', '.') ?></h1>
                    </div>
                    <hr>
                    <div class="single_skill">
                        <h3>Sisa Anggaran</h3>
                        <h1><?='Rp. '.number_format(($monev['pagu']-$monev['realisasi_pagu']), 2, ',', '.') ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Area -->

    <!-- call Area -->
    <section class="call_min_area">
        <div class="container">
            <h2><?=$pengaturan['telpon'] ?></h2>
            <p>Kontak dengan kami. Kami adalah lembaga Penyedia Layanan Pengadaan Barang & Jasa Pemerintah Secara Elektronik .</p>
            <div class="call_btn">
                <a href="<?=base_url('kontak') ?>" class="button_all">BERLANGGANAN</a>
            </div>
        </div>
    </section>
    <!-- End call Area -->

    <!-- Our Features Area -->
    <section class="our_feature_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Visi & Misi</h2>
                <h4>Visi & Misi Kebijakan Strategi & Informasi Biro Pengadaan Setda Provinsi Gorontalo</h4>
            </div>
            <div class="feature_row row">
                <div class="col-md-6 feature_content">
                    <div class="subtittle">
                        <h2>VISI KSI</h2>
                        <h5 class="text-justify"><?=$visi['ket'] ?></h5>
                    </div>
                </div>
                <div class="col-md-6 feature_content">
                    <div class="subtittle">
                        <h2>MISI KSI</h2>
                    </div>
                    <?php $no=1; foreach ($misi as $m): ?>
                        <div class="media">
                            <div class="media-left">
                                <button type="button" class="btn btn-lg btn-warning" disabled><?=$no++ ?></button>
                            </div>
                            <div class="media-body">
                                <a href="#" class="text-justify"><?=$m['judul_misi'] ?></a>
                                <p class="text-justify"><?=$m['ket_misi'] ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Features Area -->

    <!-- Our Team Area -->
    <section class="our_team_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Tim Kami</h2>
                <h4>Berikut adalah tim kami di bagian Kebijakan Strategi & Informasi</h4>
            </div>
            <div class="row justify-content-md-center team_row">
                <?php foreach ($pegawai as $pg): ?>
                    <div class="col-md-3 col-sm-6 wow fadeInUp">
                       <div class="team_membar">
                            <img src="<?=base_url('assets/landing/images/pegawai/').$pg['foto'] ?>" alt="">
                            <div class="team_content">
                                <ul>
                                    <li><a href="http://www.facebook.com/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="http://www.twitter.com/" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="http://www.instagram.com/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="#" class="name"><?=$pg['nama'] ?></a>
                                <h6><?=$pg['jabatan'] ?></h6>
                            </div>
                       </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <!-- End Our Team Area -->