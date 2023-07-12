<?php
include '../koneksi.php';

$id = $_POST['id'];
$nama_instansi = $_POST['nama_instansi'];
$tingkat_instansi = $_POST['tingkat_instansi'];
$username = $_POST['username'];

$sql_update_instansi = mysqli_query( $koneksi, "UPDATE instansi SET nama_instansi='$nama_instansi', tingkat_instansi='$tingkat_instansi', username='$username' WHERE id='$id' " );

if ( $sql_update_instansi ) {
	header("location:../admin-instansi.php?aksi=edit&id=$id&edit=berhasil");
} else {
	header("location:../admin-instansi.php?aksi=edit&id=$id&edit=gagal");
}

?>