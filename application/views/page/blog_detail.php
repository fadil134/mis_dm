<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('<?= base_url('assets/img/blog-header.jpg') ?>');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Blog Details</h2>
            <ol>
                <li><a href="<?= base_url() ?>page/blog">Blog</a></li>
                <li>Blog Details</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <article class="blog-details">
                        <div class="post-img">
                            <img src="<?php echo base_url() . $artikel->url ?>" alt="" class="equal-size">
                        </div>
                        <h2 class="title">
                            <?= $artikel->Judul_Berita ?>
                        </h2>
                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-person"></i>
                                    <a href="#">
                                        <?= $artikel->Nama_Penulis ?>
                                    </a>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-clock"></i>
                                    <a href="#">
                                        <time datetime="2020-01-01">
                                            <?php 
                                                $tanggal = $artikel->updated;
                                                $format = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                                                echo $format->format(strtotime($tanggal)); 
                                            ?>
                                        </time>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End meta top -->
                        <div class="content">
                            <?= $artikel->Isi_Berita ?>
                        </div>
                        <!-- End post content -->
                        <div class="meta-bottom">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li>
                                    <a href="<?= base_url('Page/kategori_blog') . '/' .  $artikel->Kategori_ID ?>">
                                        <?= $artikel->Nama_Kategori ?>
                                    </a>
                                </li>
                            </ul>
                            <i class="bi bi-tags"></i>
                            <ul class="tags">
                                <?php
                                $tag = explode(", ",$artikel->nama_tag);

                                foreach ($tag as $tags) : ?>
                                <li>
                                    <a href="<?php echo base_url('page/tag_blog') . "/" . $artikel->id ?>">
                                        <?php echo $tags; ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <!-- End meta bottom -->
                    </article>
                    <!-- End blog post -->
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">

                    <div class="sidebar ps-lg-4">

                        <div class="sidebar-item search-form">
                            <h3 class="sidebar-title">Search</h3>
                            <form action="" class="mt-3">
                                <input type="text">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->

                        <div class="sidebar-item categories">
                            <h3 class="sidebar-title">Kategori</h3>
                            <ul class="mt-3">
                                <?php
                                $data = $kategori;

                                // Function to compare objects based on ID_Kategori
                                function compareObjects($obj1, $obj2)
                                {
                                    return $obj1->ID_Kategori <=> $obj2->ID_Kategori;
                                }

                                // Sort the array of objects based on ID_Kategori
                                usort($data, 'compareObjects');

                                // Count occurrences of each Nama_Kategori
                                $jumlah = array_count_values(array_column($data, 'Nama_Kategori'));
                                // Iterate through unique Nama_Kategori values
                                $unik = array_unique(array_column($data, 'Nama_Kategori'));

                                foreach ($unik as $uniqueKategori):
                                ?>
                                <li>
                                    <?php
                                        // Find the corresponding item in the data array
                                        $item = array_values(array_filter($data, function ($dataItem) use ($uniqueKategori) {
                                            return $dataItem->Nama_Kategori === $uniqueKategori;
                                        }))[0];
                                        
                                        $idKategori = $item->ID_Kategori;
                                    ?>
                                    <a href="<?= base_url('Page/kategori_blog') . '/' . $idKategori ?>">
                                        <?php echo $uniqueKategori ?> <span>
                                            <?php echo $jumlah[$uniqueKategori] ?>
                                        </span>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Berita Terbaru</h3>
                            <div class="mt-3">
                                <?php foreach ($terbaru as $brt): ?>
                                <div class="post-item mt-3">
                                    <img src="<?=base_url() . $brt->url ?>" alt="" class="flex-shrink-0">
                                    <div>
                                        <h4><a
                                                href="<?=base_url(); ?>page/blog_detail/<?=$brt->ID_Berita ?>"><?=$brt->Judul_berita ?></a>
                                        </h4>
                                        <time datetime="2020-01-01">
                                            <?php
                                            $tanggal = $brt->updated;
                                            $format = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                                            echo $format->format(strtotime($tanggal));
                                            ?>
                                        </time>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                        <!-- End sidebar recent posts-->

                        <div class="sidebar-item tags">
                            <h3 class="sidebar-title">Tags</h3>
                            <ul class="mt-3">
                                <?php foreach ($tagg as $tag) : ?>
                                <li><a href="<?php echo base_url('page/tag_blog/') . $tag->id ?>">
                                        <?= $tag->Nama_Tag?>
                                    </a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <!-- End sidebar tags-->

                    </div><!-- End Blog Sidebar -->

                </div>
            </div>

        </div>
    </section><!-- End Blog Details Section -->

</main><!-- End #main -->