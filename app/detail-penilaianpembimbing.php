<?php 
    session_start();
    include ('../conf/cekLogin.php');
    include('../conf/config.php');
    include('header.php');
     ?>

     <?php 
        $id = $_GET['id'];
        $query = mysqli_query($koneksi,"SELECT * FROM tb_penilaianpembimbing WHERE id='$id'");
        $view = mysqli_fetch_array($query);
    // var_dump($view);
    // die;
      ?>

<!DOCTYPE html>
<html lang="en">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detail</title>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

    <?php include('navbar.php'); ?>

        <!-- Main Sidebar Container -->
        <?php $title = "Penilaian Pembimbing"?>
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
                <h3 class="card-title">Detail Penilaian Penguji</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="get">
                <div class="card-body">
                <div class="form-group">
                    
                <div>
                <label for="nama">Nama Pemagang</label>
                <select class="form-control select2 disabled" style="width: 100%;" name='divisi' disabled>
                <!-- <option selected></option> -->
                <?php $query1 = mysqli_query ($koneksi, "SELECT * FROM tb_pemagang"); ?>
                  <?php while ($dataPemagang = mysqli_fetch_array($query1)) { ?>
                    <?php if($dataPemagang['id'] == $view['id_pemagang']) { ?>
                      <option selected value="<?= $dataPemagang['id']; ?>"><?= $dataPemagang['nama']; ?></option>
                      <?php continue; ?>
                    <?php } ?>
                      <option value="<?= $dataPemagang['id']; ?>"><?= $dataPemagang['nama']; ?></option>
                  <?php } ?>
                </select>
                  </div>
                  </div>

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
                      <label for="nama">Penilaian Integritas</label>
                      <input type="text" class="form-control disabled" id="integritas" placeholder="divisi" name="integritas" value="<?php echo $view['integritas']?>" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label for="nama">Penilaian Ketepatanwaktu</label>
                        <input type="text" class="form-control disabled" id="penyampaian" placeholder="divisi" name="ketepatanwaktu" value="<?php echo $view['ketepatanwaktu']?>" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label for="nama">Penilaian Keahlian</label>
                        <input type="text" class="form-control disabled" id="proses_tanyajawab" placeholder="divisi" name="keahlian" value="<?php echo $view['keahlian']?>" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label for="nama">Penilaian Kerjasama</label>
                        <input type="text" class="form-control disabled" id="kepercayaandiri" placeholder="divisi" name="kerjasama" value="<?php echo $view['kerjasama']?>" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Feedback</label>
                        <textarea class="form-control disabled" id="exampleFormControlTextarea1" rows="3" placeholder="Deskripsikan kegiatan" name="feedback"  disabled><?php echo $view['feedback']?></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                  <button type="button" onclick="goBack()" class="btn btn-default" style="margin: 7px">Tutup</button>
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