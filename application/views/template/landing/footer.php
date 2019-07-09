<!-- Footer Area -->
    <footer class="footer_area">
        <div class="container">
            <div class="footer_row row">
                <div class="col-md-5 col-sm-6 footer_about">
                    <h2>TENTANG KSI</h2>
                    <img src="<?=base_url('assets/landing/') ?>images/footer-logo.png" alt="">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <ul class="socail_icon">
                        <li><a href="http://www.facebook.com/<?=$pengaturan['facebook'] ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="http://www.twitter.com/<?=$pengaturan['twitter'] ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="http://www.instagram.com/<?=$pengaturan['instagram'] ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 footer_about quick">
                    <h2>MENU CEPAT</h2>
                    <ul class="quick_link">
                        <?php foreach ($menulanding as $ml): ?>
                            <li><a href="<?=base_url().$ml['url_ml'] ?>"><i class="fa fa-chevron-right"></i><?=$ml['nama_ml'] ?></a></li>                            
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6 footer_about">
                    <h2>HUBUNGI KAMI</h2>
                    <address>
                        <p>Ada pertanyaan, komentar atau hanya ingin menyapa :</p>
                        <ul class="my_address">
                            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><?=$pengaturan['email'] ?></a></li>
                            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i><?=$pengaturan['telpon'] ?></a></li>
                            <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span><?=$pengaturan['alamat'] ?></span></a></li>
                            <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><?=$pengaturan['jam_kerja'] ?></a></li>
                        </ul>
                    </address>
                </div>
            </div>
        </div>
        <div class="copyright_area">
            Copyright 2019. Develop by <a href="https://ruslansamuel.wordpress.com">Rush Jr. Studio</a>
        </div>
    </footer>
    <!-- End Footer Area -->

    <!-- jQuery JS -->
    <script src="<?=base_url('assets/landing/') ?>js/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?=base_url('assets/landing/') ?>js/bootstrap.min.js"></script>
    <!-- Animate JS -->
    <script src="<?=base_url('assets/landing/') ?>vendors/animate/wow.min.js"></script>
    <!-- Camera Slider -->
    <script src="<?=base_url('assets/landing/') ?>vendors/camera-slider/jquery.easing.1.3.js"></script>
    <script src="<?=base_url('assets/landing/') ?>vendors/camera-slider/camera.min.js"></script>
    <!-- Isotope JS -->
    <script src="<?=base_url('assets/landing/') ?>vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="<?=base_url('assets/landing/') ?>vendors/isotope/isotope.pkgd.min.js"></script>
    <!-- Progress JS -->
    <script src="<?=base_url('assets/landing/') ?>vendors/Counter-Up/jquery.counterup.min.js"></script>
    <script src="<?=base_url('assets/landing/') ?>vendors/Counter-Up/waypoints.min.js"></script>
    <!-- Owlcarousel JS -->
    <script src="<?=base_url('assets/landing/') ?>vendors/owl_carousel/owl.carousel.min.js"></script>
    <!-- Stellar JS -->
    <script src="<?=base_url('assets/landing/') ?>vendors/stellar/jquery.stellar.js"></script>
    <!-- Theme JS -->
    <script src="<?=base_url('assets/landing/') ?>js/theme.js"></script>

    <!-- Tawk.to Chatting -->
    <script src="<?=base_url('assets/landing/') ?>js/chat.js"></script>
</body>
</html>