<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kategori</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Berita</a></div>
                <div class="breadcrumb-item">Master Kategori</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Kategori</h2>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kategori Berita</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary" id="trunc">Truncate</button>
                            </div>
                        </div>
                        <form action="<?=base_url('master/add_kategori');?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" name="kategori" id="kategori" class="form-control"
                                        placeholder="Tambah Kategori Berita">
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Master Kategori</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-responsive mx-auto" id="kategoriT">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Kategori ID</th>
                                        <th>Nama Kategori</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editKategori" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-group" action="<?=base_url('master/edit_kategori');?>" method="post">
                <div class="modal-body">
                    <input id="idKategori" type="hidden" name="id">
                    <div class="form-group">
                        <label for="new_kategori">Kategori Baru</label>
                        <input type="text" class="form-control" name="new_kategori" id="new_kategori"
                            aria-describedby="helpIdkategori" placeholder="Ubah Kategori">
                        <small id="helpIdkategori" class="form-text text-muted">Eksisting Kategori</small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('dist/_partials/footer');?>