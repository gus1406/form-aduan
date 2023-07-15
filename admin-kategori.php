<?php include 'header.php'; ?>

<?php
if ( ! isset( $_SESSION['id'] ) ) {
	header("location:admin-login.php");
}
?>

<section class="aduan-form-wrapper">
	<div class="container">
		<div class="aduan-form-container">

			<?php if ( isset($_GET['edit']) ) { if ( $_GET['edit'] == "berhasil" ) { ?>
			<div class="notif-box bg-success">
				<span><i class="fa-solid fa-check"></i> Data Laporan Berhasil Diubah</span>
			</div>
			<?php } else { ?>
			<div class="notif-box bg-danger">
				<span><i class="fa-solid fa-times"></i> Data Laporan Gagal Diubah</span>
			</div>
			<?php } } ?>

			<?php
			if ( isset($_GET['aksi']) ) {
				if ( $_GET['aksi'] == "edit" ) {

				$id_kategori = $_GET['id'];
				$sql_get_kategori_id = mysqli_query( $koneksi, "SELECT * FROM kategori WHERE id='$id_kategori' " );
				$row_kategori = mysqli_fetch_assoc( $sql_get_kategori_id );
			?>

			<div class="aduan-form-heading">
				<h3>Ubah Data Kategori</h3>
			</div>

			<div class="aduan-form">
				<p><b><small>Penting: Anda wajib mengisi form dengan label *</small></b></p>

				<form action="admin/admin-update-kategori.php" method="post">

				<input type="hidden" name="id" value="<?php echo $row_kategori['id']; ?>">

				<div class="aduan-form-group">
					<label for="">Nama Kategori*</label>
					<input type="text" name="nama_kategori" placeholder="Ketikan nama kategori" value="<?php echo $row_kategori['nama_kategori']; ?>" required>
				</div>
				
				<div class="aduan-form-group">
					<button type="submit">Perbaharui</button>
				</div>

				</form>

			</div>

			<?php
				}
			} else {
			?>

			<?php if ( isset($_GET['add']) ) { if ( $_GET['add'] == "berhasil" ) { ?>
			<div class="notif-box bg-success">
				<span><i class="fa-solid fa-check"></i> Tambah Data Kategori Berhasil</span>
			</div>
			<?php } else { ?>
			<div class="notif-box bg-danger">
				<span><i class="fa-solid fa-times"></i> Tambah Data Kategori Gagal</span>
			</div>
			<?php } } ?>
			
			<div class="aduan-form-heading">
				<h3>Tambah Data Kategori</h3>
			</div>

			<div class="aduan-form">
				<p><b><small>Penting: Anda wajib mengisi form dengan label *</small></b></p>

				<form action="admin/admin-add-kategori.php" method="post">

				<div class="aduan-form-group">
					<label for="">Nama Kategori*</label>
					<input type="text" name="nama_kategori" placeholder="Ketikan nama kategori" required>
				</div>
				
				<div class="aduan-form-group">
					<button type="submit">Simpan</button>
				</div>

				</form>

			</div>

			<?php } ?>

		</div>
	</div>
</section>

<section class="aduan-form-wrapper">
	<div class="container">
		<div class="aduan-form-container">

			<div class="aduan-table">

				<?php if ( isset($_GET['delete']) ) { if ( $_GET['delete'] == "berhasil" ) { ?>
				<div class="notif-box bg-success">
					<span><i class="fa-solid fa-check"></i> Data Kategori Berhasil Dihapus</span>
				</div>
				<?php } else { ?>
				<div class="notif-box bg-danger">
					<span><i class="fa-solid fa-times"></i> Data Kategori Gagal Dihapus</span>
				</div>
				<?php } } ?>

				<h4 class="aduan-table-heading">Data Kategori</h4>
				<div class="table-overflow">
				<table>
					<tr>
						<th>No</th>
						<th>Nama Kategori</th>
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
					$data_pag = mysqli_query( $koneksi, "SELECT * FROM kategori" );
					$jumlah_data_pag = mysqli_num_rows( $data_pag );
					$jumlah_halaman = ceil( $jumlah_data_pag/$perhalaman );
					$halaman_aktif = ( isset($_GET["halaman"]))?$_GET["halaman"]:1;
					$awal_data = ( $perhalaman * $halaman_aktif ) - $perhalaman;
				
					$sql_get_instansi = mysqli_query( $koneksi, "SELECT * FROM kategori LIMIT $awal_data, $perhalaman " );
					$i = 1;
					while ( $row = mysqli_fetch_array( $sql_get_instansi, MYSQLI_ASSOC ) ) {
					?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row['nama_kategori']; ?></td>
						<td class="aduan-aksi text-center">
							<ul>
								<li><i class="fa-solid fa-ellipsis-vertical"></i>									
									<ul>
										<li><a href="admin-kategori.php?aksi=edit&id=<?php echo $row['id']; ?>">Ubah</a></li>
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