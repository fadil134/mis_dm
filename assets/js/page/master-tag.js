const tableTag = $("#tagT").DataTable({
  responsive: true,
  ajax: {
    url: "http://localhost/mis_dm/master/master_tag",
    type: "GET",
    dataSrc: "",
  },

  columns: [
    { data: "id" },
    { data: "Nama_Tag" },
    {
      data: null,
      render: function (data, type, row) {
        return '<div class="btn-group-sm" role="group" aria-label="button"><button type="button" class="edit-btn btn btn-primary"><i class="fas fa-edit fa-sm fa-fw"></i></button><button type="button" class="hapus-btn btn btn-danger"><i class="fas fa-trash fa-sm fa-fw"></i></button></div>';
      },
    },
  ],
});

//$('.dataTables_wrapper').addClass('mx-auto');

$("#tagT tbody").on("click", "button.edit-btn", function () {
  let tag = tableTag.row($(this).parents("tr")).data();
  $("#editTag").data("tagID", tag.ID_Tag);
  $("#editTag").modal("show");
  $("#helpIdtag").text(tag.Nama_Tag);
  $("#idTag").val(tag.id);
  //console.log(tag);
});

$("#trunc").on("click", function () {
  truncateTabel();
});

function truncateTabel() {
  $.ajax({
    url: "http://localhost/mis_dm/master/trunc_tag/",
    type: "GET", // Ubah sesuai dengan metode yang Anda gunakan di controller
    dataType: "json",
    success: function (response) {
      // Menampilkan pesan dengan iziToast berdasarkan respons dari server
      if (response.status === "Success") {
        iziToast.success({
          title: "Success",
          message: response.message,
          position: "topRight",
        });
      } else {
        iziToast.error({
          title: "Error",
          message: response.message,
          position: "topRight",
        });
      }
    },
    error: function (xhr, status, error) {
      console.error("Terjadi kesalahan:", error);
      iziToast.error({
        title: "Error",
        message: "Terjadi kesalahan saat menghubungi server.",
        position: "topRight",
      });
    },
  });
}

$("#tagT tbody").on("click", "button.hapus-btn", function () {
  let tag = tableTag.row($(this).parents("tr")).data();
  console.log(tag);
  iziToast.question({
    timeout: false,
    overlay: true,
    displayMode: "once",
    id: "question",
    zindex: 999,
    title: "Konfirmasi",
    message: "Apakah Anda yakin ingin menghapus?",
    position: "center",
    buttons: [
      [
        "<button><b>Ya</b></button>",
        function (instance, toast) {
          hapusTag(tag.id);

          instance.hide({ transitionOut: "fadeOut" }, toast, "button");
        },
      ],
      [
        "<button>Tidak</button>",
        function (instance, toast) {
          instance.hide({ transitionOut: "fadeOut" }, toast, "button");
        },
      ],
    ],
  });
});

function hapusTag(idTag) {
  $.ajax({
    url: "http://localhost/mis_dm/master/hapus_tag/",
    type: "POST",
    data: { id: idTag },
    dataType: "json",
    success: function (response) {
      if (response.status === "success") {
        iziToast.success({
          title: "Success",
          message: response.message,
          position: "topRight",
        });
        tableTag.ajax.reload();
      } else {
        iziToast.error({
          title: "Error",
          message: response.message,
          position: "topRight",
        });
      }
    },
    error: function (xhr, status, error) {
      iziToast.error({
        title: "Error",
        message: "Terjadi kesalahan saat menghapus tag.",
        position: "topRight",
      });
    },
  });
}
