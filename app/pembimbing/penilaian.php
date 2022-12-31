<!DOCTYPE html>
    <html lang="en">
      <?php 
      session_start();
      include('../../conf/cekLogin.php');
      include('../../conf/config.php');
      ?>
      <?php
      include('header.php');
      ?>

    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php include ('navbar.php'); ?>

    <!-- Main Sidebar Container -->
    <?php $hal = "Penilaian"?>
    <!-- sidebar -->
    <?php include('sidebar.php');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php include('content-header.php');?>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Penilaian Pemagang</h3>
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
                    <th>Nama</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    // $query = mysqli_query ($koneksi, "SELECT tblh.id, created_at, nama_kegiatan, status FROM tb_laporan_harian as tblh, tb_pemagang as tbp WHERE tbp.id=tblh.id_pemagang AND tblh.id_pemagang='{$_SESSION['id_pemagang']}'");
                    $query = mysqli_query ($koneksi, "SELECT * FROM tb_penilaianpembimbing WHERE id_pembimbing='{$_SESSION['id_pembimbing']}'");
                    while ($row = mysqli_fetch_array($query)) {
                      $no++
                    ?>
                  <tr>
                    <td>
                      <?php echo $no;?>
                    </td>
                    <td>
                    <?php
                      $query2 = mysqli_query ($koneksi, "SELECT * FROM tb_pemagang WHERE id='{$row['id_pemagang']}'");
                      $row2 = mysqli_fetch_array($query2);
                      echo $row2['nama'];
                      ?>
                    </td>
                    <td>
                      <a href= "detail-penilaian.php?id-penilaian=<?= $row['id'];?>&id-pemagang=<?= $row['id_pemagang'] ?>" class="btn btn-sm btn-outline-info">Lihat</a>
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
            <form  method="post" action="../add/tambah_penilaianpembimbing.php">
            <div class="modal-body">
            
            <div class="form-group">
                <label for="nama">Nama Pemagang</label>
                    <div class="input-group">
                        <select class="form-control select2" style="width: 100%;" name="id_pemagang">
                  <option selected="selected">...</option>
                    <?php $query = mysqli_query ($koneksi, "SELECT * FROM tb_pemagang"); ?>
                    <?php while ($row = mysqli_fetch_array($query)) { ?>
                  <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
                <?php } ?>
             </select>
            </div>
            </div>

            <div class="form-group">
            <label for="nama">Penilaian Integritas</label>
            <div>
            <input type="radio" id="integritas" name="integritas" value="Buruk">
            <label for="integritas">Buruk</label><br>
            <input type="radio" id="integritas" name="integritas" value="Agak Buruk">
            <label for="integritas">Agak Buruk</label><br>
            <input type="radio" id="html" name="integritas" value="Cukup">
            <label for="integritas">Cukup</label><br>
            <input type="radio" id="integritas" name="integritas" value="Baik">
            <label for="integritas">Baik</label><br>
            <input type="radio" id="integritas" name="integritas" value="Baik Sekali">
            <label for="integritas">Baik Sekali</label>
            </div>
            </div>

            <div class="form-group">
            <label for="nama">Penilaian KetepatanWaktu</label>
            <div>
            <input type="radio" id="ketepatanwaktu" name="ketepatanwaktu" value="Buruk">
            <label for="ketepatanwaktu">Buruk</label><br>
            <input type="radio" id="ketepatanwaktu" name="ketepatanwaktu" value="Agak Buruk">
            <label for="ketepatanwaktu">Agak Buruk</label><br>
            <input type="radio" id="ketepatanwaktu" name="ketepatanwaktu" value="Cukup">
            <label for="ketepatanwaktu">Cukup</label><br>
            <input type="radio" id="ketepatanwaktu" name="ketepatanwaktu" value="Baik">
            <label for="ketepatanwaktu">Baik</label><br>
            <input type="radio" id="ketepatanwaktu" name="ketepatanwaktu" value="Baik Sekali">
            <label for="ketepatanwaktu">Baik Sekali</label>
            </div>
            </div>

            <div class="form-group">
            <label for="nama">Keahlian</label>
            <div>
            <input type="radio" id="keahlian" name="keahlian" value="Buruk">
            <label for="keahlian">Buruk</label><br>
            <input type="radio" id="keahlian" name="keahlian" value="Agak Buruk">
            <label for="keahlian">Agak Buruk</label><br>
            <input type="radio" id="keahlian" name="keahlian" value="Cukup">
            <label for="integritas">Cukup</label><br>
            <input type="radio" id="keahlian" name="keahlian" value="Baik">
            <label for="keahlian">Baik</label><br>
            <input type="radio" id="keahlian" name="keahlian" value="Baik Sekali">
            <label for="keahlian">Baik Sekali</label>
            </div>
            </div>

            <div class="form-group">
            <label for="nama">Penilaian Kerjasama</label>
            <div>
            <input type="radio" id="kerjasama" name="kerjasama" value="Buruk">
            <label for="kerjasama">Buruk</label><br>
            <input type="radio" id="kerjasama" name="kerjasama" value="Agak Buruk">
            <label for="kerjasama">Agak Buruk</label><br>
            <input type="radio" id="html" name="kerjasama" value="Cukup">
            <label for="kerjasama">Cukup</label><br>
            <input type="radio" id="kerjasama" name="kerjasama" value="Baik">
            <label for="kerjasama">Baik</label><br>
            <input type="radio" id="kerjasama" name="kerjasama" value="Baik Sekali">
            <label for="kerjasama">Baik Sekali</label>
            </div>
            </div>

            <div class="form-group">
            <label for="nama">Penilaian Pengembangan Diri</label>
            <div>
            <input type="radio" id="pengembangandiri" name="pengembangandiri" value="Buruk">
            <label for="pengembangandiri">Buruk</label><br>
            <input type="radio" id="pengembangandiri" name="pengembangandiri" value="Agak Buruk">
            <label for="pengembangandiri">Agak Buruk</label><br>
            <input type="radio" id="html" name="pengembangandiri" value="Cukup">
            <label for="pengembangandiri">Cukup</label><br>
            <input type="radio" id="pengembangandiri" name="pengembangandiri" value="Baik">
            <label for="pengembangandiri">Baik</label><br>
            <input type="radio" id="pengembangandiri" name="pengembangandiri" value="Baik Sekali">
            <label for="pengembangandiri">Baik Sekali</label>
            </div>
            </div>

            <div class="form-group">
            <label for="exampleFormControlTextarea1">Feedback</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Feedback" name="feedback"></textarea>
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


    </body>
    </html>
