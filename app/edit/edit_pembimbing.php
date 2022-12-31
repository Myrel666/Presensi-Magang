<?php 
include('../../conf/config.php');

          $id = $_GET['id'];
          $nama = $_GET['nama'];
          $divisi = $_GET['divisi'];
          $username = $_GET['username'];
          $pass = $_GET['password'];
          
            $query = mysqli_query($koneksi,"UPDATE tb_pembimbing SET nama_pembimbing='$nama', id_divisi='$divisi', username='$username', password='$pass' WHERE id='$id'");
            $query1 = mysqli_query($koneksi,"UPDATE tb_users SET nama='$nama', username='$username', password='$pass' WHERE username='$username'");
        
        header('location:../data_pembimbing.php');
?>