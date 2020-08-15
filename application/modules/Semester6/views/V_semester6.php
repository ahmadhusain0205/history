<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h5 class="mt-4">Semester 6</h5>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('Dashboard'); ?>"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active">Semester 6</li>
            </ol>
            <?= $this->session->flashdata('message'); ?>
            <a href="<?= base_url('Semester6/download'); ?>" type="button" class="btn btn-sm btn-success shadow mb-4">
                <i class="fa fa-download"></i> Unduh Semester 6
            </a>
            <a href="<?= base_url('Semester6/downloadAll'); ?>" type="button" class="btn btn-sm btn-success shadow mb-4">
                <i class="fa fa-download"></i> Unduh Semua
            </a>
            <button type="button" class="btn btn-sm btn-danger shadow mb-4 float-right" data-toggle="modal" data-target="#hapusModal">
                <i class="fa fa-trash"></i> Hapus Semua Data
            </button>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Table Semester 6
                    <button type="button" class="btn btn-sm btn-primary shadow mb-4 float-right" data-toggle="modal" data-target="#semester6TambahModal">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead align="center">
                                <tr>
                                    <th width="1%">No</th>
                                    <th width="50%">Course</th>
                                    <th width="10%">SKS</th>
                                    <th width="10%">Grade</th>
                                    <th width="10%">Semester</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = "1";
                                foreach ($semester6 as $se) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $se->course; ?></td>
                                        <td><?= $se->sks; ?></td>
                                        <td><?= $se->grade; ?></td>
                                        <td><?= $se->semester; ?></td>
                                        <td align="center">
                                            <button type="button" class="btn btn-sm btn-warning shadow mb-4" data-toggle="modal" data-target="#editSemester6Modal<?= $se->id; ?>">
                                                <i class="fa fa-wrench"></i> Edit
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger shadow mb-4" data-toggle="modal" data-target="#deleteSemester6Modal<?= $se->id; ?>">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
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
                    <a class="btn btn-danger" href="<?= base_url('Semester6/deleteAll'); ?>">Yes</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal tambah -->
    <div class="modal fade" id="semester6TambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Tambah Semester 6</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" class="user" action="<?= base_url('Semester6/tambah'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_course">Course</label>
                            <select name="id_course" id="id_course" class="form-control">
                                <option value="">-- Select Course --</option>
                                <?php foreach ($course as $c) : ?>
                                    <option value="<?= $c->id; ?>"><?= $c->course; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_score">Score</label>
                            <select name="id_score" id="id_score" class="form-control">
                                <option value="">-- Select Score --</option>
                                <?php foreach ($score as $s) : ?>
                                    <option value="<?= $s->id; ?>"><?= $s->grade; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <select name="semester" id="semester" class="form-control" required>
                                <option value="">-- Select Semester --</option>
                                <?php { ?>
                                    <option value="<?= '1'; ?>"><?= '1'; ?></option>
                                    <option value="<?= '2'; ?>"><?= '2'; ?></option>
                                    <option value="<?= '3'; ?>"><?= '3'; ?></option>
                                    <option value="<?= '4'; ?>"><?= '4'; ?></option>
                                    <option value="<?= '5'; ?>"><?= '5'; ?></option>
                                    <option value="<?= '6'; ?>"><?= '6'; ?></option>
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
    foreach ($semester6 as $se) :
    ?>
        <div class="modal fade" id="editSemester6Modal<?php echo $se->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-warning" id="exampleModalLabel">Edit Semester 6</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="POST" class="user" action="<?= base_url('Semester6/edit'); ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id_course">Course</label>
                                <input type="hidden" name="id" value="<?= $se->id; ?>">
                                <input type="hidden" class="form-control" name="id_course" id="id_course" value="<?= $se->id_course; ?>" readonly>
                                <input type="text" class="form-control" value="<?= $se->course; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="id_score">Score</label>
                                <select name="id_score" id="id_score" class="form-control">
                                    <option value="">-- Select Score --</option>
                                    <?php foreach ($score as $s) : ?>
                                        <option value="<?= $s->id; ?>"><?= $s->grade; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <select name="semester" id="semester" class="form-control" required>
                                    <option value="">-- Select Semester --</option>
                                    <?php { ?>
                                        <option value="<?= '1'; ?>"><?= '1'; ?></option>
                                        <option value="<?= '2'; ?>"><?= '2'; ?></option>
                                        <option value="<?= '3'; ?>"><?= '3'; ?></option>
                                        <option value="<?= '4'; ?>"><?= '4'; ?></option>
                                        <option value="<?= '5'; ?>"><?= '5'; ?></option>
                                        <option value="<?= '6'; ?>"><?= '6'; ?></option>
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
    foreach ($semester6 as $se) :
    ?>
        <div class="modal fade" id="deleteSemester6Modal<?= $se->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a class="btn btn-danger" href="<?= base_url('Semester6/delete/') . $se->id; ?>">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>