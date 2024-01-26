"use strict";
$(document).ready(function () {
  /** Datatable */
  $("#ss").dataTable();

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

  $("button[data-original-title='Full Screen']").on("click", function () {
    var summernote = $("#summernote").summernote("fullscreen.isFullscreen");
    cek(summernote);
  });

  /** custom */
  check(thi);
  $(".custom-control-input").change(function () {
    // Uncheck all switches
    $(".custom-control-input").prop("checked", false);
    // Check the clicked switch
    $(this).prop("checked", true);
    check(this);
  });

  var thi;
  function check(thi) {
    thi = $(".custom-control-input");
    $(".custom-control-input").each(function (index, element) {
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
