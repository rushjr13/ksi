    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2><?=$judul ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?=base_url() ?>">Beranda</a></li>
            <li><a href="#" class="active"><?=$judul ?></a></li>
        </ol>
    </section>
    <!-- End Banner area -->

    <!-- Building Construction Area -->
    <section class="building_construction_area">
        <div class="container">
            <div class="row building_construction_row">
                <div class="col-sm-8 constructing_laft">
                    <h2>Constructing</h2>
                    <img src="<?=base_url('assets/landing/images/no_images.jpg') ?>" alt="">
                    <a href="#">Building Construction</a>
                    <p class="text-justify">Berlawanan dengan kepercayaan populer, Lorem Ipsum bukan hanya teks acak. Ini berakar pada sepotong sastra Latin klasik dari 45 SM, membuatnya lebih dari 2000 tahun. Richard McClintock, seorang profesor Latin di Hampden-Sydney College di Virginia, mencari salah satu kata Latin yang lebih tidak jelas, consectetur, dari bagian Lorem Ipsum, dan menelusuri kutipan kata dalam literatur klasik, menemukan sumber yang tidak diragukan lagi.</p>
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed tempor dan vitalitas, sehingga tenaga kerja dan kesedihan, beberapa hal penting yang harus dilakukan eiusmod. Selama bertahun-tahun yang akan datang, yang nostrud latihan, distrik sekolah mungkin tidak bekerja untuk menjadi ditempa aliquip-do lingkungan.</p>
                </div>
                <div class="col-sm-4 constructing_right">
                    <h2>Tautan Langsung</h2>
                    <ul class="painting">
                        <li><a href="#"><i class="fa fa-wrench" aria-hidden="true"></i>ARSITEKTUR</a></li>
                        <li><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i>Bangunan</a></li>
                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i>DESAIN</a></li>
                        <li><a href="#"><i class="fa fa-paint-brush" aria-hidden="true"></i>Lukisan</a></li>
                    </ul>
                    <div class="contact_us">
                        <h4>Hubungi Kami</h4>
                        <a href="#" class="contac_namber"><?=$pengaturan['telpon'] ?></a>
                        <p><?=$pengaturan['alamat'] ?></p>
                        <a href="<?=base_url('kontak') ?>" class="button_all">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Building Construction Area -->