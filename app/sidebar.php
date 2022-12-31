<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-blue elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="dist/img/profile.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="profile.php" class="d-block"><?= $_SESSION['username'] ?></a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item <?php echo $title == 'Beranda' ? 'menu-open' : ''; ?>">
                    <a href="index.php" class="nav-link <?php echo $title == 'Beranda' ? 'active' : ''; ?>" >
                    <i class="fas fa-home"></i>
                    <p>Beranda</p>
                    </a>
            </li>
            
            <li class="nav-item <?php echo $title == 'Data Pembimbing' | $title == 'Data Pemagang' | $title == 'Data Divisi' | $title == 'Data Sekolah' | $title == 'Data Penguji' ? 'menu-open' : ''; ?>">
                <a href="#" class="nav-link <?php echo $title == 'Data Pembimbing' | $title == 'Data Pemagang' | $title == 'Data Divisi'| $title == 'Data Sekolah' | $title == 'Data Penguji' ? 'active' : ''; ?>">
                    <i class="fas fa-users-cog"></i>
                    <p> 
                        Data Master 
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="data_sekolah.php" class="nav-link <?php if($title == 'Data Sekolah') {echo 'active';}; ?>">
                <i class="fas fa-school"></i>
                <p>Data Sekolah</p>
                </a>
                </li>
                <li class="nav-item">
                    <a href="data_pemagang.php" class="nav-link <?php if($title == 'Data Pemagang') {echo 'active';}; ?>">
                    <i class="fas fa-users"></i>
                    <p>Data Pemagang</p>
                    </a>
                </li>
                <li class="nav-item">
                <a href="data_pembimbing.php" class="nav-link <?php echo $title == 'Data Pembimbing' ? 'active' : ''; ?>">
                <i class="fas fa-chalkboard-teacher"></i>
                <p>Data Pembimbing</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="data_penguji.php" class="nav-link <?php if($title == 'Data Penguji') {echo 'active';}; ?>">
                <i class="fas fa-id-card-alt"></i>
                <p>Data Penguji</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="data_divisi.php" class="nav-link <?php if($title == 'Data Divisi') {echo 'active';}; ?>">
                <i class="fas fa-sitemap"></i>
                <p>Divisi</p>
                </a>
                </li>
                </ul>
        </li>
        <li class="nav-item <?php echo $title == 'Laporan Harian' | $title == 'Pengajuan Pemagang' | $title == 'Presensi' ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?php echo $title == 'Laporan Harian' | $title == 'Pengajuan Pemagang' | $title == 'Presensi' ? 'active' : ''; ?>">
                <i class="fas fa-file"></i>
                <p> 
                    Rekap Kegiatan Magang 
                    <i class="right fas fa-angle-left"></i>
                </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="data_laporan.php" class="nav-link <?php if($title == 'Laporan Harian') {echo 'active';}; ?>">
                <i class="fas fa-folder"></i>
                <p>Laporan Harian Pemagang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="data_pengajuan.php" class="nav-link <?php if($title == 'Pengajuan Pemagang') {echo 'active';}; ?>">
                <i class="fas fa-edit"></i>
                <p>Pengajuan Pemagang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="presensi.php" class="nav-link <?php if($title == 'Presensi') {echo 'active';}; ?>">
                <i class="fas fa-calendar-check"></i>
                <p>Presensi</p>
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item <?php echo $title == 'Penilaian Penguji' | $title == 'Penilaian Pembimbing' ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?php echo $title == 'Penilaian Penguji' | $title == 'Penilaian Pembimbing' ? 'active' : ''; ?>">
                <i class="fas fa-check"></i>
                <p> 
                    Penilaian
                    <i class="right fas fa-angle-left"></i>
                </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="penilaian-penguji.php" class="nav-link <?php if($title == 'Penilaian Penguji') {echo 'active';}; ?>">
                <i class="fas fa-users"></i>
                <p>
                    Penilaian Penguji
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="penilaian-pembimbing.php" class="nav-link <?php if($title == 'Penilaian Pembimbing') {echo 'active';}; ?>">
                <i class="fas fa-users"></i>
                <p>
                    Penilaian Pembimbing
                </p>
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item">
        <a href="../conf/logout.php" 
        onclick="return confirm('Apakah anda yakin ingin keluar ?')"
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


