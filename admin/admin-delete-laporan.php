<?php
include '../koneksi.php';

session_start();

$id_laporan = $_GET['aduan_id'];

$sql_delete = mysqli_query( $koneksi, "DELETE FROM laporan WHERE id_laporan='$id_laporan'" );

if ( $sql_delete ) {
	header("location:../admin-aduan.php?delete=berhasil");
} else {
	header("location:../admin-aduan.php?delete=gagal");
}

?>