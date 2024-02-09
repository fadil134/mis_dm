<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center"
    style="background-image: url('<?= base_url() . $hero[0]->url; ?>');">
    <div class="container position-relative d-flex flex-column align-items-center">
      <h2>Galeri</h2>
      <ol>
        <li><a href="<?= base_url() ?>page/home">Beranda</a></li>
        <li>Galeri</li>
      </ol>

    </div>
  </div>
  <!-- End Breadcrumbs -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">
      <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
        data-portfolio-sort="original-order">
        <?php
        $uniqueTitles = array();
        ?>

        <!-- Portfolio Filters -->
        <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">All</li>
          <?php foreach ($galeri as $gl) : ?>
          <?php if (!in_array($gl->title, $uniqueTitles)) {
                    $uniqueTitles[] = $gl->title;
                    ?>
          <li data-filter=".<?= $gl->title; ?>">
            <?= $gl->description; ?>
          </li>
          <?php } ?>
          <?php endforeach; ?>
        </ul>
        <!-- End Portfolio Filters -->

        <!-- Portfolio Items -->
        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="300">
          <?php foreach ($galeri as $cont) : ?>
          <?php
                $file = $cont->filename;
                $split = explode(".", $file);
                $asli = array_shift($split);
                ?>
          <div class="col-lg-4 col-md-6 portfolio-item <?= $cont->title ?>">
            <img src="<?= base_url() . $cont->url ?>" class="img-fluid" alt="<?= $cont->title ?>">
            <div class="text-wrap portfolio-info">
              <p>
                <?= $cont->description ?>
              </p>
              <a href="<?= base_url() . $cont->url ?>" title="<?= $cont->description ?>"
                data-gallery="portfolio-gallery-<?= $cont->title ?>" class="glightbox preview-link">
                <i class="bi bi-zoom-in"></i>
              </a>
              <a href="<?= base_url() ?>page/porto_detail" title="More Details" class="details-link">
                <i class="bi bi-link-45deg"></i>
              </a>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <!-- End Portfolio Items -->
      </div>
    </div>
  </section>
  <!-- End Portfolio Section -->

</main>
<!-- End #main -->