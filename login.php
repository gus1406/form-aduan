<?php include 'header.php'; ?>

<?php
if ( isset($_SESSION['id']) ) {
	header("location:index.php?pesan=Anda%20telah%20login");
}
?>

<section class="aduan-form-wrapper">
	<div class="container">
		<div class="aduan-form-container">

			<?php if ( isset($_GET['daftar']) ) { if ( $_GET['daftar'] == "berhasil" ) { ?>
			<div class="notif-box bg-success">
				<span><i class="fa-solid fa-check"></i> Daftar Berhasil!</span>
			</div>
			<?php } } ?>

			<?php if ( isset($_GET['logout']) ) { if ( $_GET['logout'] == "berhasil" ) { ?>
			<div class="notif-box bg-success">
				<span><i class="fa-solid fa-check"></i> Berhasil logout</span>
			</div>
			<?php } } ?>

			<?php if ( isset($_GET['login']) ) { if ( $_GET['login'] == "gagal" ) { ?>
			<div class="notif-box bg-danger">
				<span><i class="fa-solid fa-times"></i> Login gagal! username atau password yang anda inputkan salah.</span>
			</div>
			<?php } } ?>
			
			<div class="aduan-form-heading">
				<h3>Login</h3>
			</div>

			<div class="aduan-form">

				<form action="script/users-login.php" method="post">

				<div class="aduan-form-group">
					<label for="">Username</label>
					<input type="text" name="username" placeholder="Ketik username anda" required>
				</div>
				<div class="aduan-form-group">
					<label for="">Password</label>
					<input type="password" name="password" placeholder="Ketik password anda" required>
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

