<?php
include "../include/koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];

if (isset($module) AND $act=='hapus') { 
	$koneksi->query("DELETE FROM admin WHERE id_".$module."='$_GET[id]'");
	header('location:server.php?module='.$module.'&act=');
}

elseif ($module=='user' and $act=='input'){
	$id_login=$_POST['id_user'];
	$id = $koneksi->query("SELECT * FROM admin WHERE id_user = '$id_login'");
	$r=$id->fetch_assoc();
	$cek=$r['id_user']; 
	if($id_login = $cek) {
		print "<script>alert(\"user dengan nama $id_login sudah terdaftar, Silahkan Cek Kembali!!!\");
		location.href = \"server.php?module=user&act=tambahuser\";
		</script>";
	}
	elseif(empty($_POST['id_user'])){
		print "<script>alert(\"username tidak boleh kosong!!!\"); location.href = \"javascript:history.go(-1)\";</script>";
	}
	elseif(empty($_POST['password'])){
		print "<script>alert(\"password tidak boleh kosong!!!\"); location.href = \"javascript:history.go(-1)\";</script>";
	}
	else{
		$pass=$_POST['password'];
		$koneksi->query("INSERT INTO admin (id_user, password) VALUES ('$_POST[id_user]', '$pass')"); 
		header('location:server.php?module='.$module.'&act=');
	}
}
elseif ($module=='user' and $act=='update') { 
	if(empty($_POST['id_user'])){
		print "<script>alert(\"username tidak boleh kosong!!!\"); location.href = \"javascript:history.go(-1)\";</script>";
	}
	else{
		if (empty($_POST['password'])) {
			$koneksi->query("UPDATE admin SET id_user = '$_POST[id_user]' WHERE id_user = '$_POST[id]'");
		} else{
			$pass=$_POST['password'];
			$koneksi->query("UPDATE admin SET id_user = '$_POST[id_user]', password = '$pass' WHERE id_user = '$_POST[id]'");
		}
		header('location:server.php?module='.$module.'&act=');
	}
}
?>
