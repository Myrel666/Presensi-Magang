    <!DOCTYPE html>
    <html lang="en">
    <!-- Head -->
    <?php
    session_start();
    include('../conf/cekLogin.php');
    include('../conf/config.php');
    ?>
    <?php 
    include('header.php');
    ?>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <?php include ('navbar.php') ?>

    <!-- Main Sidebar Container -->
    <?php $title = "Beranda"?>
    <?php include('sidebar.php');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <?php include('content-header.php');?>
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
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pemagang");
                    $jumlahDivisi = mysqli_num_rows($query);
                    ?>
                    <h3><?= $jumlahDivisi ?></h3>
                    <p>PEMAGANG</p>
                </div>

                <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner">
                <?php 
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pembimbing");
                    $jumlahDivisi = mysqli_num_rows($query);
                    ?>
                    <h3><?= $jumlahDivisi ?></h3>
                    <p>PEMBIMBING</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                <div class="inner">
                    <?php 
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_penguji");
                    $jumlahDivisi = mysqli_num_rows($query);
                    ?>
                    <h3><?= $jumlahDivisi ?></h3>
                    <p>PENGUJI</p>
                </div>

                <div class="icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                </div>
            </div>
            <!-- ./col -->
</div>
            <div class="row">
          <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-pink"><i class="fas fa-briefcase"></i></span>

              <div class="info-box-content">
              <?php 
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_divisi");
                    $jumlahDivisi = mysqli_num_rows($query);
                    ?>
                <span class="info-box-text">Divisi</span>
                <span class="info-box-number"><?= $jumlahDivisi ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-purple"><i class="fas fa-school"></i></span>

              <div class="info-box-content">
              <?php 
                    $query = mysqli_query($koneksi, "SELECT * FROM sekolah");
                    $jumlahSekolah = mysqli_num_rows($query);
                    ?>
                <span class="info-box-text">Sekolah</span>
                <span class="info-box-number"><?= $jumlahSekolah ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>
    </div >
<div class="row">
    <div class="col-md-6">
            <!-- Bar chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Jumlah Pemagang Perbulan
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
              <div id="bar-chart" style="height: 300px;"></div>
              </div>
            <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>

        <!-- Calendar -->
        <div class="col-lg-6">
        <div class="card card-primary card-outline">
        <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Kalender
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="height: 320px;"></div>
              </div>
            </div>
</div>
</div>
              
              <!-- /.card-body -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Footer -->
    <?php include('footer.php');?>

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
    <script>
        <?php 
        $query = mysqli_query($koneksi, "SELECT month(created_at) as bulan, count(id) as data  FROM `tb_pemagang`group by month(created_at);");
        $hasil = [];
        while($val = mysqli_fetch_assoc($query)) {
            $hasil[] = [$val['bulan'],$val['data']];
        }
        ?>
    var bar_data = {
      data : <?= json_encode($hasil) ?>,
      bars: { show: true }
    }
    
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#0092ff'],
      xaxis : {
        ticks: [[1,'Januari'], [2,'Februari'], [3,'Maret'], [4,'April'], [5,'Mei'], [6,'Juni'],[7,'Juli'],[8,'Agustus'],[9,'September'],[10,'Oktober'],[11,'November'],[12,'Desember']]
      },
    })
    </script>
    
    <script type="text/javascript">
        window.onload = date_time('date_time');
    </script>
    </body>
    </html>
