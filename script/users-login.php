<?php
include '../koneksi.php';

session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = mysqli_query( $koneksi, "SELECT * FROM users WHERE username='$username' AND  password='$password' " );
$cek = mysqli_num_rows( $sql );

if ( $cek > 0 ) {

	$data = mysqli_fetch_assoc( $sql );

	$_SESSION['id'] = $data['id'];
	$_SESSION['username'] = $username;
	$_SESSION['hak_akses'] = "users";
	header("location:../index.php?login=berhasil");
} else {
	header("location:../login.php?login=gagal");
}
?>