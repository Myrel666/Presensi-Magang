<?php 
include('../../conf/config.php');

          $id = $_GET['id'];
          $nama_sekolah = $_GET['nama_sekolah'];
            $query = mysqli_query($koneksi,"UPDATE sekolah SET nama_sekolah ='$nama_sekolah' WHERE id='$id'");
        
        header('location:../data_sekolah.php');
?>