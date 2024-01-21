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
            <?php echo validation_errors(); ?>
            <?php echo form_open('articles/save_article', array(
    'id' => 'berita',
)); ?>
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
                  <select name="tag" id="tag" multiple="multiple" class="custom-select">
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
            <?php echo form_close(); ?>
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
  <div class="modal-dialog" role="document">
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
            <textarea class="form-control summernote" name="konten" id="konten" rows="10"></textarea>
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
<script>

  function editStatus(berita_id) {
    // Make an AJAX request to fetch the current status options from the server
    $.ajax({
      url: "<?=base_url('articles/get_status');?>",
      type: 'POST',
      dataType: 'json',
      data: { berita_id: berita_id },
      success: function (response) {
        if (response.success) {

          // Populate the status dropdown with the fetched options
          var statusSelect = $('#statusSelect');
          statusSelect.empty(); // Clear existing options

          // Set the berita_id as a data attribute for the modal
          $('#editStatusModal').data('berita_id', berita_id);
          var statusSelect = $('#statusSelect');
          $.each(response.statusOptions, function (index, option) {
            // Replace 'Status_ID' and 'Nama_Status' with your actual keys
            statusSelect.append('<label for="exist">Existing Status</label>' +
              '<input class="form-control" type="text" id="exist" readonly placeholder="' + option.Nama_Status + '">');
          });

          /*
          // Iterate over the statusOptions array and append options to the dropdown

          */

          // Show the Bootstrap modal
          $('#editStatusModal').modal('show');
        } else {
          alert('Failed to fetch status options');
        }
      },
      error: function () {
        alert('Error in the AJAX request');
      }
    });
  }

  Dropzone.autoDiscover = false;
  $(document).ready(function () {
    var namaFile;
    const myDropzone = new Dropzone("#myDropzone", {
      paramName: "file",
      maxFilesize: 2, // MB
      acceptedFiles: "image/*",
      autoProcessQueue: false, // Disable automatic processing
      url: "<?=base_url('articles/upload_image');?>", // Specify the upload URL directly
      previewTemplate: '<div class="dz-preview dz-file-preview"><div class="dz-image"><img data-dz-thumbnail /></div><div class="dz-details"><div class="dz-size"><span data-dz-size></span></div><div class="dz-filename"><span data-dz-name></span></div></div><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div><div class="dz-error-message"><span data-dz-errormessage></span></div><div class="dz-success-mark"><svg width="54" height="54" viewBox="0 0 54 54" fill="white" xmlns="http://www.w3.org/2000/svg"><path d="M10.2071 29.7929L14.2929 25.7071C14.6834 25.3166 15.3166 25.3166 15.7071 25.7071L21.2929 31.2929C21.6834 31.6834 22.3166 31.6834 22.7071 31.2929L38.2929 15.7071C38.6834 15.3166 39.3166 15.3166 39.7071 15.7071L43.7929 19.7929C44.1834 20.1834 44.1834 20.8166 43.7929 21.2071L22.7071 42.2929C22.3166 42.6834 21.6834 42.6834 21.2929 42.2929L10.2071 31.2071C9.81658 30.8166 9.81658 30.1834 10.2071 29.7929Z"/></svg></div><div class="dz-error-mark"><svg width="54" height="54" viewBox="0 0 54 54" fill="white" xmlns="http://www.w3.org/2000/svg"><path d="M26.2929 20.2929L19.2071 13.2071C18.8166 12.8166 18.1834 12.8166 17.7929 13.2071L13.2071 17.7929C12.8166 18.1834 12.8166 18.8166 13.2071 19.2071L20.2929 26.2929C20.6834 26.6834 20.6834 27.3166 20.2929 27.7071L13.2071 34.7929C12.8166 35.1834 12.8166 35.8166 13.2071 36.2071L17.7929 40.7929C18.1834 41.1834 18.8166 41.1834 19.2071 40.7929L26.2929 33.7071C26.6834 33.3166 27.3166 33.3166 27.7071 33.7071L34.7929 40.7929C35.1834 41.1834 35.8166 41.1834 36.2071 40.7929L40.7929 36.2071C41.1834 35.8166 41.1834 35.1834 40.7929 34.7929L33.7071 27.7071C33.3166 27.3166 33.3166 26.6834 33.7071 26.2929L40.7929 19.2071C41.1834 18.8166 41.1834 18.1834 40.7929 17.7929L36.2071 13.2071C35.8166 12.8166 35.1834 12.8166 34.7929 13.2071L27.7071 20.2929C27.3166 20.6834 26.6834 20.6834 26.2929 20.2929Z"/></svg></div></div>',
      addRemoveLinks: true,
      dictRemoveFile: "Hapus Gambar",

      init: function () {
        this.on("success", function (file, response) {
          console.log(response);
        });

        this.on("addedfile", function (file) {
          namaFile = file.name;
        });

        this.on("complete", function () {
          // Tandai bahwa Dropzone telah selesai memproses file
          myDropzone.removeAllFiles(true);
        });
      },
    });


    // Manually start the upload when the button is clicked using jQuery
    $("#submitBtn").on("click", function (e) {
      e.preventDefault();
      myDropzone.processQueue();

      var formData = $('#berita').serialize() + "&namaFile=" + namaFile;
      $.ajax({
        url: "<?=base_url('articles/save_article');?>",
        type: 'POST',
        dataType: 'json',
        data: formData,
        success: function (response) {
          if (response.status === 'success') {
            iziToast.success({
              title: 'Success',
              message: response.message,
              position: 'topRight'
            });
          } else {
            if (response.validation_errors) {
              var errorsArray = response.validation_errors.split('\n');

              // Display each error using IziToast
              errorsArray.forEach(function (errorMessage) {
                if (errorMessage.trim() !== '') {
                  iziToast.error({
                    title: 'Error',
                    message: errorMessage,
                    position: 'topRight'
                  });
                }
              });
            } else {
              iziToast.error({
                title: 'Error',
                message: 'Failed to create article',
                position: 'topRight'
              });
            }
          }
        },
      });
      location.reload(true);
    });

    $('#save_stat').click(function (e) {
      e.preventDefault();
      var beritaId = $('#editStatusModal').data('berita_id');
      var newStatus = $('#newStatus').val();
      // Make an AJAX request to save the changes
      $.ajax({
        url: "<?=base_url('articles/save_stat');?>",
        type: 'POST',
        data: { berita_id: beritaId, new_status: newStatus },
        dataType: 'json',
        success: function (response) {
          if (response.success) {
            alert('Status updated successfully');
            
            location.reload(true);
          } else {
            alert('Failed to update status');
          }
          
          $('#editStatusModal').modal('hide');
        },
        error: function () {
          alert('Error in the AJAX request');
          $('#editStatusModal').modal('hide');
        }
      });
    });

    $('.nav-link').click(function () {
      // Remove 'badge-primary' class from all badges
      $('.nav-link .badge').removeClass('badge-primary');
      // Add 'badge-primary' class to the clicked link's badge
      $(this).find('.badge').addClass('badge-primary');
    });

    var tableA = $('#all').DataTable({
      responsive: true,
      ajax: {
        url: "<?=base_url('articles/article');?>",
        type: 'GET',
        dataSrc: ''
      },
      columns: [
        { data: 'ID_Berita' },
        { data: 'Judul_Berita' },
        { data: 'Isi_Berita' },
        { data: 'Nama_Penulis' },
        { data: 'Nama_Tag' },
        {
          data: null,
          render: function (data, type, row) {
            return '<button class="btn btn-primary btn-sm edit-button">Edit</button>';
          }
        }
      ],
    });

    $('#all tbody').on('click', 'button', function () {
      var berita_id = tableA.row($(this).parents('tr')).data().ID_Berita;
      editStatus(berita_id);
    });

    var tableD = $('#draft').DataTable({
      responsive: true,
      ajax: {
        url: "<?=base_url('articles/draft');?>",
        type: 'GET',
        dataSrc: ''
      },
      columns: [
        { data: 'ID_Berita' },
        { data: 'Judul_Berita' },
        { data: 'Isi_Berita' },
        { data: 'ID_Kategori' },
        { data: 'Nama_Kategori' },
        { data: 'ID_Penulis' },
        { data: 'Nama_Penulis' },
        { data: 'ID_Tag' },
        { data: 'Nama_Tag' },
        { data: 'ID_Status' },
        { data: 'Nama_Status' },
        {
          data: null,
          render: function (data, type, row) {
            return '<button class="btn btn-primary btn-sm edit-button">Edit</button>';
          }
        }
      ],
    });

    tableD.columns([3, 4, 5, 7, 8, 9]).visible(false)


    $('#draft tbody').on('click', 'button', function () {

      var berita_id = tableD.row($(this).parents('tr')).data();
      var hiddenInput = '<input id="inp" type="hidden" name="id" value="' + berita_id.ID_Berita + '">';
      var kat = $('<option>', {
        id: 'OK',
        text: berita_id.Nama_Kategori,
        value: berita_id.ID_Kategori,
        selected: true,
        class: 'bg-warning text white',
      });

      var stat = $('<option>', {
        id: 'OS',
        text: berita_id.Nama_Status,
        value: berita_id.ID_Status,
        selected: true,
        class: 'bg-warning text white',
      });

      var tag = $('<option>', {
        id: 'OT',
        text: berita_id.Nama_Tag,
        value: berita_id.ID_Tag,
        selected: true,
        class: 'bg-warning text white',
      });

      $('#editDraftModal').data('berita_id', berita_id.ID_Berita);
      $('#editDraftModal').modal('show');
      $('#judul').val(berita_id.Judul_Berita);
      $('div.note-editable').append(berita_id.Isi_Berita);
      $('#optK').before(kat);
      $('#optS').before(stat);
      $('#optT').before(tag);
      $('#judul').before(hiddenInput);
      /*
      $.ajax({
        type: "POST",
        url: "<?=base_url('articles/get_draft')?>",
        data: { berita_id: berita_id.ID_Berita },
        dataType: 'json',
        success: function (response) {

        }
      });
      */
    });

    $('#editDraftModal').on('hidden.bs.modal', function () {
      $('#OS,#OT,#OK,#inp').remove();
    });

    var tableP = $('#pending').DataTable({
      responsive: true,
      ajax: {
        url: "<?=base_url('articles/pending');?>",
        type: 'GET',
        dataSrc: ''
      },
      columns: [
        { data: 'Judul_Berita' },
        { data: 'Isi_Berita' },
        { data: 'Nama_Penulis' },
        { data: 'Nama_Tag' },
      ],
    });

    var tablePu = $('#publish').DataTable({
      responsive: true,
      ajax: {
        url: "<?=base_url('articles/publish');?>",
        type: 'GET',
        dataSrc: ''
      },
      columns: [
        { data: 'Judul_Berita' },
        { data: 'Isi_Berita' },
        { data: 'Nama_Penulis' },
        { data: 'Nama_Tag' },
      ],
    });
  });
</script>