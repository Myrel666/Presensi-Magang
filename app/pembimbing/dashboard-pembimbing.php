    <!DOCTYPE html>
    <html lang="en">
    <?php 
    session_start();
    include('../../conf/cekLogin.php');
    ?>
    <?php include('../../conf/config.php');?>
    <?php
    include('header.php');
    ?>

    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include ('navbar.php'); ?>


    <!-- Main Sidebar Container -->
    <?php $hal = "dashboard pembimbing"?>
    <!-- sidebar -->
    <?php include('sidebar.php');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Beranda</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Beranda</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                <?php 
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_laporan_harian WHERE status = 'disetujui'AND id_pembimbing = '$_SESSION[id_pembimbing]'");
                    $jumlahDisetujui = mysqli_num_rows($query);
                    ?>
                    <h3><?= $jumlahDisetujui ?></h3>

                    <p>DISETUJUI</p>
                </div>
                <div class="icon">
                    <i class="ion ion-checkmark-circled"></i>
                </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                <div class="inner">
                <?php 
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_laporan_harian WHERE status = 'ditolak' AND id_pembimbing = '$_SESSION[id_pembimbing]'");
                    $jumlahDitolak= mysqli_num_rows($query);
                    ?>
                    <h3><?= $jumlahDitolak ?></h3>
                    <p>DITOLAK</p>
                </div>
                <div class="icon">
                    <i class="ion ion-close-circled"></i>
                </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner">
                <?php 
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_laporan_harian WHERE status = 'proses' AND id_pembimbing = '$_SESSION[id_pembimbing]'");
                    $jumlahDiproses = mysqli_num_rows($query);
                    ?>
                    <h3><?= $jumlahDiproses ?></h3>

                    <p>DIPROSES</p>
                </div>
                <div class="icon">
                    <i class="ion ion-loop"></i>
                </div>
                </div>
            </div>

            <div class="col-lg-6">
            <div class="card"> 
            <div id="map" style="width: 700px; height: 322px;"></div>
            </div>

            </div>

            <!-- Calendar -->
            <div class="col-lg-6">
            <div class="card bg-gradient-default">
            <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <button type="button" class="btn btn-pink btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
            </div>

              <!-- /.card-body -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include('footer.php');?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    </body>
    </html>
