<?php 
    session_start();
    include ('../conf/cekLogin.php');
    include('../conf/config.php');
    include('header.php');
    ?>

     <?php 
    $idPresensi = $_GET['id-presensi'];
    $idPemagang = $_GET['id-pemagang'];
    $query = mysqli_query($koneksi,"SELECT * FROM tb_presensi WHERE id='$idPresensi'");
    $query1 = mysqli_query($koneksi,"SELECT * FROM tb_pemagang WHERE id='$idPemagang'");
    $view = mysqli_fetch_array($query);
    $view1 = mysqli_fetch_array($query1);
    // var_dump($view);
    // die;
      ?>

<!DOCTYPE html>
<html lang="en">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ubah Data</title>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

    <!-- navbar -->
    <?php include('navbar.php'); ?>


        <!-- Main Sidebar Container -->
        <?php $title = "Laporan Harian"?>
        <?php include('sidebar.php');?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php include('content-header.php');?>
            <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
                <div class="container-fluid">
                </div><!-- /.container-fluid -->
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Detail Presensi</h3>
              </div>
              
              <!-- /.card-header -->
              <!-- form start -->
              <form method="get">
                <div class="card-body">

                      <div class="form-group">
                      <label class="form-label" for="customFile">Bukti Masuk</label>
                      <div>
                        <?php if ($view['bukti_masuk'] != null) { ?>
                      <img src="http://localhost/simagang/app/file/buktipresensi/masuk/<?= $view['bukti_masuk'] ?>" width="60%" >
                        <?php } else { ?>
                            <h6><i>tidak ada bukti masuk</i></h6>
                        <?php } ?>
                      </div>

                      <div class="form-group">
                      <label class="form-label" for="customFile">Bukti Pulang</label>
                      <div>
                        <?php if ($view['bukti_pulang'] != null) { ?>
                      <img src="http://localhost/simagang/app/file/buktipresensi/pulang/<?= $view['bukti_pulang'] ?>" width="60%" >
                        <?php } else { ?>
                            <h6><i>tidak ada bukti pulang</i></h6>
                        <?php } ?>
                      </div>

                  <div class="d-flex justify-content-end">
                  <button type="button" onclick="goBack()" class="btn btn-default">Tutup</button>        
                  </div>
              </form>
            </div>
            <!-- /.card -->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include('footer.php');?>

  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>
</html>