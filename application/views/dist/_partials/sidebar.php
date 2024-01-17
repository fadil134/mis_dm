<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url(); ?>dist/index">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>dist/index">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li
        class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>"><a class="nav-link"
              href="<?php echo base_url(); ?>dist/index_0">Dashboard</a>
          </li>
        </ul>
      </li>
      <li class="menu-header">Starter</li>
      <li
        class="dropdown <?php echo $this->uri->segment(2) == 'layout_default' || $this->uri->segment(2) == 'layout_transparent' || $this->uri->segment(2) == 'layout_top_navigation' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
          <span>Layout</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'layout_default' ? 'active' : ''; ?>"><a class="nav-link"
              href="<?php echo base_url(); ?>dist/layout_default">Default Layout</a>
          </li>
        </ul>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link"
          href="<?php echo base_url(); ?>dist/blank"><i class="far fa-square"></i> <span>Blank Page</span></a>
      </li>
      <li class="menu-header">Stisla</li>
      <li
        class="dropdown <?php echo $this->uri->segment(2) == 'components_article' || $this->uri->segment(2) == 'components_avatar' || $this->uri->segment(2) == 'components_chat_box' || $this->uri->segment(2) == 'components_empty_state' || $this->uri->segment(2) == 'components_gallery' || $this->uri->segment(2) == 'components_hero' || $this->uri->segment(2) == 'components_multiple_upload' || $this->uri->segment(2) == 'components_pricing' || $this->uri->segment(2) == 'components_statistic' || $this->uri->segment(2) == 'components_tab' || $this->uri->segment(2) == 'components_table' || $this->uri->segment(2) == 'components_user' || $this->uri->segment(2) == 'components_wizard' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Components</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'components_gallery' ? 'active' : ''; ?>"><a class="nav-link"
              href="<?php echo base_url(); ?>dist/components_gallery">Gallery</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'components_multiple_upload' ? 'active' : ''; ?>"><a
              class="nav-link" href="<?php echo base_url(); ?>dist/components_multiple_upload">Multiple Upload</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'components_user' ? 'active' : ''; ?>"><a class="nav-link"
              href="<?php echo base_url(); ?>dist/components_user">User</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'components_wizard' ? 'active' : ''; ?>"><a
              class="nav-link beep beep-sidebar" href="<?php echo base_url(); ?>dist/components_wizard">Wizard</a>
          </li>
        </ul>
      </li>
      <li
        class="dropdown <?php echo $this->uri->segment(2) == 'forms_advanced_form' || $this->uri->segment(2) == 'forms_editor' || $this->uri->segment(2) == 'forms_validation' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'forms_advanced_form' ? 'active' : ''; ?>"><a class="nav-link"
              href="<?php echo base_url(); ?>dist/forms_advanced_form">Advanced Form</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'forms_editor' ? 'active' : ''; ?>"><a class="nav-link"
              href="<?php echo base_url(); ?>dist/forms_editor">Editor</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'forms_validation' ? 'active' : ''; ?>"><a class="nav-link"
              href="<?php echo base_url(); ?>dist/forms_validation">Validation</a>
          </li>
        </ul>
      </li>
      <li
        class="dropdown <?php echo $this->uri->segment(2) == 'modules_calendar' || $this->uri->segment(2) == 'modules_chartjs' || $this->uri->segment(2) == 'modules_datatables' || $this->uri->segment(2) == 'modules_flag' || $this->uri->segment(2) == 'modules_font_awesome' || $this->uri->segment(2) == 'modules_ion_icons' || $this->uri->segment(2) == 'modules_owl_carousel' || $this->uri->segment(2) == 'modules_sparkline' || $this->uri->segment(2) == 'modules_sweet_alert' || $this->uri->segment(2) == 'modules_toastr' || $this->uri->segment(2) == 'modules_vector_map' || $this->uri->segment(2) == 'modules_weather_icon' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'modules_owl_carousel' ? 'active' : ''; ?>"><a
              class="nav-link" href="<?php echo base_url(); ?>dist/modules_owl_carousel">Owl Carousel</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'modules_sparkline' ? 'active' : ''; ?>"><a class="nav-link"
              href="<?php echo base_url(); ?>dist/modules_sparkline">Sparkline</a>
          </li>
        </ul>
      </li>
      <li class="menu-header">Pages</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url(); ?>dist/auth_forgot_password">Forgot Password</a>
          </li>
          <li><a href="<?php echo base_url(); ?>dist/auth_login">Login</a>
          </li>
          <li><a href="<?php echo base_url(); ?>dist/auth_register">Register</a>
          </li>
          <li><a href="<?php echo base_url(); ?>dist/auth_reset_password">Reset Password</a>
          </li>
        </ul>
      </li>
      <li
        class="dropdown <?php echo $this->uri->segment(2) == 'features_activities' || $this->uri->segment(2) == 'features_post_create' || $this->uri->segment(2) == 'features_posts' || $this->uri->segment(2) == 'features_profile' || $this->uri->segment(2) == 'features_settings' || $this->uri->segment(2) == 'features_setting_detail' || $this->uri->segment(2) == 'features_tickets' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'features_activities' ? 'active' : ''; ?>"><a class="nav-link"
              href="<?php echo base_url(); ?>dist/features_activities">Activities</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'features_post_create' ? 'active' : ''; ?>"><a
              class="nav-link" href="<?php echo base_url(); ?>dist/features_post_create">Post Create</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'features_posts' ? 'active' : ''; ?>"><a class="nav-link"
              href="<?php echo base_url(); ?>dist/features_posts">Posts</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'features_profile' ? 'active' : ''; ?>"><a class="nav-link"
              href="<?php echo base_url(); ?>dist/features_profile">Profile</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'features_settings' ? 'active' : ''; ?>"><a class="nav-link"
              href="<?php echo base_url(); ?>dist/features_settings">Settings</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'features_setting_detail' ? 'active' : ''; ?>"><a
              class="nav-link" href="<?php echo base_url(); ?>dist/features_setting_detail">Setting Detail</a>
          </li>
        </ul>
      </li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'utilities_invoice' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url(); ?>dist/utilities_contact">Contact</a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>
</div>