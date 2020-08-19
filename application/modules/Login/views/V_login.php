<div id="layoutAuthentication_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == 'gagal') {
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <b>Gagal</b> Login
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
                        } elseif ($_GET['alert'] == 'belum login') {
                            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <b>Please</b> Login
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
                        } elseif ($_GET['alert'] == 'logout') {
                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <b>Success</b> Logout
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
                        }
                    }
                    ?>
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">
                                <b>Login</b>
                            </h3>
                        </div>
                        <div class="card-body">
                            <?= validation_errors(); ?>
                            <?= $this->session->flashdata('message'); ?>
                            <form class="user" method="POST" action="<?= base_url('Login/login_aksi'); ?>" class="user">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control form-control-user" placeholder="Masukan Username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control form-control-user" placeholder="Masukan Password">
                                </div>
                                <div class="form-group">
                                    <label for="sebagai">Login Sebagai : </label>
                                    <select name="sebagai" id="sebagai" class="form-control">
                                        <option value="admin">ADMIN</option>
                                        <option value="user">USER</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a href="<?= base_url('Register'); ?>">Need an account? Sign up!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<br>
<br>