<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<body>
    <div id="app">
        <section class="section">
            <div class="container col-lg-4 mt-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Daftar</h4>
                    </div>
                    <form action="<?=base_url('auth/register') ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama"> Name</label>
                                <input id="nama" type="text" class="form-control" name="nama" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="username">User Name</label>
                                <input id="username" type="text" class="form-control" name="username" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email">
                                <div class="invalid-feedback">
                                    Not a valid email
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                Daftar
                            </button>
                        </div>
                    </form>
                    <p class="mt-5 text-muted text-center">Sudah punya akun? <a
                            href="<?php echo base_url(); ?>auth/masuk">Login</a></p>
                </div>
            </div>
        </section>
    </div>

    <?php $this->load->view('dist/_partials/js'); ?>