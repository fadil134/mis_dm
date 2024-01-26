<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tag</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Berita</a></div>
                <div class="breadcrumb-item">Master Tag</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tag</h2>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tag Berita</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary" id="trunc">Truncate</button>
                            </div>
                        </div>
                        <form action="<?= base_url('master/add_tag'); ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tag">Tag</label>
                                    <input type="text" name="tag" id="tag" class="form-control"
                                        placeholder="Tambah Tag Berita">
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
                            <h4>Master Tag</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-responsive mx-auto" id="tagT">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Tag ID</th>
                                        <th>Nama Tag</th>
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
<div class="modal fade" id="editTag" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Tag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-group" action="<?=base_url('master/edit_tag');?>" method="post">
                <div class="modal-body">
                    <input id="idTag" type="hidden" name="id">
                    <div class="form-group">
                        <label for="new_tag">Tag Baru</label>
                        <input type="text" class="form-control" name="new_tag" id="new_tag" aria-describedby="helpIdtag"
                            placeholder="Ubah Tag">
                        <small id="helpIdtag" class="form-text text-muted">Eksisting Tag</small>
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

<?php $this->load->view('dist/_partials/footer'); ?>