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

				<?php if ( isset($_GET['delete']) ) { if ( $_GET['delete'] == "berhasil" ) { ?>
				<div class="notif-box bg-success">
					<span><i class="fa-solid fa-check"></i> Data Users Berhasil Dihapus</span>
				</div>
				<?php } else { ?>
				<div class="notif-box bg-danger">
					<span><i class="fa-solid fa-times"></i> Data Users Gagal Dihapus</span>
				</div>
				<?php } } ?>

				<h4 class="aduan-table-heading">Data Users</h4>
				<div class="table-overflow">
				<table>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>No Telepon</th>
						<th>Email</th>
						<th>Username</th>
						<?php
						if ( isset($_SESSION['hak_akses']) ) {
							if ( $_SESSION['hak_akses'] == "admin" ) {
						?>
						<th>Aksi</th>
						<?php
							}
						}
						?>
					</tr>
					<?php
					$perhalaman = 10;
					$data_pag = mysqli_query( $koneksi, "SELECT * FROM users" );
					$jumlah_data_pag = mysqli_num_rows( $data_pag );
					$jumlah_halaman = ceil( $jumlah_data_pag/$perhalaman );
					$halaman_aktif = ( isset($_GET["halaman"]))?$_GET["halaman"]:1;
					$awal_data = ( $perhalaman * $halaman_aktif ) - $perhalaman;
				
					$sql_get_instansi = mysqli_query( $koneksi, "SELECT * FROM users LIMIT $awal_data, $perhalaman " );
					$i = 1;
					while ( $row = mysqli_fetch_array( $sql_get_instansi, MYSQLI_ASSOC ) ) {
					?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row['nama']; ?></td>
						<td><?php echo $row['alamat']; ?></td>
						<td><?php echo $row['no_telepon']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td class="aduan-aksi text-center">
							<ul>
								<li><i class="fa-solid fa-ellipsis-vertical"></i>									
									<ul>									
										<li><a href="admin/admin-delete-kategori.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin hapus?')">Hapus</a></li>
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
