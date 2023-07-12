<?php
include '../koneksi.php';

session_start();

$users_id = $_SESSION['id'];
$id_laporan = $_GET['aduan_id'];

$sql_delete = mysqli_query( $koneksi, "DELETE FROM laporan WHERE id_laporan='$id_laporan' AND id_users='$users_id' " );

if ( $sql_delete ) {
	header("location:../aduan.php?delete=berhasil");
} else {
	header("location:../aduan.php?delete=gagal");
}

?>