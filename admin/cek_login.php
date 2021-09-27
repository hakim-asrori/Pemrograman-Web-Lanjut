<?php

include '../include/koneksi.php';

$id_user = $_POST['id_user'];
$password = $_POST['password'];

$login = $koneksi->query("SELECT * FROM admin WHERE id_user = '$id_user' AND password = '$password'");

$dapat = $login->num_rows;

$r = $login->fetch_assoc();

if ($dapat > 0) {
	session_start();

	$_SESSION['namauser'] = $r['id_user'];
	$_SESSION['passuser'] = $r['password'];

	header('location: server.php?module=home');
} else {
	print('<script>alert("Periksa Pengisian Form"); location.href = "index.php";</script>');
}