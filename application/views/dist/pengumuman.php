<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Informasi Pengumuman</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Pengumuman</h2>
      <div class="card">
        <div class="card-header">
          <h4>Form Pengumuman</h4>
        </div>
        <div class="card-header-action">
        </div>
        <div class="card-body">
          <form method="post" id="pengumumanForm" class="form-group" action="<?=base_url();?>master/s_pengumuman"
            enctype="multipart/form-data">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="judulPengumuman">Judul Pengumuman:</label>
                  <input type="text" class="form-control" id="judulPengumuman" name="judulPengumuman" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kategoriPengumuman">Kategori Pengumuman:</label>
                  <select class="form-control custom-select" id="kategoriPengumuman" name="kategoriPengumuman" required>
                    <!-- Opsi akan ditambahkan secara dinamis oleh Select2 -->
                  </select>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tanggalMulai">Tanggal Mulai:</label>
                  <input type="date" class="form-control" id="tanggalMulai" name="tanggalMulai" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tanggalSelesai">Tanggal Selesai:</label>
                  <input type="date" class="form-control" id="tanggalSelesai" name="tanggalSelesai" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="isiPengumuman">Isi Pengumuman:</label>
              <textarea class="summernote" id="isiPengumuman" name="isiPengumuman" required></textarea>
            </div>

            <div class="form-group">
              <label>Status Pengumuman :</label>
              <div class="custom-control custom-switch">
                <input name="status" type="checkbox" class="custom-control-input" id="statPbtn" value="0">
                <label class="custom-control-label" for="statPbtn" id="statP">Non Aktif</label>
              </div>
            </div>

            <div class="form-group">
              <label>Tampilkan Beranda :</label>
              <div class="custom-control custom-switch">
                <input name="beranda" type="checkbox" class="custom-control-input" id="statBbtn" value="0">
                <label class="custom-control-label" for="statBbtn" id="statB">Non Aktif</label>
              </div>
            </div>

            <div class="form-group">
              <label>Tampilkan Halaman Pengumuman :</label>
              <div class="custom-control custom-switch">
                <input name="halaman" type="checkbox" class="custom-control-input" id="statHbtn" value="0">
                <label class="custom-control-label" for="statHbtn" id="statH">Non Aktif</label>
              </div>
            </div>

            <div class="form-group">
              <label for="lampiranPengumuman">Lampiran Pengumuman:</label>
              <div class="form-row">
                <div class="col">
                  <input type="file" class="form-control-file" id="lampiranPengumuman" name="lampiranPengumuman">
                </div>
                <div class="col">
                  <input type="text" class="form-control" id="lampiranPengumuman" name="lampiranPengumuman">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Pengumuman</button>
          </form>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4>Table Pengumuman</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="peng">
              <thead class="">
                <tr>
                  <th class="align-middle">Judul</th>
                  <th class="align-middle">Kategori</th>
                  <th class="align-middle">Mulai</th>
                  <th class="align-middle">Berakhir</th>
                  <th class="align-middle">Pengumuman</th>
                  <th class="align-middle">Status</th>
                  <th class="nowrap align-middle">Tampil di Beranda</th>
                  <th class="nowrap align-middle">Tampil di Halaman Pengumuman</th>
                  <th class="align-middle">Lampiran</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('dist/_partials/footer');?>