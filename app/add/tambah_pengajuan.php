<?php 
include('../../conf/config.php');
session_start();
//tambah data pengajuan
$nama_pembimbing = $_POST['nama_pembimbing'];
// $status = $_POST['status'];
$nama_kegiatan = $_POST['tipe'];
$des_kegiatan = $_POST['deskripsi'];
//nama bukti kegiatan
$bukti = $_FILES ['bukti']['name'];

//lokasi foto
$file_temp = $_FILES['bukti']['tmp_name'];
move_uploaded_file($file_temp,'../file/buktipengajuan/'.$bukti);

$query = mysqli_query($koneksi,"INSERT INTO tb_pengajuan (id, id_pemagang, id_pembimbing, tipe, deskripsi_kegiatan, bukti_file, status) VALUES('','{$_SESSION['id_pemagang']}','$nama_pembimbing','$nama_kegiatan','$des_kegiatan','$bukti','proses')");
header('location:../pemagang/pengajuan.php');
?>