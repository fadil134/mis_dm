"use strict";

Dropzone.autoDiscover = false;
$(document).ready(function () {
  /** Summer Note */

  /*
  $("#kontenSm,#konten").summernote('fullscreen.isFullscreen');
  */
  $("#kontenSm,#konten").summernote({
    width: "100%",
    height: "100",
    minHeight: null,
    maxHeight: 200,
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
      ["fullscreen"],
    ],
    dialogsInBody: true,
    callbacks: {
      onImageUpload: function (files) {
        var formData = new FormData();
        formData.append("file", files[0]);

        $.ajax({
          url: base_url + "server_processing/summ_upload",
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

  function check(isFullscreen) {
    var screenWidth = $(window).width();

    if (screenWidth <= 600) {
      // Apply styles for small screens (adjust the threshold as needed)
      $("nav.navbar.navbar-expand-lg.main-navbar").css({
        "z-index": isFullscreen ? "auto" : 500,
      });

      $("body.sidebar-mini .main-sidebar::after").css({
        "z-index": isFullscreen ? "auto" : -1,
      });

      $("div.main-sidebar").css({
        "z-index": isFullscreen ? "auto" : 480,
      });
    } else {
      // Apply default styles for larger screens
      $("nav.navbar.navbar-expand-lg.main-navbar").css({
        "z-index": isFullscreen ? "auto" : 890,
      });

      $("body.sidebar-mini .main-sidebar::after").css({
        "z-index": isFullscreen ? "auto" : -1,
      });

      $("div.main-sidebar").css({
        "z-index": isFullscreen ? "auto" : 880,
      });
    }

    console.log(
      isFullscreen
        ? "Editor is in fullscreen mode"
        : "Editor is not in fullscreen mode"
    );
  }

  $("div.note-fullscreen").on("click", function () {
    var summernote = $("#kontenSm, #konten").summernote(
      "fullscreen.isFullscreen"
    );
    check(summernote);
  });

  /** Data Table */

  var tableA = $("#all").DataTable({
    ajax: {
      url: base_url + "articles/article",
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
    ajax: {
      url: base_url + "articles/draft",
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
    ajax: {
      url: base_url + "articles/pending",
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
    ajax: {
      url: base_url + "articles/publish",
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
      url: base_url + "articles/get_status",
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
    var berita = tableD.row($(this).parents("tr")).data();
    var namaTag = berita.Nama_Tag;
    var arrayTAG = [];
    if (namaTag !== null) {
      arrayTAG = namaTag.split(", ");
    }

    /*
    var data = {
      id : [1],[2],
      text : ['test 1'],['test 2']
    };
    console.log(data);
    var option = new Option(data.text, data.id, true, true);
    console.log(option);
    $('#tAg').append(option).trigger('change');
    */

    var hiddenInput =
      '<input id="inp" type="hidden" name="id" value="' +
      berita.ID_Berita +
      '">';

    var kat = $("<option>", {
      id: "OK",
      text: berita.Nama_Kategori,
      value: berita.ID_Kategori,
      selected: true,
      class: "bg-warning text white",
    });

    var stat = $("<option>", {
      id: "OS",
      text: berita.Nama_Status,
      value: berita.ID_Status,
      selected: true,
      class: "bg-warning text white",
    });

    var tag = [];
    for (let i = 0; i < arrayTAG.length; i++) {
      tag.push(
        $("<option>", {
          id: "OT",
          value: arrayTAG[i],
          text: arrayTAG[i],
          selected: true,
        })
      );
    }
    /*
    var tag = $("<option>", {
      id: "OT",
      text: berita.Nama_Tag,
      value: berita.ID_Tag,
      selected: true,
      class: "bg-warning text white",
    });
    */

    console.log(berita);
    $("#judul").val(berita.Judul_Berita);
    $("#optK").before(kat);
    $("#optS").before(stat);
    $("#optT").before(tag);
    $("#judul").before(hiddenInput);
    $("#kontenSm").summernote("code", berita.Isi_Berita);
    $("#editDraftModal").data("berita_id", berita.ID_Berita);
    $("#editDraftModal").modal("show");
  });

  tableD.columns([3, 4, 5, 7, 8, 9]).visible(false).responsive(true);

  /** Bootstrap Modal */

  $("#editDraftModal").on("hidden.bs.modal", function () {
    $("#kontenSm").empty();
    $("#OK,#OS,#OT,#inp").remove();
  });

  /** DropZone */

  var namaFile;
  const myDropzone = new Dropzone("#myDropzone", {
    paramName: "file",
    maxFilesize: 2, // MB
    acceptedFiles: "image/*",
    autoProcessQueue: false,
    url: base_url + "articles/upload_image",
    previewTemplate:
      '<div class="dz-preview dz-file-preview"><div class="dz-image"><img data-dz-thumbnail /></div><div class="dz-details"><div class="dz-size"><span data-dz-size></span></div><div class="dz-filename"><span data-dz-name></span></div></div><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div><div class="dz-error-message"><span data-dz-errormessage></span></div><div class="dz-success-mark"><svg width="54" height="54" viewBox="0 0 54 54" fill="white" xmlns="http://www.w3.org/2000/svg"><path d="M10.2071 29.7929L14.2929 25.7071C14.6834 25.3166 15.3166 25.3166 15.7071 25.7071L21.2929 31.2929C21.6834 31.6834 22.3166 31.6834 22.7071 31.2929L38.2929 15.7071C38.6834 15.3166 39.3166 15.3166 39.7071 15.7071L43.7929 19.7929C44.1834 20.1834 44.1834 20.8166 43.7929 21.2071L22.7071 42.2929C22.3166 42.6834 21.6834 42.6834 21.2929 42.2929L10.2071 31.2071C9.81658 30.8166 9.81658 30.1834 10.2071 29.7929Z"/></svg></div><div class="dz-error-mark"><svg width="54" height="54" viewBox="0 0 54 54" fill="white" xmlns="http://www.w3.org/2000/svg"><path d="M26.2929 20.2929L19.2071 13.2071C18.8166 12.8166 18.1834 12.8166 17.7929 13.2071L13.2071 17.7929C12.8166 18.1834 12.8166 18.8166 13.2071 19.2071L20.2929 26.2929C20.6834 26.6834 20.6834 27.3166 20.2929 27.7071L13.2071 34.7929C12.8166 35.1834 12.8166 35.8166 13.2071 36.2071L17.7929 40.7929C18.1834 41.1834 18.8166 41.1834 19.2071 40.7929L26.2929 33.7071C26.6834 33.3166 27.3166 33.3166 27.7071 33.7071L34.7929 40.7929C35.1834 41.1834 35.8166 41.1834 36.2071 40.7929L40.7929 36.2071C41.1834 35.8166 41.1834 35.1834 40.7929 34.7929L33.7071 27.7071C33.3166 27.3166 33.3166 26.6834 33.7071 26.2929L40.7929 19.2071C41.1834 18.8166 41.1834 18.1834 40.7929 17.7929L36.2071 13.2071C35.8166 12.8166 35.1834 12.8166 34.7929 13.2071L27.7071 20.2929C27.3166 20.6834 26.6834 20.6834 26.2929 20.2929Z"/></svg></div></div>',
    addRemoveLinks: true,
    dictRemoveFile: "Hapus Gambar",

    init: function () {
      this.on("success", function (file, response) {
        console.log(response);
      });

      this.on("addedfile", async function (file) {
        namaFile = file.name;
        var reader = new FileReader();

        reader.onload = function (e) {
          var image = $("<img>").attr("src", e.target.result);

          // Resize the image to a specific width and height
          var newWidth = 728; // Set your desired width
          var newHeight = 456; // Set your desired height

          image.width(newWidth);
          image.height(newHeight);

          // Append the resized image to the Dropzone preview
          $(file.previewElement).find(".dz-image").empty().append(image);
        };

        reader.readAsDataURL(file);
      });

      this.on("complete", function () {
        myDropzone.removeAllFiles(true);
      });
    },
  });

  /** Another Function */

  $("#tAg").css("width", "100%").select2();
  $("#tag")
    .css("width", "100%")
    .select2({
      tags: true,
      tokenSeparators: [",", " "],
    });
  /*
  $("#submitBtn").submit(function (e) {
    e.preventDefault();

    myDropzone.processQueue();

    // Assuming namaFile is defined and contains the expected value
    var formData = $("#berita").serialize() + "&namaFile=" + namaFile;

    $.ajax({
      url: base_url + "articles/save_article",
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
  */

  $("#submitBtn").on("click", function (e) {
    e.preventDefault();
    myDropzone.processQueue();

    var formData = $("#berita").serialize() + "&namaFile=" + namaFile;
    $.ajax({
      url: base_url + "articles/save_article",
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
    });
  });

  $("#save_stat").click(function (e) {
    e.preventDefault();
    var beritaId = $("#editStatusModal").data("berita_id");
    var newStatus = $("#newStatus").val();
    $.ajax({
      url: base_url + "articles/save_stat",
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
