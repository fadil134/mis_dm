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
                <div class="breadcrumb-item">Beranda</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Beranda</h2>
            <p class="section-lead">Manajemen Konten Halaman Beranda</p>
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Sekapur Sirih</h4>
                                </div>
                                <form>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="col-md-6 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="sekapur_sirih">Sekapur Sirih</label>
                                                        <textarea class="form-control" name="sekapur_sirih"
                                                            id="summernote"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="ss_vd">Sekapur Sirih Video</label>
                                                        <input type="file" class="form-control-file" name="ss_vd"
                                                            id="ss_vd" placeholder="upload gambar disini"
                                                            aria-describedby="fileHelpId">
                                                        <small id="fileHelpId" class="form-text text-muted">Sekapur
                                                            Sirih
                                                            Video</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Sekapur Sirih Background</label>
                                                        <input type="file" class="form-control-file" name="ss_bg"
                                                            id="ss_bg" placeholder="upload gambar disini"
                                                            aria-describedby="fileHelpId">
                                                        <small id="fileHelpId" class="form-text text-muted">Sekapur
                                                            Sirih
                                                            Gambar Background</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <table class="table" id="ss">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">First</th>
                                                            <th scope="col">Last</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="customSwitch1" checked>
                                                                    <label class="custom-control-label"
                                                                        for="customSwitch1">Test</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>Jacob</td>
                                                            <td>Thornton</td>
                                                            <td>
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="customSwitch2">
                                                                    <label class="custom-control-label"
                                                                        for="customSwitch2">Toggle this switch
                                                                        element</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>Larry</td>
                                                            <td>the Bird</td>
                                                            <td>
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="customSwitch3">
                                                                    <label class="custom-control-label"
                                                                        for="customSwitch3">Toggle this switch
                                                                        element</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-whitesmoke">
                                        <button type="button" onclick="assignRoles()" class="btn btn-primary">Assign
                                            Roles
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Tabel User</h4>
                </div>
                <div class="card-body">
                    <table id="userTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th> <!-- New column for actions -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- User data will be dynamically added here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>


<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select id="role" name="role" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="editor">Editor</option>
                            <option value="viewer">Viewer</option>
                            <!-- Add more roles as needed -->
                        </select>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="addUser()">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for editing user details (replace this with your actual form) -->
                <form id="editUserForm">
                    <label for="editUserName">Name:</label>
                    <input type="text" id="editUserName" name="editUserName" class="form-control" required>

                    <label for="editUserEmail">Email:</label>
                    <input type="email" id="editUserEmail" name="editUserEmail" class="form-control" required>

                    <label for="editUserRole">Role:</label>
                    <input type="text" id="editUserRole" name="editUserRole" class="form-control" required>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChangesBtn">Save Changes</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>