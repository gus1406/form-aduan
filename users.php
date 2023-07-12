<?php include 'header.php'; ?>

<?php
if ( ! isset($_SESSION['id']) ) {
	header("location:login.php?pesan=Anda%20belum%20login");
}
?>

<section class="aduan-form-wrapper">
	<div class="container">
		<div class="aduan-form-container">

			<?php if ( isset($_GET['edit']) ) { if ( $_GET['edit'] == "berhasil" ) { ?>
			<div class="notif-box bg-success">
				<span><i class="fa-solid fa-check"></i> Profil Berhasil Diubah</span>
			</div>
			<?php } else { ?>
			<div class="notif-box bg-danger">
				<span><i class="fa-solid fa-times"></i> Profil Gagal Diubah</span>
			</div>
			<?php } } ?>
			
			<div class="aduan-form-heading">
				<h3>Profil</h3>
			</div>

			<div class="aduan-form">
				<p><b><small>Ubah data pribadi anda, kemudian klik tombol perbaharui</small></b></p>

				<form action="script/users-update-akun.php" method="post">

				<?php
				$id_users = $_SESSION['id'];
				$sql_get_users = mysqli_query( $koneksi, "SELECT * FROM users WHERE id = '$id_users' " );
				$row = mysqli_fetch_assoc( $sql_get_users );
				?>

				<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

				<div class="aduan-form-group">
					<label for="">Nama Anda</label>
					<input type="text" name="nama" value="<?php echo $row['nama']; ?>" required>
				</div>
				<div class="aduan-form-group">
					<label for="">Alamat Anda</label>
					<textarea name="alamat" cols="30" rows="8" required><?php echo $row['alamat']; ?></textarea>
				</div>
				<div class="aduan-form-group">
					<label for="">Nomor Telepon</label>
					<input type="text" name="no_telepon" value="<?php echo $row['no_telepon']; ?>" required>
				</div>
				<div class="aduan-form-group">
					<label for="">Email Anda</label>
					<input type="text" name="email" value="<?php echo $row['email']; ?>" required>
				</div>
				<div class="aduan-form-group">
					<button type="submit">Perbaharui</button>
				</div>

				</form>

			</div>

		</div>
	</div>
</section>

<?php include 'footer.php'; ?>

