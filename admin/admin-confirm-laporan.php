<?php
include '../koneksi.php';

$id_laporan = $_GET['aduan_id'];

$sql_confirm_laporan = mysqli_query( $koneksi, "UPDATE laporan SET status='Diverifikasi' WHERE id_laporan='$id_laporan' " );

if ( $sql_confirm_laporan ) {
	header("location:../admin-aduan.php?verifikasi=berhasil");
} else {
	header("location:../admin-aduan.php?verifikasi=gagal");
}
?>