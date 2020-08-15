<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h5 class="mt-4">DASHBOARD</h5>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><i class="fas fa-home"></i></li>
            </ol>
            <div class="card shadow border-secondary">
                <div class="card-body" align="center">
                    <p class="text-primary"><b>بسم الله الرحمن الرحيم</b></p>
                    <p>Selamat datang <b><?= $this->session->userdata('username'); ?></b> di</p>
                    <h5>
                        <b class="text-primary" data-text>SISTEM REKAP NILAI MAHASISWA UMMGL</b>
                    </h5>
                    <p>
                        Sistem ini di buat untuk merekap data perkuliahan yang sudah dilalui oleh mahasiswa dengan waktu tertentu.
                    </p>
                    <p>Anda telah login sebagai :
                        <b>
                            <?php
                            if ($this->session->userdata('status') == 'admin_login') {
                                echo "<div class='text-primary'>ADMIN</div>";
                            } else {
                                echo "<div class='text-primary'>USER</div>";
                            } ?>
                        </b>
                    </p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Courses</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?= $this->M_dashboard->get_data('course')->num_rows(); ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-book"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Scores</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?= $this->M_dashboard->get_data('score')->num_rows(); ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Semesters</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?= $this->M_dashboard->get_data('semester')->num_rows(); ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-clipboard-list"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Users</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?= $this->M_dashboard->get_data('user')->num_rows(); ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </main>