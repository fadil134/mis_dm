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
            <?php if ($this->session->flashdata('pesan')) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>
                    <?= $this->session->flashdata('pesan'); ?>
                </strong>
            </div>
            <?php } ?>
            <div class="card">
                <div class="card-header">
                    <h4>Sekapur Sirih</h4>
                </div>
                <form action="<?=base_url('kmberanda/save_ssirih'); ?>" method="post" enctype="multipart/form-data"
                    id="ssirih">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="sekapur_sirih">Sekapur Sirih</label>
                                    <textarea class="form-control" name="sekapur_sirih" id="summernote"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="vid_main">URL Video</label>
                                    <input type="text" name="vid_url" id="vid_main_url" class="form-control"
                                        placeholder="" aria-describedby="helpId" onchange="previewVid(this)">
                                    <small id="helpId" class="text-muted">Paste Video URL ke
                                        sini</small>
                                    <div id="vid_main_preview"></div>
                                </div>
                                <div class="form-group">
                                    <label for="fileVideo">File Name Video</label>
                                    <input type="text" name="fileVideo" id="video_main" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="img_main">URL Gambar</label>
                                    <input type="text" name="img_url" id="img_main" class="form-control" placeholder=""
                                        aria-describedby="helpId" onchange="previewImg(this)">
                                    <small id="helpId" class="text-muted">Paste Gambar URL ke
                                        sini</small>
                                    <div id="img_main_preview"></div>
                                </div>
                                <div class="form-group">
                                    <label for="imG_url">File Name Gambar</label>
                                    <input type="text" name="imG_url" id="image_main" class="form-control">
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
                <form action="<?=base_url('kmberanda/s_eks'); ?>" method="post" enctype="multipart/form-data"
                    id="eks_kul">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
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
                                                <option value="<?=$icon->icon_class ?>">
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
                                                <?php endforeach; ?>
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
                                <table class="table table-bordered table-striped" id="ek">
                                    <thead>
                                        <!--<th>#</th>-->
                                        <th>id</th>
                                        <th>Deskripsi</th>
                                        <th>Ikon</th>
                                        <th>Aktivasi</th>
                                        <th>Ekskul</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($table_ek as $eks) : ?>
                                        <tr>
                                            <td><?=$eks->id ?></td>
                                            <td><?=$eks->description ?></td>
                                            <td><?=$eks->filename ?></td>
                                            <td><?=$eks->is_active ?></td>
                                            <td><?=$eks->title ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="">
                                                    <button type="button" class="btn btn-primary edit_eks">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
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
            <form action="<?=base_url('Kmberanda/update_ssir') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ids">ID</label>
                        <input name="ids" id="idss" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="vidmss">Video Modal</label>
                        <input name="vidmss" id="vid_modal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="imgmss">Image Modal</label>
                        <input name="imgmss" id="img_modal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="vid_x_m">Video Existing</label>
                        <input name="vid_x_m" id="vid_x_m" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="img_x_m">Image Existing</label>
                        <input name="img_x_m" id="img_x_m" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="vid_x_m_n">Video Existing Name</label>
                        <input name="vid_x_m_n" id="vid_x_m_n" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="img_x_m_n">Image Existing Name</label>
                        <input name="img_x_m_n" id="img_x_m_n" class="form-control">
                    </div>
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
                        <input type="text" class="form-control" name="gambar" id="image_modal" aria-describedby="helpId"
                            placeholder="" onchange="previewImg(this)">
                        <small id="helpId" class="form-text text-muted">Isi URL gambar untuk mengganti gambar
                            existing</small>
                        <div id="img_modal_preview"></div>
                    </div>
                    <div class="form-group">
                        <label for="vid">Replace Video</label>
                        <input type="text" class="form-control" name="vid" id="video_modal" aria-describedby="helpId"
                            placeholder="" onchange="previewVid(this)">
                        <small id="helpId" class="form-text text-muted">Isi URL video untuk mengganti video
                            existing</small>
                        <div id="vid_modal_preview"></div>
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
            <form action="<?=base_url('kmberanda/u_eks_modal'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group" style="display: none;">
                        <label for="id_m_eks">ID</label>
                        <input type="text" class="form-control" name="id_m_eks" id="id_m_eks">
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="icon_modal">Ikon</label>
                        <input type="text" class="form-control" name="icon_modal" id="icon_modal">
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="ikonpreview">Preview</label>
                                <div id="ikonpreview"
                                    class="d-flex justify-content-center border border-primary rounded"></div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="eksed">Ikon</label>
                                <select class="form-control" name="eksed" id="eksed">
                                    <?php foreach ($icons as $ic): ?>
                                    <option value="<?=$ic->icon_class ?>">
                                        <?php
                                            $string = $ic->icon_class;
                                            $parts = explode('-', $string);
                                            array_shift($parts);
                                            $badge = implode('-', $parts);
                                            echo $badge;
                                        ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="eks_des">Deskripsi Ekskul</label>
                        <textarea name="eks_des" id="eks_des" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="title_eks">Title Ekskul</label>
                        <input type="text" class="form-control" name="title_eks" id="title_eks">
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
<?php $this->load->view('dist/_partials/footer'); ?>