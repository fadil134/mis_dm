<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- ======= Hero Section ======= -->
<?php if ($sekapur_s !== array()) { ?>
<?php foreach ($sekapur_s as $ss): ?>
<section id="hero" class="hero d-flex align-items-center"
    style="background: url(' <?= base_url() . $ss->url; ?>') top center; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <h2 data-aos="fade-up" style="font-family: 'Amiri Quran', serif;">أَهْلًا وَسَهْلًا</h2>
                <blockquote data-aos="fade-up" data-aos-delay="100">
                    <?=$ss->description ?>
                </blockquote>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a href="<?=base_url() . $ss->url_video ?>"
                        class="glightbox btn-watch-video d-flex align-items-center">
                        <i class="bi bi-play-circle"></i>
                        <span>Kata Sambutan</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endforeach; ?>
<?php } else { ?>
<section id="hero" class="hero d-flex align-items-center bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <h2 data-aos="fade-up" style="font-family: 'Amiri Quran', serif;">أَهْلًا وَسَهْلًا</h2>
                <blockquote data-aos="fade-up" data-aos-delay="100">
                    <p align="justify">Selamat datang di Website Resmi MIS Daarul Maarif !</p align="justify">Terima
                    kasih sekali atas kunjungan Anda. Semoga website ini dapat menjadi
                    sumber informasi yang bermanfaat dan memberikan gambaran yang jelas
                    tentang kehidupan di MIS Daarul Maarif.
                </blockquote>
                <!-- 
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="#" class="glightbox btn-watch-video d-flex align-items-center">
                            <i class="bi bi-play-circle"></i>
                            <span>Kata Sambutan</span>
                        </a>
                    </div>
                -->
            </div>
        </div>
    </div>
</section>
<?php } ?>
<!-- End Hero Section -->

<main id="main">
    <!-- ======= Why Choose Us Section
    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Why Choose Us</h2>

            </div>

            <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

                <div class="col-xl-5 img-bg" style="background-image: url('<?=base_url(); ?>assets/img/why-us-bg.jpg')">
                </div>
                <div class="col-xl-7 slides  position-relative">

                    <div class="slides-1 swiper">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="item">
                                    <h3 class="mb-3">Let's grow your business together</h3>
                                    <h4 class="mb-3">Optio reiciendis accusantium iusto architecto at quia minima
                                        maiores quidem,
                                        dolorum.</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, ipsam
                                        perferendis
                                        asperiores explicabo vel tempore velit totam, natus nesciunt accusantium dicta
                                        quod quibusdam
                                        ipsum maiores nobis non, eum. Ullam reiciendis dignissimos laborum aut, magni
                                        voluptatem velit
                                        doloribus quas sapiente optio.</p>
                                </div>
                            </div>
                             End slide item

                            <div class="swiper-slide">
                                <div class="item">
                                    <h3 class="mb-3">Unde perspiciatis ut repellat dolorem</h3>
                                    <h4 class="mb-3">Amet cumque nam sed voluptas doloribus iusto. Dolorem eos aliquam
                                        quis.</h4>
                                    <p>Dolorem quia fuga consectetur voluptatem. Earum consequatur nulla maxime
                                        necessitatibus cum
                                        accusamus. Voluptatem dolorem ut numquam dolorum delectus autem veritatis
                                        facilis. Et ea ut
                                        repellat ea. Facere est dolores fugiat dolor.</p>
                                </div>
                            </div>
                             End slide item

                            <div class="swiper-slide">
                                <div class="item">
                                    <h3 class="mb-3">Aliquid non alias minus</h3>
                                    <h4 class="mb-3">Necessitatibus voluptatibus explicabo dolores a vitae voluptatum.
                                    </h4>
                                    <p>Neque voluptates aut. Soluta aut perspiciatis porro deserunt. Voluptate ut itaque
                                        velit. Aut
                                        consectetur voluptatem aspernatur sequi sit laborum. Voluptas enim dolorum
                                        fugiat aut.</p>
                                </div>
                            </div>
                             End slide item

                            <div class="swiper-slide">
                                <div class="item">
                                    <h3 class="mb-3">Necessitatibus suscipit non voluptatem quibusdam</h3>
                                    <h4 class="mb-3">Tempora quos est ut quia adipisci ut voluptas. Deleniti laborum
                                        soluta nihil est.
                                        Eum similique neque autem ut.</h4>
                                    <p>Ut rerum et autem vel. Et rerum molestiae aut sit vel incidunt sit at voluptatem.
                                        Saepe dolorem
                                        et sed voluptate impedit. Ad et qui sint at qui animi animi rerum.</p>
                                </div>
                            </div>
                            End slide item

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

            </div>

        </div>
    </section>
     End Why Choose Us Section -->

    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Profil Madrasah</h2>
            </div>
            <div class="row gy-4" data-aos="fade-up">
                <div class="col-lg-4">
                    <img src="<?=base_url(); ?>assets/img/about.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8">
                    <div class="content ps-lg-5">
                        <h3>Sejarah Singkat</h3>
                        <div align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Lembaga Pendidikan Islam (LPI) Daarul Ma’arif terletak di Desa Banjar Negeri, Kecamatan
                            Natar, Kabupaten Lampung Selatan. Namun, lembaga ini lebih dikenal oleh masyarakat berada di
                            Kecamatan Tegineneng. Sebelum adanya pemekaran kabupaten, Desa Banjar Negeri masuk dalam
                            wilayah Kecamatan Tegineneng.<br>Pada tahun 1965&nbsp; pengaruh Partai Komunis Indonesia
                            (PKI) dengan tindakan yang bersifat anti agama telah banyak dipentaskan dalam arena
                            kehidupan bangsa Indonesia. Masa ini adalah masa yang sangat kritis bagi kehidupan
                            pendidikan Islam secara umum di Indonesia.
                        </div>
                        <a href="<?=base_url('page/about'); ?>" class="btn-get-started">Selengkapnya</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ======= Ekskul Section ======= -->
    <section id="services-list" class="services-list">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Eksta Kurikuler</h2>
            </div>

            <div class="row gy-5">
                <?php foreach ($ekskul as $eks): ?>
                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon flex-shrink-0">
                        <?=$eks->filename ?>
                    </div>
                    <div>
                        <h4 class="title"><a href="#" class="stretched-link">
                                <?=$eks->title ?>
                            </a></h4>
                        <p class="description">
                            <?=$eks->description ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- End Service Item -->
            </div>

        </div>
    </section>
    <!-- End Our Services Section -->

    <!-- ======= Pengumuman ======= -->
    <section id="call-to-action" class="call-to-action">
        <div class="section-header">
            <h2 style="color: white;">Pengumuman</h2>
        </div>
        <div class="container" data-aos="fade-up">
            <div class="justify-content-center">
                <div class="slides">
                    <div class="slides-1 swiper">
                        <div class="swiper-wrapper">
                            <?php if ($attention !== null && count($attention) > 0) { ?>
                            <?php foreach ($attention as $att): ?>
                            <div class="swiper-slide">
                                <div class="item text-center">
                                    <h3>
                                        <?=$att->Judul_Pengumuman ?>
                                    </h3>
                                    <p>
                                        <?=$att->Isi_Pengumuman ?>
                                    </p>
                                    <a class="cta-btn" href="#">Link</a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php } else { ?>
                            <div class="swiper-slide">
                                <div class="item text-center">
                                    <h3>Belum Ada Pengumuman</h3>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call To Action Section -->

    <!--    unused

    <section id="features" class="features">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                    <h3>Powerful Features for <br>Your Business</h3>

                    <div class="row gy-4">

                        <div class="col-md-6">
                            <div class="icon-list d-flex">
                                <i class="ri-store-line" style="color: #ffbb2c;"></i>
                                <span>Easy Cart Features</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="icon-list d-flex">
                                <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
                                <span>Sit amet consectetur adipisicing</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="icon-list d-flex">
                                <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
                                <span>Ipsum Rerum Explicabo</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="icon-list d-flex">
                                <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
                                <span>Easy Cart Features</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="icon-list d-flex">
                                <i class="ri-database-2-line" style="color: #47aeff;"></i>
                                <span>Easy Cart Features</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="icon-list d-flex">
                                <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
                                <span>Sit amet consectetur adipisicing</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="icon-list d-flex">
                                <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                                <span>Ipsum Rerum Explicabo</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="icon-list d-flex">
                                <i class="ri-base-station-line" style="color: #ff5828;"></i>
                                <span>Easy Cart Features</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 position-relative" data-aos="fade-up" data-aos-delay="200">
                    <div class="phone-wrap">
                        <img src="<?=base_url(); ?>assets/img/iphone.png" alt="Image" class="img-fluid">
                    </div>
                </div>
            </div>

        </div>

        <div class="details">
            <div class="container" data-aos="fade-up" data-aos-delay="300">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Labore Sdio Lidui<br>Bonde Naruto</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam nostrum molestias
                            doloremque quae
                            delectus odit minima corrupti blanditiis quo animi!</p>
                        <a href="#about" class="btn-get-started">Get Started</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
-->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-posts" class="recent-posts">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Berita Terbaru</h2>
            </div>
            <div class="row gy-5">
                <?php foreach ($artikel as $berita): ?>
                <div class="col-xl-3 col-md-6 mx-auto" data-aos="fade-up" data-aos-delay="100">
                    <div class="post-box">
                        <div class="post-img">
                            <img src="<?=base_url() . $berita->url ?>" class="img-fluid equal-image" alt="">
                        </div>
                        <div class="meta">
                            <span class="post-date">
                                <?php
                                $tanggal = $berita->updated;
                                $format = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                                echo $format->format(strtotime($tanggal));
                                ?>
                            </span>
                            <span class="post-author">
                                <?=$berita->Nama_Penulis ?>
                            </span>
                        </div>
                        <h3 class="post-title">
                            <?=$berita->Judul_Berita ?>
                        </h3>
                        <p class="d-inline-block text-truncate" style="max-width: 150px;">
                            <?=strip_tags($berita->Isi_Berita); ?>
                        </p>
                        <a href="<?=base_url(); ?>page/blog_detail/<?=$berita->ID_Berita ?>"
                            class="readmore stretched-link"><span>Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <?php endforeach; ?>
                <!--
                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="post-box">
                        <div class="post-img"><img src="<?=base_url(); ?>assets/img/blog/blog-2.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="meta">
                            <span class="post-date">Fri, September 05</span>
                            <span class="post-author"> / Mario Douglas</span>
                        </div>
                        <h3 class="post-title">Et repellendus molestiae qui est sed omnis</h3>
                        <p>Voluptatem nesciunt omnis libero autem tempora enim ut ipsam id. Odit quia ab eum assumenda.
                            Quisquam
                            omnis doloribus...</p>
                        <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="post-box">
                        <div class="post-img"><img src="<?=base_url(); ?>assets/img/blog/blog-3.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="meta">
                            <span class="post-date">Tue, July 27</span>
                            <span class="post-author"> / Lisa Hunter</span>
                        </div>
                        <h3 class="post-title">Quia assumenda est et veritati</h3>
                        <p>Quia nam eaque omnis explicabo similique eum quaerat similique laboriosam. Quis omnis
                            repellat sed quae
                            consectetur magnam...</p>
                        <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="post-box">
                        <div class="post-img"><img src="<?=base_url(); ?>assets/img/blog/blog-4.jpg" class="img-fluid"
                                alt=""></div>
                        <div class="meta">
                            <span class="post-date">Tue, Sep 16</span>
                            <span class="post-author"> / Mario Douglas</span>
                        </div>
                        <h3 class="post-title">Pariatur quia facilis similique deleniti</h3>
                        <p>Et consequatur eveniet nam voluptas commodi cumque ea est ex. Aut quis omnis sint ipsum earum
                            quia
                            eligendi...</p>
                        <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                -->
            </div>

        </div>
    </section>
    <!-- End Recent Blog Posts Section -->

</main>
<!-- End #main -->