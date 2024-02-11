<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center"
    style="background-image: url('<?=base_url(); ?>assets/img/blog-header.jpg');">
    <div class="container position-relative d-flex flex-column align-items-center">

      <?php if ($this->uri->segment(2) === 'kategori_blog') { ?>
      <h2>Kategori Blog</h2>
      <?php } else if ($this->uri->segment(2) === 'tag_blog') { ?>
      <h2>Tag Blog</h2>
      <?php } else {?>
        <h2>Blog</h2>
      <?php } ?>
      <ol>
        <?php if ($this->uri->segment(2) === 'kategori_blog') { ?>
        <li><a href="<?=base_url(); ?>page/blog">Blog</a></li>
        <?php } else { ?>
        <li><a href="<?=base_url(); ?>page/home">Beranda</a></li>
        <?php } ?>
        <li>Blog</li>
      </ol>

    </div>
  </div>
  <!-- End Breadcrumbs -->

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
      <div class="row g-5">
        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
          <div class="row gy-5 posts-list">
            <?php foreach ($artikel as $berita): ?>
            <div class="col-lg-6">
              <article class="d-flex flex-column">
                <div class="post-img">
                  <img src="<?=base_url() . $berita->url ?>" alt="berita" class="img-fluid">
                </div>
                <h2 class="title" style="text-align: justify;">
                  <a href="<?=base_url(); ?>page/blog_detail/<?=$berita->ID_Berita ?>"><?=$berita->Judul_Berita ?></a>
                </h2>
                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                      <a href="<?=base_url(); ?>page/blog_detail/<?=$berita->ID_Berita ?>"><?=$berita->penulis ?></a>
                    </li>
                    <li class="d-flex align-items-center">
                      <i class="bi bi-clock"></i>
                      <a href="<?=base_url(); ?>page/blog_detail/<?=$berita->ID_Berita ?>">
                        <time datetime="2022-01-01">
                          <?php
                            $tanggal = $berita->updated;
                            $format = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                            echo $format->format(strtotime($tanggal));
                          ?>
                        </time>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="content konten text-truncate" style="max-height: 100px; text-align: justify;">
                  <?=$berita->Isi_Berita ?>
                </div>
                <div class="read-more mt-auto align-self-end">
                  <a href="<?=base_url(); ?>page/blog_detail/<?=$berita->ID_Berita ?>">Selengkapnya<i
                      class="bi bi-arrow-right"></i></a>
                </div>
              </article>
            </div>
            <?php endforeach; ?>
          </div>
          <!-- End blog posts list -->

          <div class="blog-pagination">
            <?php echo $this->pagination->create_links(); ?>
          </div>
          <!-- End blog pagination -->
        </div>
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
          <div class="sidebar ps-lg-4">
            <!-- End sidebar search formn-->
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
                  <a href="<?= base_url('Page/kategori_blog/').$idKategori ?>">
                    <?php echo $uniqueKategori ?> <span>
                      <?php echo $jumlah[$uniqueKategori] ?>
                    </span>
                  </a>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>

            <!-- End sidebar categories-->
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
                <?php foreach ($tag as $tags) : ?>
                <li><a href="<?php echo base_url('page/tag_blog') . "/" . $tags->id ?>"><?= $tags->Nama_Tag?></a></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <!-- End sidebar tags-->

          </div>
          <!-- End Blog Sidebar -->

        </div>

      </div>

    </div>
  </section>
  <!-- End Blog Section -->

</main>
<!-- End #main -->