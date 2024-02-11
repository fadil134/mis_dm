<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url(); ?>dist/index">MIS Daarul Maarif</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>dist/index">MDM</a>
    </div>
    <ul class="sidebar-menu">
      <!-- Master -->
      <li class="menu-header">Master Data</li>
      <li class="dropdown <?=$this->uri->segment(2) == 'master_tag' || $this->uri->segment(2) == 'master_kategori' || $this->uri->segment(2) == 'features_post_create' ? 'active' : '';?>">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-newspaper fa-sm"></i><span>Data Berita</span></a>
        <ul class="dropdown-menu">
          <li class="<?=$this->uri->segment(2) == 'master_tag' ? 'active' : '';?>">
            <a class="nav-link" href="<?=base_url();?>dist/master_tag">Master Tag</a>
          </li>
          <li class="<?=$this->uri->segment(2) == 'master_kategori' ? 'active' : '';?>">
            <a class="nav-link" href="<?=base_url();?>dist/master_kategori">
              Master Kategori
            </a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'features_post_create' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/features_post_create">Master Berita</a>
          </li>
        </ul>
      </li>
      <li class="dropdown <?=$this->uri->segment(2) == 'master_guru' || $this->uri->segment(2) == 'master_siswa' ? 'active' : '';?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-school fa-sm"></i><span>Data Sekolah</span></a>
        <ul class="dropdown-menu">
          <li class="<?=$this->uri->segment(2) == 'master_guru' ? 'active' : '';?>">
            <a class="nav-link" href="<?=base_url();?>dist/master_guru">Master Guru</a>
          </li>
          <li class="<?=$this->uri->segment(2) == 'master_guru' ? 'active' : '';?>">
            <a class="nav-link" href="<?=base_url();?>dist/master_siswa">Master Siswa</a>
          </li>
        </ul>
      </li>

      <!-- Content Manajemen Web -->
      <li class="menu-header">Konten Manajemen Web</li>
      <li class="dropdown <?=$this->uri->segment(2) == 'beranda' || $this->uri->segment(2) == 'profil' || $this->uri->segment(2) == 'galeri' || $this->uri->segment(2) == 'kontak' ? 'active' : '';?>">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-newspaper fa-sm"></i><span>Web Manajemen</span></a>
        <ul class="dropdown-menu">
          <li class="<?=$this->uri->segment(2) == 'beranda' ? 'active' : '';?>">
            <a class="nav-link" href="<?=base_url();?>dist/beranda">Beranda</a>
          </li>
          <li class="<?=$this->uri->segment(2) == 'profil' ? 'active' : '';?>">
            <a class="nav-link" href="<?=base_url();?>dist/profil">Profil</a>
          </li>
          <li class="<?=$this->uri->segment(2) == 'galeri' ? 'active' : '';?>">
            <a class="nav-link" href="<?=base_url();?>dist/galeri">Galeri</a>
          </li>
        </ul>
      </li>

      <!-- Settings -->
      <li class="menu-header">Pages</li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'features_profile' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>User</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'features_profile' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dist/features_profile">Profile</a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>
</div>