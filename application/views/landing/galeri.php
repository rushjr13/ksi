    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2><?=$judul ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?=base_url() ?>">Beranda</a></li>
            <li><a href="#" class="active"><?=$judul ?></a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- blog-2 area -->
    <section class="blog_tow_area">
        <div class="container">
           <div class="row blog_tow_row">
            <?php foreach ($galeri_lengkap as $gl): ?>
                <?php

                    $num_char_judul = 25;
                    $text_judul = $gl['judul'];
                    $judul = substr($text_judul, 0, $num_char_judul) . '...';

                    $num_char_isi = 150;
                    $text_isi = $gl['isi'];
                    $char_isi     = $text_isi{$num_char_isi - 1};
                    while($char_isi != ' ') {
                        $char_isi = $text_isi{++$num_char_isi}; // Cari spasi pada posisi 51, 52, 53, dst...
                    }
                    $isi = substr($text_isi, 0, $num_char_isi);

                    $tgl = substr($gl['tanggal'], 8, 2);
                    $bln = substr($gl['tanggal'], 5, 2);
                    $thn = substr($gl['tanggal'], 0, 4);

                    if($bln=='01'){
                        $bulan='Januari';
                    } else if($bln=='02'){
                        $bulan='Februari';
                    } else if($bln=='03'){
                        $bulan='Maret';
                    } else if($bln=='04'){
                        $bulan='April';
                    } else if($bln=='05'){
                        $bulan='Mei';
                    } else if($bln=='06'){
                        $bulan='Juni';
                    } else if($bln=='07'){
                        $bulan='Juli';
                    } else if($bln=='08'){
                        $bulan='Agustus';
                    } else if($bln=='09'){
                        $bulan='September';
                    } else if($bln=='10'){
                        $bulan='Oktober';
                    } else if($bln=='11'){
                        $bulan='November';
                    } else if($bln=='12'){
                        $bulan='Desember';
                    }

                    $tanggal = $tgl.' '.$bulan.' '.$thn;
                ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="renovation">
                        <img src="<?=base_url('assets/landing/images/gallery/').$gl['gambar']?>" alt="">
                        <div class="renovation_content">
                            <a class="clipboard" href="<?=base_url('galeri/detail/').$gl['id'] ?>"><i class="fa fa-clipboard" aria-hidden="true"></i></a>
                            <a class="tittle" href="<?=base_url('galeri/detail/').$gl['id'] ?>"><?=$judul ?></a>
                            <div class="date_comment">
                                <a href="<?=base_url('galeri/detail/').$gl['id'] ?>"><i class="fa fa-calendar" aria-hidden="true"></i><?=$tanggal ?></a>
                                <a href="<?=base_url('galeri/detail/').$gl['id'] ?>"><i class="fa fa-commenting-o" aria-hidden="true"></i>3</a>
                            </div>
                            <p class="text-justify"><?=$isi ?> <a href="<?=base_url('galeri/detail/').$gl['id'] ?>">[selengkapnya...]</a></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
           </div>
        </div>
    </section>
    <!-- End blog-2 area -->

    <!-- Our Featured Works Area -->
    <section class="featured_works row" data-stellar-background-ratio="0.3">
        <div class="tittle wow fadeInUp">
            <h2>Galeri Kegiatan</h2>
            <h4>Semua Kegiatan Pada Bidang Kebijakan Strategi dan Informasi</h4>
        </div>
        <div class="featured_gallery">
            <?php foreach ($galeri_kegiatan as $gk): ?>
                <div class="col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
                    <img src="<?=base_url('assets/landing/images/gallery/').$gk['foto_gk'] ?>" width="1000" alt="">
                    <div class="gallery_hover">
                        <h4><?=$gk['judul_gk'] ?></h4>
                        <a href="<?=base_url('assets/landing/images/gallery/').$gk['foto_gk'] ?>" width="1000" data-lightbox="image-1">LIHAT GAMBAR</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- End Our Featured Works Area -->