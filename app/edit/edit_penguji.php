<?php 
include('../../conf/config.php');

          $id = $_GET['id'];
          $nama = $_GET['nama'];
          $divisi = $_GET['divisi'];
          $username = $_GET['username'];
          $pass = $_GET['password'];
          
            $query = mysqli_query($koneksi,"UPDATE tb_penguji SET nama_penguji='$nama', id_divisi='$divisi', username='$username' WHERE id='$id'");
            if($pass==""){
            $query1 = mysqli_query($koneksi,"UPDATE tb_users SET nama='$nama', username='$username' WHERE username='$username'");
            }else{
            $pass = md5($pass);
            $query1 = mysqli_query($koneksi,"UPDATE tb_users SET nama='$nama', username='$username', password='$pass' WHERE username='$username'");
            }
        
        header('location:../data_penguji.php');
?>