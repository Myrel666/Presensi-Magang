<?php 
    session_start();
    include ('../conf/cekLogin.php');
    include('../conf/config.php');
    include('header.php');
     ?>

     <?php 
    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM tb_pembimbing WHERE id='$id'");
    $view = mysqli_fetch_array($query);
    // var_dump($view);
    // die;
      ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ubah Data</title>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include('navbar.php');?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $title = "Data Pembimbing"?>
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
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Ubah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="get" action="edit/edit_pembimbing.php">
                <?php //var_dump($view) ?> 
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control"  placeholder="Nama Lengkap" name='nama' value="<?php echo $view['nama_pembimbing']?>">
                    <input type="text" class="form-control"  placeholder="Nama Lengkap" name='id' value="<?php echo $view['id']?>" hidden>
                  </div>
                  <div class="form-group">
                  <label for="nama">Divisi</label>
                <div>
                <select class="form-control select2" style="width: 100%;" name='divisi'>
                <!-- <option selected></option> -->
                <?php $query1 = mysqli_query ($koneksi, "SELECT * FROM tb_divisi"); ?>
                  <?php while ($dataDivisi = mysqli_fetch_array($query1)) { ?>
                    <?php if($dataDivisi['id'] == $view['id_divisi']) { ?>
                      <option selected value="<?= $dataDivisi['id']; ?>"><?= $dataDivisi['nama_divisi']; ?></option>
                      <?php continue; ?>
                    <?php } ?>
                      <option value="<?= $dataDivisi['id']; ?>"><?= $dataDivisi['nama_divisi']; ?></option>
                  <?php } ?>
                </select>
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control readonly"  placeholder="Username" name='username' value="<?php echo $view['username']?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name='password' value="">
                  </div>
                <div class="d-flex justify-content-end">
                <button type="button" onclick="goBack()" class="btn btn-default" data-dismiss="modal" style="margin: 7px">Tutup</button>
                <button type="submit" class="btn btn-warning" onclick="return confirm('Data Akan Diubah ?')" style="margin: 7px">Simpan</button>
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

