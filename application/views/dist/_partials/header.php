<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>
    <?php echo $title; ?> &mdash; Stisla
  </title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <!-- CSS Libraries -->
 <?php
  if ($this->uri->segment(2) == "index_0") {?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
    
  <?php
} elseif ($this->uri->segment(2) == "forms_advanced_form") {?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  
  <?php
} elseif ($this->uri->segment(2) == "forms_editor") {?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/codemirror/lib/codemirror.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/codemirror/theme/duotone-dark.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jquery-selectric/selectric.css">
  
  <?php
} elseif ($this->uri->segment(2) == "auth_login") {?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-social/bootstrap-social.css">
  
  <?php
} elseif ($this->uri->segment(2) == "auth_register") {?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jquery-selectric/selectric.css">
  
  <?php
} elseif ($this->uri->segment(2) == "beranda") {?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/modules/datatables/DataTables-1.13.8/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/Responsive-2.5.0/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/Select-1.7.0/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/modules/izitoast/css/iziToast.min.css">

  <?php
} elseif ($this->uri->segment(2) == "features_post_create") {?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/Responsive-2.5.0/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/modules/dropzonejs/min/dropzone.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/modules/izitoast/css/iziToast.min.css">
  
  <?php
} elseif ($this->uri->segment(2) == "features_profile") {?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  
  <?php
} elseif ($this->uri->segment(2) == "features_setting_detail") {?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/codemirror/lib/codemirror.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/codemirror/theme/duotone-dark.css">

  <?php
} elseif ($this->uri->segment(2) == "master_tag") {?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/Responsive-2.5.0/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/modules/izitoast/css/iziToast.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/modules/izitoast/css/iziToast.min.css">

  <?php
} elseif ($this->uri->segment(2) == "master_kategori") {?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/Responsive-2.5.0/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/modules/izitoast/css/iziToast.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/modules/izitoast/css/iziToast.min.css">

  <?php
} elseif ($this->uri->segment(2) == "pengumuman") {?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/modules/datatables/DataTables-1.13.8/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/Responsive-2.5.0/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/modules/dropzonejs/min/dropzone.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/modules/izitoast/css/iziToast.min.css">

  
  <?php
}?>

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<?php
if ($this->uri->segment(2) == "layout_transparent") {
    $this->load->view('dist/_partials/layout-2');
    $this->load->view('dist/_partials/sidebar-2');
} elseif ($this->uri->segment(2) == "layout_top_navigation") {
    $this->load->view('dist/_partials/layout-3');
    $this->load->view('dist/_partials/navbar');
} elseif ($this->uri->segment(2) != "auth_login" && $this->uri->segment(2) != "auth_forgot_password" && $this->uri->segment(2) != "auth_register" && $this->uri->segment(2) != "auth_reset_password" && $this->uri->segment(2) != "errors_503" && $this->uri->segment(2) != "errors_403" && $this->uri->segment(2) != "errors_404" && $this->uri->segment(2) != "errors_500" && $this->uri->segment(2) != "utilities_contact" && $this->uri->segment(2) != "utilities_subscribe" && $this->uri->segment(1) != "Kmberanda") {
    $this->load->view('dist/_partials/layout');
    $this->load->view('dist/_partials/sidebar');
}
?>