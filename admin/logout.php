<?php

session_start();

include '../include/koneksi.php';

if (empty(empty($_SESSION['namauser']))) {
	exit('<script>alert("Anda harus login terlebih dahulu"); window.location = "index.php";</script>');
}

session_destroy();
exit('<script>window.alert("Thank You"); window.location = "index.php";</script>');