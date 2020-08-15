<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <br>
                    <a class="nav-link text-primary" href="<?= base_url('Profile'); ?>">
                        <img class="img-profile rounded-circle col-lg-4" src="<?= base_url('assets/img/logos.png'); ?>">
                        <div>
                            <?= $this->session->userdata('username'); ?>
                        </div>
                    </a>
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="<?= base_url('Dashboard'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <?php
                    if ($this->session->userdata('status') == 'admin_login') {
                        echo "
                        <div class='sb-sidenav-menu-heading'>Administrator</div>";
                        if (($this->uri->segment(1) == 'Admin') or ($this->uri->segment(1) == 'User')) {
                            echo "
                            <a class='nav-link active' href='#' data-toggle='collapse' data-target='#collapseAdministrator' aria-expanded='false' aria-controls='collapseAdministrator'>
                            <div class='sb-nav-link-icon'><i class='fas fa-fw fa-user-shield'></i></div>
                            Officer
                            <div class='sb-sidenav-collapse-arrow'><i class='fas fa-fw fa-angle-down'></i></div>
                        </a>";
                        } else {
                            echo "
                            <a class='nav-link' href='#' data-toggle='collapse' data-target='#collapseAdministrator' aria-expanded='false' aria-controls='collapseAdministrator'>
                            <div class='sb-nav-link-icon'><i class='fas fa-fw fa-user-shield'></i></div>
                            Officer
                            <div class='sb-sidenav-collapse-arrow'><i class='fas fa-fw fa-angle-down'></i></div>
                        </a>";
                        }
                        echo "
                        <div class='collapse' id='collapseAdministrator' aria-labelledby='headingOne' data-parent='#sidenavAccordion'>
                            <nav class='sb-sidenav-menu-nested nav'>
                                <a class='nav-link' href='";
                        echo base_url('Admin');
                        echo "'>Admin</a>
                                <a class='nav-link' href='";
                        echo base_url('User');
                        echo "'>User</a>
                            </nav>
                        </div>
                        ";
                    }
                    ?>
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link" href="<?= base_url('Course'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-book"></i></div>
                        Course
                    </a>
                    <a class="nav-link" href="<?= base_url('Score'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-star"></i></div>
                        Score
                    </a>
                    <?php
                    if (($this->uri->segment(1) == 'Semester1') or ($this->uri->segment(1) == 'Semester2') or ($this->uri->segment(1) == 'Semester3') or ($this->uri->segment(1) == 'Semester4') or ($this->uri->segment(1) == 'Semester5') or ($this->uri->segment(1) == 'Semester6') or ($this->uri->segment(1) == 'Semester7')) {
                        echo "<a class='nav-link active' href='#' data-toggle='collapse' data-target='#collapseSemester' aria-expanded='false' aria-controls='collapseSemester'>
                        <div class='sb-nav-link-icon'><i class='fas fa-fw fa-clipboard-list'></i></div>
                        Semester
                        <div class='sb-sidenav-collapse-arrow'><i class='fas fa-angle-down'></i></div>
                    </a>";
                    } else {
                        echo "<a class='nav-link' href='#' data-toggle='collapse' data-target='#collapseSemester' aria-expanded='false' aria-controls='collapseSemester'>
                        <div class='sb-nav-link-icon'><i class='fas fa-fw fa-clipboard-list'></i></div>
                        Semester
                        <div class='sb-sidenav-collapse-arrow'><i class='fas fa-angle-down'></i></div>
                    </a>";
                    }
                    ?>
                    <div class='collapse' id='collapseSemester' aria-labelledby='headingOne' data-parent='#sidenavAccordion'>
                        <nav class='sb-sidenav-menu-nested nav'>
                            <a class='nav-link' href='<?= base_url('Semester1'); ?>'>Semester 1</a>
                            <a class='nav-link' href='<?= base_url('Semester2'); ?>'>Semester 2</a>
                            <a class='nav-link' href='<?= base_url('Semester3'); ?>'>Semester 3</a>
                            <a class='nav-link' href='<?= base_url('Semester4'); ?>'>Semester 4</a>
                            <a class='nav-link' href='<?= base_url('Semester5'); ?>'>Semester 5</a>
                            <a class='nav-link' href='<?= base_url('Semester6'); ?>'>Semester 6</a>
                            <!-- <a class='nav-link' href='<?= base_url('Semester7'); ?>'>Semester 7</a> -->
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small text-white">Logged in as:</div>
                <?php
                if ($this->session->userdata('status') == 'user_login') {
                    echo "<div class='text-primary'>USER</div>";
                } else {
                    echo "<div class='text-primary'>ADMIN</div>";
                }
                ?>
            </div>
        </nav>
    </div>