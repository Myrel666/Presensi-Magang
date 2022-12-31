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
        <?php $title = "Data Pemagang"?>
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
                <?php 
            if(isset ($_SESSION['isCreateSuccess']) && $_SESSION['isCreateSuccess']){
            echo "<div classs='alert alert-success' role='alert'> Data Tersimpan </div>";
                  }  
                  if(isset ($_SESSION['isCreateSuccess']) && !$_SESSION['isCreateSuccess']) {
                    echo "<div classs='alert alert-danger' role='alert'> Username sudah dipakai </div>";
                  }
            ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Users</h3>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                            Tambah Data
                        </button>
                        <a href="export-pemagang.php" class="btn btn-info"  style="margin : 10px">
                            Export
                        </a>
                        <br>
                    
                    
                    </br>

                    

                        <!-- /.card-header -->
                        <table id="example1" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Divisi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $query = mysqli_query ($koneksi, "SELECT tbp.id, tbp.username, tbp.nama, tb_divisi.nama_divisi,status FROM tb_pemagang as tbp join tb_divisi on tb_divisi.id = tbp.id_divisi");
                                while ($row = mysqli_fetch_array($query)) {
                                $no++
                                ?>
                                <tr>
                                    <td width='5%'><?php echo $no;?></td>
                                    <td><?php echo $row ['username'];?></td>
                                    <td width='25%'><?php echo $row ['nama'];?></td>
                                    <td width='25%'><?php echo $row ['nama_divisi'];?></td>
                                    <td><span  class="badge bg <?= $row ['status'] == 'Aktif' ? 'badge bg-success' : 'badge bg-danger'; ?>"><?php echo $row ['status'];?></span></td>
                                    <td>
                                        <a href="delete/hapus_data.php?method=pemagang_delete&id=<?php echo $row ['id'];?>"
                                        onclick="return confirm('Data Akan Dihapus ?')" class="btn btn-sm btn-outline-danger"> Hapus </a>
                                        <a href="edit_datapemagang.php?id=<?= $row['id']; ?>"
                                            class="btn btn-sm btn-outline-warning">Ubah</a>
                                        <a href="detail_datapemagang.php?id=<?= $row['id']; ?>"
                                            class="btn btn-sm btn-outline-info">Detail</a>
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
                    <div class="modal-body">
                        <input type="hidden" name="method" value="add_pemagang">
                        <div class="form-group" required="required">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="nama">Divisi</label>
                            <div class="input-group">
                                <select class="form-control select2" style="width: 100%;" name="divisi">
                                    <option selected="selected">...</option>
                                    <?php $query = mysqli_query ($koneksi, "SELECT * FROM tb_divisi"); ?>
                                    <?php while ($row = mysqli_fetch_array($query)) { ?>
                                    <option value="<?= $row['id']; ?>"><?= $row['nama_divisi']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama_pembimbing">Pembimbing</label>
                            <div class="input-group">
                                <select class="form-control select2" style="width: 100%;" name="nama_pembimbing">
                                    <option selected="selected">...</option>
                                    <?php $query = mysqli_query ($koneksi, "SELECT * FROM tb_pembimbing"); ?>
                                    <?php while ($row = mysqli_fetch_array($query)) { ?>
                                    <option value="<?= $row['id']; ?>"><?= $row['nama_pembimbing']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama">NIM</label>
                            <input type="text" class="form-control" placeholder="NIM " name="nip">
                        </div>

                        <div class="form-group">
                            <label for="instansi">Universitas/Sekolah</label>
                            <div class="input-group">
                                <select class="form-control select2" style="width: 100%;" name="nama_sekolah">
                                    <option selected="selected">...</option>
                                    <?php $query = mysqli_query ($koneksi, "SELECT * FROM sekolah"); ?>
                                    <?php while ($row = mysqli_fetch_array($query)) { ?>
                                    <option value="<?= $row['id']; ?>"><?= $row['nama_sekolah']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="left" class="mb-3"
                            style="margin-top: 20px;" title="Wajib dipilih salah satu">
                            <label class="form-label">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="formCheck-1" name="jeniskelamin"
                                    value="Laki-laki">
                                <label class="form-check-label" for="formCheck-1">Laki-laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="formCheck-2" name="jeniskelamin"
                                    value="Perempuan">
                                <label class="form-check-label" for="formCheck-2">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="nama">Password</label>
                            <input type="text" autocomplete="off" class="form-control" placeholder="Password" name="password">
                        </div>
                        

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
    <!-- /.modal -->

    <!-- ./wrapper -->
    <?php include('footer.php');?>

    <!-- Page specific script -->
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