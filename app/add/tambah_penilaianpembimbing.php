<?php 
session_start();
include('../../conf/config.php');
//tambah penilaian pembimbing
$id_pemagang = $_POST['id_pemagang'];
$id_pembimbing = $_POST['id_pembimbing'];
$integritas = $_POST['integritas'];
$ketepatanwaktu = $_POST['ketepatanwaktu'];
$keahlian = $_POST['keahlian'];
$kerjasama = $_POST['kerjasama'];
$pengembangandiri = $_POST['pengembangandiri'];
$feedback = $_POST['feedback'];


$query = mysqli_query ($koneksi,"INSERT INTO tb_penilaianpembimbing (id, id_pembimbing, id_pemagang, integritas, ketepatanwaktu, keahlian, kerjasama, pengembangandiri, feedback) VALUES('', '{$_SESSION['id_pembimbing']}', '$id_pemagang', '$integritas', '$ketepatanwaktu', '$keahlian', '$kerjasama', '$pengembangandiri', '$feedback')");
header('location:../pembimbing/penilaian.php');
?>