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
      <li class="menu-header">Master Data</li>
      <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dist/blank"><i class="far fa-square"></i> <span>Blank
            Page</span></a>
      </li>
      <li class="dropdown <?=$this->uri->segment(2) == 'master_tag' ? 'active' : '';?>">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-newspaper"></i><span>Data Berita</span></a>
        <ul class="dropdown-menu">
          <li class="<?=$this->uri->segment(2) == 'master_tag' ? 'active' : '';?>"><a href="<?=base_url();?>dist/master_tag" class="nav-link">Master Tag</a></li>
        </ul>
      </li>
      <li class="menu-header">Pages</li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'features_profile' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>User</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'features_profile' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/features_profile">Profile</a>
          </li>
        </ul>
      </li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'features_activities' || $this->uri->segment(2) == 'features_post_create' || $this->uri->segment(2) == 'features_posts' || $this->uri->segment(2) == 'features_settings' || $this->uri->segment(2) == 'features_setting_detail' ? 'active' : ''; ?>">
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
          <li class="<?php echo $this->uri->segment(2) == 'features_settings' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/features_settings">Settings</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'features_setting_detail' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/features_setting_detail">Setting Detail</a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>
</div>