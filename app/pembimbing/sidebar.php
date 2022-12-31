<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-blue elevation-4">
        <!-- Brand Logo -->
        <!-- <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a> -->

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="../dist/img/profile.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block"><?= $_SESSION['username'] ?></a>
            </div>
        </div>
    
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item <?php echo $hal == 'dashboard pembimbing' ? 'menu-open' : ''; ?>">
                    <a href="dashboard-pembimbing.php" class="nav-link <?php echo $hal == 'dashboard pembimbing' ? 'active' : ''; ?>" >
                    <i class="fas fa-home"></i>
                    <p>Beranda</p>
                    </a>
            </li>
            <li class="nav-item <?php echo $hal == 'laporan harian' | $hal == 'pengajuan' | $hal == 'Penilaian' ? 'menu-open' : ''; ?>">
                <a href="#" class="nav-link <?php echo $hal == 'laporan harian' | $hal == 'pengajuan' ? 'active' : ''; ?>">
                <i class="fas fa-chalkboard-teacher"></i>
                <p>
                    Bimbingan
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="rekapan-pemagang.php" class="nav-link <?php echo $hal == 'laporan harian' ? 'active' : ''; ?>">
                    <i class="fas fa-folder"></i>
                    <p>Laporan Pemagang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pengajuan-pemagang.php" class="nav-link <?php if($hal == 'pengajuan') {echo 'active';}; ?>">
                    <i class="fas fa-edit"></i>
                    <p>Pengajuan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="penilaian.php" class="nav-link <?php if($hal == 'Penilaian') {echo 'active';}; ?>">
                    <i class="fas fa-file"></i>
                    <p>Penilaian</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
            <a href="../../conf/logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')"
        class="nav-link <?php echo $title == 'logout' ? 'active' : ''; ?>">
        <i class="fas fa-power-off"></i>
              <p>Logout</p>
            </a>
        </li>
        </nav>
        </ul>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>