"use strict";

$(document).ready(function () {
  /** Datatable */

  var table = $("#ss").DataTable({
    responsive: true,
    ajax: {
      url: "http://localhost/mis_dm/Kmberanda",
      dataSrc: "", // Kosongkan untuk mengambil seluruh objek sebagai data
    },
    columns: [
      { data: "description" },
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
            '"'+ (data == 1 ? "checked" : "") +'> <label class="custom-control-label switch' +
            meta.row +
            '" for="customSwitch' +
            meta.row +
            '">'+ (data == 1 ? "Aktif" : "Non-Aktif") +'</label>' +
            "</div>"
          );
        },
      },
      {
        data: null,
        render: function (data, type, row) {
          return (
            '<button class="btn btn-sm btn-danger mr-2" onclick="deleteRow(' +
            row.id +
            ')"><i class="fa fa-trash"></i></button>' +
            '<button class="btn btn-sm btn-primary" onclick="editRow(' +
            row.id +
            ')"><i class="fas fa-edit"></i></button>'
          );
        },
      },
    ],
    drawCallback: function (settings) {
      update();
    },
  });

  function update() {
    $("#ss tbody").on("change", 'input[name="activation"]', function () {
      var isChecked = $(this).prop("checked");
      var $parentDiv = $(this).closest(".custom-switch");
      let row = table.row($(this).parents("tr")).index();

      // Toggle the label and set the value based on the checkbox state
      $parentDiv
        .find(".switch" + row)
        .text(isChecked ? "Aktif" : "Non-Aktif");
      $parentDiv.find("#customSwitch" + row).val(isChecked ? 1 : 0);
    });
    /*
    $("#ss tbody").on("click", 'input[name="activation"]', function () {
      var active = table.row($(this).parents("tr")).data();
      let row = table.row($(this).parents("tr")).index();
      if (active.is_active === "0") {
        $("#customSwitch" + row).val(1);
        $(".switch" + row).text("Aktif");
      } else {
        if (active.is_active === "1") {
          $("#customSwitch" + row).val(0);
          $(".switch" + row).text("Non_Aktif");
        }
      }
    });
    */
  }
  /** summernote */

  $("#summernote").summernote({
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

  /**
   * 
   *  
  function cek(isFullscreen) {
    if (isFullscreen) {
      $("nav.navbar.navbar-expand-lg.main-navbar").css({
        "z-index": "auto", // Perbaikan sintaks
      });

      $("body.sidebar-mini .main-sidebar::after").css({
        "z-index": "auto",
      });

      $("body.sidebar-mini .main-sidebar::after").css({
        "z-index": "auto",
      });

      $("div.main-sidebar").css({
        "z-index": "auto",
      });
    } else {
      
      $("nav.navbar.navbar-expand-lg.main-navbar").css({
        "z-index": 890,
      });

      $("body.sidebar-mini .main-sidebar::after").css({
        "z-index": -1,
      });

      $("div.main-sidebar").css({
        "z-index": 880,
      });
    }
  }
   */

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
  function swit() {
    $("td > div.custom-control-input").change(function () {
      // Uncheck all switches
      $(".custom-control-input").prop("checked", false);
      // Check the clicked switch
      $(this).prop("checked", true);
      check(this);
    });
  }

  var thi;
  check(thi);
  function check(thi) {
    thi = $("td > div.custom-control-input");
    $("td > div.custom-control-input").each(function (index, element) {
      // Memeriksa apakah elemen tidak dicentang
      if (!$(element).prop("checked")) {
        // Mengatur teks dan nilai sesuai dengan status switch
        $(element).siblings(".custom-control-label").text("Non-Aktif");
        $(element).val("Non-Aktif");
      } else {
        $(element).siblings(".custom-control-label").text("Aktif");
        $(element).val("Aktif");
      }
    });
  }
});
