<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Post Artikel</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Artikel</a></div>
        <div class="breadcrumb-item">Post Artikel</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Post Artikel</h2>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Publikasi Artikel</h4>
            </div>

            <!-- Save Berita -->
            <?php echo validation_errors(); ?>
            <form action="" id="berita">
              <div class="card-body">
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" name="title" id="title">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                  <div class="col-sm-12 col-md-7">
                    <select class="form-control selectric" name="kategori" id="kategori">
                      <?php foreach ($kategori as $kat): ?>
                      <option value="<?=$kat->ID_Kategori?>"><?=$kat->Nama_Kategori?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea name="konten" id="summernote" cols="30" rows="10" class="summernote"></textarea>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                  <div class="col-sm-12 col-md-7">
                    <select name="tag[]" id="tag" multiple="multiple" class="custom-select">
                      <?php foreach ($tag as $tags): ?>
                      <option value="<?php echo $tags->ID_Tag ?>">
                        <?php echo $tags->Nama_Tag ?>
                      </option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                  <div class="col-sm-12 col-md-7">
                    <select class="custom-select" name="status" id="status">
                      <?php foreach ($status as $stat): ?>
                      <option value="<?php echo $stat->ID_Status ?>">
                        <?php echo $stat->Nama_Status ?>
                      </option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                  <div class="col-sm-12 col-md-4">
                    <div id="myDropzone" class="dropzone"></div>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <div class="col-sm-12 col-md-7">
                    <button type="submit" id="submitBtn" class="btn btn-primary">Create Post</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Tabel Artikel -->
      <div class="card">
        <div class="card-body">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab"
                aria-controls="pills-all" aria-selected="true">All <span class="badge badge-white">
                  <?php echo count(array_column($article, 'ID_Berita')); ?>
                </span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-publish-tab" data-toggle="pill" href="#pills-publish" role="tab"
                aria-controls="pills-publish" aria-selected="true">Publish <span class="badge badge-white">
                  <?php echo count(array_column($publish, 'Judul_Berita')); ?>
                </span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-pending-tab" data-toggle="pill" href="#pills-pending" role="tab"
                aria-controls="pills-pending" aria-selected="false">Pending <span class="badge badge-white">
                  <?php echo count(array_column($pending, 'Judul_Berita')); ?>
                </span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-draft-tab" data-toggle="pill" href="#pills-draft" role="tab"
                aria-controls="pills-draft" aria-selected="false">Draft <span class="badge badge-white">
                  <?php echo count(array_column($draft, 'Judul_Berita')); ?>
                </span></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
          <div class="card">
            <div class="card-body">
              <table id="all" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Penulis</th>
                    <th>Tag</th>
                    <th>Actions</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-publish" role="tabpanel" aria-labelledby="pills-publish-tab">
          <div class="card">
            <div class="card-body">
              <table id="publish" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Penulis</th>
                    <th>Tag</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab">
          <div class="card">
            <div class="card-body">
              <table id="pending" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Penulis</th>
                    <th>Tag</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-draft" role="tabpanel" aria-labelledby="pills-draft-tab">
          <div class="card">
            <div class="card-body">
              <table id="draft" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>ID_Kat</th>
                    <th>Kategori</th>
                    <th>ID_Pen</th>
                    <th>Penulis</th>
                    <th>ID_Tag</th>
                    <th>Tag</th>
                    <th>ID_Stat</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Bootstrap Modal Edit Status -->
<div class="modal" id="editStatusModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form for editing status -->
        <form id="editStatusForm">
          <div class="form-group" id="statusSelect">
          </div>
          <div class="form-group">
            <label for="statusSelect">Select New Status:</label>
            <select class="form-control" name="newStatus" id="newStatus">
              <?php foreach ($status as $stat): ?>
              <option value="<?php echo $stat->ID_Status ?>">
                <?php echo $stat->Nama_Status ?>
              </option>
              <?php endforeach;?>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="save_stat">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Draft -->
<div class="modal" id="editDraftModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Berita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form for editing draft -->
        <form id="editDraftForm" action="<?php echo base_url('articles/update'); ?>" method="POST">
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control">
          </div>
          <div class="form-group">
            <label for="konten">Konten</label>
            <textarea class="summernote" name="kontenSm" id="kontenSm" rows="3"><textarea>
          </div>
          <div class="form-group">
            <label for="kat">Kategori</label>
            <select class="custom-select" name="kat" id="kat">
              <option id="optK" value=""></option>
            </select>
          </div>
          <div class="form-group">
            <label for="stat">Status</label>
            <select class="custom-select" name="stat" id="stat">
              <?php foreach ($status as $st): ?>
              <option id="optS" value="<?php echo $st->ID_Status ?>">
                <?php echo $st->Nama_Status ?>
              </option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="form-group">
            <label for="tAg">Tag</label>
            <select class="custom-select" name="tAg" id="tAg">
              <option value="" id="optT"></option>
            </select>
          </div>
          <div class="mt-4">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary" id="save_stat">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('dist/_partials/footer');?>