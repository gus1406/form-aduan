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
				<span><i class="fa-solid fa-check"></i> Data Instansi Berhasil Diubah</span>
			</div>
			<?php } else { ?>
			<div class="notif-box bg-danger">
				<span><i class="fa-solid fa-times"></i> Data Instansi Gagal Diubah</span>
			</div>
			<?php } } ?>

			<?php
			if ( isset($_GET['aksi']) ) {
				if ( $_GET['aksi'] == "edit" ) {

				$id_instansi = $_GET['id'];
				$sql_get_instansi_id = mysqli_query( $koneksi, "SELECT * FROM instansi WHERE id='$id_instansi' " );
				$row_instansi = mysqli_fetch_assoc( $sql_get_instansi_id );
			?>

			<div class="aduan-form-heading">
				<h3>Ubah Data Instansi</h3>
			</div>

			<div class="aduan-form">
				<p><b><small>Penting: Anda wajib mengisi form dengan label *</small></b></p>

				<form action="admin/admin-update-instansi.php" method="post">

				<input type="hidden" name="id" value="<?php echo $row_instansi['id']; ?>">

				<div class="aduan-form-group">
					<label for="">Nama Instansi*</label>
					<input type="text" name="nama_instansi" placeholder="Ketikan nama instansi" value="<?php echo $row_instansi['nama_instansi']; ?>" required>
				</div>
				<div class="aduan-form-group">
					<label for="">Tingkat Instansi*</label>
					<select name="tingkat_instansi">
							<option value="">Pilih tingkat instansi</option>
						<?php if ( $row_instansi['tingkat_instansi'] == "Daerah" ) { ?>
							<option value="Daerah" selected>Daerah</option>
							<option value="Pusat">Pusat</option>
						<?php } else if ( $row_instansi['tingkat_instansi'] == "Pusat" ) { ?>
							<option value="Daerah">Daerah</option>
							<option value="Pusat" selected>Pusat</option>
						<?php } else { ?>
							<option value="Daerah">Daerah</option>
							<option value="Pusat">Pusat</option>
						<?php } ?>
					</select>
				</div>
				<div class="aduan-form-group">
					<label for="">Username*</label>
					<input type="text" name="username" placeholder="Ketikan username" value="<?php echo $row_instansi['username']; ?>" required>
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
				<span><i class="fa-solid fa-check"></i> Tambah data instansi berhasil</span>
			</div>
			<?php } else { ?>
			<div class="notif-box bg-danger">
				<span><i class="fa-solid fa-times"></i> Tambah data instansi gagal</span>
			</div>
			<?php } } ?>
			
			<div class="aduan-form-heading">
				<h3>Tambah Data Instansi</h3>
			</div>

			<div class="aduan-form">
				<p><b><small>Penting: Anda wajib mengisi form dengan label *</small></b></p>

				<form action="admin/admin-add-instansi.php" method="post">

				<div class="aduan-form-group">
					<label for="">Nama Instansi*</label>
					<input type="text" name="nama_instansi" placeholder="Ketikan nama instansi" required>
				</div>
				<div class="aduan-form-group">
					<label for="">Tingkat Instansi*</label>
					<select name="tingkat_instansi">
						<option value="">Pilih tingkat instansi</option>
						<option value="Daerah">Daerah</option>
						<option value="Pusat">Pusat</option>
					</select>
				</div>
				<div class="aduan-form-group">
					<label for="">Username*</label>
					<input type="text" name="username" placeholder="Ketikan username" required>
				</div>
				<div class="aduan-form-group">
					<label for="">Password*</label>
					<input type="password" name="password" placeholder="Ketikan password" required>
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
					<span><i class="fa-solid fa-check"></i> Data Instansi Berhasil Dihapus</span>
				</div>
				<?php } else { ?>
				<div class="notif-box bg-danger">
					<span><i class="fa-solid fa-times"></i> Data Instansi Gagal Dihapus</span>
				</div>
				<?php } } ?>

				<h4 class="aduan-table-heading">Data Instansi</h4>
				<div class="table-overflow">
				<table>
					<tr>
						<th>No</th>
						<th>Nama Instansi</th>
						<th>Tingkat Instansi</th>
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
					$data_pag = mysqli_query( $koneksi, "SELECT * FROM instansi" );
					$jumlah_data_pag = mysqli_num_rows( $data_pag );
					$jumlah_halaman = ceil( $jumlah_data_pag/$perhalaman );
					$halaman_aktif = ( isset($_GET["halaman"]))?$_GET["halaman"]:1;
					$awal_data = ( $perhalaman * $halaman_aktif ) - $perhalaman;
				
					$sql_get_instansi = mysqli_query( $koneksi, "SELECT * FROM instansi LIMIT $awal_data, $perhalaman " );
					$i = 1;
					while ( $row = mysqli_fetch_array( $sql_get_instansi, MYSQLI_ASSOC ) ) {
					?>
					<tr>
						<td><?php echo $row['id'] ?></td>
						<td><?php echo $row['nama_instansi']; ?></td>
						<td><?php echo $row['tingkat_instansi']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td class="aduan-aksi text-center">
							<ul>
								<li><i class="fa-solid fa-ellipsis-vertical"></i>									
									<ul>
										<li><a href="admin-instansi.php?aksi=edit&id=<?php echo $row['id']; ?>">Ubah</a></li>
										<li><a href="admin/admin-delete-instansi.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin hapus?')">Hapus</a></li>
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