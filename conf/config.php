<?php
date_default_timezone_set("Asia/Jakarta");
// $koneksi = mysqli_connect('localhost','root','','db_simagang');

$koneksi = new mysqli('localhost','root','','db_simagang');

//connection check
// if (!$koneksi) {
//     die ("Koneksi Gagal: ".mysqli_connect_error());
// }
// else {
//     echo "Koneksi Berhasil";
// }
?>