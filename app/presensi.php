<!DOCTYPE html>
<html lang="en">
    <?php 
    session_start();
    include ('../conf/cekLogin.php');
    include('../conf/config.php');
    ?>
   <?php
   include('header.php');
   ?>

    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php include ('navbar.php'); ?>


    <!-- Main Sidebar Container -->
    <?php $title = "Presensi"?>
    <!-- sidebar -->
    <?php include('sidebar.php');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <?php include('content-header.php') ?>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Presensi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    // echo $_SESSION['id_pembimbing'];
                    // $query = mysqli_query ($koneksi, "SELECT tblh.id, created_at, nama_kegiatan, status FROM tb_laporan_harian as tblh, tb_pembimbing as tbp WHERE tbp.id=tblh.id_pembimbing AND tblh.id_pembimbing='{$_SESSION['id_pembimbing']}'");
                    $query = mysqli_query ($koneksi, "SELECT * FROM tb_presensi");
                    while ($row = mysqli_fetch_array($query)) {
                      $no++
                      // var_dump(mysqli_fetch_array($query));
                      ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $row ['tgl']?></td>
                    <td>
                      <?php
                      $query2 = mysqli_query ($koneksi, "SELECT * FROM tb_pemagang WHERE id='{$row['id_pemagang']}'");
                      $row2 = mysqli_fetch_array($query2);
                      echo $row2['nama'];
                      ?>
                    </td>
                    <td><?php echo $row ['jam_masuk'];?></td>
                    <td><?php echo $row ['jam_pulang'];?></td>
                    <td>
                      <a href= "detail-presensi.php?id-presensi=<?= $row['id'];?>&id-pemagang=<?= $row['id_pemagang'] ?>" class="btn btn-sm btn-outline-info">Detail</a>
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
      <!-- ./wrapper -->
      
    
      <script>
    $(function() {
        $('.select2').select2()
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
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
    