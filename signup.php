<?php include 'header.php'; ?>
<?php
if ( isset($_SESSION['id']) ) {
	header("location:index.php?pesan=Anda%20telah%20login");
}
?>

<section class="aduan-form-wrapper">
	<div class="container">
		<div class="aduan-form-container">

			<?php if ( isset($_GET['daftar']) ) { if ( $_GET['daftar'] == "gagal" ) { ?>
			<div class="notif-box bg-danger">
				<span><i class="fa-solid fa-times"></i> Daftar Gagal!</span>
			</div>
			<?php } } ?>
			
			<div class="aduan-form-heading">
				<h3>Daftar Akun Baru</h3>
			</div>

			<div class="aduan-form">
				<p><b><small>Pastika anda mengisi data diri dengan benar dan tidak menggunakan data palsu.</small></b></p>

				<form action="script/users-daftar.php" method="post">

				<div class="aduan-form-group">
					<label for="">Nama Lengkap*</label>
					<input type="text" name="nama" placeholder="Ketik nama lengkap anda" required>
				</div>

				<div class="aduan-form-group">
					<label for="">Alamat Lengkap*</label>
					<input type="text" name="alamat" placeholder="Ketik alamat lengkap anda" required>
				</div>

				<div class="aduan-form-group">
					<label for="">Nomor Telepon*</label>
					<input type="text" name="no_telepon" placeholder="Ketik nomor telepon anda" required>
				</div>

				<div class="aduan-form-group">
					<label for="">Alamat Email</label>
					<input type="text" name="email" placeholder="Ketik alamat email anda">
				</div>

				<div class="aduan-form-group">
					<label for="">Username*</label>
					<input type="text" name="username" placeholder="Ketik username anda" required>
				</div>

				<div class="aduan-form-group">
					<label for="">Password*</label>
					<input type="password" name="password" placeholder="Ketik password anda" required>
				</div>

				<div class="aduan-form-group">
					<button type="submit">Daftar</button>
				</div>

				</form>
			</div>

		</div>
	</div>
</section>

<?php include 'footer.php'; ?>