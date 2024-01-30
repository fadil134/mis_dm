<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>

<!-- JS Libraies -->
<?php
if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "index") {?>
<script src="<?php echo base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<?php
} elseif ($this->uri->segment(2) == "index_0") {?>
<script src="<?php echo base_url(); ?>assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<?php
} elseif ($this->uri->segment(2) == "forms_advanced_form") {?>
<script src="<?php echo base_url(); ?>assets/modules/cleave-js/dist/cleave.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<script
  src="<?php echo base_url(); ?>assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

<?php
} elseif ($this->uri->segment(2) == "forms_editor") {?>
<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/codemirror/lib/codemirror.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/codemirror/mode/javascript/javascript.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

<?php
} elseif ($this->uri->segment(2) == "auth_register") {?>
<script src="<?php echo base_url(); ?>assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

<?php
} elseif ($this->uri->segment(2) == "beranda") {?>
<script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.13.8/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/modules/datatables/Responsive-2.5.0/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url();?>assets/modules/datatables/Responsive-2.5.0/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.7.0/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
<script src="<?=base_url();?>assets/modules/select2/dist/js/select2.min.js"></script>
<script src="<?=base_url();?>assets/modules/dropzonejs/min/dropzone.min.js"></script>
<script src="<?=base_url();?>assets/modules/pica/dist/pica.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
<script src="<?=base_url();?>assets/modules/izitoast/js/iziToast.min.js"></script>

<?php
} elseif ($this->uri->segment(2) == "features_post_create") {?>
<script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.13.8/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/modules/datatables/Responsive-2.5.0/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url();?>assets/modules/datatables/Responsive-2.5.0/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.7.0/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
<script src="<?=base_url();?>assets/modules/select2/dist/js/select2.min.js"></script>
<script src="<?=base_url();?>assets/modules/dropzonejs/min/dropzone.min.js"></script>
<script src="<?=base_url();?>assets/modules/pica/dist/pica.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
<script src="<?=base_url();?>assets/modules/izitoast/js/iziToast.min.js"></script>

<?php
} elseif ($this->uri->segment(2) == "features_posts") {?>
<script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

<?php
} elseif ($this->uri->segment(2) == "features_profile") {?>
<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>

<?php
} elseif ($this->uri->segment(2) == "master_tag") {?>
<script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
<script
  src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.13.8/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/modules/datatables/Responsive-2.5.0/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url();?>assets/modules/datatables/Responsive-2.5.0/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.7.0/js/dataTables.select.min.js"></script>
<script src="<?=base_url();?>assets/modules/izitoast/js/iziToast.min.js"></script>

<?php
} elseif ($this->uri->segment(2) == "master_kategori") {?>
<script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
<script
  src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.13.8/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/modules/datatables/Responsive-2.5.0/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url();?>assets/modules/datatables/Responsive-2.5.0/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.7.0/js/dataTables.select.min.js"></script>
<script src="<?=base_url();?>assets/modules/izitoast/js/iziToast.min.js"></script>

<?php
} elseif ($this->uri->segment(2) == "pengumuman") {?>
<script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.13.8/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/modules/datatables/Responsive-2.5.0/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url();?>assets/modules/datatables/Responsive-2.5.0/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.7.0/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
<script src="<?=base_url();?>assets/modules/select2/dist/js/select2.min.js"></script>
<script src="<?=base_url();?>assets/modules/dropzonejs/min/dropzone.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
<script src="<?=base_url();?>assets/modules/izitoast/js/iziToast.min.js"></script>

<?php
}?>

<!-- Page Specific JS File -->
<?php
if ($this->uri->segment(2) == "beranda") {?>
<script src="<?php echo base_url(); ?>assets/js/page/beranda.js"></script>

<?php
} elseif ($this->uri->segment(2) == "index_0") {?>
<script src="<?php echo base_url(); ?>assets/js/page/index-0.js"></script>

<?php
} elseif ($this->uri->segment(2) == "master_tag") {?>
<script src="<?php echo base_url(); ?>assets/js/page/master-tag.js"></script>

<?php
} elseif ($this->uri->segment(2) == "master_kategori") {?>
<script src="<?php echo base_url(); ?>assets/js/page/master-kategori.js"></script>

<?php
} elseif ($this->uri->segment(2) == "features_post_create") {?>
<script src="<?php echo base_url(); ?>assets/js/page/features-post-create.js"></script>

<?php
} elseif ($this->uri->segment(2) == "pengumuman") {?>
<script src="<?php echo base_url(); ?>assets/js/page/pengumuman.js"></script>

<?php
} elseif ($this->uri->segment(2) == "features_posts") {?>
<script src="<?php echo base_url(); ?>assets/js/page/features-posts.js"></script>

<?php
} elseif ($this->uri->segment(2) == "features_setting_detail") {?>
<script src="<?php echo base_url(); ?>assets/js/page/features-setting-detail.js"></script>

<?php
} elseif ($this->uri->segment(2) == "utilities_contact") {?>
<script src="<?php echo base_url(); ?>assets/js/page/utilities-contact.js"></script>

<?php
}?>

<!-- Template JS File -->
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
</body>

</html>