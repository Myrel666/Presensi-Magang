    <!DOCTYPE html>
    <html lang="en">
    <?php session_start();
    include('../../conf/cekLogin.php');
    include ('header.php');?>
    <?php include('../../conf/config.php');?>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <?php include('navbar.php'); ?>

    
    <!-- Main Sidebar Container -->
    <?php $hal = "Dashboard Pemagang"?>
    <!-- sidebar -->
    <?php include('sidebar.php');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <?php include('content-header.php');?>
        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
        <!-- <div style="text-align:center">
            <?php date_default_timezone_set("Asia/Jakarta"); ?>
            <h2 id="date_time"></h2>
        </div> -->

        <div class="card-body row end">
                <div class="col-lg-4 col-6">
                <h5 id="date_time"></h5>
                </div>
                <div class="col-lg-4 col-6">
                </div>

                <div class="col-lg-2 col-6">
                    <?php
                    
                    $date = date('d');
                    $hours = date('d-m-Y H:i:s');
                    $hoursNow = date('H');
                    $test = date(18);

                    $query = mysqli_query($koneksi, "SELECT * FROM tb_presensi WHERE tgl = CURDATE() AND id_pemagang = '{$_SESSION['id_pemagang']}' AND jam_masuk != '00:00:00'");
                    $query1 = mysqli_query($koneksi, "SELECT * FROM tb_presensi WHERE tgl = CURDATE() AND id_pemagang = '{$_SESSION['id_pemagang']}' AND jam_pulang != '00:00:00'");
                    // $query = mysqli_query($koneksi, "SELECT * FROM tb_presensi WHERE DAY(created_at) = '$date' AND id_pemagang = '{$_SESSION['id_pemagang']}' AND HOUR(created_at) = date(8) AND HOUR(created_at) = date(12)");
                    // $query1 = mysqli_query($koneksi, "SELECT * FROM tb_presensi WHERE DAY(created_at) = '$date' AND id_pemagang = '{$_SESSION['id_pemagang']}' AND HOUR(created_at) = date(13) AND HOUR(created_at) = date(24)");
                    // $query1 = mysqli_query($koneksi, "SELECT * FROM jam_pulang WHERE DAY(created_at) = '$date' AND id_pemagang = '{$_SESSION['id_pemagang']}'");
                    // $result = mysqli_fetch_array($query);
                    // $test = mysqli_query($koneksi, "SELECT * FROM tb_presensi WHERE jam_pulang != '00:00:00'");

                    // var_dump(mysqli_num_rows($test));
                    
                    // var_dump(date('H', strtotime($hours)));
                    $new_hours = date('H', strtotime($hours));
                    $new_hours1 = date('H', strtotime('+2 hours', strtotime($hours)));
                    // if ($hoursNow >= date(8) && $hoursNow <= date(12)) {
                    //     echo 'masuk';
                    // } else {
                    //     echo 'pulang';
                    // }
                    // if ($new_hours >= )
                    // var_dump($test);
                    // $cekMasuk = 
                    $count = mysqli_num_rows($query);
                    $count1 = mysqli_num_rows($query1);
                    // $count1 = mysqli_num_rows($query1);
                     ?>
                <button type="button" name="masuk" data-toggle="modal" data-target="#modal-default" class="btn btn-outline-info btn-block" <?php echo $count > 0 ? 'disabled' : ''; ?> <?php // echo $hoursNow >= date(8) && $hoursNow <= date(20) ? '' : 'disabled' ?>>Masuk</button>
                </div>
                
                <div class="col-lg-2 col-6">
                <button type="button" name="pulang" data-toggle="modal" data-target="#modal-default1" class="btn btn-outline-info btn-block" <?php echo $count1 > 0 ? 'disabled' : ''; ?> <?php // echo $hoursNow >= date(13) && $hoursNow <= date(24) ? '' : 'disabled' ?> >Pulang</button>
                </div>
                </div>
                
            <!-- Small boxes (Stat box) -->
            <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                <?php 
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_laporan_harian WHERE status = 'disetujui' AND id_pemagang = '$_SESSION[id_pemagang]'");
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
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_laporan_harian WHERE status = 'ditolak' AND id_pemagang = '$_SESSION[id_pemagang]'");
                    $jumlahDitolak = mysqli_num_rows($query);
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
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_laporan_harian WHERE status = 'proses' AND id_pemagang = '$_SESSION[id_pemagang]'");
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

          <!-- /.col-md-6 -->
          <!-- <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Kehadiran</h3>
                  <a href="presensi.php">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">$18,230.00</span>
                    <span>Sales Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p>
                </div> -->
                <!-- /.d-flex -->

                <!-- <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span>
                </div>
              </div>
            </div> -->
            <!-- /.card -->

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


    

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- /.content-wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="../add/jam_masuk.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                        <label class="form-label" for="masuk">Masuk</label><br>
                        <h6><i>Wajib Melampirkan Foto Bukti Masuk menggunakan aplikasi GPS Map Camera</i></h6>
                        <div>
                        <input type="file" name="masuk" id="masuk" accept="image/gif, image/jpeg, image/png" class="form-control-sm"required>
                        </div>
                        <!-- <div class="form-group">
                        <label class="form-label" for="pulang">Pulang</label>
                        <div>
                        <input type="file" name="pulang" id="pulang" accept="image/gif, image/jpeg, image/png" class="form-control-sm" required>
                        </div>
                        </div> -->
                        </div>
                        </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

  <!-- Modal -->
  <div class="modal fade" id="modal-default1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="../add/jam_pulang.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                        <label class="form-label" for="pulang">Pulang</label><br>
                        <h6><i>Wajib Melampirkan Foto Bukti Pulang menggunakan aplikasi GPS Map Camera</i></h6>
                        <div>
                        <input type="file" name="pulang" id="pulang" accept="image/gif, image/jpeg, image/png" class="form-control-sm"required>
                        </div>
                        <!-- <div class="form-group">
                        <label class="form-label" for="pulang">Pulang</label>
                        <div>
                        <input type="file" name="pulang" id="pulang" accept="image/gif, image/jpeg, image/png" class="form-control-sm" required>
                        </div>
                        </div> -->
                        </div>
                        </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->       




    <!-- Footer -->
    <?php include ('footer.php') ?>

    <!-- Page specific script -->
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
    </script>
    <script type="text/javascript">
        window.onload = date_time('date_time');
    </script>
    </body>
    </html>
