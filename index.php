<?php include 'header.php'; ?>

<?php
$sql_count_instansi_daerah = mysqli_query( $koneksi, "SELECT * FROM instansi WHERE tingkat_instansi='daerah'" );
$count_instansi_daerah = mysqli_num_rows( $sql_count_instansi_daerah );

$sql_count_instansi_pusat = mysqli_query( $koneksi, "SELECT * FROM instansi WHERE tingkat_instansi='pusat'" );
$count_instansi_pusat = mysqli_num_rows( $sql_count_instansi_pusat );

$sql_count_laporan_masuk = mysqli_query( $koneksi, "SELECT * FROM laporan" );
$count_laporan_masuk = mysqli_num_rows( $sql_count_laporan_masuk );

$sql_count_laporan_selesai = mysqli_query( $koneksi, "SELECT * FROM laporan WHERE status='selesai' " );
$count_laporan_selesai = mysqli_num_rows( $sql_count_laporan_selesai );

$sql_count_akun = mysqli_query( $koneksi, "SELECT * FROM users" );
$count_akun = mysqli_num_rows( $sql_count_akun );
?>

<section class="aduan-grafik-wrapper">
	<div class="container">
		<div class="aduan-grafik-container">
			
			<div class="aduan-grafik-left">
				<div class="aduan-grafik-left-column">
					<h3>Instansi Daerah</h3>
					<span class="text-secondary"><?php echo $count_instansi_daerah; ?></span>
				</div>
				<div class="aduan-grafik-left-column">
					<h3>Instansi Pusat</h3>
					<span class="text-secondary"><?php echo $count_instansi_pusat; ?></span>
				</div>
			</div>
			<div class="aduan-grafik-right">
				<div class="aduan-grafik-column">
					<h3>Laporan Masuk</h3>
					<span class="text-secondary"><?php echo $count_laporan_masuk; ?></span>
				</div>
				<div class="aduan-grafik-column">
					<h3>Laporan Diselesaikan</h3>
					<span class="text-secondary"><?php echo $count_laporan_selesai ?></span>
				</div>
				<div class="aduan-grafik-column">
					<h3>Akun Terdaftar</h3>
					<span class="text-secondary"><?php echo $count_akun; ?></span>
				</div>
			</div>

		</div>
	</div>
</section>

<?php
if ( isset($_SESSION['hak_akses']) ) {
	if ( $_SESSION['hak_akses'] == "admin" || $_SESSION['hak_akses'] == "instansi" ) {
		$is_admin = true;
	} else {
		$is_admin = false;
	}
} else {
	$is_admin = false;
}

if ( $is_admin == true ) {
	// tidak menampilkan form
} else {
?>

<section class="aduan-form-wrapper">
	<div class="container">
		<div class="aduan-form-container">

			<?php if ( isset($_GET['kirim']) ) { if ( $_GET['kirim'] == "berhasil" ) { ?>
			<div class="notif-box bg-success">
				<span><i class="fa-solid fa-check"></i> Data Laporan Berhasil Dikirim</span>
			</div>
			<?php } else { ?>
			<div class="notif-box bg-danger">
				<span><i class="fa-solid fa-times"></i> Data Laporan Gagal Dikirim</span>
			</div>
			<?php } } ?>

			<?php if ( isset($_GET['login']) ) { if ( $_GET['login'] == "berhasil" ) { ?>
			<div class="notif-box bg-success">
				<span><i class="fa-solid fa-check"></i> Login Berhasil.</span>
			</div>
			<?php } } ?>
			
			<div class="aduan-form-heading">
				<h3>Sampaikan Laporan Anda</h3>
			</div>

			<div class="aduan-form">
				<p><b><small>Penting: Anda wajib mengisi form dengan label *</small></b></p>

				<form action="script/kirim-laporan.php" method="post" enctype="multipart/form-data">

				<div class="aduan-form-group">
					<label for="">Judul Laporan Anda*</label>
					<input type="text" name="judul" placeholder="Ketik judul laporan anda" required>
				</div>
				<div class="aduan-form-group">
					<label for="">Isi Laporan Anda*</label>
					<textarea name="isi" cols="30" rows="8" placeholder="Ketik isi laporan anda" required></textarea>
				</div>
				<div class="aduan-form-group">
					<label for="">Tambahkan Gambar Laporan</label>
					<input type="file" name="gambar">
				</div>
				<div class="aduan-form-group">
					<label for="">Tanggal Kejadian*</label>
					<input type="date" name="tanggal" required>
				</div>
				<div class="aduan-form-group">
					<label for="">Lokasi Kejadian*</label>
					<input type="text" name="lokasi" placeholder="Ketik lokasi kejadian" required>
				</div>
				<div class="aduan-form-group">
					<label for="">Instansi Tujuan*</label>
					<select name="id_instansi" required>
						<option value="">Pilih Instansi Tujuan</option>
						<?php
						$sql_instansi = mysqli_query( $koneksi, "SELECT * FROM instansi" );
						while ( $row = mysqli_fetch_array( $sql_instansi, MYSQLI_ASSOC ) ) {
							echo '<option value="'. $row['id'] .'">'. $row['nama_instansi'] .'</option>';
						}
						?>
					</select>
				</div>
				<div class="aduan-form-group">
					<label for="">Kategori Laporan*</label>
					<select name="id_kategori" required>
						<option value="">Pilih Kategori Laporan</option>
						<?php
						$sql_kategori = mysqli_query( $koneksi, "SELECT * FROM kategori" );
						while ( $row = mysqli_fetch_array( $sql_kategori, MYSQLI_ASSOC ) ) {
							echo '<option value="'. $row['id'] .'">'. $row['nama_kategori'] .'</option>';
						}
						?>
					</select>
				</div>
				<p><b><small>Laporan anda akan diverifikasi terlebih dahulu oleh admin sebelum diteruskan ke instansi terkait</small></b></p>
				<div class="aduan-form-group">
					<button type="submit">Kirim Laporan</button>
				</div>

				</form>

			</div>

		</div>
	</div>
</section>

<?php } ?>

<section class="aduan-form-wrapper">
	<div class="container">
		<div class="aduan-form-container">

			<div class="aduan-table">

				<?php if ( isset($_GET['login_admin']) ) { if ( $_GET['login_admin'] == "berhasil" ) { ?>
				<div class="notif-box bg-success">
					<span><i class="fa-solid fa-check"></i> Login Berhasil.</span>
				</div>
				<?php } } ?>

				<h4 class="aduan-table-heading">Laporan Terakhir</h4>
				<table>
					<tr>
						<th>No</th>
						<th>Judul Laporan</th>
						<th>Tanggal Kejadian</th>
						<th>Lokasi Kejadian</th>
						<th>Instansi Tujuan</th>
						<th>Kategori</th>
						<th>Status</th>
					</tr>
					<?php
					$sql_get_laporan = mysqli_query( $koneksi, "SELECT * FROM laporan INNER JOIN instansi ON laporan.id_instansi = instansi.id INNER JOIN kategori ON laporan.id_kategori = kategori.id ORDER BY laporan.id_laporan DESC " );
					$i = 1;
					while ( $row = mysqli_fetch_array( $sql_get_laporan, MYSQLI_ASSOC ) ) {
					?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row['judul']; ?></td>
						<td><?php echo $row['tanggal']; ?></td>
						<td><?php echo $row['lokasi']; ?></td>
						<td><?php echo $row['nama_instansi']; ?></td>
						<td><?php echo $row['nama_kategori']; ?></td>
						<td><?php echo $row['status']; ?></td>
					</tr>
					<?php } ?>
				</table>
			</div>

		</div>
	</div>
</section>

<?php include 'footer.php'; ?>