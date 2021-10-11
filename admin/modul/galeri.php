	<div class="container">
		<?php

		if (isset($_GET['act'])) {
			if ($_GET['act'] == "tambah") {
				?>
				<h2>Tambah Galeri</h2>
				<form method='post' action='./aksi.php?module=galeri&act=input' enctype="multipart/form-data">
					<table class="table table-hover mt-3">
						<tr>
							<td>Nama Galeri</td>
							<td> : </td>
							<td><input type='text' name='nm_galeri' class="form-control" required></td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td> : </td>
							<td>
								<textarea name="ket" id="ket" rows="4" class="form-control"></textarea>
							</td>
						</tr>
						<tr>
							<td>Gambar</td>
							<td> : </td>
							<td><input type='file' name='gambar' class="form-control" required></td>
						</tr>
						<tr>
							<td colspan='3'>
								<input type='submit' value='Simpan' class="btn btn-primary">
								<input type='button' value='Batal' onclick='self.history.back()' class="btn btn-danger">
							</td>
						</tr>
					</table>
				</form>
				<?php
			} elseif ($_GET['act'] == "edit") {
				$edit = $koneksi->query("SELECT * FROM admin WHERE id_user = '$_GET[id]'");
				$r = $edit->fetch_assoc(); 
				?>
				<div class="container mt-3">
					<h2>Edit User</h2>
					<form method="post" action="aksi.php?module=galeri&act=update">
						<input type="hidden" name="id" value="<?= $r['id_user'] ?>">
						<table class="table table-hover" >
							<tr>
								<td>Nama Galeri</td>
								<td> : </td>
								<td><input type="text" name="id_user" class="form-control" value="<?= $r['id_user'] ?>"></td>
							</tr>
							<tr>
								<td>Password</td>
								<td> : </td>
								<td><input type="password" name="password" class="form-control"> *) </td>
							</tr>
							<tr>
								<td colspan="3">
									<input type="submit" value="Update" class="btn btn-primary">
									<input type="button" value="Batal" onclick="self.history.back()" class="btn btn-danger">
								</td>
							</tr>
						</table>
					</form>
				</div>
				<?php
			}
		} else {
			?>
			<h2>Galeri</h2>
			<a href="?module=galeri&act=tambah" class="btn btn-primary">Tambah Galeri</a>

			<div class="table-responsive mt-3">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Galeri</th>
							<th>Keterangan</th>
							<th>Tanggal Galeri</th>
							<th>Gambar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$tampil = $koneksi->query("SELECT * FROM galeri");
						$no=1;
						while ($r=$tampil->fetch_assoc()) {
							?>
							<tr>
								<th><?= $no++ ?>.</th>
								<td><?= $r['nm_galeri'] ?></td>
								<td><?= $r['ket'] ?></td>
								<td><?= date("d F Y", strtotime($r['tgl_galeri'])) ?></td>
								<td>
									<a href="../img/galeri/<?= $r['gambar'] ?>" target="_blank"><img src="../img/galeri/<?= $r['gambar'] ?>" alt="../img/galeri/<?= $r['nm_galeri'] ?>" width="100" height="100"></a>
								</td>
								<td>
									<a href="aksi.php?module=galeri&act=hapus&id=<?= $r['id_galeri'] ?>" onClick="return confirm('apakah anda benar akan menghapus galeri <?= $r['nm_galeri'] ?>?')" class="btn btn-danger">Hapus</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<?php
		}
		?>
	</div>