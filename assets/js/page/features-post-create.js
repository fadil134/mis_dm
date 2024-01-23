"use strict";

Dropzone.autoDiscover = false;
$(document).ready(function () {
  /** Data Table */

  var tableA = $("#all").DataTable({
    responsive: true,
    ajax: {
      url: "http://localhost/mis_dm/articles/article",
      type: "GET",
      dataSrc: "",
    },
    columns: [
      { data: "ID_Berita" },
      { data: "Judul_Berita" },
      { data: "Isi_Berita" },
      { data: "Nama_Penulis" },
      { data: "Nama_Tag" },
      {
        data: null,
        render: function (data, type, row) {
          return '<button class="btn btn-primary btn-sm edit-button">Edit</button>';
        },
      },
    ],
  });

  var tableD = $("#draft").DataTable({
    responsive: true,
    ajax: {
      url: "http://localhost/mis_dm/articles/draft",
      type: "GET",
      dataSrc: "",
    },
    columns: [
      { data: "ID_Berita" },
      { data: "Judul_Berita" },
      { data: "Isi_Berita" },
      { data: "ID_Kategori" },
      { data: "Nama_Kategori" },
      { data: "ID_Penulis" },
      { data: "Nama_Penulis" },
      { data: "ID_Tag" },
      { data: "Nama_Tag" },
      { data: "ID_Status" },
      { data: "Nama_Status" },
      {
        data: null,
        render: function (data, type, row) {
          return '<button class="btn btn-primary btn-sm edit-button">Edit</button>';
        },
      },
    ],
  });

  var tableP = $("#pending").DataTable({
    responsive: true,
    ajax: {
      url: "http://localhost/mis_dm/articles/pending",
      type: "GET",
      dataSrc: "",
    },
    columns: [
      { data: "Judul_Berita" },
      { data: "Isi_Berita" },
      { data: "Nama_Penulis" },
      { data: "Nama_Tag" },
    ],
  });

  var tablePu = $("#publish").DataTable({
    responsive: true,
    ajax: {
      url: "http://localhost/mis_dm/articles/publish",
      type: "GET",
      dataSrc: "",
    },
    columns: [
      { data: "Judul_Berita" },
      { data: "Isi_Berita" },
      { data: "Nama_Penulis" },
      { data: "Nama_Tag" },
    ],
  });

  $("#all tbody").on("click", "button", function () {
    var berita_id = tableA.row($(this).parents("tr")).data().ID_Berita;
    
    $.ajax({
      url: "http://localhost/mis_dm/articles/get_status",
      type: "POST",
      dataType: "json",
      data: { berita_id: berita_id },
      success: function (response) {
        if (response.success) {
          var statusSelect = $("#statusSelect");
          statusSelect.empty();

          $("#editStatusModal").data("berita_id", berita_id);
          var statusSelect = $("#statusSelect");
          $.each(response.statusOptions, function (index, option) {
            statusSelect.append(
              '<label for="exist">Existing Status</label>' +
                '<input class="form-control" type="text" id="exist" readonly placeholder="' +
                option.Nama_Status +
                '">'
            );
          });
          $("#editStatusModal").modal("show");
        } else {
          alert("Failed to fetch status options");
        }
      },
      error: function () {
        alert("Error in the AJAX request");
      },
    });
  });

  $("#draft tbody").on("click", "button", function () {
    var berita_id = tableD.row($(this).parents("tr")).data();
    /** console.log(berita_id); */
        
    //$('textarea#kontenSm').val(berita_id.Isi_Berita);
    $("#kontenSm").summernote({
      height: 300,
      minHeight: null,
      maxHeight: 400,
      focus: true,
      toolbar: [
        ["style", ["style"]],
        ["font", ["bold", "italic", "underline", "clear"]],
        ["fontname", ["fontname"]],
        ["fontsize", ["fontsize"]],
        ["color", ["color"]],
        ["para", ["ul", "ol", "paragraph"]],
        ["table", ["table"]],
        ["insert", ["link", "picture", "video"]],
      ],
      dialogsInBody: true,
      callbacks: {
        onImageUpload: function (files) {
          var formData = new FormData();
          formData.append("file", files[0]);
  
          $.ajax({
            url: "http://localhost/mis_dm/server_processing/summ_upload",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
              $(".summernote").summernote("insertImage", JSON.parse(data).url);
            },
            error: function (error) {
              console.error("Error uploading image:", error);
            },
          });
        },
      },
    });
    var hiddenInput = '<input id="inp" type="hidden" name="id" value="' + berita_id.ID_Berita + '">';

    var kat = $("<option>", {
      id: "OK",
      text: berita_id.Nama_Kategori,
      value: berita_id.ID_Kategori,
      selected: true,
      class: "bg-warning text white",
    });

    var stat = $("<option>", {
      id: "OS",
      text: berita_id.Nama_Status,
      value: berita_id.ID_Status,
      selected: true,
      class: "bg-warning text white",
    });

    var tag = $("<option>", {
      id: "OT",
      text: berita_id.Nama_Tag,
      value: berita_id.ID_Tag,
      selected: true,
      class: "bg-warning text white",
    });
    
    $("#editDraftModal").data("berita_id", berita_id.ID_Berita);
    $("#editDraftModal").modal("show");
    $("#judul").val(berita_id.Judul_Berita);
    $("#optK").before(kat);
    $("#optS").before(stat);
    $("#optT").before(tag);
    $("#judul").before(hiddenInput);
  });

  tableD.columns([3, 4, 5, 7, 8, 9]).visible(false);

  /** Bootstrap Modal */
  $("#editDraftModal").on("hidden.bs.modal", function () {
    $("#OS,#OT,#OK,#inp").remove();
    $('div.note-handle').empty();
  });

  /** Summer Note */
  
  //$('textarea#summernote.summernote').summernote();
  /** DropZone */
  var namaFile;
  const myDropzone = new Dropzone("#myDropzone", {
    paramName: "file",
    maxFilesize: 2, // MB
    acceptedFiles: "image/*",
    autoProcessQueue: false,
    url: "http://localhost/mis_dm/articles/upload_image",
    previewTemplate:
      '<div class="dz-preview dz-file-preview"><div class="dz-image"><img data-dz-thumbnail /></div><div class="dz-details"><div class="dz-size"><span data-dz-size></span></div><div class="dz-filename"><span data-dz-name></span></div></div><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div><div class="dz-error-message"><span data-dz-errormessage></span></div><div class="dz-success-mark"><svg width="54" height="54" viewBox="0 0 54 54" fill="white" xmlns="http://www.w3.org/2000/svg"><path d="M10.2071 29.7929L14.2929 25.7071C14.6834 25.3166 15.3166 25.3166 15.7071 25.7071L21.2929 31.2929C21.6834 31.6834 22.3166 31.6834 22.7071 31.2929L38.2929 15.7071C38.6834 15.3166 39.3166 15.3166 39.7071 15.7071L43.7929 19.7929C44.1834 20.1834 44.1834 20.8166 43.7929 21.2071L22.7071 42.2929C22.3166 42.6834 21.6834 42.6834 21.2929 42.2929L10.2071 31.2071C9.81658 30.8166 9.81658 30.1834 10.2071 29.7929Z"/></svg></div><div class="dz-error-mark"><svg width="54" height="54" viewBox="0 0 54 54" fill="white" xmlns="http://www.w3.org/2000/svg"><path d="M26.2929 20.2929L19.2071 13.2071C18.8166 12.8166 18.1834 12.8166 17.7929 13.2071L13.2071 17.7929C12.8166 18.1834 12.8166 18.8166 13.2071 19.2071L20.2929 26.2929C20.6834 26.6834 20.6834 27.3166 20.2929 27.7071L13.2071 34.7929C12.8166 35.1834 12.8166 35.8166 13.2071 36.2071L17.7929 40.7929C18.1834 41.1834 18.8166 41.1834 19.2071 40.7929L26.2929 33.7071C26.6834 33.3166 27.3166 33.3166 27.7071 33.7071L34.7929 40.7929C35.1834 41.1834 35.8166 41.1834 36.2071 40.7929L40.7929 36.2071C41.1834 35.8166 41.1834 35.1834 40.7929 34.7929L33.7071 27.7071C33.3166 27.3166 33.3166 26.6834 33.7071 26.2929L40.7929 19.2071C41.1834 18.8166 41.1834 18.1834 40.7929 17.7929L36.2071 13.2071C35.8166 12.8166 35.1834 12.8166 34.7929 13.2071L27.7071 20.2929C27.3166 20.6834 26.6834 20.6834 26.2929 20.2929Z"/></svg></div></div>',
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
        myDropzone.removeAllFiles(true);
      });
    },
  });

  /** Another Function */

  $("#tag").select2();
  $("#submitBtn").submit(function (e) {
    e.preventDefault();

    myDropzone.processQueue();

    // Assuming namaFile is defined and contains the expected value
    var formData = $("#berita").serialize() + "&namaFile=" + namaFile;

    $.ajax({
      url: "http://localhost/mis_dm/articles/save_article",
      type: "POST",
      dataType: "json",
      data: formData,
      success: function (response) {
        if (response.status === "success") {
          iziToast.success({
            title: "Success",
            message: response.message,
            position: "topRight",
          });

          // Reload the page only on successful response
          location.reload(true);
        } else {
          if (response.validation_errors) {
            var errorsArray = response.validation_errors.split("\n");

            errorsArray.forEach(function (errorMessage) {
              if (errorMessage.trim() !== "") {
                iziToast.error({
                  title: "Error",
                  message: errorMessage,
                  position: "topRight",
                });
              }
            });
          } else {
            iziToast.error({
              title: "Error",
              message: "Failed to create article",
              position: "topRight",
            });
          }
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        // Handle the case when the AJAX request encounters an error
        iziToast.error({
          title: "Error",
          message: "AJAX request failed",
          position: "topRight",
        });
      },
    });
  });

  /*
  $("#submitBtn").on("click", function (e) {
    e.preventDefault();
    myDropzone.processQueue();

    var formData = $("#berita").serialize() + "&namaFile=" + namaFile;
    $.ajax({
      url: "http://localhost/mis_dm/articles/save_article",
      type: "POST",
      dataType: "json",
      data: formData,
      success: function (response) {
        if (response.status === "success") {
          iziToast.success({
            title: "Success",
            message: response.message,
            position: "topRight",
          });
        } else {
          if (response.validation_errors) {
            var errorsArray = response.validation_errors.split("\n");

            errorsArray.forEach(function (errorMessage) {
              if (errorMessage.trim() !== "") {
                iziToast.error({
                  title: "Error",
                  message: errorMessage,
                  position: "topRight",
                });
              }
            });
          } else {
            iziToast.error({
              title: "Error",
              message: "Failed to create article",
              position: "topRight",
            });
          }
        }
      },
    });
    location.reload(true);
  });
  */
  $("#save_stat").click(function (e) {
    e.preventDefault();
    var beritaId = $("#editStatusModal").data("berita_id");
    var newStatus = $("#newStatus").val();
    $.ajax({
      url: "http://localhost/mis_dm/articles/save_stat",
      type: "POST",
      data: { berita_id: beritaId, new_status: newStatus },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert("Status updated successfully");

          location.reload(true);
        } else {
          alert("Failed to update status");
        }

        $("#editStatusModal").modal("hide");
      },
      error: function () {
        alert("Error in the AJAX request");
        $("#editStatusModal").modal("hide");
      },
    });
  });

  $(".nav-link").click(function () {
    $(".nav-link .badge").removeClass("badge-primary");
    $(this).find(".badge").addClass("badge-primary");
  });
});
