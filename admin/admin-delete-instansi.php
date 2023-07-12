<?php
include '../koneksi.php';

$id = $_GET['id'];

$sql_delete_instansi = mysqli_query( $koneksi, "DELETE FROM instansi WHERE id='$id' " );

if ( $sql_delete_instansi ) {
	header("location:../admin-instansi.php?delete=berhasil");
} else {
	header("location:../admin-instansi.php?delete=gagal");
}
?>