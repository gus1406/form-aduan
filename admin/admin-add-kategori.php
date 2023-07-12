<?php
include '../koneksi.php';

$nama_kategori = $_POST['nama_kategori'];

$sql_add_kategori = mysqli_query( $koneksi, "INSERT INTO kategori ( nama_kategori ) VALUES ( '$nama_kategori' ) " );

if ( $sql_add_kategori ) {
	header("location:../admin-kategori.php?add=berhasil");
} else {
	header("location:../admin-kategori.php?add=gagal");
}

?>