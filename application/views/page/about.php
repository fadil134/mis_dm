<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('<?=base_url(); ?>assets/img/about-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Profil Madrasah</h2>
            <ol>
                <li><a href="<?=base_url(); ?>page/home">Beranda</a></li>
                <li>Profil Madrasah</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="section-header">
            <h2>Sejarah Singkat</h2>
        </div>
        <div class="container" data-aos="fade-up">
            <div class="row gy-4" data-aos="fade-up">
                <div class="col-lg">
                    <div class="content ps-lg-5">
                        <div align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Lembaga Pendidikan Islam (LPI) Daarul Ma’arif terletak di Desa Banjar Negeri, Kecamatan
                            Natar, Kabupaten Lampung Selatan. Namun, lembaga ini lebih dikenal oleh masyarakat berada di
                            Kecamatan Tegineneng. Sebelum adanya pemekaran kabupaten, Desa Banjar Negeri masuk dalam
                            wilayah Kecamatan Tegineneng.<br>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pada tahun
                            1965&nbsp; pengaruh Partai Komunis Indonesia (PKI) dengan tindakan yang bersifat anti agama
                            telah banyak dipentaskan dalam arena kehidupan bangsa Indonesia. Masa ini adalah masa yang
                            sangat kritis bagi kehidupan pendidikan Islam secara umum di Indonesia. Hal inilah yang
                            menyebabkan para orang tua dan ulama di wilayah Natar dan Tegineneng merasa sangat khawatir
                            akan pendidikan anak-anak mereka, terutama pendidikan agama Islam. Suasana yang mendesak
                            inilah yang mendorong K.H. Abu Abdillah Assegaf dan putra-putranya untuk mendirikan lembaga
                            pendidikan Islam yang berbasis pondok pesantren dan berpegang teguh pada Pancasila dan NKRI.
                            Dengan bantuan dan dukungan dari masyarakat sekitar, maka pada tanggal 25 Agustus 1965
                            didirikanlah yayasan pondok pesantren dengan nama Lembaga Pendidikan Islam (LPI) Daarul
                            Ma’arif.<br>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Untuk mengawali
                            roda pendidikan, LPI Daarul Ma’arif mendirikan Madrasah Ibtidaiyah yang menempati bangunan
                            milik K.H. Abu Abdillah Assegaf. Kemudian pada tahun 1978 dapat diselesaikan bangunan dengan
                            ukuran 7,2 x 30 = 216 m² yang terdiri dari tiga buah ruang belajar, satu ruang kantor, dan
                            satu buah ruang sanitasi dengan biaya swadaya masyarakat dan lembaga.<br>Madrasah Ibtidaiyah
                            Daarul Ma’arif menggunakan kurikulum yang dikeluarkan oleh Direktorat Pendidikan Islam yaitu
                            departemen Agama, dan kurikulum yang dikeluarkan oleh Direktorat Pendidikan Umum yaitu
                            Departemen Pendidikan dan Kebudayaan, dengan demikian, kurikulum yang diterapkan di Lembaga
                            Pendidikan Islam Daarul Ma’arif ini sesuai dengan Surat Keputusan Tiga Menteri (SKB Tiga
                            Menteri).<br>
                            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Madrasah Ibtidaiyah Daarul Ma’arif berada diujung utara Kabupaten Lampung Selatan yang
                            berbatasan dengan Kabupaten Pesawaran, hal ini menjadikan Madrasah Ibtidaiyah Daarul Ma’arif
                            sebagai pintu gerbang yang menghubungkan kedua belah kabupaten. Saat ini, Madrasah
                            Ibtidaiyah Swasta Daarul Ma’arif tahun pelajaran 2023-2024 memiliki siswa sebanyak 336 orang
                            yang terbagi dalam 17 kelas (rombongan belajar) namun hanya memiliki 12 ruang kelas,
                            sehingga idealnya masih membutuhkan 3 ruang kelas tambahan guna mendukung kegiatan belajar
                            mengajar yang lebih efisien dan optimal.<br><br>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="about" class="about  border-info border-top">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4" data-aos="fade-up">
                <div class="section-header">
                    <h2>Struktur Organisasi</h2>
                </div>
                <div class="container mt-5 border border-info border-2 rounded">
                    <div id="chart-container" style="overflow-x: auto;">
                    </div>
                </div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                <script>
                    let dataChart = <?= json_encode($org); ?>;
                    let preview = [];
                    for (let i = 0; i < dataChart.length; i++) {
                        let chart = [{ 'v': dataChart[i].nama_guru, 'f': `<div class="card border-dark mb-3" style="max-width: 18rem;"><div class="card-header">${dataChart[i].jabatan_guru}</div><div class="card-body"><p class="card-text">${dataChart[i].nama_guru}</p></div></div>` }, dataChart[i].nama_atasan === null ? '' : dataChart[i].nama_atasan, ''];
                        preview.push(chart);
                    }
                    google.charts.load('current', { 'packages': ['orgchart'] });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'nama_guru');
                        data.addColumn('string', 'atasan');
                        data.addColumn('string', 'ToolTip');
                        // Data Organisasi
                        data.addRows(preview);

                        var chart = new google.visualization.OrgChart(document.getElementById('chart-container'));

                        // Options untuk mengaktifkan kartu Bootstrap
                        var options = {
                            allowHtml: true,
                            nodeClass: "text-nowrap",
                            compactRows: true,
                            allowCollapse: true
                        };

                        chart.draw(data, options);
                    }
                </script>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Why Choose Us Section
    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Why Choose Us</h2>

            </div>

            <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

                <div class="col-xl-5 img-bg" style="background-image: url('<?=base_url(); ?>assets/img/why-us-bg.jpg')"></div>
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

    <!-- ======= Call To Action Section
    <section id="call-to-action" class="call-to-action">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h3>Ut fugiat aliquam aut non</h3>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur.
                        Excepteur sint occaecat cupidatat non proident.</p>
                    <a class="cta-btn" href="#">Call To Action</a>
                </div>
            </div>

        </div>
    </section>

    End Call To Action Section ======= -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Dewan Guru</h2>
            </div>
            <div class="slides-1 swiper">
                <div class="swiper-wrapper">
                    <?php $counter = 0; foreach ($guru as $g): ?>
                    <?php if ($counter % 4 === 0): ?>
                    <!-- Start New Slide -->
                    <div class="swiper-slide">
                        <div class="slides">
                            <div class="row gy-4">
                                <?php endif; ?>

                                <div class="col-lg-3 col-md-6" data-aos="fade-up"
                                    data-aos-delay="<?= $counter % 4 * 100; ?>">
                                    <div class="team-member">
                                        <div class="member-img">
                                            <img src="<?= base_url(); ?>" class="img-fluid" alt="">
                                            <div class="social">
                                                <a href=""><i class="bi bi-twitter"></i></a>
                                                <a href=""><i class="bi bi-facebook"></i></a>
                                                <a href=""><i class="bi bi-instagram"></i></a>
                                                <a href=""><i class="bi bi-linkedin"></i></a>
                                            </div>
                                        </div>
                                        <div class="member-info">
                                            <h4>
                                                <?= $g->Nama ?>
                                            </h4>
                                            <span>
                                                <?= $g->jabatan ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <?php $counter++; if ($counter % 4 === 0): ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Slide -->
                    <?php endif; ?>
                    <?php endforeach; ?>

                    <?php if ($counter % 4 !== 0): ?>
                    <!-- Penanganan jika anggota tim tidak mencapai kelipatan 4 -->
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section><!-- End Team Section -->

</main>
<!-- End #main -->