<div class="container">
	<h2>Halaman Utama</h2>
	<p>Selamat Datang <b><?php echo $_SESSION['namauser'] ?></b>, Silakan klik menu pilihan disebelah kiri untuk mengelola konten website<br> Terima Kasih</p>
	<p align="right">Login Hari ini:
		<?php echo tgl_indo(date("Ymd")) ?> | <?php echo gmdate("H:i:s", time() + 60*60*7) ?>
	</p>
</div>