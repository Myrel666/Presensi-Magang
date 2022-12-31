<?php
include('../../conf/config.php');

if ($_GET['method'] == 'pemagang_delete') {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM tb_pemagang WHERE id='$id'");
    header('location:../data_pemagang.php');
}

if ($_GET['method'] == 'pembimbing_delete') {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM tb_pembimbing WHERE id='$id'");
    header('location:../data_pembimbing.php');
}

if ($_GET['method'] == 'divisi_delete') {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM tb_divisi WHERE id='$id'");
    header('location:../data_divisi.php');
}

if ($_GET['method'] == 'laporan_delete') {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM tb_laporan_harian WHERE id='$id'");
    header('location:../pemagang/laporan-harian.php');
}

if ($_GET['method'] == 'pengajuan_delete') {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM tb_pengajuan WHERE id='$id'");
    header('location:../pemagang/pengajuan.php');
}

if ($_GET['method'] == 'penilaianpenguji_delete') {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM tb_penilaian WHERE id='$id'");
    header('location:../penilaian-penguji.php');
}

if ($_GET['method'] == 'penilaianpembimbing_delete') {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM tb_penilaianpembimbing WHERE id='$id'");
    header('location:../penilaian-pembimbing.php');
}

if ($_GET['method'] == 'sekolah_delete') {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM sekolah WHERE id='$id'");
    header('location:../data_sekolah.php');
}
?>