<?php include 'header.php'; ?>

<?php
if ( ! isset( $_SESSION['id'] ) ) {
	header("location:admin-login.php");
}
?>

<section class="aduan-form-wrapper">
	<div class="container">
		<div class="aduan-form-container">

			<div class="aduan-table">

				<?php if ( isset($_GET['sedang_diproses']) ) { if ( $_GET['sedang_diproses'] == "berhasil" ) { ?>
				<div class="notif-box bg-success">
					<span><i class="fa-solid fa-check"></i> Berhasil Ubah Status</span>
				</div>
				<?php } } ?>

				<?php if ( isset($_GET['selesai_diproses']) ) { if ( $_GET['selesai_diproses'] == "berhasil" ) { ?>
				<div class="notif-box bg-success">
					<span><i class="fa-solid fa-check"></i> Berhasil Ubah Status</span>
				</div>
				<?php } } ?>

				<h4 class="aduan-table-heading">Laporan Anda</h4>
				<table>
					<tr>
						<th>No</th>
						<th>Judul Laporan</th>
						<th>Tanggal Kejadian</th>
						<th>Lokasi Kejadian</th>
						<th>Instansi Tujuan</th>
						<th>Kategori</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
					<?php
					$id_instansi = $_SESSION['id'];
					$sql_get_laporan = mysqli_query( $koneksi, "SELECT * FROM laporan INNER JOIN instansi ON laporan.id_instansi = instansi.id INNER JOIN kategori ON laporan.id_kategori = kategori.id WHERE id_instansi = '$id_instansi' AND NOT status = 'sedang_diverifikasi' ORDER BY laporan.id_laporan DESC LIMIT 5 " );
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
						<td class="aduan-aksi text-center">
							<ul>
								<li><i class="fa-solid fa-ellipsis-vertical"></i>
									<ul>
										<li><a href="aduan-detail.php?aduan_id=<?php echo $row['id_laporan']; ?>">Lihat</a></li>

										<?php if ( $row['status'] == "Diverifikasi" ) { ?>
										<li><a href="admin/instansi-confirm-laporan.php?status=sedang_diproses&aduan_id=<?php echo $row['id_laporan']; ?>" onclick="return confirm('Laporan sedang diproses?')">Sedang Diproses</a></li>
										<?php } ?>

										<?php if ( $row['status'] == "sedang_diproses" ) { ?>
										<li><a href="admin/instansi-confirm-laporan.php?status=selesai&aduan_id=<?php echo $row['id_laporan']; ?>" onclick="return confirm('Laporan selesai diproses?')">Selesai</a></li>
										<?php } ?>
									</ul>
								</li>
							</ul>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>

		</div>
	</div>
</section>

<?php include 'footer.php'; ?>