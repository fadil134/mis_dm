"use strict";

var table;
var tableEk;
var inp;
var tipefile;
var file;
var tipefile_main;
var tipefile_modal;

$("#editss").on("hidden.bs.modal", function () {
  $("#filePreview, #filePrev").empty();
  $("#vidmss, #imgmss, #gambar, #vid, #video_modal,#vid_modal").val("");
});

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
  cekimgurl(fileurl);
  let split = fileurl.split("/");
  file = split[split.length - 1];
  let fileimg_main = $("#img_main").val();
  let fileimg_modal = $("#img_modal").val();
  tipefile_main = getFileType(fileimg_main);
  tipefile_modal = getFileType(fileimg_modal);
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
            url: base_url + "Kmberanda/delete_ssirih",
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

    let data = table.row($(this).parents("tr")).data();
    $("#myvid").attr("src", data[4]);
    $("#myimage").attr("src", data[3]);
    $("#ssmodal").summernote("code", data[2]);
    $("#vid_x_m").val(data[4]);
    $("#img_x_m").val(data[3]);
    $("#vid_x_m_n").val(data[7]);
    $("#img_x_m_n").val(data[8]);
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

function check(id, row) {
  if ($("#halaman" + id).prop("checked")) {
    $(".halaman" + id).text("Aktif");
    $("#halaman" + id).val(1);
  } else {
    $(".halaman" + id).text("Non-Aktif");
    $("#halaman" + id).val(0);
  }

  $.ajax({
    type: "post",
    url: base_url + "master/u_pengumuman",
    data: { id: row, statH: $("#halaman" + id).val() },
    dataType: "json",
    success: function (response) {
      if (response.success) {
        iziToast.success({
          title: "OK",
          message: response.success,
        });
      } else {
        iziToast.error({
          title: "Error",
          message: response.error,
        });
      }
      $("#peng").DataTable().ajax.reload();
    },
  });
  console.log("halaman" + id + " " + $("#halaman" + id).val());
}

$(document).ready(function () {
  /**
   * Datatable Pengumuman
   */

  let tab_p = $("#peng").DataTable({
    ajax: {
      url: base_url + "master/pengumuman",
      type: "GET",
      dataSrc: "",
      xhrFields: {
        withCredentials: true,
      },
    },
    columns: [
      { data: "Judul_Pengumuman" },
      { data: "Kategori_Pengumuman" },
      { data: "Tanggal_Mulai" },
      { data: "Tanggal_Selesai" },
      { data: "Isi_Pengumuman" },
      {
        data: "Status_Pengumuman",
        render: function (data, type, row, meta) {
          return (
            '<div class="custom-control custom-switch">' +
            '<input type="checkbox" name="act_stat" value="' +
            data +
            '" class="custom-control-input" id="switch_peng' +
            meta.row +
            '"' +
            (data == "Aktif" ? "checked" : "") +
            '> <label class="custom-control-label switch' +
            meta.row +
            '" for="switch_peng' +
            meta.row +
            '">' +
            (data == "Aktif" ? "Aktif" : "Non-Aktif") +
            "</label>" +
            "</div>"
          );
        },
      },
      {
        data: "Ditampilkan_di_Beranda",
        render: function (data, type, row, meta) {
          return (
            '<div class="custom-control custom-switch">' +
            '<input type="checkbox" name="active" value="' +
            data +
            '" class="custom-control-input" id="beranda' +
            meta.row +
            '"' +
            (data == 1 ? "checked" : "") +
            '> <label class="custom-control-label beranda' +
            meta.row +
            '" for="beranda' +
            meta.row +
            '">' +
            (data == 1 ? "Aktif" : "Non-Aktif") +
            "</label>" +
            "</div>"
          );
        },
      },
      {
        data: null,
        render: function (data, type, row, meta) {
          return (
            '<div class="custom-control custom-switch">' +
            '<input onchange="check(' +
            meta.row +
            "," +
            data.ID_Pengumuman +
            ')" type="checkbox" name="act" value="' +
            data.Ditampilkan_di_Halaman_Pengumuman +
            '" class="custom-control-input" id="halaman' +
            meta.row +
            '"' +
            (data.Ditampilkan_di_Halaman_Pengumuman == 1 ? "checked" : "") +
            '> <label class="custom-control-label halaman' +
            meta.row +
            '" for="halaman' +
            meta.row +
            '">' +
            (data.Ditampilkan_di_Halaman_Pengumuman == 1
              ? "Aktif"
              : "Non-Aktif") +
            "</label>" +
            "</div>"
          );
        },
      },
      {
        data: "Lampiran_Pengumuman",
        render: function (data) {
          return `<a href="${data}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Lampiran</a>`;
        },
      },
    ],
    columnDefs: [
      { targets: "_all", className: "dt-head-nowrap text-center align-middle" },
      { target: [1], className: "dt-body-justify" },
      //{ target: [4], className: "text-truncate" },
      { target: [4], className: "text-nowrap" },
      { target: [5], className: "text-nowrap" },
    ],
    fixedColumns: {
      left: 1,
      //right: 1
    },
    scrollX: true,
  });

  $("#peng tbody").on("click", 'input[name="act_stat"]', function () {
    let data = tab_p.row($(this).parents("tr")).data();
    let id = data.ID_Pengumuman;
    let rowI = tab_p.row($(this).parents("tr")).index();
    if ($("#switch_peng" + rowI).prop("checked")) {
      $("#switch_peng" + rowI).val("Aktif");
      $(".switch" + rowI).text("Aktif");
    } else {
      $("#switch_peng" + rowI).val("Nonaktif");
      $(".switch" + rowI).text("Non - Aktif");
    }

    $.ajax({
      type: "POST",
      url: base_url + "master/u_pengumuman",
      data: { id: id, statP: $("#switch_peng" + rowI).val() },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          iziToast.success({
            title: "OK",
            message: response.success,
          });
        } else {
          iziToast.error({
            title: "Error",
            message: response.error,
          });
        }
        $("#peng").DataTable().ajax.reload();
      },
    });
  });

  $("#peng tbody").on("click", 'input[name="active"]', function () {
    let data = tab_p.row($(this).parents("tr")).data();
    let id = data.ID_Pengumuman;
    let rowI = tab_p.row($(this).parents("tr")).index();
    if ($("#beranda" + rowI).prop("checked")) {
      $("#beranda" + rowI).val(1);
      $(".beranda" + rowI).text("Aktif");
    } else {
      $("#beranda" + rowI).val(0);
      $(".beranda" + rowI).text("Non - Aktif");
    }

    $.ajax({
      type: "POST",
      url: base_url + "master/u_pengumuman",
      data: { id: id, statB: $("#beranda" + rowI).val() },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          iziToast.success({
            title: "OK",
            message: response.success,
          });
        } else {
          iziToast.error({
            title: "Error",
            message: response.error,
          });
        }
        $("#peng").DataTable().ajax.reload();
      },
    });
  });

  /**
   * Datatable Sekapur Sirih
   */

  table = $("#ss").DataTable({
    fixedColumns: {
      left: "1",
      right: "1",
    },
    scrollX: true,
    columnDefs: [
      { targets: "_all", className: "align-middle dt-head-center" },
      { target: [1, 7, 8], visible: false },
      {
        target: [2],
        className: "text-wrap",
      },
      {
        target: [3],
        render: function (data) {
          return '<img src="' + data + '" class="img-fluid" alt="...">';
        },
      },
      {
        target: [4],
        render: function (data) {
          return `<div class="embed-responsive embed-responsive-21by9">
          <video class="embed-responsive-item" src="${data}" controls></video>
          </div>`;
        },
      },
      {
        target: [5],
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
        target: [6],
        render: function (data, type, row, meta) {
          return `<div class="btn-group" role="group" aria-label="">
              <button onclick="editRow(${data})" type="button" class="btn btn-primary">
                <i class="fas fa-edit"></i>
              </button>
              <button onclick="deleteRow(${data},${meta.row})" type="button" class="btn btn-danger">
                <i class="fas fa-trash"></i>
              </button>
            </div>`;
        },
      },
    ],
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

    let data = table.row($(this).parents("tr")).data();
    let is_activated = $("#customSwitch" + row).val();
    let id = data[1];
    $.ajax({
      type: "post",
      url: base_url + "kmberanda/update_ssirih",
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

  /**
   * Datatable Sekapur Sirih
   */

  tableEk = $("#ek").DataTable({
    columnDefs: [
      { targets: "_all", className: "align-middle dt-head-center" },
      { target: [0], visible: false },
      { target: [2], className: "text-truncate", width: "10px" },
      {
        target: [4],
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
    ],
    fixedColumns: {
      left: "1",
      right: "1",
    },
    scrollX: true,
  });

  $("#icon").css("width", "100%").select2();
  $("#ek tbody").on("click", ".edit_eks", function () {
    var data = tableEk.row($(this).parents("tr")).data();
    console.log(data);
    var ikon = data[3];
    var kelas = ikon !== "" ? $(ikon).attr("class") : null;
    var kelasarray = kelas !== null ? kelas.split("-") : null;
    var newtxt = kelasarray !== null ? kelasarray[kelasarray.length - 1] : null;
    var deskripsi = data[2];
    var txt = $(ikon).text();
    var option;
    var intip;

    $("#id_m_eks").val(data[0]);
    $("#eks_des").summernote("code", deskripsi);
    $("#title_eks").val(data[5]);
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

  $("#ek tbody").on("click", ".hapus_eks", function () {
    var data = tableEk.row($(this).parents("tr")).data();
    var row = tableEk.row($(this).parents("tr"));
    console.log(row);
    var id = data[0];
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
              url: base_url + "Kmberanda/delete_ssirih",
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
                  row.remove().draw();
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
  });

  $("#ek tbody").on("change", 'input[name="aktivasi"]', function () {
    var isChecked = $(this).prop("checked");
    var $parentDiv = $(this).closest(".custom-switch");
    let row = tableEk.row($(this).parents("tr")).index();

    // Toggle the label and set the value based on the checkbox state
    $parentDiv.find(".switch" + row).text(isChecked ? "Aktif" : "Non-Aktif");
    $parentDiv.find("#customSw" + row).val(isChecked ? 1 : 0);

    let is_activated = $("#customSw" + row).val();
    let data = tableEk.row($(this).parents("tr")).data();
    let id = data[0];
    console.log(id);
    console.log(tableEk.row($(this).parents("tr")).data());
    $.ajax({
      type: "post",
      url: base_url + "kmberanda/u_eks",
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
      preview = `<i class="${vaL}" style="font-size: 3rem; color: cornflowerblue;">${texT}</i>`;
    } else {
      preview = `<i class="${vaL}" style="font-size: 2rem; color: cornflowerblue;"></i>`;
    }

    $("#iconS").empty();
    $("#iconS").append(preview);

    $("#iconEk").empty();

    $("#iconEk").text(preview).val(preview);
  });

  $("#isiPengumuman").summernote({
    height: 100,
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

  $("#statPbtn").on("click", function () {
    if ($("#statP").text() == "Aktif") {
      $("#statP").text("Non Aktif");
      $("#statPbtn").val("Non Aktif");
    } else {
      $("#statP").text("Aktif");
      $("#statPbtn").val("Aktif");
    }
  });

  $("#statBbtn").on("click", function () {
    if ($("#statB").text() == "Aktif") {
      $("#statB").text("Non Aktif");
      $("#statBbtn").val(0);
    } else {
      $("#statB").text("Aktif");
      $("#statBbtn").val(1);
    }
  });

  $("#statHbtn").on("click", function () {
    if ($("#statH").text() == "Aktif") {
      $("#statH").text("Non Aktif");
      $("#statHbtn").val(0);
    } else {
      $("#statH").text("Aktif");
      $("#statHbtn").val(1);
    }
  });

  $("#kategoriPengumuman").select2({
    tags: true,
    tokenSeparators: [",", " "],
  });

  $("#video_main, #vid_modal").prop("disabled", true).val(null);
  $("#vid_main_url, #video_modal").on("change focus", function () {
    let ele = this.id;
    let url = $(this).val();
    let file_vid_array = url.split("/");
    let video = file_vid_array[file_vid_array.length - 1];
    let filevideo;
    let previewvid;
    $("#vid_main_preview ,#vid_modal_preview").empty();

    $.ajax({
      type: "HEAD",
      url: url,
      crossDomain: true,
      success: function () {
        if (ele.includes("main")) {
          filevideo = getFileType(video);
          $("#vid_main_preview").empty();
          if (filevideo === "video") {
            $("#video_main").prop("disabled", false);
            $("#video_main").val(video);
            previewvid = `<div class="embed-responsive embed-responsive-16by9"><video class="embed-responsive-item" src="${url}" controls></video></div>`;
            $("#vid_main_preview").append(previewvid);
            $("#ss_vd").prop("disabled", true);
          } else {
            $("#video_main").prop("disabled", true);
            $("#video_main").val(null);
            previewvid = `<p class="text-danger">Jenis file bukan video, mohon input ulang!</p>`;
            $("#vid_main_preview").append(previewvid);
            $("#ss_vd").prop("disabled", false);
          }
        } else {
          filevideo = getFileType(video);
          $("#vid_modal_preview").empty();
          if (filevideo === "video") {
            $("#vid_modal").prop("disabled", false);
            $("#vid_modal").val(video);
            previewvid = `<div class="embed-responsive embed-responsive-16by9"><video class="embed-responsive-item" src="${url}" controls></video></div>`;
            $("#vid_modal_preview").append(previewvid);
          } else {
            $("#vid_modal").prop("disabled", true);
            $("#vid_modal").val(null);
            previewvid = `<p class="text-danger">Jenis file bukan video, mohon input ulang!</p>`;
            $("#vid_modal_preview").append(previewvid);
          }
        }
      },
      error: function () {
        if (ele.includes("main")) {
          $("#video_main").prop("disabled", true);
          $("#video_main").val(null);
          previewvid = `<p class="text-danger">URL tidak valid, mohon di periksa untuk url</p>`;
          $("#vid_main_preview").append(previewvid);
          $("#ss_vd").prop("disabled", false);
        } else {
          $("#vid_modal").prop("disabled", true);
          $("#vid_modal").val(null);
          previewvid = `<p class="text-danger">URL tidak valid, mohon di periksa untuk url</p>`;
          $("#vid_modal_preview").append(previewvid);
        }
      },
    });
  });

  $("#image_main, #img_modal").prop("disabled", true).val(null);
  $("#img_main, #image_modal").on("change focus", function () {
    let ele = this.id;
    let url = $(this).val();
    let file_vid_array = url.split("/");
    let gambar = file_vid_array[file_vid_array.length - 1];
    let filegambar;
    let previewimg;
    $("#img_main_preview ,#img_modal_preview").empty();

    $.ajax({
      type: "HEAD",
      url: url,
      crossDomain: true,
      success: function () {
        if (ele.includes("main")) {
          filegambar = getFileType(gambar);
          $("#img_main_preview").empty();
          if (filegambar === "image") {
            $("#image_main").prop("disabled", false);
            $("#image_main").val(gambar);
            previewimg = `<img src="${url}" class="img-fluid rounded" alt="${gambar}">`;
            $("#img_main_preview").append(previewimg);
            $("#ss_bg").prop("disabled", true);
          } else {
            $("#image_main").prop("disabled", true);
            $("#image_main").val(null);
            previewimg = `<p class="text-danger">Jenis file bukan gambar, mohon input ulang!</p>`;
            $("#img_main_preview").append(previewimg);
            $("#ss_bg").prop("disabled", false);
          }
        } else {
          filegambar = getFileType(gambar);
          $("#img_modal_preview").empty();
          if (filegambar === "image") {
            $("#img_modal").prop("disabled", false);
            $("#img_modal").val(gambar);
            previewimg = `<img src="${url}" class="img-fluid rounded" alt="${gambar}">`;
            $("#img_modal_preview").append(previewimg);
          } else {
            $("#img_modal").prop("disabled", true);
            $("#img_modal").val(null);
            previewimg = `<p class="text-danger">Jenis file bukan gambar, mohon input ulang!</p>`;
            $("#img_modal_preview").append(previewimg);
          }
        }
      },
      error: function () {
        if (ele.includes("main")) {
          $("#image_main").prop("disabled", true);
          $("#image_main").val(null);
          previewimg = `<p class="text-danger">URL tidak valid, mohon di periksa untuk url</p>`;
          $("#img_main_preview").append(previewimg);
          $("#ss_bg").prop("disabled", false);
        } else {
          $("#img_modal").prop("disabled", true);
          $("#img_modal").val(null);
          previewimg = `<p class="text-danger">URL tidak valid, mohon di periksa untuk url</p>`;
          $("#img_modal_preview").append(previewimg);
        }
      },
    });
  });

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
});
