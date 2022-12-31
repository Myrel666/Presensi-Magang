<!DOCTYPE html>
    <html lang="en">
    <?php 
    session_start(); 
    include('../conf/cekLogin.php');
    ?>
    <?php include('header.php');?>
    <?php include('../conf/config.php');?>
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
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                  Tambah Data
                </button>
                <a href="export-pembimbing.php" class="btn btn-info"  style="margin : 10px">
                            Export
                </a>
                <br></br>
                <table id="example1" class="table table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Divisi</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php
                    $no = 0;
                    $query = mysqli_query ($koneksi, "SELECT tbp.id, nama_pembimbing, username, nama_divisi FROM tb_pembimbing as tbp, tb_divisi as tbd WHERE tbd.id = tbp.id_divisi");
                    while ($row = mysqli_fetch_array($query)) {
                      $no++
                    ?>
                    <td><?php echo $no;?></td>
                    <td><?php echo $row ['nama_pembimbing'];?></td>
                    <td><?php echo $row ['username'];?></td>
                    <td><?php echo $row ['nama_divisi'];?></td>
                    <td>
                      <a href="delete/hapus_data.php?method=pembimbing_delete&id=<?php echo $row ['id'];?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Data Akan Dihapus ?')"> Hapus </a>
                      <a href= "edit_datapembimbing.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-warning">Ubah</a>
                      <a href= "detail_datapembimbing.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-info">Detail</a>
                    </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
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
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="get" action="add/tambah_data.php">
            <input type="hidden" name="method" value="add_pembimbing">
            <div class="modal-body">
    
            <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
            </div>
            <div class="form-group">
            <label for="nama">Divisi</label>
            <div>
            <select class="form-control select2" name="divisi" style="width: 100%;" name="divisi">
              <option selected>...</option>
              <?php $query = mysqli_query ($koneksi, "SELECT * FROM tb_divisi"); ?>
              <?php while ($row = mysqli_fetch_array($query)) { ?>
                <option value="<?= $row['id']; ?>"><?= $row['nama_divisi']; ?></option>
              <?php } ?>
            </select>
              </div>
            </div>
            <div class="form-group">
            <label for="nama">Username</label>
            <input type="text" class="form-control" placeholder="Username" name="username">
            </div>
            <div class="form-group">
            <label for="nama">Password</label>
            <input type="text" autocomplete ="off" class="form-control" placeholder="Password" name="password">
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
    <!-- ./wrapper -->



    <!-- Page specific script -->
    <script>
    $(function () {
        $('.select2').select2()
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
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
    </body>
    </html>
