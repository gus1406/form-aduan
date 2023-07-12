<?php include 'header.php'; ?>

<?php
if ( isset($_SESSION['id']) ) {
	header("location:index.php?pesan=Anda%20telah%20login");
}
?>

<section class="aduan-form-wrapper">
	<div class="container">
		<div class="aduan-form-container">

			<?php if ( isset($_GET['login_admin']) ) { if ( $_GET['login_admin'] == "gagal" ) { ?>
			<div class="notif-box bg-danger">
				<span><i class="fa-solid fa-times"></i> Login gagal! username atau password yang anda inputkan salah</span>
			</div>
			<?php } } ?>

			<?php if ( isset($_GET['logout']) ) { if ( $_GET['logout'] == "berhasil" ) { ?>
			<div class="notif-box bg-success">
				<span><i class="fa-solid fa-check"></i> Logout Berhasil!</span>
			</div>
			<?php } } ?>
			
			<div class="aduan-form-heading">
				<h3>Admin Login</h3>
			</div>

			<div class="aduan-form">

				<form action="admin/admin-login.php" method="post">

				<div class="aduan-form-group">
					<label for="">Username</label>
					<input type="text" name="username" placeholder="Ketik username anda" required>
				</div>
				<div class="aduan-form-group">
					<label for="">Password</label>
					<input type="password" name="password" placeholder="Ketik password anda" required>
				</div>
				<div class="aduan-form-group">
					<label for="">Hak Akses</label>
					<select name="hak_akses" required>
						<option value="">Pilih Akses</option>
						<option value="admin">Saya adalah admin</option>
						<option value="instansi">Saya adalah instansi</option>
					</select>
				</div>
				<div class="aduan-form-group">
					<button type="submit">Login</button>
				</div>

				</form>

			</div>

		</div>
	</div>
</section>

<?php include 'footer.php'; ?>

