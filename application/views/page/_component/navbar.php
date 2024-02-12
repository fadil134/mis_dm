<? 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<nav id="navbar" class="navbar">
    <ul>
        <li>
            <a href="<?= base_url('page/home') ?>" <?php if ($this->uri->segment(1) == "" || $this->uri->segment(2) ==
                "home") { ?> class="active"
                <?php } ?>>Beranda
            </a>
        </li>
        <li>
            <a href="<?= base_url('page/about') ?>" <?php if ($this->uri->segment(2) == "about") { ?> class="active"
                <?php } ?>>Profil
            </a>
        </li>
        <li>
            <a href="<?= base_url('page/porto') ?>" <?php if ($this->uri->segment(2) == "porto") { ?> class="active"
                <?php } ?>>Galeri
            </a>
        </li>
        <li>
            <a href="<?= base_url('page/blog') ?>" <?php if ($this->uri->segment(2) == "blog") { ?> class="active"
                <?php } ?>>Blog
            </a>
        </li>
        <li>
            <a href="<?=base_url('dist/auth_login');?>">Login</a>
        </li>
        <li>
            <a href="https://rdm.mi-darulmaarif.sch.id/">RDM</a>
        </li>
    </ul>
</nav>


</div>
</header>
<!-- End Header -->