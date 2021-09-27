<?php
include "../include/koneksi.php"; 
include "../include/konversi_tgl.php";

if ($_GET['module']=='home') { 
	echo "<h2>Halaman Utama</h2>
	<p class=welcome>Selamat Datang <b>$_SESSION[namauser]</b>, Silakan klik menu pilihan disebelah kiri untuk mengelola konten website<br> Terima Kasih</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p class=jam align=right>Login Hari ini: "; 
	echo tgl_indo(date("Ymd"));
	echo " | ";
	echo date("H:i:s"); echo "</p>";
} elseif ($_GET['module']=='user') { 
	include "modul/user.php";
} elseif ($_GET['module']=='galeri') { 
	include "modul/galeri.php";
} elseif ($_GET['module']=='bukutamu') { 
	include "modul/bukutamu.php";
} else {
	echo "<p><b>MODUL BELUM ADA</b></p>";
}
?>
