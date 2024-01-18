<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
      <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/index_0">General Dashboard</a>
          </li>
        </ul>
      </li>
      <li class="menu-header">Starter</li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'layout_default' || $this->uri->segment(2) == 'layout_transparent' || $this->uri->segment(2) == 'layout_top_navigation' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
          <span>Layout</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'layout_default' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/layout_default">Default Layout</a>
          </li>
          <li>
            <a class="nav-link" href="<?php echo base_url(); ?>dist/layout_transparent">Transparent Sidebar</a>
          </li>
          <li>
            <a class="nav-link" href="<?php echo base_url(); ?>dist/layout_top_navigation">Top Navigation</a>
          </li>
        </ul>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dist/blank"><i class="far fa-square"></i> <span>Blank
            Page</span></a>
      </li>
      <li class="menu-header">Stisla</li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'forms_advanced_form' || $this->uri->segment(2) == 'forms_editor' || $this->uri->segment(2) == 'forms_validation' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'forms_advanced_form' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/forms_advanced_form">Advanced Form</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'forms_editor' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/forms_editor">Editor</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'forms_validation' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/forms_validation">Validation</a>
          </li>
        </ul>
      </li>
      <li class="menu-header">Pages</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
        <ul class="dropdown-menu">
          <li>
            <a href="<?php echo base_url(); ?>dist/auth_forgot_password">Forgot Password</a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>dist/auth_login">Login</a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>dist/auth_register">Register</a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>dist/auth_reset_password">Reset Password</a>
          </li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Errors</span></a>
        <ul class="dropdown-menu">
          <li>
            <a class="nav-link" href="<?php echo base_url(); ?>dist/errors_503">503</a>
          </li>
          <li>
            <a class="nav-link" href="<?php echo base_url(); ?>dist/errors_403">403</a>
          </li>
          <li>
            <a class="nav-link" href="<?php echo base_url(); ?>dist/errors_404">404</a>
          </li>
          <li>
            <a class="nav-link" href="<?php echo base_url(); ?>dist/errors_500">500</a>
          </li>
        </ul>
      </li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'features_activities' || $this->uri->segment(2) == 'features_post_create' || $this->uri->segment(2) == 'features_posts' || $this->uri->segment(2) == 'features_profile' || $this->uri->segment(2) == 'features_settings' || $this->uri->segment(2) == 'features_setting_detail' || $this->uri->segment(2) == 'features_tickets' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'features_activities' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/features_activities">Activities</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'features_post_create' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/features_post_create">Post Create</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'features_posts' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/features_posts">Posts</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'features_profile' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/features_profile">Profile</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'features_settings' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/features_settings">Settings</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'features_setting_detail' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/features_setting_detail">Setting Detail</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'features_tickets' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/features_tickets">Tickets</a>
          </li>
        </ul>
      </li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'utilities_invoice' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
        <ul class="dropdown-menu">
          <li>
            <a href="<?php echo base_url(); ?>dist/utilities_contact">Contact</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'utilities_invoice' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/utilities_invoice">Invoice</a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>dist/utilities_subscribe">Subscribe</a>
          </li>
        </ul>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'credits' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dist/credits"><i class="fas fa-pencil-ruler"></i>
          <span>Credits</span></a>
      </li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Documentation
      </a>
    </div>
  </aside>
</div>