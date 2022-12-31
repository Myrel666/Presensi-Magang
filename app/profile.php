<!DOCTYPE html>
    <html lang="en">
    <?php
    session_start();
    include ('header.php');?>
    <?php include('../conf/config.php');?>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    
    <!-- Main Sidebar Container -->
    <?php include('sidebar.php');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <?php include('content-header.php');?>
        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
        <div class="card card-primary card-outline">
        <div class="card-header py-2">
            <h3 class="card-title">Pengaturan Akun</h3>
        </div>
        <div class="card-body">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Nama Lengkap">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputText" placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputDivisi" class="col-sm-2 col-form-label">Divisi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputDivisi" placeholder="Divisi">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  </div>
                    </div>
</div>
</div>
        </section>
        <!-- /.content -->
    </div>
    

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- /.content-wrapper -->

    <!-- Footer -->
    <?php include ('footer.php') ?>

    <!-- Page specific script -->
    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
