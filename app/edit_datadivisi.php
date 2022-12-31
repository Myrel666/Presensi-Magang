<?php 
    session_start();
    //include ('../conf/cek_login.php');
    include('../conf/config.php');
    include('header.php');
     ?>

     <?php 
    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM tb_divisi WHERE id='$id'");
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
        <?php $title = "data divisi"?>
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
              <form method="get" action="edit/edit_divisi.php">
                <?php //var_dump($view) ?> 
                <div class="card-body">
        
                  <div class="form-group">
                  <label for="nama">Divisi</label>
                <div>
                <input type="text" class="form-control"  placeholder="Nama Lengkap" name='nama_divisi' value="<?php echo $view['nama_divisi']?>">
                <input type="text" class="form-control"  placeholder="Nama Lengkap" name='id' value="<?php echo $view['id']?>" hidden>
                  </div>
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

