<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "coba_db";

try {
	$koneksi = new mysqli($host, $user, $pass, $db);
} catch (Exception $e) {
	var_dump("Koneksi gagal : " . $e->getMessage());
	die();
}
?>