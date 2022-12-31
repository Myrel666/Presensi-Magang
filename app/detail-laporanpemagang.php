<?php 
    session_start();
    include ('../conf/cekLogin.php');
    include('../conf/config.php');
    include('header.php');
    ?>

     <?php 
    $idLaporan = $_GET['id-laporan'];
    $idPemagang = $_GET['id-pemagang'];
    $query = mysqli_query($koneksi,"SELECT * FROM tb_laporan_harian WHERE id='$idLaporan'");
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
                <h3 class="card-title">Detail Laporan</h3>
              </div>
              
              <!-- /.card-header -->
              <!-- form start -->
              <form method="get">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <div>
                            <input type="text" class="form-control disabled" id="nama" name="nama" value="<?php echo $view1['nama']?>" disabled>
                        </div>
                      <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="text" class="form-control disabled"  placeholder="Nama Kegiatan" name='nama_kegiatan' value="<?php echo $view['nama_kegiatan']?>" disabled>
                        <input type="text" class="form-control" name='id' value="<?php echo $view['id']?>" hidden>
                          </div>
                          <div class="form-group">
                        <label>Deskripsi Kegiatan</label>
                        <textarea type="textarea" class="form-control disabled" rows="3" placeholder="Deskripsikan" name='deskripsi' disabled><?php echo $view['deskripsi_kegiatan']?></textarea>
                          </div>
                          <div class="form-group">
                      </div>

                      <div class="form-group">
                      <label class="form-label" for="customFile">Bukti Kegiatan</label>
                      <div>
                      <?php if ($view['bukti_file'] != null) { ?>
                      <embed src="http://localhost/simagang/app/file/buktilaporan/<?= $view['bukti_file'] ?>" type="application/pdf" width="90%" height="500px" />
                      <?php } else { ?>
                            <h6><i>tidak ada lampiran</i></h6>
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