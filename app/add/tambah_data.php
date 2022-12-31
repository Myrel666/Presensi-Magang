<?php 

include('../../conf/config.php');
session_start();
$method = $_GET['method'];
if ($method == 'add_pemagang') {
    $username1 = $_GET['username'];
    $query2=mysqli_query($koneksi,"SELECT * FROM tb_pemagang WHERE username='$username1' ");
        $cek =mysqli_num_rows($query2);
        if($cek==0){
          //tambah data pemagang
          $nama = $_GET['nama'];
          $divisi = $_GET['divisi'];
          $nama_pembimbing = $_GET['nama_pembimbing'];
          $nip = $_GET['nip'];
          $instansi = $_GET['nama_sekolah'];
          $jk = $_GET['jeniskelamin'];  
          $username = $_GET['username'];
          $pass = md5($_GET['password']);
          $status = $_GET['status'];
          $role = "user";
          $role_id = "3";
          $query = "INSERT INTO tb_users (id, nama, username, password, level, role_id) VALUES('','$nama','$username','$pass','$role','$role_id')";
          if ($koneksi->query($query)) {
            $last_id_query = $koneksi->insert_id;
            $query2 = "INSERT INTO tb_pemagang (id, id_users, nama, id_divisi, id_pembimbing, nip, instansi, jeniskelamin, username, status) VALUES('', '$last_id_query', '$nama','$divisi','$nama_pembimbing','$nip','$instansi','$jk','$username','Aktif')";
            $koneksi->query($query2);
          } else {
            echo 'error';
          }
          if($query && $query1){
            $_SESSION['isCreateSuccess'] = true;
          }
        } else {
          $_SESSION['isCreateSuccess'] = false;
          echo 'sudah ada bos';
        }
        header('location:../data_pemagang.php');
} 

if ($method == 'add_pembimbing') {
//tambah data pembimbing
$username1 = $_GET['username'];
    $query2=mysqli_query($koneksi,"SELECT * FROM tb_pembimbing WHERE username='$username1' ");
        $cek =mysqli_num_rows($query2);
        if($cek==0){
        $nama_pembimbing = $_GET['nama'];
        $divisi_pembimbing = $_GET['divisi'];
        $username_pembimbing = $_GET['username'];
        $pass_pembimbing = md5($_GET['password']);
        $role = "pembimbing";
      $role_id = "2";
      $query = "INSERT INTO tb_users (id, nama, username, password, level, role_id) VALUES('','$nama_pembimbing','$username_pembimbing','$pass_pembimbing','$role','$role_id')";
        if ($koneksi->query($query)) {
            $last_id_query = $koneksi->insert_id;
            $query2 = "INSERT INTO tb_pembimbing (id, id_users, nama_pembimbing, id_divisi, username) VALUES('','$last_id_query','$nama_pembimbing','$divisi_pembimbing','$username_pembimbing')";
            $koneksi->query($query2);
            } else {
              echo 'error';
            }
            if($query && $query1){
            $_SESSION['isCreateSuccess'] = true;
            }
            } else {
            $_SESSION['isCreateSuccess'] = false;
            echo 'sudah ada bos';
            }
      header('location:../data_pembimbing.php');
}

if ($method == 'add_penguji') {
  //tambah data penguji
  $username1 = $_GET['username'];
      $query2=mysqli_query($koneksi,"SELECT * FROM tb_penguji WHERE username='$username1' ");
          $cek =mysqli_num_rows($query2);
          if($cek==0){
          $nama_penguji = $_GET['nama'];
          $divisi_penguji = $_GET['divisi'];
          $username_penguji = $_GET['username'];
          $pass_penguji = md5($_GET['password']);
          $role = "penguji";
          $role_id = "4";
        $query = "INSERT INTO tb_users (id, nama, username, password, level, role_id) VALUES('','$nama_penguji','$username_penguji','$pass_penguji','$role','$role_id')";
          if ($koneksi->query($query)) {
              $last_id_query = $koneksi->insert_id;
              $query2 = "INSERT INTO tb_penguji (id, id_users, nama_penguji, id_divisi, username) VALUES('','$last_id_query','$nama_penguji','$divisi_penguji','$username_penguji')";
              $koneksi->query($query2);
              } else {
                echo 'error';
              }
              if($query && $query1){
              $_SESSION['isCreateSuccess'] = true;
              }
              } else {
              $_SESSION['isCreateSuccess'] = false;
              echo 'sudah ada bos';
              }
        header('location:../data_penguji.php');
  }

if ($method == 'add_divisi') {
//tambah data divisi
$nama_divisi = $_GET['divisi'];
$query = mysqli_query($koneksi,"INSERT INTO tb_divisi (id, nama_divisi) VALUES('','$nama_divisi')");
header('location:../data_divisi.php');
}

if ($method == 'add_sekolah') {
  //tambah data sekolah
  $nama_sekolah = $_GET['sekolah'];
  $query = mysqli_query($koneksi,"INSERT INTO sekolah (id, nama_sekolah) VALUES('','$nama_sekolah')");
  header('location:../data_sekolah.php');
  }

?>