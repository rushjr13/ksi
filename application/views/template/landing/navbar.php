<body>
    <!-- Preloader -->
    <div class="preloader"></div>

	<!-- Top Header_Area -->
	<section class="top_header_area">
	    <div class="container">
            <ul class="nav navbar-nav top_nav">
                <li><a href="#"><i class="fa fa-phone"></i><?=$pengaturan['telpon'] ?></a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i><?=$pengaturan['email'] ?></a></li>
                <li><a href="#"><i class="fa fa-clock-o"></i><?=$pengaturan['jam_kerja'] ?></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right social_nav">
                <li><a href="http://www.facebook.com/<?=$pengaturan['facebook'] ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="http://www.twitter.com/<?=$pengaturan['twitter'] ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="http://www.instagram.com/<?=$pengaturan['instagram'] ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="<?=base_url('admin') ?>" target="_blank" title="Masuk Admin"><i class="fa fa-sign-in"></i></a></li>
            </ul>
	    </div>
	</section>
	<!-- End Top Header_Area -->

	<!-- Header_Area -->
    <nav class="navbar navbar-default header_aera" id="main_navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col-md-2 p0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#min_navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=base_url() ?>"><img src="<?=base_url('assets/landing/') ?>images/<?=$pengaturan['logo'] ?>" alt=""></a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="col-md-10 p0">
                <div class="collapse navbar-collapse" id="min_navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown submenu">
                            <a href="<?=base_url() ?>">Beranda</a>
                            <!-- <ul class="dropdown-menu">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="index-2.html">Home 2</a></li>
                            </ul> -->
                        </li>
                        <?php if($pengguna_masuk){ ?>
                            <?php foreach ($menulanding as $ml): ?>
                                <li><a href="<?=base_url().$ml['url_ml'] ?>"><?=$ml['nama_ml'] ?></a></li>
                            <?php endforeach ?>
                        <?php }else{ ?>
                            <?php foreach ($menulandingaktif as $ml): ?>
                                <li><a href="<?=base_url().$ml['url_ml'] ?>"><?=$ml['nama_ml'] ?></a></li>
                            <?php endforeach ?>
                        <?php } ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container -->
    </nav>
	<!-- End Header_Area -->