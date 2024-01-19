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
            <div class="card-body">
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="title">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="kategori">
                    <?php foreach ($kategori as $kat): ?>
                    <option value="<?=$kat->ID_Kategori?>"><?=$kat->Nama_Kategori?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                <div class="col-sm-12 col-md-7">
                  <div id="summernote"></div>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                <div class="col-sm-12 col-md-7">
                  <div id="myDropzone" class="dropzone"></div>
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
                  <select class="form-control selectric" name="status">
                    <?php foreach ($status as $stat): ?>
                    <option value="<?php echo $stat->ID_Status ?>">
                      <?php echo $stat->Nama_Status ?>
                    </option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button id="submitBtn" class="btn btn-primary">Create Post</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
                    <th>Tanggal Publikasi</th>
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
                    <th>Tanggal Publikasi</th>
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
                    <th>Tanggal Publikasi</th>
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
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Tanggal Publikasi</th>
                    <th>Penulis</th>
                    <th>Tag</th>
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
<!-- Bootstrap Modal -->
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save_stat">Save Changes</button>
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
            console.log(option);
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

  $(document).ready(function () {

    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone("#myDropzone", {
      url: "<?= base_url('articles/upload'); ?>",
      maxFilesize: 5,
      addRemoveLinks: true,
      acceptedFiles: 'image/*',
      clickable: true,
      previewsContainer: '#myDropzone',
      autoProcessQueue: true, // Set to true if you want to automatically process the queue
      thumbnailWidth: 120,
      thumbnailHeight: 120,
    });

    myDropzone.on('addedfile', function (file) {
      // Display the file name in the preview
      var previewTemplate = document.querySelector('#myDropzone .dz-preview:last-child');
      previewTemplate.querySelector('.dz-filename span').innerHTML = file.name;
    });

    // Handle submit button click event
    $('#submitBtn').on('click', function () {
      // Process the files and trigger upload manually
      myDropzone.processQueue();
    });

    $('#save_stat').click(function (e) {
      e.preventDefault();
      var beritaId = $('#editStatusModal').data('berita_id');
      var newStatus = $('#newStatus').val();
      console.log(newStatus);
      // Make an AJAX request to save the changes
      $.ajax({
        url: "<?= base_url('articles/save_stat'); ?>",
        type: 'POST',
        data: { berita_id: beritaId, new_status: newStatus },
        dataType: 'json',
        success: function (response) {
          if (response.success) {
            alert('Status updated successfully');
            // You may want to update the DataTable or take other actions
            tableA.ajax.reload(); // Assuming "tableP" is your DataTable variable
          } else {
            alert('Failed to update status');
          }
          // Close the Bootstrap modal
          $('#editStatusModal').modal('hide');
        },
        error: function () {
          alert('Error in the AJAX request');
          // Close the Bootstrap modal in case of an error
          $('#editStatusModal').modal('hide');
        }
      });
    });

    // Handle file upload success event
    myDropzone.on('success', function (file, response) {
      console.log('File uploaded successfully:', response);
    });


    $('.nav-link').click(function () {
      // Remove 'badge-primary' class from all badges
      $('.nav-link .badge').removeClass('badge-primary');
      // Add 'badge-primary' class to the clicked link's badge
      $(this).find('.badge').addClass('badge-primary');
    });

    var tableA = $('#all').DataTable({
      ajax: {
        url: "<?=base_url('articles');?>",
        type: 'GET',
        dataSrc: ''
      },
      columns: [
        { data: 'ID_Berita' },
        { data: 'Judul_Berita' },
        { data: 'Isi_Berita' },
        { data: 'Tanggal_Publikasi' },
        { data: 'Nama_Penulis' },
        { data: 'Nama_Tag' },
        {
          data: null,
          render: function (data, type, row) {
            return '<button class="btn btn-primary btn-sm edit-button" onclick="editStatus(' + row.ID_Berita + ')">Edit</button>';
          }
        }
      ],
    });

    $('#all tbody').on('click', 'button', function () {
      // Extract the beritaId from the row data attribute
      var berita_id = tableA.row($(this).parents('tr')).data().ID_Berita;
      // Call the editStatus function with the extracted berita_id
      editStatus(berita_id);
      //console.log(berita_id);
    });

    var tableD = $('#draft').DataTable({
      ajax: {
        url: "<?=base_url('articles/draft');?>",
        type: 'GET',
        dataSrc: ''
      },
      columns: [
        { data: 'Judul_Berita' },
        { data: 'Isi_Berita' },
        { data: 'Tanggal_Publikasi' },
        { data: 'Nama_Penulis' },
        { data: 'Nama_Tag' },
      ],
    });

    var tableP = $('#pending').DataTable({
      ajax: {
        url: "<?=base_url('articles/pending');?>",
        type: 'GET',
        dataSrc: ''
      },
      columns: [
        { data: 'Judul_Berita' },
        { data: 'Isi_Berita' },
        { data: 'Tanggal_Publikasi' },
        { data: 'Nama_Penulis' },
        { data: 'Nama_Tag' },
      ],
    });

    var tablePu = $('#publish').DataTable({
      ajax: {
        url: "<?=base_url('articles/publish');?>",
        type: 'GET',
        dataSrc: ''
      },
      columns: [
        { data: 'Judul_Berita' },
        { data: 'Isi_Berita' },
        { data: 'Tanggal_Publikasi' },
        { data: 'Nama_Penulis' },
        { data: 'Nama_Tag' },
      ],
    });
  });
</script>