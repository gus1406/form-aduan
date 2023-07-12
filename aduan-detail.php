<?php include 'header.php'; ?>

<?php
$id_laporan = $_GET['aduan_id'];

$sql_select_aduan = mysqli_query( $koneksi, "SELECT * FROM laporan INNER JOIN instansi ON laporan.id_instansi = instansi.id INNER JOIN kategori ON laporan.id_kategori = kategori.id WHERE laporan.id_laporan = '$id_laporan' " );
$row_aduan = mysqli_fetch_assoc( $sql_select_aduan );
?>

<section class="aduan-form-wrapper">
	<div class="container">
		<div class="aduan-form-container">
			
			<div class="aduan-form-heading">
				<h3>Detail Laporan</h3>
			</div>

			<div class="aduan-form">

				<div class="aduan-form-group">
					<label for="">Judul Laporan</label>
					<input type="text" name="judul" value="<?php echo $row_aduan['judul']; ?>" disabled>
				</div>
				<div class="aduan-form-group">
					<label for="">Isi Laporan</label>
					<textarea name="isi" cols="30" rows="8" disabled><?php echo $row_aduan['isi']; ?></textarea>
				</div>
				<div class="aduan-detail-image">
					<?php if ( $row_aduan['gambar'] == 1 ) { ?>
					<img src="assets/image/<?php echo $row_aduan['id_laporan']; ?>.jpg">
					<?php } else { ?>
					<span><b><small>Tidak ada gambar</small></b></span>
					<?php } ?>
				</div>
				<div class="aduan-form-group">
					<label for="">Tanggal Kejadian</label>
					<input type="date" name="tanggal" value="<?php echo $row_aduan['tanggal']; ?>" disabled>
				</div>
				<div class="aduan-form-group">
					<label for="">Lokasi Kejadian</label>
					<input type="text" name="lokasi" value="<?php echo $row_aduan['lokasi']; ?>" disabled>
				</div>
				<div class="aduan-form-group">
					<label for="">Instansi Tujuan</label>
					<input type="text" name="lokasi" value="<?php echo $row_aduan['nama_instansi']; ?>" disabled>
				</div>
				<div class="aduan-form-group">
					<label for="">Kategori Laporan</label>
					<input type="text" name="lokasi" value="<?php echo $row_aduan['nama_kategori']; ?>" disabled>
				</div>
				<div class="aduan-form-group">
					<label for="">Status Laporan</label>
					<input type="text" name="lokasi" value="<?php echo $row_aduan['status']; ?>" disabled>
				</div>
				<div class="aduan-form-group">
					<label for="">Tanggal Dibuat</label>
					<input type="date" name="lokasi" value="<?php echo $row_aduan['tanggal_dibuat']; ?>" disabled>
				</div>
				<div class="aduan-form-group">
					<label for="">Terakhir Diubah</label>
					<input type="date" name="lokasi" value="<?php echo $row_aduan['tanggal_diubah']; ?>" disabled>
				</div>
				<div class="aduan-form-group">
					<a class="button-link" href="index.php"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
				</div>

			</div>

		</div>
	</div>
</section>

<?php include 'footer.php'; ?>