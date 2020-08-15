<div id="layoutAuthentication_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">
                                <b>Create Account</b>
                            </h3>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <form method="POST" action="<?= base_url('Register/tambah'); ?>" class="user">
                                <div class="form-row">
                                    <label class="small mb-1" for="username">Username</label>
                                    <input class="form-control py-4" id="id" name="id" type="hidden" />
                                    <input class="form-control py-4" id="username" name="username" type="text" placeholder="Enter Your Username" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="password">Password</label>
                                    <input class="form-control py-4" id="password" name="password" type="password" placeholder="Enter Your Password" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="text">Sebagai</label>
                                    <input class="form-control py-4" id="text" type="text" placeholder="USER" readonly />
                                </div>
                                <div class="form-group mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Create Account
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a href="<?= base_url('Login'); ?>">Have an account? Go to login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>