<!DOCTYPE html>
    <html lang="en">
    <?php 
    session_start();
    include('../../conf/cekLogin.php');
    ?>
    <?php include('../../conf/config.php');?>
    <?php
    include('header.php');
    ?>

    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include ('navbar.php'); ?>


    <!-- Main Sidebar Container -->
    <?php $hal = "dashboard pembimbing"?>
    <!-- sidebar -->
    <?php include('sidebar.php');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Beranda</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Beranda</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

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
              <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Tambah Data</button> -->
                <br></br>
                <?php //var_dump($_SESSION); ?>
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
                    //$query = mysqli_query ($koneksi, "SELECT tbp.id, nama, status_penilaian FROM tb_penilaian as tbp, tb_pemagang as tbp1 WHERE tbp1.id = tbp.id_pemagang");
                    //$query = mysqli_query ($koneksi, "SELECT tbp.id, nama, status_penilaian FROM tb_penilaian as tbp, tb_pemagang as tbp1 WHERE tbp1.id = tbp.id_pemagang AND tbp1.status = 'Aktif'");
                    $query = mysqli_query ($koneksi, "SELECT * FROM tb_pemagang  WHERE status = 'Aktif'");
                    while ($row = mysqli_fetch_array($query)) {
                      $no++
                    ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $row['nama'];?></td>
                    <!-- <td><span  class="badge bg <?//= $row ['status_penilaian'] == 'Sudah Dinilai' ? 'badge bg-success' : 'badge bg-warning'; ?>"><?php echo $row['status_penilaian'];?></span></td> -->
                    <td>
                    <a id="nilai" data-toggle="modal" data-target="#modal-default" class="btn btn-sm btn-outline-success" data-idPemagang="<?= $row['id'] ?>">Nilai</a>
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

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Nilai Pemagang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form  method="post" action="../add/tambah_penilaianpenguji.php">
            <input type="hidden" name="id-penguji" value="<?= $_SESSION['id_penguji'] ?>">
            <input type="hidden" name="id-pemagang" id="idPemagangForm">
            <div class="modal-body">
            

            <div class="form-group">
            <label for="nama">Penilaian Presentasi</label>
            <div>
            <input type="radio" id="presentasi" name="presentasi" value="Buruk">
            <label for="presentasi">Buruk</label><br>
            <input type="radio" id="presentasi" name="presentasi" value="Agak Buruk">
            <label for="presentasi">Agak Buruk</label><br>
            <input type="radio" id="html" name="presentasi" value="Cukup">
            <label for="presentasi">Cukup</label><br>
            <input type="radio" id="presentasi" name="presentasi" value="Baik">
            <label for="presentasi">Baik</label><br>
            <input type="radio" id="presentasi" name="presentasi" value="Baik Sekali">
            <label for="presentasi">Baik Sekali</label>
            </div>
            </div>

            <div class="form-group">
            <label for="nama">Penilaian Penyampaian</label>
            <div>
            <input type="radio" id="penyampaian" name="penyampaian" value="Buruk">
            <label for="penyampaian">Buruk</label><br>
            <input type="radio" id="penyampaian" name="penyampaian" value="Agak Buruk">
            <label for="penyampaian">Agak Buruk</label><br>
            <input type="radio" id="penyampaian" name="penyampaian" value="Cukup">
            <label for="penyampaian">Cukup</label><br>
            <input type="radio" id="penyampaian" name="penyampaian" value="Baik">
            <label for="penyampaian">Baik</label><br>
            <input type="radio" id="penyampaian" name="penyampaian" value="Baik Sekali">
            <label for="penyampaian">Baik Sekali</label>
            </div>
            </div>

            <div class="form-group">
            <label for="nama">Proses Tanya Jawab</label>
            <div>
            <input type="radio" id="proses_tanyajawab" name="proses_tanyajawab" value="Buruk">
            <label for="proses_tanyajawab">Buruk</label><br>
            <input type="radio" id="proses_tanyajawab" name="proses_tanyajawab" value="Agak Buruk">
            <label for="proses_tanyajawab">Agak Buruk</label><br>
            <input type="radio" id="proses_tanyajawab" name="proses_tanyajawab" value="Cukup">
            <label for="presentasi">Cukup</label><br>
            <input type="radio" id="proses_tanyajawab" name="proses_tanyajawab" value="Baik">
            <label for="proses_tanyajawab">Baik</label><br>
            <input type="radio" id="proses_tanyajawab" name="proses_tanyajawab" value="Baik Sekali">
            <label for="proses_tanyajawab">Baik Sekali</label>
            </div>
            </div>

            <div class="form-group">
            <label for="nama">Kepercayaan Diri</label>
            <div>
            <input type="radio" id="kepercayaandiri" name="kepercayaandiri" value="Buruk">
            <label for="kepercayaandiri">Buruk</label><br>
            <input type="radio" id="kepercayaandiri" name="kepercayaandiri" value="Agak Buruk">
            <label for="kepercayaandiri">Agak Buruk</label><br>
            <input type="radio" id="html" name="kepercayaandiri" value="Cukup">
            <label for="kepercayaandiri">Cukup</label><br>
            <input type="radio" id="kepercayaandiri" name="kepercayaandiri" value="Baik">
            <label for="kepercayaandiri">Baik</label><br>
            <input type="radio" id="kepercayaandiri" name="kepercayaandiri" value="Baik Sekali">
            <label for="kepercayaandiri">Baik Sekali</label>
            </div>
            </div>

            <div class="form-group">
            <label for="nama">Problem Solving</label>
            <div>
            <input type="radio" id="problemsolving" name="problemsolving" value="Buruk">
            <label for="problemsolving">Buruk</label><br>
            <input type="radio" id="problemsolving" name="problemsolving" value="Agak Buruk">
            <label for="problemsolving">Agak Buruk</label><br>
            <input type="radio" id="html" name="problemsolving" value="Cukup">
            <label for="problemsolving">Cukup</label><br>
            <input type="radio" id="problemsolving" name="problemsolving" value="Baik">
            <label for="problemsolving">Baik</label><br>
            <input type="radio" id="problemsolving" name="problemsolving" value="Baik Sekali">
            <label for="problemsolving">Baik Sekali</label>
            </div>
            </div>

            <div class="form-group">
            <label for="nama">Penguasaan Materi</label>
            <div>
            <input type="radio" id="penguasaanmateri" name="penguasaanmateri" value="Buruk">
            <label for="penguasaanmateri">Buruk</label><br>
            <input type="radio" id="penguasaanmateri" name="penguasaanmateri" value="Agak Buruk">
            <label for="penguasaanmateri">Agak Buruk</label><br>
            <input type="radio" id="html" name="penguasaanmateri" value="Cukup">
            <label for="penguasaanmateri">Cukup</label><br>
            <input type="radio" id="penguasaanmateri" name="penguasaanmateri" value="Baik">
            <label for="penguasaanmateri">Baik</label><br>
            <input type="radio" id="penguasaanmateri" name="penguasaanmateri" value="Baik Sekali">
            <label for="penguasaanmateri">Baik Sekali</label>
            </div>
            </div>

            <div class="form-group">
            <label for="nama">Mempertahankan Pendapat</label>
            <div>
            <input type="radio" id="mempertahankanpendapat" name="mempertahankanpendapat" value="Buruk">
            <label for="mempertahankanpendapat">Buruk</label><br>
            <input type="radio" id="mempertahankanpendapat" name="mempertahankanpendapat" value="Agak Buruk">
            <label for="mempertahankanpendapat">Agak Buruk</label><br>
            <input type="radio" id="html" name="mempertahankanpendapat" value="Cukup">
            <label for="mempertahankanpendapat">Cukup</label><br>
            <input type="radio" id="mempertahankanpendapat" name="mempertahankanpendapat" value="Baik">
            <label for="mempertahankanpendapat">Baik</label><br>
            <input type="radio" id="mempertahankanpendapat" name="mempertahankanpendapat" value="Baik Sekali">
            <label for="mempertahankanpendapat">Baik Sekali</label>
            </div>
            </div>

            <div class="form-group">
            <label for="nama">Inovatif</label>
            <div>
            <input type="radio" id="inovatif" name="inovatif" value="Buruk">
            <label for="inovatif">Buruk</label><br>
            <input type="radio" id="inovatif" name="inovatif" value="Agak Buruk">
            <label for="inovatif">Agak Buruk</label><br>
            <input type="radio" id="html" name="inovatif" value="Cukup">
            <label for="inovatif">Cukup</label><br>
            <input type="radio" id="inovatif" name="inovatif" value="Baik">
            <label for="inovatif">Baik</label><br>
            <input type="radio" id="inovatif" name="inovatif" value="Baik Sekali">
            <label for="inovatif">Baik Sekali</label>
            </div>
            </div>

            <div class="form-group">
            <label for="nama">Komunikasi</label>
            <div>
            <input type="radio" id="komunikasi" name="komunikasi" value="Buruk">
            <label for="komunikasi">Buruk</label><br>
            <input type="radio" id="komunikasi" name="komunikasi" value="Agak Buruk">
            <label for="komunikasi">Agak Buruk</label><br>
            <input type="radio" id="html" name="komunikasi" value="Cukup">
            <label for="komunikasi">Cukup</label><br>
            <input type="radio" id="komunikasi" name="komunikasi" value="Baik">
            <label for="komunikasi">Baik</label><br>
            <input type="radio" id="komunikasi" name="komunikasi" value="Baik Sekali">
            <label for="komunikasi">Baik Sekali</label>
            </div>
            </div>

            <div class="form-group">
            <label for="exampleFormControlTextarea1">Feedback</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Feedback" name="feedback"></textarea>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="status_penilaian" value="Sudah Dinilai">
                <label for="customCheckbox1" class="custom-control-label">Semua Nilai Sudah Diisi dengan sebenar-benarnya. Nilai Tidak Dapat Diubah.</label>
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

    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script>
      $(document).on('click', '#nilai', function() {
        var idPemagang = $(this).data('idpemagang');

        $('#idPemagangForm').val(idPemagang);
        // // console.log($(this).data(idPemagang));
        console.log(idPemagang);
      });
    </script>


    </body>
    </html>
