<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h5 class="mt-4">Profile</h5>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('Dashboard'); ?>"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow mb-4">
                <div class="card-header text-primary">
                    <h5>My Profile
                        <?php foreach ($profile as $p) : ?>
                            <button type="button" class="btn btn-sm btn-warning shadow mb-4 float-right" data-toggle="modal" data-target="#edit<?= $p->id; ?>">
                                <i class="fa fa-wrench"></i> Edit Password
                            </button>
                        <?php endforeach; ?>
                    </h5>
                </div>
                <div class="card-body">
                    <?php foreach ($profile as $p) : ?>
                        <form class="user">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control form-control-user" name="username" id="username" value="<?= $p->username; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control form-control-user" name="password" id="password" value="<?= $p->password; ?>" readonly>
                                </div>
                            </div>
                        </form>
                        <br>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Edit -->
    <?php
    foreach ($profile as $p) :
    ?>
        <div class="modal fade" id="edit<?= $p->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-warning" id="exampleModalLabel">Edit Password</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="POST" class="user" action="<?= base_url('Profile/edit'); ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="hidden" name="id" value="<?= $p->id; ?>">
                                <input type="text" class="form-control form-control-user" name="username" id="username" value="<?= $p->username; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Masukan Password" required value="<?= $p->password; ?>">
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