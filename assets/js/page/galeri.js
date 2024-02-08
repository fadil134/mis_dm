$(document).ready(function () {
  bsCustomFileInput.init();
  $("#reset_bg, #reset_kegiatan").on("click", function () {
    let id = this.id;
    if (id.includes("bg")) {
      $('label[for="bg_galeri"]')
        .empty()
        .text("Klik di sini untuk memilih file");
      $("#bg_galeri").val(null);
    } else {
      $('label[for="galeri_kegiatan"]')
        .empty()
        .text("Klik di sini untuk memilih file");
      $("#galeri_kegiatan").val(null);
    }
  });

  $("#galeri_tabel").DataTable({
    columnDefs: [
      {
        target: [3],
        render: function (data) {
          return `<a href="${base_url}${data}" class="glightbox" data-glightbox="gallery"><img class="img-fluid" src="${base_url}${data}" alt="Image 1"></a>`;
        },
      },
      {
        target: [4],
        visible: false,
      },
      {
        data: null,
        target: [5],
        className: "text-nowrap",
        render: function (data) {
          return `<div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input check" value="${
              data[4]
            }" id="customSwitch${data[0]}" ${data[4] === "0" ? "" : "checked"}>
            <label class="custom-control-label" for="customSwitch${data[0]}">${
            data[4] === "0" ? "Non-Aktif" : "Aktif"
          }</label>
          </div>`;
        },
      },
      {
        target: [6],
        visible: false,
      },
      { targets: "_all", className: "align-middle dt-head-center" },
    ],
  });

  $("#galeri_tabel").on("change", ".check", function () {
    let id = this.id;
    if ($("#" + id).prop("checked")) {
      $("#" + id).val(1);
      $("label[for=" + id + "]").text("Aktif");
    } else {
      $("#" + id).val(0);
      $("label[for=" + id + "]").text("Non-Aktif");
    }
    let data = $("#galeri_tabel").DataTable().row($(this).parents("tr")).data();
    console.log(data);
    $.ajax({
      type: "POST",
      url: base_url + "kmgaleri/u_galeri",
      data: { ID: data[6], stat: $("#" + id).val() },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          iziToast.success({
            title: "OK",
            message: response.pesan,
          });
        } else {
          iziToast.warning({
            title: "Warning",
            message: response.pesan,
          });
        }
      },
      error: function () {
        iziToast.error({
          title: "Error",
          message: 'Error update galeri, mohon hubungi admin!',
        });
      }
    });
  });

  const lightbox = GLightbox({
    selector: ".glightbox",
  });
});
