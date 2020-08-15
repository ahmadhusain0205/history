<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h5 class="mt-4">Score</h5>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('Dashboard'); ?>"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active">Score</li>
            </ol>
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-sm btn-danger shadow mb-4 float-right" data-toggle="modal" data-target="#hapusModal">
                        <i class="fa fa-trash"></i> Hapus Semua Data
                    </button>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Table Score
                    <button type="button" class="btn btn-sm btn-primary shadow mb-4 float-right" data-toggle="modal" data-target="#scoreTambahModal">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead align="center">
                                <tr>
                                    <th width="1%">No</th>
                                    <th width="25%">Score</th>
                                    <th width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = "1";
                                foreach ($score as $s) : ?>
                                    <tr>
                                        <td align="center"><?= $no++; ?></td>
                                        <td align="center"><?= $s->grade; ?></td>
                                        <td align="center">
                                            <button type="button" class="btn btn-sm btn-warning shadow mb-4" data-toggle="modal" data-target="#editScore<?php echo $s->id; ?>">
                                                <i class="fa fa-wrench"></i> Edit
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger shadow mb-4" data-toggle="modal" data-target="#deleteScoreModal<?php echo $s->id; ?>">
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
                    <a class="btn btn-danger" href="<?= base_url('Score/deleteAll'); ?>">Yes</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal tambah -->
    <div class="modal fade" id="scoreTambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Tambah Score</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" class="user" action="<?= base_url('Score/tambah'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="grade">Grade</label>
                            <select name="grade" id="grade" class="form-control" required>
                                <option value="">-- Select Grade --</option>
                                <?php { ?>
                                    <option value="<?= 'A'; ?>"><?= 'A'; ?></option>
                                    <option value="<?= 'A-'; ?>"><?= 'A-'; ?></option>
                                    <option value="<?= 'B+'; ?>"><?= 'B+'; ?></option>
                                    <option value="<?= 'B'; ?>"><?= 'B'; ?></option>
                                    <option value="<?= 'B-'; ?>"><?= 'B-'; ?></option>
                                    <option value="<?= 'C+'; ?>"><?= 'C+'; ?></option>
                                    <option value="<?= 'C'; ?>"><?= 'C'; ?></option>
                                    <option value="<?= 'C-'; ?>"><?= 'C-'; ?></option>
                                    <option value="<?= 'D+'; ?>"><?= 'D+'; ?></option>
                                    <option value="<?= 'D'; ?>"><?= 'D'; ?></option>
                                    <option value="<?= 'D-'; ?>"><?= 'D-'; ?></option>
                                    <option value="<?= 'E+'; ?>"><?= 'E+'; ?></option>
                                    <option value="<?= 'E'; ?>"><?= 'E'; ?></option>
                                    <option value="<?= 'E-'; ?>"><?= 'E-'; ?></option>
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
    foreach ($score as $s) :
    ?>
        <div class="modal fade" id="editScore<?php echo $s->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-warning" id="exampleModalLabel">Edit Score</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="POST" class="user" action="<?= base_url('Score/edit'); ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="grade">Grade</label>
                                <input type="hidden" name="id" value="<?= $s->id; ?>">
                                <select name="grade" id="grade" class="form-control" required>
                                    <option value="">-- Select Grade --</option>
                                    <?php { ?>
                                        <option value="<?= 'A'; ?>"><?= 'A'; ?></option>
                                        <option value="<?= 'B'; ?>"><?= 'B'; ?></option>
                                        <option value="<?= 'C'; ?>"><?= 'C'; ?></option>
                                        <option value="<?= 'D'; ?>"><?= 'D'; ?></option>
                                        <option value="<?= 'E'; ?>"><?= 'E'; ?></option>
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
    foreach ($score as $s) :
    ?>
        <div class="modal fade" id="deleteScoreModal<?php echo $s->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a class="btn btn-danger" href="<?= base_url('Score/delete/') . $s->id; ?>">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>