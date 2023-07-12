<?php
include '../koneksi.php';

$id = $_GET['id'];

$sql_delete_users = mysqli_query( $koneksi, "DELETE FROM users WHERE id='$id' " );

if ( $sql_delete_users ) {
	header("location:../admin-users.php?delete=berhasil");
} else {
	header("location:../admin-users.php?delete=gagal");
}
?>