<?php include 'header.php'; ?>

<?php
if ( ! isset( $_SESSION['id'] ) ) {
	header("location:login.php");
}

$aduan_id = $_GET['aduan_id'];
$users_id = $_SESSION['id'];
$sql_get_laporan = mysqli_query( $koneksi, "SELECT * FROM laporan WHERE id_laporan='$aduan_id' AND id_users='$users_id' " );
$row_laporan = mysqli_fetch_assoc( $sql_get_laporan );
?>

<section class="aduan-form-wrapper">
	<div class="container">
		<div class="aduan-form-container">
			
			<?php if ( isset($_GET['update']) ) { if ( $_GET['update'] == "berhasil" ) { ?>
			<div class="notif-box bg-success">
				<span><i class="fa-solid fa-check"></i> Data Laporan Berhasil Diubah</span>
			</div>
			<?php } else { ?>
			<div class="notif-box bg-danger">
				<span><i class="fa-solid fa-times"></i> Data Laporan Gagal Diubah</span>
			</div>
			<?php } } ?>
			
			<div class="aduan-form-heading">
				<h3>Ubah Laporan Anda</h3>
			</div>

			<div class="aduan-form">
				<p><b><small>Penting: Anda wajib mengisi form dengan label *</small></b></p>

				<form action="script/users-update-laporan.php" method="post" enctype="multipart/form-data">

				<input type="hidden" name="id_laporan" value="<?php echo $row_laporan['id_laporan']; ?>">

				<div class="aduan-form-group">
					<label for="">Judul Laporan Anda*</label>
					<input type="text" name="judul" placeholder="Ketik judul laporan anda" value="<?php echo $row_laporan['judul']; ?>" required>
				</div>
				<div class="aduan-form-group">
					<label for="">Isi Laporan Anda*</label>
					<textarea name="isi" cols="30" rows="8" placeholder="Ketik isi laporan anda" required><?php echo $row_laporan['isi']; ?></textarea>
				</div>
				<div class="aduan-form-group">
					<label for="">Ubah Gambar Laporan | <a target="_blank" href="assets/image/<?php echo $row_laporan['id_laporan']; ?>.jpg">Lihat gambar sebelumnya</a></label>
					<input type="file" name="gambar">
				</div>
				<div class="aduan-form-group">
					<label for="">Tanggal Kejadian*</label>
					<input type="date" name="tanggal" value="<?php echo $row_laporan['tanggal']; ?>" required>
				</div>
				<div class="aduan-form-group">
					<label for="">Lokasi Kejadian*</label>
					<input type="text" name="lokasi" placeholder="Ketik lokasi kejadian" value="<?php echo $row_laporan['lokasi']; ?>" required>
				</div>
				<div class="aduan-form-group">
					<label for="">Instansi Tujuan</label>
					<select name="id_instansi">
						<?php
						$instansi_id_selected = $row_laporan['id_instansi'];
						$sql_instansi = mysqli_query( $koneksi, "SELECT * FROM instansi" );
						while ( $row = mysqli_fetch_array( $sql_instansi, MYSQLI_ASSOC ) ) {
						?>
							<option value="<?php echo $row['id']; ?>" <?php if ( $row['id'] == $instansi_id_selected ) { echo 'selected="selected"'; }  ?>><?php echo $row['nama_instansi']; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="aduan-form-group">
					<label for="">Kategori Laporan</label>
					<select name="id_kategori">
						<?php
						$kategori_id_selected = $row_laporan['id_kategori'];
						$sql_kategori = mysqli_query( $koneksi, "SELECT * FROM kategori" );
						while ( $row = mysqli_fetch_array( $sql_kategori, MYSQLI_ASSOC ) ) {
						?>
							<option value="<?php echo $row['id']; ?>" <?php if ( $row['id'] == $kategori_id_selected ) { echo 'selected="selected"'; }  ?>><?php echo $row['nama_kategori']; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="aduan-form-group">
					<button type="submit">Ubah Laporan</button>
				</div>

				</form>

			</div>

		</div>
	</div>
</section>

<?php include 'footer.php'; ?>