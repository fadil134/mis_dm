"use strict";

$("#tag").select2();
$(".summernote").summernote({
  height: 300, // Set the initial height of the editor
  minHeight: null, // Set minimum height to null for full-page mode
  maxHeight: 400, // Set maximum height to null for full-page mode
  focus: true, // Set focus to the editor on initialization
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
        url: 'http://localhost/mis_dm/server_processing/summ_upload',
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
  //tabsize: 1, // Enable full-screen mode
});
