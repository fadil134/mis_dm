<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Gallery</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Beranda</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Beranda</h2>
            <p class="section-lead">Manajemen Konten Halaman Beranda</p>
            <div class="card">
                <div class="card-header">
                    <h4>Sekapur Sirih</h4>
                </div>
                <form action="<?=base_url('kmberanda/save_ssirih');?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="sekapur_sirih">Sekapur Sirih</label>
                                    <textarea class="form-control" name="sekapur_sirih" id="summernote"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="vid_url">URL Video</label>
                                    <input type="text" name="vid_url" id="vid_url" class="form-control" placeholder=""
                                        aria-describedby="helpId" onchange="prev()">
                                    <small id="helpId" class="text-muted">Paste Video URL ke
                                        sini</small>
                                    <div id="filevideo"></div>
                                </div>
                                <div class="form-group">
                                    <label for="fileVideo">File Name Video</label>
                                    <input type="text" name="fileVideo" id="fileV" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="img_url">URL Gambar</label>
                                    <input type="text" name="img_url" id="img_url" class="form-control" placeholder=""
                                        aria-describedby="helpId" onchange="previewFile()">
                                    <small id="helpId" class="text-muted">Paste Gambar URL ke
                                        sini</small>
                                    <div id="fileimG"></div>
                                </div>
                                <div class="form-group">
                                    <label for="imG_url">File Name Gambar</label>
                                    <input type="text" name="imG_url" id="imG_url" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="ss_vd">Sekapur Sirih Video</label>
                                    <input type="file" class="form-control-file" name="ssvideo" id="ss_vd"
                                        placeholder="upload video disini" aria-describedby="videoHelpId">
                                    <small id="videoHelpId" class="form-text text-muted">Sekapur
                                        Sirih Video</small>
                                </div>
                                <div class="form-group">
                                    <label for="ss_bg">Sekapur Sirih Background</label>
                                    <input type="file" class="form-control-file" name="ssgambar" id="ss_bg"
                                        placeholder="upload gambar disini" aria-describedby="backgroundHelpId">
                                    <small id="backgroundHelpId" class="form-text text-muted">Sekapur
                                        Sirih Gambar
                                        Background</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <?php
echo $this->session->flashdata('message');
?>
                                <table class="table table-striped table-bordered nowrap mx-auto" id="ss"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>id</th>
                                            <th>Sekapur Sirih</th>
                                            <th>Photo</th>
                                            <th>Video</th>
                                            <th>Aktivasi</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Ekstra Kurikuler</h4>
                </div>
                <form action="<?=base_url('kmberanda/s_eks');?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <?php
if ($this->session->flashdata('pesan')) {
    echo $this->session->flashdata('pesan');
} else if ($this->session->flashdata('validasi_error')) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo $this->session->flashdata('validasi_error'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="icon">Icon Preview</label>
                                            <div id="iconS"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <label for="icon">Icon</label>
                                            <select class="form-control" name="icon" id="icon">
                                                <option value="material-symbols-rounded">sports_soccer</option>
                                                <option value="material-symbols-rounded">sports_kabaddi</option>
                                                <option value="material-symbols-rounded">sports_martial_arts</option>
                                                <option value="material-symbols-rounded">sports_tennis</option>
                                                <option value="material-symbols-rounded">sports_handball</option>
                                                <option value="material-symbols-rounded">sports_and_outdoors</option>
                                                <option value="fas fa-drum">drum band</option>
                                                <option value="fas fa-drum-steelpan">rebana</option>
                                                <?php foreach ($icons as $icon): ?>
                                                <option value="<?=$icon->icon_class?>">
                                                    <?php
$string = $icon->icon_class;

// Memisahkan string berdasarkan tanda strip ("-")
$parts = explode('-', $string);

// Menghapus elemen pertama dari array (bi)
array_shift($parts);

// Menggabungkan sisa elemen menggunakan implode
$badge = implode('-', $parts);

// Cetak hasilnya
echo $badge;
?>

                                                </option>
                                                <?php endforeach;?>
                                            </select>
                                            <small id="helpId" class="text-muted">Icon Ekskul</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <label for="iconEk">Selected Icon</label>
                                    <textarea name="iconEk" id="iconEk" cols="30" rows="10"
                                        class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title Ekskul</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted">Title Ekskul</small>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Ekskul</label>
                                    <textarea name="deskripsi" id="deskripsi">
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <table class="table table-bordered table-striped table-responsive text-nowrap" id="ek">
                                    <thead>
                                        <th>#</th>
                                        <th>id</th>
                                        <th>Deskripsi</th>
                                        <th>Ikon</th>
                                        <th>Aktivasi</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<!-- Modal Sekapur Sirih -->
<div class="modal fade" id="editss" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Sekapur Sirih</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url('Kmberanda/update_ssir')?>" method="post">
                <div class="modal-body">
                    <input name="ids" id="ids" type="hidden">
                    <input name="fileV" id="fileV" type="hidden">
                    <input name="fileG" id="fileG" type="hidden">
                    <input name="videoex" id="videoex" type="hidden">
                    <input name="gambarex" id="gambarex" type="hidden">
                    <input name="videoexname" id="videoexname" type="hidden">
                    <input name="gambarexname" id="gambarexname" type="hidden">
                    <div class="form-group">
                        <label for="myvid">Existing Video</label>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe id="myvid" class="embed-responsive-item" src="" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="myimage">Existing Gambar</label>
                        <img src="" class="img-fluid" id="myimage" alt="Responsive image">
                    </div>
                    <div class="form-group">
                        <label for="ssmodal">Sekapur Sirih</label>
                        <textarea name="ssmodal" id="ssmodal"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Replace Gambar</label>
                        <input type="text" class="form-control" name="gambar" id="gambar" aria-describedby="helpId"
                            placeholder="" onchange="previewFile()">
                        <small id="helpId" class="form-text text-muted">Isi URL gambar untuk mengganti gambar
                            existing</small>
                        <div id="filePreview"></div>
                    </div>
                    <div class="form-group">
                        <label for="vid">Replace Video</label>
                        <input type="text" class="form-control" name="vid" id="vid" aria-describedby="helpId"
                            placeholder="" onchange="prev()">
                        <small id="helpId" class="form-text text-muted">Isi URL video untuk mengganti video
                            existing</small>
                        <div id="filePrev"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Ekskul -->
<div class="modal fade" id="editeks" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Ekskul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="eksed">Ikon</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"></label>
                            </div>
                            <select class="custom-select" name="eksed" id="eksed" style="width: 80%;">
                                <?php 
                                foreach ($icons as $ic): ?>
                                <option value="<?=$ic->icon_class?>">
                                    <?php
                                    $string = $ic->icon_class;
                                    
                                    $parts = explode('-', $string);
                                    array_shift($parts);
                                    $badge = implode('-', $parts);
                                    echo $badge;
                                    ?>
                                </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('dist/_partials/footer');?>