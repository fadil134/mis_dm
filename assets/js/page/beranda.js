"use strict";

var table;
var tableEk;
function deleteRow(id, rowIndex) {
  iziToast.show({
    theme: "dark",
    icon: "fa fa-question-circle",
    title: "Konfirmasi",
    message: "Anda yakin ingin menghapus data?",
    position: "center",
    progressBarColor: "rgb(0, 255, 184)",
    buttons: [
      [
        "<button><b>Ya</b></button>",
        function (instance, toast) {
          // Aksi yang diambil jika tombol "Ya" diklik
          instance.hide({ transitionOut: "fadeOut" }, toast, "button");
          // Panggil fungsi untuk menghapus data dari database
          $.ajax({
            type: "POST",
            url: "http://localhost/mis_dm/Kmberanda/delete_ssirih",
            data: { id: id },
            dataType: "json",
            success: function (response) {
              if (response.success) {
                iziToast.success({
                  title: "Success",
                  message: response.success,
                  position: "topRight",
                });

                // If successful, remove the row from DataTable
                table.row(rowIndex).remove().draw(false);
              } else if (response.error) {
                iziToast.error({
                  title: "Error",
                  message: response.error,
                  position: "topRight",
                });
              }
            },
          });
        },
      ],
      [
        "<button>Tidak</button>",
        function (instance, toast) {
          // Aksi yang diambil jika tombol "Tidak" diklik
          instance.hide({ transitionOut: "fadeOut" }, toast, "button");
        },
      ],
    ],
  });
}

function editRow(id) {
  $("#ss tbody").on("click", "button", function () {
    let row = table.row($(this).parents("tr")).index();

    let data = table.row($(this).parents("tr"));
    $("#myvid").attr("src", data.data().url_video);
    $("#myimage").attr("src", data.data().url);
    $("#ssmodal").summernote("code", data.data().description);
    $("videoex").val(data.data().url_video);
    $("#gambarex").val(data.data().url);
    $("#videoexname").val(data.data().video);
    $("#gambarexname").val(data.data().video);
  });
  $("#editss").modal("show");
  $("#ids").val(id);
  /*
  $.ajax({
    type: "post",
    url: "url",
    data: "data",
    dataType: "dataType",
    success: function (response) {},
  });
  */
}

function deleteRowEk(id, rowIndex) {
  iziToast.show({
    theme: "dark",
    icon: "fa fa-question-circle",
    title: "Konfirmasi",
    message: "Anda yakin ingin menghapus data?",
    position: "center",
    progressBarColor: "rgb(0, 255, 184)",
    buttons: [
      [
        "<button><b>Ya</b></button>",
        function (instance, toast) {
          // Aksi yang diambil jika tombol "Ya" diklik
          instance.hide({ transitionOut: "fadeOut" }, toast, "button");
          // Panggil fungsi untuk menghapus data dari database
          $.ajax({
            type: "POST",
            url: "http://localhost/mis_dm/Kmberanda/delete_ssirih",
            data: { id: id },
            dataType: "json",
            success: function (response) {
              if (response.success) {
                iziToast.success({
                  title: "Success",
                  message: response.success,
                  position: "topRight",
                });

                // If successful, remove the row from DataTable
                table.row(rowIndex).remove().draw(false);
              } else if (response.error) {
                iziToast.error({
                  title: "Error",
                  message: response.error,
                  position: "topRight",
                });
              }
            },
          });
        },
      ],
      [
        "<button>Tidak</button>",
        function (instance, toast) {
          // Aksi yang diambil jika tombol "Tidak" diklik
          instance.hide({ transitionOut: "fadeOut" }, toast, "button");
        },
      ],
    ],
  });
}

function editRowEk(id) {
  $("#ek tbody").on("click", "button", function () {
    let row = tableEk.row($(this).parents("tr")).index();

    let dat = tableEk.row($(this).parents("tr")).data();
    console.log(dat.filename);
    $("#editeks").on("hidden.bs.modal", function () {
      $("#eksed").val(null).trigger("change");
    });
    let option = new Option(dat.filename, dat.filename, true, true);
    $("#eksed").append(option).trigger("change");
    $(".input-group-text").empty().append(dat.filename);
  });

  $("#editeks").modal("show");
  $("#ids").val(id);
  /*
  $.ajax({
    type: "post",
    url: "url",
    data: "data",
    dataType: "dataType",
    success: function (response) {},
  });
  */
}

function prev() {
  var fileUrl = $("#vid").val();
  var file = $("#vid_url").val();

  if (fileUrl === "") {
    var parts = file.split("/");
    var filenvideo = parts[parts.length - 1];
    var fileType = getFileType(file);
    $("#filevideo").empty();

    var previewElement;

    if (fileType === "video") {
      previewElement = $("<video controls class='w-100'>").attr("src", file);
    } else {
      previewElement = $("<p class='text-danger'>").text(
        "Unsupported file type"
      );
    }

    $("#filevideo").append(previewElement);
  } else {
    var parts = fileUrl.split("/");
    var filenvideo = parts[parts.length - 1];
    var fileType = getFileType(fileUrl);
    $("#filePrev").empty();

    var previewElement;

    if (fileType === "video") {
      previewElement = $("<video controls class='w-100'>").attr("src", fileUrl);
    } else {
      previewElement = $("<p class='text-danger'>").text(
        "Unsupported file type"
      );
    }

    $("#filePrev").append(previewElement);
  }

  $("#fileV").val(filenvideo);
  $("#fileV").on("change", function () {
    let inputValue = $(this).val();
    let extension = filenvideo.split(".").pop();

    if (extension !== "" && !inputValue.endsWith(extension)) {
      $(this).val(inputValue + "." + extension);
    }
  });

  if ($("#vid_url").val() === "") {
    $("#ss_vd").prop("disabled", false);
  } else {
    $("#ss_vd").prop("disabled", true);
  }
}

function previewFile() {
  var fileUrl = $("#gambar").val();
  var file = $("#img_url").val();

  if (fileUrl === "") {
    $("#fileimG").empty();

    var parts = file.split("/");
    var filengambar = parts[parts.length - 1];

    var fileType = getFileType(file);
    var previewElement;

    if (fileType === "image") {
      previewElement = $("<img class='img-fluid'>").attr("src", file);
    } else {
      previewElement = $("<p class='text-danger'>").text(
        "Unsupported file type"
      );
    }

    $("#fileimG").append(previewElement);
  } else {
    $("#filePreview").empty();

    var parts = fileUrl.split("/");
    var filengambar = parts[parts.length - 1];

    var fileType = getFileType(fileUrl);
    var previewElement;

    if (fileType === "image") {
      previewElement = $("<img class='img-fluid'>").attr("src", fileUrl);
    } else {
      previewElement = $("<p class='text-danger'>").text(
        "Unsupported file type"
      );
    }

    $("#filePreview").append(previewElement);
  }

  $("#imG_url").val(filengambar);
  $("#imG_url").on("change", function () {
    let inputValue = $(this).val();
    let extension = filenvideo.split(".").pop();

    if (extension !== "" && !inputValue.endsWith(extension)) {
      $(this).val(inputValue + "." + extension);
    }
  });

  if ($("#imG_url").val() === "") {
    $("#ss_bg").prop("disabled", false);
  } else {
    $("#ss_bg").prop("disabled", true);
  }
}

function getFileType(url) {
  var fileType;

  if (url.match(/\.(jpeg|jpg|gif|png)$/)) {
    fileType = "image";
  } else if (url.match(/\.(mp4|webm|ogg)$/)) {
    fileType = "video";
  } else {
    fileType = "other";
  }

  return fileType;
}

$("#editss").on("hidden.bs.modal", function () {
  $("#filePreview, #filePrev").empty();
  $("#fileV, #fileG, .form-control").val("");
});

$(document).ready(function () {
  /** Datatable */

  table = $("#ss").DataTable({
    fixedColumns: {
      left: "1",
      right: "1",
    },
    scrollX: true,
    ajax: {
      url: "http://localhost/mis_dm/Kmberanda",
      type: "GET",
      dataSrc: "", // Kosongkan untuk mengambil seluruh objek sebagai data
    },
    columns: [
      {
        data: null,
        render: function (data, type, row, meta) {
          // Mengambil nomor urut baris dan menetapkan sebagai ID
          return meta.row + 1;
        },
      },
      { data: "id", visible: false },
      {
        data: "description",
        width: "20%",
      },
      {
        data: "url",
        render: function (data) {
          return '<img src="' + data + '" class="img-fluid" alt="...">';
        },
      },
      {
        data: "url_video",
        render: function (data) {
          return (
            '<div class="embed-responsive embed-responsive-21by9">' +
            '<iframe class="embed-responsive-item" src="' +
            data +
            '"></iframe>' +
            "</div>"
          );
        },
      },
      {
        data: "is_active",
        render: function (data, type, row, meta) {
          return (
            '<div class="custom-control custom-switch">' +
            '<input type="checkbox" name="activation" value="' +
            data +
            '" class="custom-control-input" id="customSwitch' +
            meta.row +
            '"' +
            (data == 1 ? "checked" : "") +
            '> <label class="custom-control-label switch' +
            meta.row +
            '" for="customSwitch' +
            meta.row +
            '">' +
            (data == 1 ? "Aktif" : "Non-Aktif") +
            "</label>" +
            "</div>"
          );
        },
      },
      {
        data: "id",
        render: function (data, type, row, meta) {
          var rowIndex = table.row($(row).closest("tr")).index();
          return (
            '<button type="button" class="btn btn-sm btn-danger mr-2" onclick="deleteRow(' +
            data +
            ", " +
            meta.row +
            ')"><i class="fa fa-trash"></i></button>' +
            '<button type="button" class="btn btn-sm btn-primary" onclick="editRow(' +
            data +
            ')"><i class="fas fa-edit"></i></button>'
          );
        },
      },
    ],
    createdRow: function (row, data, dataIndex) {
      // Menetapkan ID pada elemen tr (baris) berdasarkan nomor urut
      $(row).attr("id", "row_" + (dataIndex + 1));
    },
    drawCallback: function (settings) {
      //update();
      $('input[name="activation"]').on("change", function () {
        $('input[name="activation"]').not(this).prop("checked", false);
      });
    },
  });

  $("#ss tbody").on("change", 'input[name="activation"]', function () {
    var isChecked = $(this).prop("checked");
    var $parentDiv = $(this).closest(".custom-switch");
    let row = table.row($(this).parents("tr")).index();

    // Toggle the label and set the value based on the checkbox state
    $parentDiv.find(".switch" + row).text(isChecked ? "Aktif" : "Non-Aktif");
    $parentDiv.find("#customSwitch" + row).val(isChecked ? 1 : 0);

    let is_activated = $("#customSwitch" + row).val();
    let id = table.row($(this).parents("tr")).data().id;
    $.ajax({
      type: "post",
      url: "http://localhost/mis_dm/kmberanda/update_ssirih",
      data: { switch: is_activated, id: id },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          iziToast.success({
            title: "Success",
            message: response.success,
            position: "topRight",
          });
        } else if (response.error) {
          iziToast.error({
            title: "Error",
            message: response.error,
            position: "topRight",
          });
        }
      },
      error: function () {
        iziToast.error({
          title: "Error",
          message: "Failed to communicate with the server.",
          position: "topRight",
        });
      },
    });
  });

  tableEk = $("#ek").DataTable({
    fixedColumns: {
      left: "1",
      right: "1",
    },
    scrollX: true,
    ajax: {
      url: "http://localhost/mis_dm/Kmberanda/ekskul",
      type: "GET",
      dataSrc: "",
    },
    columns: [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        },
      },
      { data: "id", visible: false },
      {
        data: "description",
        width: "100px",
      },
      {
        data: "filename",
        width: "100px",
      },
      {
        data: "is_active",
        render: function (data, type, row, meta) {
          return (
            '<div class="custom-control custom-switch">' +
            '<input type="checkbox" name="aktivasi" value="' +
            data +
            '" class="custom-control-input" id="customSw' +
            meta.row +
            '"' +
            (data == 1 ? "checked" : "") +
            '> <label class="custom-control-label switch' +
            meta.row +
            '" for="customSw' +
            meta.row +
            '">' +
            (data == 1 ? "Aktif" : "Non-Aktif") +
            "</label>" +
            "</div>"
          );
        },
      },
      {
        data: "id",
        render: function (data, type, row, meta) {
          var rowIndex = table.row($(row).closest("tr")).index();
          return (
            '<button type="button" class="btn btn-sm btn-danger mr-2" onclick="deleteRowEk(' +
            data +
            ", " +
            meta.row +
            ')"><i class="fa fa-trash"></i></button>' +
            '<button type="button" class="btn btn-sm btn-primary" onclick="editRowEk(' +
            data +
            ')"><i class="fas fa-edit"></i></button>'
          );
        },
      },
    ],
    createdRow: function (row, data, dataIndex) {
      // Menetapkan ID pada elemen tr (baris) berdasarkan nomor urut
      $(row).attr("id", "row_" + (dataIndex + 1));
    },
    /*
    drawCallback: function (settings) {
      //update();
      $('input[name="activation"]').on("change", function () {
        $('input[name="activation"]').not(this).prop("checked", false);
      });
    },
    */
  });

  $("#ek tbody").on("change", 'input[name="aktivasi"]', function () {
    var isChecked = $(this).prop("checked");
    var $parentDiv = $(this).closest(".custom-switch");
    let row = tableEk.row($(this).parents("tr")).index();

    // Toggle the label and set the value based on the checkbox state
    $parentDiv.find(".switch" + row).text(isChecked ? "Aktif" : "Non-Aktif");
    $parentDiv.find("#customSw" + row).val(isChecked ? 1 : 0);

    let is_activated = $("#customSw" + row).val();
    let id = tableEk.row($(this).parents("tr")).data().id;
    console.log(id);
    console.log(tableEk.row($(this).parents("tr")).data());
    $.ajax({
      type: "post",
      url: "http://localhost/mis_dm/kmberanda/u_eks",
      data: { suit: is_activated, id: id },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          iziToast.success({
            title: "Success",
            message: response.success,
            position: "topRight",
          });
        } else if (response.error) {
          iziToast.error({
            title: "Error",
            message: response.error,
            position: "topRight",
          });
        }
      },
      error: function () {
        iziToast.error({
          title: "Error",
          message: "Failed to communicate with the server.",
          position: "topRight",
        });
      },
    });
  });

  /** summernote */

  $("#summernote,#ssmodal,#deskripsi").summernote({
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

  function cek(isFullscreen) {
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
  }

  $("button.btn-fullscreen").on("click", function () {
    var summernote = $("#summernote").summernote("fullscreen.isFullscreen");
    cek(summernote);
  });

  /** custom */
  let vaL;
  let texT;
  $("#icon").on("change", function () {
    vaL = $(this).find(":selected").val();
    texT = $(this).find(":selected").text();
    let preview;
    if (vaL == "material-symbols-rounded") {
      preview = `<i class="${vaL}" style="font-size: 2rem; color: cornflowerblue;">${texT}</i>`;
    } else {
      preview = `<i class="${vaL}" style="font-size: 2rem; color: cornflowerblue;"></i>`;
    }

    $("#iconS").empty();
    $("#iconS").append(preview);

    $("#iconEk").empty();

    $("#iconEk").text(preview).val(preview);
  });

  $("#icon, #eksed").select2();
});
