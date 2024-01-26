$(document).ready(function () {
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

  $('#statPbtn').on('click', function () {
    if ($('#statP').text() == 'Aktif') {
        $('#statP').text('Non Aktif');
        $('#statPbtn').val('Non Aktif');
    } else {
        $('#statP').text('Aktif');
        $('#statPbtn').val('Aktif');
    }
  });

  $('#statBbtn').on('click', function () {
    if ($('#statB').text() == 'Aktif') {
        $('#statB').text('Non Aktif');
        $('#statBbtn').val(0);
    } else {
        $('#statB').text('Aktif');
        $('#statBbtn').val(1);
    }
  });

  $('#statHbtn').on('click', function () {
    if ($('#statH').text() == 'Aktif') {
        $('#statH').text('Non Aktif');
        $('#statHbtn').val(0);
    } else {
        $('#statH').text('Aktif');
        $('#statHbtn').val(1);
    }
  });

  $("#kategoriPengumuman").select2({
    tags: true,
    tokenSeparators: [',', ' ']
  });
});
