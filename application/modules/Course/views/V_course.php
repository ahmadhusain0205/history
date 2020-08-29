<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h5 class="mt-4">Course</h5>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('Dashboard'); ?>"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active">Course</li>
            </ol>
            <?= $this->session->flashdata('message'); ?>
            <button type="button" class="btn btn-sm btn-success shadow mb-4" data-toggle="modal" data-target="#courseUnggahModal">
                <i class="fa fa-upload"></i> Unggah Excel
            </button>
            <button type="button" class="btn btn-sm btn-success shadow mb-4" data-toggle="modal" data-target="#courseUnduhModal">
                <i class="fa fa-download"></i> Unduh Excel
            </button>
            <button type="button" class="btn btn-sm btn-danger shadow mb-4 float-right" data-toggle="modal" data-target="#hapusModal">
                <i class="fa fa-trash"></i> Hapus Semua Data
            </button>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Table Course
                    <button type="button" class="btn btn-sm btn-primary shadow mb-4 float-right" data-toggle="modal" data-target="#courseTambahModal">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
                        if ($this->session->userdata('status') == 'admin_login') {
                            echo "
                            <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                            <thead align='center'>
                                <tr>
                                    <th width='1%'>No</th>
                                    <th width='25%'>Course</th>
                                    <th width='15%'>Username</th>
                                    <th width='15%'>SKS</th>
                                    <th width='25%'>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>";
                            $no = '1';
                            foreach ($course as $c) :
                                echo "<tr>
                                        <td align='center'>";
                                echo $no++;
                                echo "</td>
                                        <td>";
                                echo $c->course;
                                echo "</td>
                                        <td align='center'>";
                                echo $c->username;
                                echo "</td>
                                        <td align='center'>";
                                echo $c->sks;
                                echo "</td>
                                        <td align='center'>
                                            <button type='button' class='btn btn-sm btn-warning shadow mb-4' data-toggle='modal' data-target='#editCourse";
                                echo $c->id;
                                echo "'>
                                                <i class='fa fa-wrench'></i> Edit
                                            </button>
                                            <button type='button' class='btn btn-sm btn-danger shadow mb-4' data-toggle='modal' data-target='#deleteCourseModal";
                                echo $c->id;
                                echo "'>
                                                <i class='fa fa-trash'></i> Hapus
                                            </button>
                                        </td>
                                    </tr>";
                            endforeach;
                            echo "
                            </tbody>
                        </table>
                            ";
                        } else {
                            echo "
                            <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                            <thead align='center'>
                                <tr>
                                    <th width='1%'>No</th>
                                    <th width='25%'>Course</th>
                                    <th width='15%'>SKS</th>
                                    <th width='25%'>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>";
                            $no = '1';
                            foreach ($course as $c) :
                                echo "<tr>
                                        <td align='center'>";
                                echo $no++;
                                echo "</td>
                                        <td>";
                                echo $c->course;
                                echo "</td>
                                        <td align='center'>";
                                echo $c->sks;
                                echo "</td>
                                        <td align='center'>
                                            <button type='button' class='btn btn-sm btn-warning shadow mb-4' data-toggle='modal' data-target='#editCourse";
                                echo $c->id;
                                echo "'>
                                                <i class='fa fa-wrench'></i> Edit
                                            </button>
                                            <button type='button' class='btn btn-sm btn-danger shadow mb-4' data-toggle='modal' data-target='#deleteCourseModal";
                                echo $c->id;
                                echo "'>
                                                <i class='fa fa-trash'></i> Hapus
                                            </button>
                                        </td>
                                    </tr>";
                            endforeach;
                            echo "
                            </tbody>
                        </table>
                            ";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Hapus Semua Data -->
    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete All?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Yes" for <b>confirm</b>, or select "No" for <b>cancel</b>.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <a class="btn btn-danger" href="<?= base_url('Course/deleteAll'); ?>">Yes</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal unduh -->
    <div class="modal fade" id="courseUnduhModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-success" href="<?= base_url('Course/download'); ?>">Yes</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal unggah -->
    <div class="modal fade" id="courseUnggahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Unggah Data Excel</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url('Course/upload'); ?>" enctype="multipart/form-data" class="user">
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
    <div class="modal fade" id="courseTambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Tambah Course</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" class="user" action="<?= base_url('Course/tambah'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="course">Course</label>
                            <input type="text" class="form-control form-control-user" name="course" id="course" placeholder="Masukan Course" required>
                        </div>
                        <div class="form-group">
                            <label for="sks">SKS</label>
                            <select name="sks" id="sks" class="form-control" required>
                                <option value="">-- Select SKS --</option>
                                <?php { ?>
                                    <option value="<?= '1'; ?>"><?= '1'; ?></option>
                                    <option value="<?= '2'; ?>"><?= '2'; ?></option>
                                    <option value="<?= '3'; ?>"><?= '3'; ?></option>
                                    <option value="<?= '4'; ?>"><?= '4'; ?></option>
                                <?php } ?>
                            </select>
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
    foreach ($course as $c) :
    ?>
        <div class="modal fade" id="editCourse<?php echo $c->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-warning" id="exampleModalLabel">Edit Course</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="POST" class="user" action="<?= base_url('Course/edit'); ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="course">Course</label>
                                <input type="hidden" name="id" value="<?= $c->id; ?>">
                                <input type="text" class="form-control form-control-user" name="course" id="course" placeholder="Masukan Course" required value="<?= $c->course; ?>">
                            </div>
                            <div class="form-group">
                                <label for="sks">SKS</label>
                                <select name="sks" id="sks" class="form-control" required>
                                    <option value="">-- Select SKS --</option>
                                    <?php { ?>
                                        <option value="<?= '1'; ?>"><?= '1'; ?></option>
                                        <option value="<?= '2'; ?>"><?= '2'; ?></option>
                                        <option value="<?= '3'; ?>"><?= '3'; ?></option>
                                        <option value="<?= '4'; ?>"><?= '4'; ?></option>
                                    <?php } ?>
                                </select>
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
    foreach ($course as $c) :
    ?>
        <div class="modal fade" id="deleteCourseModal<?php echo $c->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a class="btn btn-danger" href="<?= base_url('Course/delete/') . $c->id; ?>">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>