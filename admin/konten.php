<?php
include "../include/koneksi.php"; 
include "../include/konversi_tgl.php";
include "../include/captcha.php"; 

if (isset($_GET['module'])) { 
	if ($_GET['module']=='user') {
		include "modul/user.php";
	} elseif ($_GET['module']=='galeri') { 
		include "modul/galeri.php";
	}  elseif ($_GET['module']=='buku-tamu') { 
		include "modul/buku-tamu.php";
	}  elseif ($_GET['module']=='home') { 
		include 'modul/home.php';
	}
} else { 
	include 'modul/home.php';
} ?>
