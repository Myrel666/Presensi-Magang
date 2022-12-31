<?php 
    session_start();
    include ('../../conf/cekLogin.php');
    include('../../conf/config.php');
     ?>

<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string
$pdf->Cell(190,7,'PT. PELABUHAN INDONESIA',0,1,'C'); 
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'HASIL PENILAIAN PENGUJI',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'Nama Penguji',1,0);
$pdf->Cell(20,6,'Email',1,0);
$pdf->Cell(20,6,'Presentasi',1,0);
$pdf->Cell(20,6,'Penyampaian',1,0);
$pdf->SetFont('Arial','',10);

$mahasiswa = mysqli_query($koneksi, "SELECT * FROM tb_penilaian where id_pemagang='$_GET[id]'");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(20,6,$row['nama_penguji'],1,0);
    $pdf->Cell(85,6,$row['email'],1,0);
    $pdf->Cell(27,6,$row['presentasi'],1,0);
    $pdf->Cell(25,6,$row['penyampaian'],1,1); 
}

$pdf->Output();
?>
