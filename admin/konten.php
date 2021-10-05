<?php
include "../include/koneksi.php"; 
include "../include/konversi_tgl.php";

if (isset($_GET['module'])) { 
	if ($_GET['module']=='user') {
		include "modul/user.php";
	} elseif ($_GET['module']=='galeri') { 
		include "modul/galeri.php";
	}  elseif ($_GET['module']=='buku-tamu') { 
		include "modul/buku-tamu.php";
	}
} else { ?>
	<div class="container">
		<h2>Halaman Utama</h2>
		<p>Selamat Datang <b><?php echo $_SESSION['namauser'] ?></b>, Silakan klik menu pilihan disebelah kiri untuk mengelola konten website<br> Terima Kasih</p>
		<p align="right">Login Hari ini:
			<?php echo tgl_indo(date("Ymd")) ?> | <?php echo date("H:i:s") ?>
		</p>
	</div>
<?php } ?>
