<?php
session_start();
include ('config.php');
$username =$koneksi->real_escape_string($_POST['username']);
$password=$koneksi->real_escape_string($_POST['password']);
$password=md5($password);

//menyeleksi data user dengan username dan password yang sesuai
// $query = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE username= '$username' AND password= '$password'");
// //cek apakah username dan password di temukan pada database
// if(mysqli_num_rows($query)==1) {
//     header('Location:../app');
// 	$user = mysqli_fetch_array($query);
// 	$_SESSION['username'] = $user['username'];
// 	$_SESSION['level'] = $user['level'];
// }
// else if($username == '' || $password == '') {
//     header('Location:../index.php?error=2');
// }
// else {
//     header('Location:../index.php?error=1');
// }
// SELECT tbp.nama as pemagang, tbpem.nama_pembimbing FROM tb_pemagang as tbp, tb_laporan_harian as tblh, tb_pembimbing as tbpem where tbp.id = tblh.id_pemagang and tbpem.id = tbp.id_pembimbing and tbpem.id = 2;
$query = $koneksi->query("SELECT * FROM tb_users WHERE username= '$username' AND password= '$password'");
$cek = mysqli_num_rows($query);
if($cek > 0){
	
	$data = mysqli_fetch_assoc($query);
	
	// cek jika user login sebagai admin
	if($data['role_id']=="1"){
		// buat session login dan username
		$_SESSION['id'] = $data['id'];
		$_SESSION['username'] = $username;
		$_SESSION['role_id'] = "admin";
		$_SESSION['isLogin'] = true;
		// alihkan ke halaman dashboard admin
		header("location:../app/index.php");
		
		// cek jika user login sebagai pembimbing
		}else if($data['role_id']=="2"){
		// buat session login dan username
		$id = $data['id'];
		$query1 = $koneksi->query("SELECT tbp.id as id_pembimbing FROM tb_users as tbu, tb_pembimbing as tbp WHERE tbu.id=tbp.id_users AND tbu.id='$id'");
		$data_pembimbing = mysqli_fetch_assoc($query1);
		$_SESSION['id_user'] = $data['id'];
		$_SESSION['second_id'] = $data_pembimbing['id_pembimbing'];
		$_SESSION['username'] = $username;
		$_SESSION['role_id'] = "pembimbing";
		$_SESSION['id_pembimbing'] = $data_pembimbing['id_pembimbing'];
		$_SESSION['isLogin'] = true;
		// alihkan ke halaman dashboard pembimbing
		// var_dump($_SESSION);
		header("location:../app/pembimbing/dashboard-pembimbing.php");
		
		// cek jika user login sebagai pemagang
	}else if($data['role_id']=="3"){
		// buat session login dan username
		$id = $data['id'];
		$query1 = $koneksi->query("SELECT tbp.id as id_pemagang FROM tb_users as tbu, tb_pemagang as tbp WHERE tbu.id=tbp.id_users AND tbu.id='$id'");
		$data_pemagang = mysqli_fetch_assoc($query1);
		// var_dump($data_pemagang);
		// echo $data_pemagang['id_pemagang'];
		// die;
		$_SESSION['id_user'] = $data['id'];
		$_SESSION['second_id'] = $data_pemagang['id_pemagang'];
		$_SESSION['username'] = $username;
		$_SESSION['role_id'] = "pemagang";
		$_SESSION['id_pemagang'] = $data_pemagang['id_pemagang'];
		$_SESSION['isLogin'] = true;
		// alihkan ke halaman dashboard pemagang
		header("location:../app/pemagang/dashboard-pemagang.php");
		 
		// cek jika user login sebagai penguji
	} else if($data['role_id']=="4"){
		// buat session login dan username
		$id = $data['id'];
		$query1 = $koneksi->query("SELECT tbp.id as id_penguji FROM tb_users as tbu, tb_penguji as tbp WHERE tbu.id=tbp.id_users AND tbu.id='$id'");
		$data_pemagang = mysqli_fetch_assoc($query1);
		$_SESSION['id_user'] = $data['id'];
		$_SESSION['second_id'] = $data_pemagang['id_penguji'];
		$_SESSION['username'] = $username;
		$_SESSION['role_id'] = "penguji";
		$_SESSION['id_penguji'] = $data_pemagang['id_penguji'];
		$_SESSION['isLogin'] = true;
		// alihkan ke halaman dashboard pemagang
		header("location:../app/penguji/dashboard-penguji.php");
		
	}
	
} else {
	header("location:../index.php?error=1");
}
?>