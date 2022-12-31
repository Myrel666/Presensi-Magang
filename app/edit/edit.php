<?php 
include('../../conf/config.php');

          $id = $_GET['id'];
          $nama = $_GET['nama'];
          $divisi = $_GET['divisi'];
          $nama_pembimbing = $_GET['nama_pembimbing'];
          $nip = $_GET['nip'];
          $instansi = $_GET['nama_sekolah'];
          $jk = $_GET['jeniskelamin'];
          $username = $_GET['username'];
          $pass = $_GET['password'];
          $status = $_GET['status'];
          
            $query = mysqli_query($koneksi,"UPDATE tb_pemagang SET nama='$nama', id_divisi='$divisi', id_pembimbing='$nama_pembimbing', nip='$nip', instansi='$instansi', jeniskelamin='$jk', username='$username', status='$status' WHERE id='$id'");
            if($pass==""){
              $query1 = mysqli_query($koneksi,"UPDATE tb_users SET nama='$nama' WHERE username='$username'");
            }else{
              $pass = md5($pass);
              $query1 = mysqli_query($koneksi,"UPDATE tb_users SET nama='$nama', password='$pass' WHERE username='$username'");
            }
            
        header('location:../data_pemagang.php');
?>