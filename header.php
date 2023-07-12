<?php 
include 'koneksi.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Aduan Masyrakat</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>

<div class="nav-wrapper">
	<div class="container">
		<div class="nav-container">
			
			<div class="nav-branding">
				<!--<h1><a href="#">Laporan!</a></h1>-->
				<a href="index.php">
					<img src="assets/image/aduan.svg" alt="branding">
				</a>
			</div>

			<div class="nav-menu">
				<?php
				if ( isset($_SESSION['hak_akses']) ) {
					if ( $_SESSION['hak_akses'] == "users" ) {
				?>
						<ul>
							<li><a href="index.php">Beranda</a></li>
							<li><a href="aduan.php">Aduan</a></li>
						</ul>
				<?php
					} else if ( $_SESSION['hak_akses'] == "admin" ) {
				?>
						<ul>
							<li><a href="index.php">Beranda</a></li>
							<li><a href="admin-aduan.php">Aduan</a></li>
							<li><a href="admin-instansi.php">Instansi</a></li>
							<li><a href="admin-kategori.php">Kategori</a></li>
							<li><a href="admin-users.php">Users</a></li>
						</ul>				

				<?php
					} else if ( $_SESSION['hak_akses'] == "instansi" ) {
				?>
						<ul>
							<li><a href="index.php">Beranda</a></li>
							<li><a href="instansi-aduan.php">Aduan</a></li>
						</ul>
				<?php
					}
				} else {
				?>
					<ul>
						<li><a href="index.php">Beranda</a></li>
					</ul>
				<?php
				}
				?>		
			</div>

			<div class="nav-login-signup">
				<?php 
				if ( isset($_SESSION['hak_akses']) ) { 
					if ( $_SESSION['hak_akses'] == "users" ) {
				?>
					<div class="users-profile">
						<span>Hallo! <?php echo '<a href="users.php">'. $_SESSION['username'] .'</a>'; ?></span> | 
						<span><a href="script/users-logout.php" onclick="return confirm('Anda yakin ingin logout?')">Logout</a></span>
					</div>
				<?php
					} else if ( $_SESSION['hak_akses'] == "admin" ) {
				?>
					<div class="users-profile">
						<span>Hallo! <?php echo '<a href="#">'. $_SESSION['username'] .'</a>'; ?></span> | 
						<span><a href="admin/admin-logout.php" onclick="return confirm('Anda yakin ingin logout?')">Logout</a></span>
					</div>
				<?php
					} else if ( $_SESSION['hak_akses'] == "instansi" ) {
				?>
					<div class="users-profile">
						<span>Hallo! <?php echo '<a href="#">'. $_SESSION['nama_instansi'] .'</a>'; ?></span> | 
						<span><a href="admin/admin-logout.php" onclick="return confirm('Anda yakin ingin logout?')">Logout</a></span>
					</div>
				<?php
					}
				} else {
				?>
					<a href="login.php" class="nav-login-button">Masuk</a>
					<a href="signup.php" class="nav-signup-button">Daftar</a>
				<?php } ?>
			</div>

		</div>
	</div>
</div>
