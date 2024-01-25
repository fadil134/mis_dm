const tableKategori = $("#kategoriT").DataTable({
  responsive: true,
  ajax: {
    url: "http://localhost/mis_dm/master/master_kategori",
    type: "GET",
    dataSrc: "",
  },
  columns: [
    { data: "ID_Kategori" },
    { data: "Nama_Kategori" },
    {
      data: null,
      render: function (data, type, row) {
        return '<div class="btn-group-sm" role="group" aria-label="button"><button type="button" class="edit-btn btn btn-primary"><i class="fas fa-edit fa-sm fa-fw"></i></button><button type="button" class="hapus-btn btn btn-danger"><i class="fas fa-trash fa-sm fa-fw"></i></button></div>';
      },
    },
  ],
});

//$('.dataTables_wrapper').addClass('mx-auto');

$("#kategoriT tbody").on("click", "button.edit-btn", function () {
  let kategori = tableKategori.row($(this).parents("tr")).data();
  $("#editKategori").data("kategoriID", kategori.ID_Kategori);
  $("#editKategori").modal("show");
  $("#helpIdkategori").text(kategori.Nama_Kategori);
  $("#idKategori").val(kategori.ID_Kategori);
  //console.log(kategori);
});

$("#trunc").on("click", function () {
  truncateTabel();
});

function truncateTabel() {
  $.ajax({
    url: "http://localhost/mis_dm/master/trunc_kategori/",
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

$("#kategoriT tbody").on("click", "button.hapus-btn", function () {
  let kategori = tableKategori.row($(this).parents("tr")).data();
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
          hapusKategori(kategori.ID_Kategori);

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

function hapusKategori(idKategori) {
  $.ajax({
    url: "http://localhost/mis_dm/master/hapus_kategori/",
    type: "POST",
    data: { id: idKategori },
    dataType: "json",
    success: function (response) {
      if (response.status === "success") {
        iziToast.success({
          title: "Success",
          message: response.message,
          position: "topRight",
        });
        tableKategori.ajax.reload();
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
        message: "Terjadi kesalahan saat menghapus kategori.",
        position: "topRight",
      });
    },
  });
}
