<?php
include '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_telepon = $_POST['no_telepon'];
$email = $_POST['email'];

$sql_update_users = mysqli_query( $koneksi, "UPDATE users SET nama='$nama', alamat='$alamat', no_telepon='$no_telepon', email='$email' WHERE id='$id' " );

if ( $sql_update_users ) {
	header("location:../users.php?edit=berhasil");
} else {
	header("location:../users.php?edit=gagal");
}

?>