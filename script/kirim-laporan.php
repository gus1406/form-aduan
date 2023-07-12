<?php
include '../koneksi.php';

session_start();

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
$status = "sedang_diverifikasi";
$tanggal_dibuat = date("d-m-Y");

// Mengatasi nama gambar karena id_laporan menggunakan auto increment
// Mendapatkan id record terakhir
$sql_last_record = mysqli_query( $koneksi, "SELECT * FROM laporan WHERE id_laporan=(SELECT max(id_laporan) FROM laporan )" );
$sql_last_row = mysqli_fetch_assoc( $sql_last_record );

$namasementara = $_FILES['gambar']['tmp_name'];
$namabaru = $sql_last_row['id_laporan']+1 . ".jpg"; // +1 untuk membuat id selanjutnya
$dirupload = "../assets/image/";
$terupload = move_uploaded_file( $namasementara, $dirupload.$namabaru );

if ( $terupload ) {
	$gambar = 1;
} else {
	$gambar = 0;
}

$sql_kirim_laporan = mysqli_query( $koneksi, "INSERT INTO laporan ( judul, isi, gambar, tanggal, lokasi, id_users, id_instansi, id_kategori, status, tanggal_dibuat ) VALUES ( '$judul', '$isi', '$gambar', '$tanggal', '$lokasi', '$id_users', '$id_instansi', '$id_kategori', '$status', '$tanggal_dibuat' ) " );

if ( $sql_kirim_laporan ) {
	if ( $terupload ) {
		$upload_gambar = "berhasil";
	} else {
		$upload_gambar = "gagal";
	}
	header("location:../index.php?kirim=berhasil&gambar=$upload_gambar");
} else {
	if ( $terupload ) {
		$upload_gambar = "berhasil";
	} else {
		$upload_gambar = "gagal";
	}
	header("location:../index.php?kirim=gagal&gambar=$upload_gambar");
}
?>