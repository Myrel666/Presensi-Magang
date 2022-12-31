<!DOCTYPE html>
    <html lang="en">
    <?php session_start(); ?>
    <?php include('../../conf/cekLogin.php');?>
    <?php include('header.php');?>
    <?php include('../../conf/config.php');?>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

    <?php include('navbar.php'); ?>
    
    <!-- Main Sidebar Container -->
    <?php $hal = "Presensi"?>
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
                <h3 class="card-title">Presensi</h3>
                <div class="card-tools">
                  <select class="form-control form-control-sm" onchange="window.location='?bulan='+this.value">
                    <option value="1">Jan</option>
                    <option value="2">Feb</option>
                    <option value="3">Mar</option>
                    <option value="4">Apr</option>
                    <option value="5">May</option>
                    <option value="6">Jun</option>
                    <option value="7">Jul</option>
                    <option value="8">Aug</option>
                    <option value="9">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>
                  </select>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="export-presensi.php" class="btn btn-info"  style="margin : 10px">
                            Export
                </a>
                <br></br>
                <table id="example1" class="table table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    //$query = mysqli_query ($koneksi, "SELECT * FROM tb_presensi WHERE id_pemagang='{$_SESSION['id_pemagang']}'");
                    //while ($row = mysqli_fetch_array($query)) {
                    
                      $bulan = (!isset($_GET['bulan']))?date("m"):$_GET['bulan'];
                      function last_day_of_the_month($date = '')
                      {
                          $month  = date('m', strtotime($date));
                          $year   = date('Y', strtotime($date));
                          $result = strtotime("{$year}-{$month}-01");
                          $result = strtotime('-1 second', strtotime('+1 month', $result));
                          return date('d', $result);
                      }
                      $jam_absen_pulang = 17;
                      $datapresensi = [];
                      $datapengajuan = [];
                      $datarawpresensi = (mysqli_query($koneksi, "SELECT *,
                      (jam_masuk > time('08:00:00')) as mt,
                      (jam_pulang < time('$jam_absen_pulang:00:00')) as pc
                      FROM tb_presensi 
                      WHERE month(tgl)='$bulan' and id_pemagang='{$_SESSION['id_pemagang']}' 
                      "));
                      $datarawpengajuan = (mysqli_query($koneksi, "SELECT *, 
                      date(created_at) as tgl
                      FROM tb_pengajuan 
                      WHERE month(created_at)='$bulan' and id_pemagang='{$_SESSION['id_pemagang']}' 
                      "));
                      while ($row = mysqli_fetch_assoc($datarawpresensi)) $datapresensi[$row['tgl']] = $row;
                      while ($wor = mysqli_fetch_assoc($datarawpengajuan)) $datapengajuan[$wor['tgl']] = $wor;
                      $no = 0;
                      for ($i=0; $i < last_day_of_the_month(date("Y")."-$bulan-1"); $i++) { 
                        $isodate = date("Y-m-d",strtotime(date("Y")."-$bulan-".($i+1)));
                        if( (date('N', strtotime($isodate)) >= 6)) continue;
                        $no++;
                        $jam_pulang = '-';
                        $jam_masuk = '-';
                        $status = "A";
                        if(isset($datapresensi[$isodate])){
                          $sa = $datapresensi[$isodate];
                          $jam_pulang = $sa['jam_pulang'];
                          $jam_masuk = $sa['jam_masuk'];
                          if($sa['mt']==1 && $sa['pc']==1 && (date("H")>=$jam_absen_pulang && date("I")>0)){
                            $status = "HTPC (Hadir Telambat Pulang Cepat)";
                          }else if($jam_masuk!="08:00:00" && $jam_pulang!="17:00:00" && $sa['mt']==1 ){
                            $status = "HT (Hadir Telambat)";
                          }else if($jam_masuk!="00:00:00" && $jam_pulang!="00:00:00" && $sa['pc']==1){
                            $status = "HPC (Hadir Pulang Cepat)";
                          }else if($jam_masuk!="00:00:00" && $sa['mt']==0 && $sa['pc']==0){
                            $status = "H";
                          }else if($isodate==date("Y-m-d") && (date("H")<$jam_absen_pulang)){
                            $status = "...";
                          }else if($jam_masuk!="00:00:00" && $jam_pulang=="00:00:00"){
                            $status = "HTAP (Hadir Tanpa Absen Pulang)";
                          }else if($jam_masuk=="00:00:00" && $jam_pulang!="00:00:00"){
                            $status = "HTAM (Hadir Tanpa Absen Masuk)";
                          }
                        }else if(isset($datapengajuan[$isodate])){
                          $sa = $datapengajuan[$isodate];
                          if($sa['status']=="disetujui") $status =  $sa['tipe']=="sakit"?"SDK (Sakit Dengan Keterangan)":"IDK (Izin Dengan Keterangan)";
                        }
                    
                      ?>
                  <tr>
                    <td width='7%'>
                      <?= $no;?>
                    </td>
                    <td>
                      <?= date("d/m/Y",strtotime(date("Y")."-$bulan-".($i+1))); ?>
                    </td>
                    <td>
                      <?= $jam_masuk ?>
                    </td>
                    <td>
                      <?= $jam_pulang ?>
                    </td>
                    <td>
                      <?php 
                     
                      /*
                      H = Hadir (presensi jam_pulang >= 17:00:00 && jam_masuk <= 08:00:00)
                      HT = Hadir Terlambat (presensi jam_pulang >= 17:00:00 && jam_masuk > 08:00:00)
                      HTAP = Hadir Tanpa Absen Pulang (presensi jam_pulang = 00:00:00)
                      HPC = Hadir Pulang Cepat (presensi jam_pulang < 17:00:00 && jam_masuk <= 08:00:00)
                      HTAM = Hadir Tanpa Absen Masuk (presensi jam_pulang)
                      IDK = Izin Dengan Keterangan (izin,pembimbing)
                      SDK = Sakit Dengan Keterangan (izin,pembimbing)
                      A = Alpha (no data)
                      */
                        echo $status;
                      ?>
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
