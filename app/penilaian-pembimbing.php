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
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pemagang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pemagang</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 0;
                    $query = mysqli_query ($koneksi, "SELECT tbp.id, nama FROM tb_penilaianpembimbing as tbp, tb_pemagang as tbp1 WHERE tbp1.id = tbp.id_pemagang");
                    while ($row = mysqli_fetch_array($query)) {
                      $no++
                    ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $row['nama'];?></td>
                    <td>
                    <a href="delete/hapus_data.php?method=penilaianpembimbing_delete&id=<?php echo $row ['id'];?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Data Akan Dihapus ?')">Hapus</a>
                    <a href="detail-penilaianpembimbing.php?id=<?= $row['id'];?>" class="btn btn-sm btn-outline-info" >Lihat</a>
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
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    <!-- ./wrapper -->

    
    <!-- Page specific script -->
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": true,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        });
    });
    </script>
    </body>
    </html>
