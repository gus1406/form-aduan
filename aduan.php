<?php include 'header.php'; ?>

<?php
if ( ! isset($_SESSION['id']) ) {
	header("location:login.php");
}
?>

<section class="aduan-form-wrapper">
	<div class="container">
		<div class="aduan-form-container">

			<div class="aduan-table">				

				<?php if ( isset($_GET['delete']) ) { if ( $_GET['delete'] == "berhasil" ) { ?>
				<div class="notif-box bg-success">
					<span><i class="fa-solid fa-check"></i> Data Laporan Berhasil Dihapus</span>
				</div>
				<?php } else { ?>
				<div class="notif-box bg-danger">
					<span><i class="fa-solid fa-times"></i> Data Laporan Gagal Dihapus</span>
				</div>
				<?php } } ?>

				<h4 class="aduan-table-heading">Laporan Anda</h4>
				<div class="table-overflow">
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
					$id_users = $_SESSION['id'];

					$perhalaman = 10;
					$data_pag = mysqli_query( $koneksi, "SELECT * FROM laporan WHERE id_users='$id_users' " );
					$jumlah_data_pag = mysqli_num_rows( $data_pag );
					$jumlah_halaman = ceil( $jumlah_data_pag/$perhalaman );
					$halaman_aktif = ( isset($_GET["halaman"]))?$_GET["halaman"]:1;
					$awal_data = ( $perhalaman * $halaman_aktif ) - $perhalaman;

					$sql_get_laporan = mysqli_query( $koneksi, "SELECT * FROM laporan INNER JOIN instansi ON laporan.id_instansi = instansi.id INNER JOIN kategori ON laporan.id_kategori = kategori.id WHERE laporan.id_users = '$id_users' ORDER BY laporan.id_laporan DESC LIMIT $awal_data, $perhalaman " );
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
										<?php if ( ! $row['status'] == "sedang_diverifikasi" xor $row['status'] == "sedang_diproses" xor $row['status'] == "selesai" ) { ?>
										<li><a href="aduan-detail.php?aduan_id=<?php echo $row['id_laporan']; ?>">Lihat</a></li>
										<?php } else { ?>
										<li><a href="aduan-detail.php?aduan_id=<?php echo $row['id_laporan']; ?>">Lihat</a></li>
										<li><a href="aduan-edit.php?aduan_id=<?php echo $row['id_laporan']; ?>">Ubah</a></li>
										<li><a href="script/users-delete-laporan.php?aduan_id=<?php echo $row['id_laporan']; ?>" onclick="return confirm('Anda yakin ingin hapus?')">Hapus</a></li>
										<?php } ?>

									</ul>
								</li>
							</ul>
						</td>
					</tr>
					<?php } ?>
				</table>
				</div>

				<div class="aduan-pagination">
				<?php if ( $halaman_aktif > 1 ): ?>
					<a href="?halaman=<?php echo $halaman_aktif - 1; ?>">
						&laquo;
					</a>
				<?php endif; ?>

				<?php for( $i = 1; $i <= $jumlah_halaman; $i++ ): ?>
					<a href="?halaman=<?php echo $i; ?>" <?php if ( isset($_GET['halaman']) ) { if ( $i == $_GET['halaman'] ) { echo 'class="active"'; } } ?> >
						<?php echo $i; ?>	
					</a>
				<?php endfor; ?>

				<?php if ( $halaman_aktif < $jumlah_halaman ): ?>
					<a href="?halaman=<?php echo $halaman_aktif + 1; ?>">
						&raquo;
					</a>
				<?php endif; ?>
				</div>

			</div>

		</div>
	</div>
</section>

<?php include 'footer.php'; ?>