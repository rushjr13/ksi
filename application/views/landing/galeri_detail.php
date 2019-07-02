<!-- Banner area -->
<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2><?=$judul ?></h2>
    <ol class="breadcrumb">
        <li><a href="<?=base_url() ?>">Beranda</a></li>
        <li><a href="<?=base_url('galeri') ?>">Galeri</a></li>
        <li><a href="#" class="active"><?=$judul ?></a></li>
    </ol>
</section>
<!-- End Banner area -->

<!-- blog area -->
<section class="blog_all">
    <div class="container">
        <div class="row m0 blog_row">
            <div class="col-sm-8 main_blog">
                <img src="<?=base_url('assets/landing/images/gallery/').$galeri_detail['gambar']?>" width="1000" alt="">
                <div class="col-xs-1 p0">
                   <div class="blog_date">
                       <a href="#"><?=substr($galeri_detail['tanggal'], 8, 2) ?></a>
                       <?php 
                            $bln = substr($galeri_detail['tanggal'], 5, 2);
                            $thn = substr($galeri_detail['tanggal'], 0, 4);
                            if($bln=='01'){
                                $bulan='Jan';
                            } else if($bln=='02'){
                                $bulan='Feb';
                            } else if($bln=='03'){
                                $bulan='Mar';
                            } else if($bln=='04'){
                                $bulan='Apr';
                            } else if($bln=='05'){
                                $bulan='Mei';
                            } else if($bln=='06'){
                                $bulan='Jun';
                            } else if($bln=='07'){
                                $bulan='Jul';
                            } else if($bln=='08'){
                                $bulan='Agst';
                            } else if($bln=='09'){
                                $bulan='Sep';
                            } else if($bln=='10'){
                                $bulan='Okt';
                            } else if($bln=='11'){
                                $bulan='Nov';
                            } else if($bln=='12'){
                                $bulan='Des';
                            }
                       ?>
                        <a href="#"><?=$bulan ?></a>
                        <a href="#"><?=$thn ?></a>
                   </div>
                </div>
                <div class="col-xs-11 blog_content">
                    <a class="blog_heading" href="#"><?=$judul ?></a>
                    <a class="blog_admin" href="#"><i class="fa fa-user" aria-hidden="true"></i><?=$galeri_detail['nama_lengkap'] ?></a>
                    <ul class="like_share">
                        <li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i><?=$jlh_komentar ?> Komentar</a></li>
                        <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i><?=$galeri_detail['hit'] ?> Kali Dilihat</a></li>
                        <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
                    </ul>
                    <p class="text-justify"><?=$galeri_detail['isi'] ?></p>
                    <!-- <div class="tag">
                        <h4>TAG</h4>
                        <a href="#">PAINTING</a>
                        <a href="#">CONSTRUCTION</a>
                        <a href="#">PAINTING</a>
                    </div> -->
                </div>
                <div class="client_text">
                    <?= $this->session->flashdata('info'); ?>
                </div>
                <div class="comment_area">
                    <h3><?=$jlh_komentar ?> Komentar</h3>
                    <?php foreach ($komentar_galeri as $kg): ?>
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="<?=base_url('assets/landing/')?>images/user.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <a class="media-heading" href="#"><?=$kg['nama'] ?></a>
                                <?php

                                    $tgl = substr($kg['tgl_kg'], 8, 2);
                                    $bln = substr($kg['tgl_kg'], 5, 2);
                                    $thn = substr($kg['tgl_kg'], 0, 4);

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
                                <h5><?=$tanggal ?></h5>
                                <p class="text-justify"><?=$kg['isi_kg'] ?></p>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach ?>
                </div>
                <div class="post_comment">
                    <h3>Buat Komentar</h3>
                    <form action="<?=base_url('galeri/detail/').$galeri_detail['id'] ?>" method="post" class="comment_box">
                       <div class="col-md-6">
                           <h4>Nama</h4>
                           <input type="text" class="form-control input_box" id="nama" name="nama" placeholder="Nama Lengkap" value="<?=set_value('nama') ?>">
                           <?php echo form_error('nama', '<small class="text-danger ml-5" style="font-style:italic;">', '</small>'); ?>
                           <input type="hidden" class="form-control input_box" id="idgaleri" name="idgaleri" value="<?=$galeri_detail['id'] ?>">
                       </div>
                       <div class="col-md-6">
                           <h4>Email</h4>
                           <input type="text" class="form-control input_box" id="email" name="email" placeholder="Alamat Email" value="<?=set_value('email') ?>">
                           <?php echo form_error('email', '<small class="text-danger ml-5" style="font-style:italic;">', '</small>'); ?>
                       </div>
                       <div class="col-md-12">
                           <h4>Komentar Anda</h4>
                           <textarea class="form-control input_box" id="komentar" name="komentar" placeholder="Masukkan Komentar Anda"><?=set_value('komentar') ?></textarea>
                           <?php echo form_error('komentar', '<small class="text-danger ml-5" style="font-style:italic;">', '</small>'); ?>
                       </div>
                       <div class="col-md-12 text-right">
                           <button type="submit" id="kirim" name="kirim">Kirim Komentar</button>
                       </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4 widget_area">
                <div class="resent">
                    <h3>POSTINGAN TERAKHIR</h3>
                    <?php foreach ($galeri_limit as $gamit): ?>
                        <?php

                            $tgl = substr($gamit['tanggal'], 8, 2);
                            $bln = substr($gamit['tanggal'], 5, 2);
                            $thn = substr($gamit['tanggal'], 0, 4);

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

                            $tgl_gamit = $tgl.' '.$bulan.' '.$thn;
                        ?>
                        <div class="media">
                            <div class="media-left">
                                <a href="<?=base_url('galeri/detail/').$gamit['id'] ?>">
                                    <img class="media-object" src="<?=base_url('assets/landing/images/gallery/').$gamit['gambar']?>" width="100" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="<?=base_url('galeri/detail/').$gamit['id'] ?>"><?=$gamit['judul'] ?></a>
                                <h6><?=$tgl_gamit ?></h6>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <!-- <div class="resent">
                    <h3>KATEGORI</h3>
                    <ul class="architecture">
                        <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>Construction</a></li>
                        <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>Architecture</a></li>
                        <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>Building</a></li>
                        <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>Design</a></li>
                    </ul>
                </div>
                <div class="resent">
                    <h3>ARSIP</h3>
                    <ul class="architecture">
                        <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>February 2016</a></li>
                        <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>April 2016</a></li>
                        <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>June 2016</a></li>
                    </ul>
                </div>
                <div class="search">
                    <form action="" method="post">
                        <input type="search" id="search" name="search" class="form-control" placeholder="Cari...">
                    </form>
                </div> -->
                <!-- <div class="resent">
                    <h3>Tag</h3>
                    <ul class="tag">
                        <li><a href="#">PAINTING</a></li>
                        <li><a href="#">CONSTRUCTION</a></li>
                        <li><a href="#">Architecture</a></li>
                        <li><a href="#">Building</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Design</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- End blog area -->
