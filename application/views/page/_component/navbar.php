<? 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<nav id="navbar" class="navbar">
    <ul>
        <li><a href="<?= base_url('page/home') ?>" <?php if ($this->uri->segment(1) == "" || $this->uri->segment(2) == "home") { ?> class="active" <?php } ?>>Beranda</a></li>
        <li><a href="<?= base_url('page/about') ?>"<?php if ($this->uri->segment(2) == "about") { ?> class="active" <?php } ?>>Profil</a></li>
        <li><a href="<?= base_url('page/porto') ?>" <?php if ($this->uri->segment(2) == "porto") { ?> class="active" <?php } ?>>Galeri</a></li>
        <li><a href="<?= base_url('page/blog') ?>" <?php if ($this->uri->segment(2) == "blog") { ?> class="active" <?php } ?>>Blog</a></li>
        <li><a href="<?= base_url('page/contact') ?>" <?php if ($this->uri->segment(2) == "contact") { ?> class="active" <?php } ?>>Contact</a></li>
        <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
                <li><a href="#">Dropdown 1</a></li>
                <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">Deep Dropdown 1</a></li>
                        <li><a href="#">Deep Dropdown 2</a></li>
                        <li><a href="#">Deep Dropdown 3</a></li>
                        <li><a href="#">Deep Dropdown 4</a></li>
                        <li><a href="#">Deep Dropdown 5</a></li>
                    </ul>
                </li>
                <li><a href="#">Dropdown 2</a></li>
                <li><a href="#">Dropdown 3</a></li>
                <li><a href="#">Dropdown 4</a></li>
            </ul>
        </li>
        <li><a href="<?=base_url();?>dist">Login</a></li>
    </ul>
</nav>


</div>
</header>
<!-- End Header -->