"use strict";

var table;
var tableEk;
var inp;
var tipefile;
var file;

function cekvidurl(fileurl) {
  $.ajax({
    type: "HEAD",
    url: fileurl,
    success: function () {
      if (
        inp.includes("main") &&
        tipefile === "video" &&
        $("#vid_main_url").val() !== ""
      ) {
        $("#vid_main_preview").empty();
        let preview = `<video controls class="img-fluid" id="videoPreview"><source src="${fileurl}" type="video/mp4">Your browser does not support the video tag.</video>`;
        $("#video_main").val(file).prop("disabled", false);
        $("#vid_main_preview").append(preview);
      } else {
        $("#vid_main_preview").empty();
        let preview = `<p class="text-danger">Jenis file harus berupa video!</p>`;
        $("#video_main").val("").prop("disabled", true);
        $("#vid_main_preview").append(preview);
      }
      if (
        inp.includes("modal") &&
        tipefile === "video" &&
        $("#video_modal").val() !== ""
      ) {
        $("#vid_modal_preview").empty();
        let preview = `<video controls class="img-fluid" id="videoPreview"><source src="${fileurl}" type="video/mp4">Your browser does not support the video tag.</video>`;
        $("#vid_modal").val(file).prop("disabled", false);
        $("#vid_modal_preview").append(preview);
      } else {
        $("#vid_modal_preview").empty();
        let preview = `<p class="text-danger">Jenis file harus berupa video!</p>`;
        $("#vid_modal").val("").prop("disabled", true);
        $("#vid_modal_preview").append(preview);
      }
    },
    error: function () {
      if (
        inp.includes("main") &&
        tipefile === "video" &&
        $("#vid_main_url").val() !== ""
      ) {
        $("#vid_main_preview").empty();
        let preview = `<p class="text-danger">URL file tidak valid, tidak ada data yang berkaitan dengan url ini!!</p>`;
        console.log(preview);
        $("#video_main").val("").prop("disabled", true);
        $("#vid_main_preview").append(preview);
      } else if (
        inp.includes("modal") &&
        tipefile === "video" &&
        $("#video_modal").val() !== ""
      ) {
        $("#vid_modal_preview").empty();
        let preview = `<p class="text-danger">URL file tidak valid, tidak ada data yang berkaitan dengan url ini!!</p>`;
        $("#vid_modal").val("").prop("disabled", true);
        $("#vid_modal_preview").append(preview);
      }
    },
  });
}

function cekimgurl(fileurl) {
  $.ajax({
    type: "HEAD",
    url: fileurl,
    success: function () {
      if (
        inp.includes("main") &&
        tipefile === "image" &&
        $("#img_main").val() !== ""
      ) {
        $("#img_main_preview").empty();
        let preview = `<img src="${fileurl}" class="img-fluid" alt="${file}">`;
        $("#image_main").val(file).prop("disabled", false);
        $("#img_main_preview").append(preview);
      } else {
        $("#img_main_preview").empty();
        let preview = `<p class="text-danger">Jenis file harus berupa gambar!</p>`;
        $("#image_main").val("").prop("disabled", true);
        $("#img_main_preview").append(preview);
      }
      if (
        inp.includes("modal") &&
        tipefile === "image" &&
        $("#image_modal").val() !== ""
      ) {
        $("#img_modal_preview").empty();
        let preview = `<img src="${fileurl}" class="img-fluid" alt="${file}">`;
        $("#img_modal").val(file).prop("disabled", false);
        $("#img_modal_preview").append(preview);
      } else {
        $("#img_modal_preview").empty();
        let preview = `<p class="text-danger">Jenis file harus berupa gambar!</p>`;
        $("#img_modal").val("").prop("disabled", true);
        $("#img_modal_preview").append(preview);
      }
    },
    error: function () {
      if (
        inp.includes("main") &&
        tipefile === "image" &&
        $("#img_main").val() !== ""
      ) {
        $("#img_main_preview").empty();
        let preview = `<p class="text-danger">URL file tidak valid, tidak ada data yang berkaitan dengan url ini!!</p>`;
        $("#image_main").val("").prop("disabled", true);
        $("#img_main_preview").append(preview);
      } else if (
        inp.includes("modal") &&
        tipefile === "image" &&
        $("#image_modal").val() !== ""
      ) {
        $("#img_modal_preview").empty();
        let preview = `<p class="text-danger">URL file tidak valid, tidak ada data yang berkaitan dengan url ini!!</p>`;
        $("#img_modal").val("").prop("disabled", true);
        $("#img_modal_preview").append(preview);
      }
    },
  });
}

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
    $("#vid_x_m").val(data.data().url_video);
    $("#img_x_m").val(data.data().url);
    $("#vid_x_m_n").val(data.data().video);
    $("#img_x_m_n").val(data.data().filename);
  });
  $("#img_modal_preview").empty();
  $("#img_modal").val("").prop("disabled", false);
  $("#vid_modal_preview").empty();
  $("#vid_modal").val("").prop("disabled", false);
  $("#editss").modal("show");
  $("#idss").val(id);
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

function previewVid(input) {
  inp = input.id;
  let fileurl = $("#" + inp).val();
  let split = fileurl.split("/");
  file = split[split.length - 1];
  tipefile = getFileType(file);
  cekvidurl(fileurl);

  $("#ss_vd").prop("disabled", $("#vid_main_url").val() !== "");
}

function previewImg(input) {
  inp = input.id;
  let fileurl = $("#" + inp).val();
  let split = fileurl.split("/");
  file = split[split.length - 1];
  tipefile = getFileType(file);
  cekimgurl(fileurl);
  $("#ss_bg").prop("disabled", $("#img_main").val() !== "");
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
  $("#vidmss, #imgmss, #gambar, #vid").val("");
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
        className: "align-middle dt-head-center",
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        },
      },
      { className: "align-middle dt-head-center", data: "id", visible: false },
      {
        className: "align-middle dt-head-center text-wrap",
        data: "description",
        width: "100px",
      },
      { className: "align-middle dt-head-center", data: "filename", width: "100px" },
      {
        className: "align-middle dt-head-center",
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
        className: "align-middle dt-head-center",
        data: "id",
        render: function (data, type, row, meta) {
          return `<div class="btn-group" role="group" aria-label="">
          <button type="button" class="btn btn btn-danger" onclick="deleteRowEk(${
            (data, meta.row)
          })"><i class="fa fa-trash"></i></button>
          <button type="button" class="btn btn-primary edit_eks"><i class="fa fa-edit"></i></button>
          </div>`;
        },
      },
    ],
    createdRow: function (row, data, dataIndex) {
      $(row).attr("id", "row_" + (dataIndex + 1));
    },
  });

  $("#icon").css("width", "100%").select2();
  $("#ek tbody").on("click", ".edit_eks", function () {
    var data = tableEk.row($(this).parents("tr")).data();
    var ikon = data.filename;
    var kelas = $(ikon).attr("class");
    var kelasarray = kelas.split("-");
    var newtxt = kelasarray[kelasarray.length - 1];
    var deskripsi = data.description;
    var txt = $(ikon).text();
    var option;
    var intip;

    $("#id_m_eks").val(data.id);
    $("#eks_des").summernote("code",deskripsi);
    $("#title_eks").val(data.title);
    $("#eksed")
      .css("width", "100%")
      .select2({
        dropdownParent: $("#editeks"),
      });

    $("#eksed").on("select2:select", function (e) {
      var data = e.params.data;
      console.log(data);
      var iconclass = data.id;
      var icontext = data.text;
      if (iconclass == "material-symbols-rounded") {
        intip = `<i class="${iconclass}" style="font-size: 3rem; color: cornflowerblue;">${icontext}</i>`;
        $("#ikonpreview").empty();
        $("#ikonpreview").append(intip);
      } else {
        intip = `<i class="${iconclass}" style="font-size: 2rem; color: cornflowerblue;"></i>`;
        $("#ikonpreview").empty();
        $("#ikonpreview").append(intip);
        $("#icon_modal").val(intip);
      }
    });

    if ($("#eksed").find("option[value='" + kelas + "']").length) {
      $("#eksed").val(kelas).trigger("change");
    } else {
      if (txt == "") {
        option = new Option(newtxt, kelas, true, true);
      } else {
        option = new Option(txt, kelas, true, true);
      }
      $("#eksed").val(null).trigger("change");
      $("#eksed").append(option).trigger("change");
    }
    $("#ikonpreview").empty();
    $("#editeks").modal("show");
    $("#ikonpreview").append(ikon);
    $("#icon_modal").val(ikon);
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
});
