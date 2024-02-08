<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Galeri</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Galeri</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Profil</h2>
            <p class="section-lead">Manajemen Konten Halaman Galeri</p>
            <div class="card">
                <div class="card-header">
                    <h4>Galeri</h4>
                </div>
                <form action="<?=base_url('Kmgaleri/s_galeri'); ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <?php if ($this->session->flashdata('pesan')) : ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>
                                        <?= $this->session->flashdata('pesan'); ?>
                                    </strong>
                                </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('validasi_error')) : ?>
                                <?php $errorMessages = explode('<p>', $this->session->flashdata('validasi_error')); ?>
                                <?php foreach ($errorMessages as $errorMessage) : ?>
                                <?php if (!empty($errorMessage)) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>
                                        <?= strip_tags($errorMessage); ?>
                                    </strong>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label for="bg_galeri">Background Galeri</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="reset_bg">Reset</button>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="bg_galeri"
                                                aria-describedby="inputGroupFileAddon03" name="bg_galeri">
                                            <label class="custom-file-label" for="bg_galeri">Klik di sini untuk memilih
                                                file</label>
                                        </div>
                                    </div>
                                    <small id="helpId" class="text-muted">Input Background Galeri</small>
                                </div>
                                <div class="form-group">
                                    <label for="galeri_kegiatan">Kegiatan</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="reset_kegiatan">Reset</button>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" multiple class="custom-file-input" id="galeri_kegiatan"
                                                aria-describedby="inputGroupFileAddon03" name="galeri_kegiatan[]">
                                            <label class="custom-file-label" for="galeri_kegiatan">Klik di sini untuk
                                                memilih
                                                file</label>
                                        </div>
                                    </div>
                                    <small id="helpId" class="text-muted">Input Gambar Kegiatan</small>
                                </div>
                                <div class="form-group">
                                    <label for="desk_kegiatan">Deskripsi</label>
                                    <input type="text" name="desk_kegiatan" id="desk_kegiatan" class="form-control"
                                        placeholder="Deskripsi Kegiatan" aria-describedby="helpId">
                                    <small id="helpId" class="text-muted">Deskripsi Galeri Kegiatan</small>
                                </div>
                                <div class="form-group">
                                    <label for="desk_gal">Title</label>
                                    <input type="text" name="title_kegiatan" id="title_kegiatan" class="form-control"
                                        placeholder="Title Kegiatan" aria-describedby="helpId">
                                    <small id="helpId" class="text-muted">Title Galeri Kegiatan</small>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <?php $counter=1; ?>
                                <table class="table" id="galeri_tabel">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Deskripsi</th>
                                            <th>Kegiatan</th>
                                            <th>Foto</th>
                                            <th>is_active</th>
                                            <th>Aktivasi</th>
                                            <th>id</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($galeri as $gal): ?>
                                        <tr>
                                            <td>
                                                <?= $counter++ ?>
                                            </td>
                                            <td>
                                                <?= $gal->description ?>
                                            </td>
                                            <td>
                                                <?= $gal->title ?>
                                            </td>
                                            <td>
                                                <?= $gal->url ?>
                                            </td>
                                            <td>
                                                <?= $gal->is_active ?>
                                            </td>
                                            <td></td>
                                            <td>
                                                <?= $gal->id ?>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>