<?php 
    session_start();
    include ('../../conf/cekLogin.php');
    include('../../conf/config.php');
    include('header.php');
     ?>

     <?php 
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "SELECT * FROM tb_penilaian WHERE id='$id'");
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
        <?php $title = "Beranda"?>
        <?php include('sidebar.php');?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
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
                <select class="form-control select2 disabled" style="width: 100%;" name='pemagang' disabled>
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
            <label for="nama">Nama Penguji</label>
            <input type="text" class="form-control disabled" id="nama_penguji" name="nama_penguji" value="<?php echo $view['nama_penguji']?>" disabled>
            </div>

            <div class="form-group">
            <label for="nama">Email</label>
            <input type="email" class="form-control disabled" id="email" placeholder="divisi" name="email" value="<?php echo $view['email']?>" disabled>
            </div>

            <div class="form-group">
            <label for="nama">Penilaian Presentasi</label>
            <input type="text" class="form-control disabled" id="presentasi" placeholder="divisi" name="presentasi" value="<?php echo $view['presentasi']?>" disabled>
            </div>

            <div class="form-group">
            <label for="nama">Penilaian Penyampaian</label>
            <input type="text" class="form-control disabled" id="penyampaian" placeholder="divisi" name="penyampaian" value="<?php echo $view['penyampaian']?>" disabled>
            </div>

            <div class="form-group">
            <label for="nama">Proses Tanya Jawab</label>
            <input type="text" class="form-control disabled" id="proses_tanyajawab" placeholder="divisi" name="proses_tanyajawab" value="<?php echo $view['penyampaian']?>" disabled>
            </div>

            <div class="form-group">
            <label for="nama">Kepercayaan Diri</label>
            <input type="text" class="form-control disabled" id="kepercayaandiri" placeholder="divisi" name="kepercayaandiri" value="<?php echo $view['penyampaian']?>" disabled>
            </div>

            <div class="form-group">
            <label for="nama">Problem Solving</label>
            <input type="text" class="form-control disabled" id="problemsolving" placeholder="divisi" name="problemsolving" value="<?php echo $view['penyampaian']?>" disabled>
            </div>

            <div class="form-group">
            <label for="nama">Penguasaan Materi</label>
            <input type="text" class="form-control disabled" id="penguasaanmateri" placeholder="divisi" name="penguasaanmateri" value="<?php echo $view['penyampaian']?>" disabled>
            </div>

            <div class="form-group">
            <label for="nama">Mempertahankan Pendapat</label>
            <input type="text" class="form-control disabled" id="mempertahankanpendapat" placeholder="divisi" name="mempertahankanpendapat" value="<?php echo $view['penyampaian']?>" disabled>
            </div>

            <div class="form-group">
            <label for="nama">Inovatif</label>
            <input type="text" class="form-control disabled" id="inovatif" placeholder="divisi" name="inovatif" value="<?php echo $view['penyampaian']?>" disabled>
            </div>

            <div class="form-group">
            <label for="nama">Komunikasi</label>
            <input type="text" class="form-control disabled" id="komunikasi" placeholder="divisi" name="komunikasi"  value="<?php echo $view['penyampaian']?>" disabled>
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