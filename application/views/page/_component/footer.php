<? 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<footer id="footer" class="footer">

<div class="footer-content">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-5 col-md-12 footer-info">
        <a href="index.html" class="logo d-flex align-items-center">
          <span><?= $footer_data[0]['nama_sekolah'] ?></span>
        </a>
        <div align="justify">Madrasah Ibtidaiyah Daarul Maarif adalah lembaga pendidikan tingkat dasar yang memberikan pendidikan formal pada jenjang pendidikan dasar. Madrasah Ibtidaiyah Daarul Maarif fokus pada pembelajaran akademis dan nilai-nilai keagamaan Islam untuk siswa usia dini, membantu membentuk dasar pendidikan mereka. Madrasah Ibtidaiyah Daarul Maarif memiliki peran penting dalam membentuk karakter, moral, dan pengetahuan agama bagi siswa Muslim.</div>
        <div class="social-links d-flex  mt-3">\
          <a href="<?= $footer_data[0]['facebook'] ?>" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="<?= $footer_data[0]['instagram'] ?>" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="<?= $footer_data[0]['youtube'] ?>" class="youtube"><i class="bi bi-youtube"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-6 footer-links" align="justify">
        <h4>Link Eksternal</h4>
        <ul>
          <li><i class="bi bi-dash"></i> <a href="https://lampung.kemenag.go.id/">Kemenag</a></li>
          <li><i class="bi bi-dash"></i> <a href="https://madrasah.kemenag.go.id/">Direktorat KSKK Madrasah</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start" align="justify">
        <h4>Hubungi Kami</h4>
        <p>
          <i class="fas fa-location-arrow"></i> <i class="bi bi-dash"></i> <?= $footer_data[0]['alamat'] ?>
          <?= $footer_data[0]['kota'] .", ". $footer_data[0]['kode_pos'] ?><br>
          <?= $footer_data[0]['provinsi'] ?> <br><br>
          <i class="fas fa-phone"></i> <i class="bi bi-dash"></i> <a href="tel:<?= $footer_data[0]['telepon'] ?>"><?= $footer_data[0]['telepon'] ?></a><br>
        </p>

      </div>

    </div>
  </div>
</div>
</footer><!-- End Footer --><!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
  class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?=base_url('assets/modules/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/aos/aos.js') ?>"></script>
<script src="<?= base_url('assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/php-email-form/validate.js') ?>"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('assets/js/main.js') ?>"></script>

</body>

</html>