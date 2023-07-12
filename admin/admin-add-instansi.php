<?php
include '../koneksi.php';

$nama_instansi = $_POST['nama_instansi'];
$tingkat_instansi = $_POST['tingkat_instansi'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql_add_instansi = mysqli_query( $koneksi, "INSERT INTO instansi ( nama_instansi, tingkat_instansi, username, password ) VALUES ( '$nama_instansi', '$tingkat_instansi', '$username', '$password' ) " );

if ( $sql_add_instansi ) {
	header("location:../admin-instansi.php?add=berhasil");
} else {
	header("location:../admin-instansi.php?add=gagal");
}

?>