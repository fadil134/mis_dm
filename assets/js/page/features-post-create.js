"use strict";

$("#tag").select2();
$("#summernote").summernote({
  height: 500, // Set the initial height of the editor
  minHeight: null, // Set minimum height to null for full-page mode
  maxHeight: 800, // Set maximum height to null for full-page mode
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
    ["view", ["fullscreen", "codeview"]],
  ],
  fullscreen: false,
  //tabsize: 1, // Enable full-screen mode
});