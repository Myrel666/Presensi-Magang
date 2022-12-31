<?php 
include('../../conf/config.php');
session_start();
//tambah penilaian penguji
$id_pemagang = $_POST['id-pemagang'];
$id_penguji = $_POST['id-penguji'];
$presentasi = $_POST['presentasi'];
$penyampaian = $_POST['penyampaian'];
$proses_tanyajawab = $_POST['proses_tanyajawab'];
$kepercayaandiri = $_POST['kepercayaandiri'];
$problemsolving = $_POST['problemsolving'];
$penguasaanmateri = $_POST['penguasaanmateri'];
$mempertahankanpendapat = $_POST['mempertahankanpendapat'];
$inovatif = $_POST['inovatif'];
$komunikasi = $_POST['komunikasi'];
$feedback = $_POST['feedback'];



$query = mysqli_query ($koneksi,"INSERT INTO tb_penilaian (id, id_pemagang, id_penguji, presentasi, penyampaian, proses_tanyajawab, kepercayaandiri, problemsolving, penguasaanmateri, mempertahankanpendapat, inovatif, komunikasi, feedback) VALUES('', '$id_pemagang', '$id_penguji', '$presentasi', '$penyampaian', '$proses_tanyajawab', '$kepercayaandiri', '$problemsolving', '$penguasaanmateri', '$mempertahankanpendapat', '$inovatif', '$komunikasi', '$feedback')");
header('location:../penguji/dashboard-penguji.php');
?>