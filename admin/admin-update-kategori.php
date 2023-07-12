<?php
include '../koneksi.php';

$id = $_POST['id'];
$nama_kategori = $_POST['nama_kategori'];

$sql_update_kategori = mysqli_query( $koneksi, "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id='$id' " );

if ( $sql_update_kategori ) {
	header("location:../admin-kategori.php?aksi=edit&id=$id&edit=berhasil");
} else {
	header("location:../admin-kategori.php?aksi=edit&id=$id&edit=gagal");
}

?>