<?php
include '../koneksi.php';

$id = $_GET['id'];

$sql_delete_kategori = mysqli_query( $koneksi, "DELETE FROM kategori WHERE id='$id' " );

if ( $sql_delete_kategori ) {
	header("location:../admin-kategori.php?delete=berhasil");
} else {
	header("location:../admin-kategori.php?delete=gagal");
}
?>