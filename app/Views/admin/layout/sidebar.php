<nav class="sb-sidenav accordion sb-sidenav-dark" id="admin-sidebar-accordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">HOME</div>
            <a class="nav-link" href="<?=base_url('Admin/Home')?>">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">COURSES</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse-courses" aria-expanded="false" aria-controls="collapse-courses">
                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                Courses
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapse-courses" aria-labelledby="headingOne" data-bs-parent="#admin-sidebar-accordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<?= base_url('Admin/Categories')?>">Categories</a>
                    <a class="nav-link" href="<?= base_url('Admin/Courses')?>">Courses</a>
                </nav>
            </div>
            <div class="sb-sidenav-menu-heading">STUDENTS & ENROLLMENT</div>
            <a class="nav-link" href="<?= base_url('Admin/Students')?>">
                <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                Students
            </a>
            <a class="nav-link" href="<?= base_url('Admin/Enrollments')?>">
                <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                Enrollment <span class=" badge bg-danger rounded-pill" style="margin-left: 5%;">  <?php use App\Models\EnrollmentsModel; $model = new EnrollmentsModel(); $model->countPending();?></span>
            </a>
            <div class="sb-sidenav-menu-heading">SITE MANAGEMENT</div>
            <a class="nav-link" href="<?=base_url('Admin/Admins')?>">
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                Admins
            </a>
            <a class="nav-link" href="<?=base_url('Admin/SiteInfo')?>">
                <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                Site Info
            </a>
            <a class="nav-link" href="<?=base_url('Admin/ContactInfo')?>">
                <div class="sb-nav-link-icon"><i class="fas fa-id-card"></i></div>
                Contact Info
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <?php echo session()->get('firstname').' '.session()->get('lastname') ?>
    </div>
</nav>