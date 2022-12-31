<?php 
    session_start();
    include('../../conf/config.php');
    include('header.php');
    ?>

     <?php 
    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM tb_laporan_harian WHERE id='$id'");
    $view = mysqli_fetch_array($query);
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

    <?php include('navbar.php'); ?>

        <!-- Main Sidebar Container -->
        <?php $hal = "laporan harian"?>
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
                    <label for="nama">Pembimbing</label>
                    <div>
                      <select class="form-control select2 disabled" style="width: 100%;" name='nama_pembimbing' disabled>
                        <?php $query2 = mysqli_query ($koneksi, "SELECT * FROM tb_pembimbing"); ?>
                        <?php while ($dataPembimbing = mysqli_fetch_array($query2)) { ?>
                          <?php if($dataPembimbing['id'] == $view['id_pembimbing']) : ?>
                            <option selected value="<?= $dataPembimbing['id']; ?>"><?= $dataPembimbing['nama_pembimbing']; ?></option>
                            <?php continue; ?>
                            <?php endif ?>
                            <option value="<?= $dataPembimbing['id']; ?>"><?= $dataPembimbing['nama_pembimbing']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
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
                        <?php //var_dump($view) ?>
                        <embed src="http://localhost/simagang/app/file/buktilaporan/<?= $view['bukti_file'] ?>" type="application/pdf" width="90%" height="500px"/>
                      </div>
                  <div class="d-flex justify-content-end">
                  <button type="button" onclick="goBack()" class="btn btn-info" >Tutup</button>        
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