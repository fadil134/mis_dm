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
            <p class="section-lead">Memberikan role kepada user Website</p>
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>User Role Assignment</h4>
                                    <div class="card-header-action">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#addUserModal">
                                            Add User
                                        </button>
                                    </div>
                                </div>
                                <form>
                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            <div class="col-md-6">
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
                                                    <input type="radio" id="customRadio1" name="roles[]"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">Admin</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="roles[]"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label"
                                                        for="customRadio2">Editor</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio3" name="roles[]"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label"
                                                        for="customRadio3">Viewer</label>
                                                </div>
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