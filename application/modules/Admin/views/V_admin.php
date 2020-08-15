<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h5 class="mt-4">Admin</h5>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('Dashboard'); ?>"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active">Admin</li>
            </ol>
            <?= $this->session->flashdata('message'); ?>
            <button type="button" class="btn btn-sm btn-success shadow mb-4" data-toggle="modal" data-target="#adminUnggahModal">
                <i class="fa fa-upload"></i> Unggah Excel
            </button>
            <button type="button" class="btn btn-sm btn-success shadow mb-4" data-toggle="modal" data-target="#adminUnduhModal">
                <i class="fa fa-download"></i> Unduh Excel
            </button>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Table Admin
                    <button type="button" class="btn btn-sm btn-primary shadow mb-4 float-right" data-toggle="modal" data-target="#adminTambahModal">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead align="center">
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = "1";
                                foreach ($admin as $a) : ?>
                                    <tr align="center">
                                        <td><?= $no++; ?></td>
                                        <td><?= $a->username; ?></td>
                                        <td><?= md5($a->password); ?></td>
                                        <td>
                                            <?php
                                            if ($a->username == $this->session->userdata('username')) {
                                                echo "
                                                <button type='button' class='btn btn-sm btn-dark shadow mb-4'><i class='fa fa-wrench'></i> Edit
                                            </button>
                                                <button type='button' class='btn btn-sm btn-dark shadow mb-4'><i class='fa fa-trash'></i> Hapus
                                            </button>";
                                            } else {
                                                echo "<button type='button' class='btn btn-sm btn-warning shadow mb-4' data-toggle='modal' data-target='#editAdmin";
                                                echo $a->id;
                                                echo "'>
                                                <i class='fa fa-wrench'></i> Edit
                                            </button>
                                            <button type='button' class='btn btn-sm btn-danger shadow mb-4' data-toggle='modal' data-target='#deleteAdminModal";
                                                echo $a->id;
                                                echo "'>
                                                <i class='fa fa-trash'></i> Hapus
                                            </button>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal unduh -->
    <div class="modal fade" id="adminUnduhModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="exampleModalLabel">Download Data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Yes" for <b>confirm</b>, or "No" for <b>cancel</b></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <a class="btn btn-success" href="<?= base_url('Admin/download'); ?>">Yes</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal unggah -->
    <div class="modal fade" id="adminUnggahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Unggah Data Excel</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url('Admin/upload'); ?>" enctype="multipart/form-data" class="user">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" name="userfile" class="form-control-user">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Unggah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal tambah -->
    <div class="modal fade" id="adminTambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Tambah Admin</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" class="user" action="<?= base_url('Admin/tambah'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Masukan Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control form-control-user" name="password" id="password" placeholder="Masukan Password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal edit -->
    <?php
    foreach ($admin as $a) :
    ?>
        <div class="modal fade" id="editAdmin<?php echo $a->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-warning" id="exampleModalLabel">Edit Admin</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="POST" class="user" action="<?= base_url('Admin/edit'); ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="hidden" name="id" value="<?= $a->id; ?>">
                                <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Masukan Username" required value="<?= $a->username; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control form-control-user" name="password" id="password" placeholder="Masukan Password" required value="<?= $a->password; ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-warning">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Modal Hapus -->
    <?php
    foreach ($admin as $a) :
    ?>
        <div class="modal fade" id="deleteAdminModal<?php echo $a->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel">Delete data?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Yes" for <b>confirm</b>, or "No" for <b>cancel</b></div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                        <a class="btn btn-danger" href="<?= base_url('Admin/delete/') . $a->id; ?>">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>