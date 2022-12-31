<!DOCTYPE html>
    <html lang="en">
    <?php session_start(); ?>
    <?php include('../../conf/cekLogin.php'); ?>
    <?php include('header.php');?>
    <?php include('../../conf/config.php');?>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <?php include('navbar.php'); ?>
    
    <!-- Main Sidebar Container -->
    <?php $hal = "Pengajuan"?>
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
                <h3 class="card-title">Pengajuan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                  Tambah Data
              </button>
                <br></br>
                <table id="example1" class="table table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Alasan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    $query = mysqli_query ($koneksi, "SELECT * FROM tb_pengajuan WHERE id_pemagang='{$_SESSION['id_pemagang']}'");
                    while ($row = mysqli_fetch_array($query)) {
                      $no++
                    ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $row ['created_at'];?></td>
                    <td><?php echo $row ['tipe'];?></td>
                    <td><span  class="badge bg <?= ($row ['status'] == 'proses' ? 'badge bg-warning' : ($row ['status'] == 'disetujui' ? 'badge bg-success' : 'badge bg-danger')); ?>"><?php echo $row ['status'];?></span></td>
                    <td>
                    <a href="../delete/hapus_data.php?method=pengajuan_delete&id=<?php echo $row ['id'];?>" onclick="return confirm('Data Akan Dihapus ?')" class="btn btn-sm btn-outline-danger" > Hapus </a>
                    <a href= "detail_pengajuan.php?id=<?= $row['id'];?>" class="btn btn-sm btn-outline-info">Detail</a>
                    </td>
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
            <h4 class="modal-title">Tambah Data Pengajuan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <form method="post" action="../add/tambah_pengajuan.php" enctype="multipart/form-data">
            <div class="modal-body">
            
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
              <div data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="left" class="mb-3"
                            style="margin-top: 20px;" title="Wajib dipilih salah satu">
                            <label class="form-label">Alasan</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="formCheck-1" name="tipe"
                                    value="sakit">
                                <label class="form-check-label" for="formCheck-1">Sakit</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="formCheck-1" name="tipe"
                                    value="izin">
                                <label class="form-check-label" for="formCheck-1">Izin</label>
                            </div>
                        </div>
            <div class="form-group">
            <label for="exampleFormControlTextarea1">Keterangan</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Keterangan" name="deskripsi"></textarea>
            </div>
            <div class="form-group">
            <label class="form-label" for="customFile">Bukti Pengajuan</label>
            <div>
            <input type="file" name="bukti" class="form-control-sm" id="customFile" required>
            </div>
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
    <!-- ./wrapper -->
    
    <!-- Page specific script -->
    <script>
    $(function () {
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
