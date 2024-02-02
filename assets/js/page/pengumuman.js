function cek(id, row) {
  if ($("#halaman" + id).prop("checked")) {
    $(".halaman" + id).text("Aktif");
    $("#halaman" + id).val(1);
  } else {
    $(".halaman" + id).text("Non-Aktif");
    $("#halaman" + id).val(0);
  }

  $.ajax({
    type: "post",
    url: "http://localhost/mis_dm/master/u_pengumuman",
    data: { id: row, stat: $("#halaman" + id).val() },
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
  $("#peng").DataTable({
    ajax: {
      url: "http://localhost/mis_dm/master/pengumuman",
      type: "GET",
      dataSrc: "",
    },
    columns: [
      { data: "Judul_Pengumuman", className: "align-middle" },
      { data: "Kategori_Pengumuman", className: "align-middle" },
      { data: "Tanggal_Mulai", className: "align-middle" },
      { data: "Tanggal_Selesai", className: "align-middle" },
      { data: "Isi_Pengumuman", className: "align-middle" },
      {
        data: "Status_Pengumuman",
        className: "align-middle",
        render: function (data, type, row, meta) {
          return (
            '<div class="custom-control custom-switch">' +
            '<input type="checkbox" name="activation" value="' +
            data +
            '" class="custom-control-input" id="customSwitch' +
            meta.row +
            '"' +
            (data == "Aktif" ? "checked" : "") +
            '> <label class="custom-control-label switch' +
            meta.row +
            '" for="customSwitch' +
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
        className: "align-middle",
        render: function (data, type, row, meta) {
          return (
            '<div class="custom-control custom-switch">' +
            '<input type="checkbox" name="activation" value="' +
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
        className: "align-middle",
        render: function (data, type, row, meta) {
          return (
            '<div class="custom-control custom-switch">' +
            '<input onchange="cek(' +
            meta.row +
            "," +
            data.ID_Pengumuman +
            ')" type="checkbox" name="activation" value="' +
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
        className: "align-middle",
        render: function (data) {
          return '<a href="'+ data +'" class="preview-link" data-src="' + data + '">'+ data +'</a>'
        },
      },
    ],
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
});
