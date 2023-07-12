<?php
include '../koneksi.php';

$id_laporan = $_GET['aduan_id'];
$status = $_GET['status'];

$sql_confirm_laporan = mysqli_query( $koneksi, "UPDATE laporan SET status='$status' WHERE id_laporan='$id_laporan' " );

if ( $status == "sedang_diproses" ) {
	if ( $sql_confirm_laporan ) {
		header("location:../instansi-aduan.php?sedang_diproses=berhasil");
	} else {
		header("location:../instansi-aduan.php?sedang_diproses=gagal");
	}
} else if ( $status == "selesai" ) {
	if ( $sql_confirm_laporan ) {
		header("location:../instansi-aduan.php?selesai_diproses=berhasil");
	} else {
		header("location:../instansi-aduan.php?selesai_diproses=gagal");
	}	
}
?>