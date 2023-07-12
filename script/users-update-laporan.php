<?php
include '../koneksi.php';

session_start();

$id_laporan = $_POST['id_laporan'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$tanggal = $_POST['tanggal'];
$lokasi = $_POST['lokasi'];
if ( isset($_SESSION['id']) ) {
	$id_users = $_SESSION['id'];
} else {
	$id_users = 0;
}
$id_instansi = $_POST['id_instansi'];
$id_kategori = $_POST['id_kategori'];
$tanggal_diubah = date("d-m-Y");

$namasementara = $_FILES['gambar']['tmp_name'];
$namabaru = $id_laporan . ".jpg";
$dirupload = "../assets/image/";
$terupload = move_uploaded_file( $namasementara, $dirupload.$namabaru );

if ( $terupload ) {
	$sql_update_laporan_gambar = mysqli_query( $koneksi, "UPDATE laporan SET gambar='1' WHERE id_laporan='$id_laporan' AND id_users='$id_users' " );
}

// replace gambar jika sudah ada
if ( file_exists( $namabaru ) ) {
	chmod( $namabaru, 0755 ); // change the file permissions if allowed
	unlink( $namabaru ); // remove the file
}

$sql_update_laporan = mysqli_query( $koneksi, "UPDATE laporan SET judul='$judul', isi='$isi', tanggal='$tanggal', lokasi='$lokasi', id_instansi='$id_instansi', id_kategori='$id_kategori', tanggal_diubah='$tanggal_diubah' WHERE id_laporan='$id_laporan' AND id_users='$id_users' " );

if ( $sql_update_laporan ) {
	if ( $terupload ) {
		$upload_gambar = "berhasil";
	} else {
		$upload_gambar = "gagal";
	}
	header("location:../aduan-edit.php?aduan_id=$id_laporan&update=berhasil&gambar=$upload_gambar");
} else {
	if ( $terupload ) {
		$upload_gambar = "berhasil";
	} else {
		$upload_gambar = "gagal";
	}
	header("location:../aduan-edit.php?aduan_id=$id_laporan&update=gagal&gambar=$upload_gambar");
}
?>