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
        <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies
          darta donna mare fermentum iaculis eu non diam phasellus.</p>
        <div class="social-links d-flex  mt-3">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>

      <div class="col-lg-2 col-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bi bi-dash"></i> <a href="https://lampung.kemenag.go.id/">Kemenag</a></li>
          <li><i class="bi bi-dash"></i> <a href="https://madrasah.kemenag.go.id/">Direktorat KSKK Madrasah</a></li>
          <li><i class="bi bi-dash"></i> <a href="#">Services</a></li>
          <li><i class="bi bi-dash"></i> <a href="#">Terms of service</a></li>
          <li><i class="bi bi-dash"></i> <a href="#">Privacy policy</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-6 footer-links">
        <h4>Our Services</h4>
        <ul>
          <li><i class="bi bi-dash"></i> <a href="#">Web Design</a></li>
          <li><i class="bi bi-dash"></i> <a href="#">Web Development</a></li>
          <li><i class="bi bi-dash"></i> <a href="#">Product Management</a></li>
          <li><i class="bi bi-dash"></i> <a href="#">Marketing</a></li>
          <li><i class="bi bi-dash"></i> <a href="#">Graphic Design</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
        <h4>Contact Us</h4>
        <p>
          <?= $footer_data[0]['alamat'] ?> <br>
          <?= $footer_data[0]['kota'] .",". $footer_data[0]['kode_pos'] ?><br>
          <?= $footer_data[0]['provinsi'] ?> <br><br>
          <strong>Phone:</strong> +1 5589 55488 55<br>
          <strong>Email:</strong> info@example.com<br>
        </p>

      </div>

    </div>
  </div>
</div>
</footer><!-- End Footer --><!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
  class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
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