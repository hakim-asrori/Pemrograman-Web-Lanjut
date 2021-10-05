<div class="container">
	<h2>Buku Tamu</h2>

	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-body">
					<form action="aksi.php?module=buku-tamu&act=input" method="post">
						<div class="form-group row">
							<label class="col-sm-2">Nama Lengkap</label>
							<div class="col-sm-10">
								<input type="text" name="nm_bktamu" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2">Email</label>
							<div class="col-sm-10">
								<input type="text" name="email_bktamu" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2">Alamat</label>
							<div class="col-sm-10">
								<input type="text" name="alamat_bktamu" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label>Komentar</label>
							<textarea name="komentar" rows="4" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-body">
					<?php
					$ambil = $koneksi->query("SELECT * FROM buku_tamu");

					while ($pecah = $ambil->fetch_assoc()) { ?>
						<div class="mt-3">
							<div class="d-flex justify-content-between">
								<div><b><?= $pecah['nm_bktamu'] ?></b></div>
								<div><?= date("d F Y", strtotime($pecah['tgl_bktamu'])) ?></div>
							</div>
							<div>
								Pesan : <i>'<?= $pecah['komentar'] ?>'</i>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>