<?php
include '../koneksi.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_telepon = $_POST['no_telepon'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query( $koneksi, "INSERT INTO users ( nama, alamat, no_telepon, email, username, password ) VALUES ( '$nama', '$alamat', '$no_telepon', '$email', '$username', md5('$password') ) " );

if ( $sql ) {
	header("location:../login.php?daftar=berhasil");
} else {
	header("location:../signup.php?daftar=gagal");
}
?>