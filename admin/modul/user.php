	<div class="container">
		<?php

		if (isset($_GET['act'])) {
			if ($_GET['act'] == "tambah") {
				?>
				<h2>Tambah User</h2>
				<form method='post' action='aksi.php?module=user&act=input'>
					<table class="table table-hover">
						<tr>
							<td>Username</td>
							<td> : </td>
							<td><input type='text' name='id_user' class="form-control"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td> : </td>
							<td><input type='password' name='password' class="form-control"></td>
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
					<form method="post" action="aksi.php?module=user&act=update">
						<input type="hidden" name="id" value="<?= $r['id_user'] ?>">
						<table class="table table-hover" >
							<tr>
								<td>Username</td>
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
			<h2>User</h2>
			<a href="?module=user&act=tambah" class="btn btn-primary">Tambah User</a>

			<div class="table-responsive mt-3">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Password</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$tampil = $koneksi->query("SELECT * FROM admin ORDER BY id_user");
						$no=1;
						while ($r=$tampil->fetch_assoc()) {
							?>
							<tr>
								<th><?= $no++ ?>.</th>
								<td><?= $r['id_user'] ?></td>
								<td><?= $r['password'] ?></td>
								<td>
									<a href="?module=user&act=edit&id=<?= $r['id_user'] ?>" class="btn btn-warning">Edit</a> | 
									<a href="aksi.php?module=user&act=hapus&id=<?= $r['id_user'] ?>" onClick="return confirm('apakah anda benar akan menghapus user <?= $r['id_user'] ?>?')" class="btn btn-danger">Hapus</a>
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