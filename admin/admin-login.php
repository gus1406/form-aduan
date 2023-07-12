<?php
include '../koneksi.php';

session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);
$hak_akses = $_POST['hak_akses'];

if ( $hak_akses == "admin" ) {
	$sql = mysqli_query( $koneksi, "SELECT * FROM admin WHERE username='$username' AND  password='$password' " );
	$cek = mysqli_num_rows( $sql );
} else if ( $hak_akses == "instansi" ) {
	$sql = mysqli_query( $koneksi, "SELECT * FROM instansi WHERE username='$username' AND  password='$password' " );
	$cek = mysqli_num_rows( $sql );
}

if ( $cek > 0 ) {

	$data = mysqli_fetch_assoc( $sql );
	
	if ( $hak_akses == "admin" ) {
		$_SESSION['id'] = $data['id'];
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "admin";
		header("location:../index.php?login_admin=berhasil");
	} else if ( $hak_akses == "instansi" ) {
		$_SESSION['id'] = $data['id'];
		$_SESSION['hak_akses'] = "instansi";
		$_SESSION['nama_instansi'] = $data['nama_instansi'];
		header("location:../index.php?login_instansi=berhasil");
	}
} else {
	if ( $hak_akses == "admin" ) {
		header("location:../admin-login.php?login_admin=gagal");
	} else if ( $hak_akses == "instansi" ) {
		header("location:../admin-login.php?login_instansi=gagal");
	}
}
?>