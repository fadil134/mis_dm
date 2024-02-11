<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5 col-lg-4 col-md-6">
                <?php if ($this->session->flashdata('message')) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } ?>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?=base_url('auth/login') ?>" method="post">
                            <div class="form-group">
                                <label for="username">User Name</label>
                                <input type="text" class="form-control" name="username" id="" placeholder="User Name"
                                    required>
                            </div>
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password">Password</label>
                                    <div class="float-right">
                                        <a href="<?php echo base_url(); ?>dist/auth_forgot_password" class="text-small">
                                            Forgot Password?
                                        </a>
                                    </div>
                                    <input type="password" class="form-control" name="password" id=""
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-5 text-muted text-center">
                    Belum punya akun? <a href="<?php echo base_url(); ?>auth/daftar">Daftar</a>
                </div>
            </div>
        </section>
    </div>

    <?php $this->load->view('dist/_partials/js'); ?>