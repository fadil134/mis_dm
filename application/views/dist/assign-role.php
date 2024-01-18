<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
                <div class="breadcrumb-item">Gallery</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Role Assignment</h2>
            <p class="section-lead">Grouping multiple images on one component.</p>

            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>User Role Assignment</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <form>
                                                <div class="form-group">
                                                    <label for="user">Select User:</label>
                                                    <select id="user" name="user" class="form-control">
                                                        <option value="user1">User 1</option>
                                                        <option value="user2">User 2</option>
                                                        <option value="user3">User 3</option>
                                                        <!-- Add more users as needed -->
                                                    </select>
                                                </div>

                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="customRadio"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">Toggle this
                                                        custom radio</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="customRadio"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio2">Or toggle
                                                        this other custom radio</label>
                                                </div>
                                                <button type="button" onclick="assignRoles()"
                                                    class="btn btn-primary">Assign Roles
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>