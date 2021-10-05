<?php
include "../include/koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='user' AND $act=='hapus') { 
	$koneksi->query("DELETE FROM admin WHERE id_".$module."='$_GET[id]'");
	header('location:server.php?module='.$module.'');
} elseif ($module=='user' and $act=='input'){
	$id_login=$_POST['id_user'];
	$id = $koneksi->query("SELECT * FROM admin WHERE id_user = '$id_login'");
	$r=$id->fetch_assoc();
	$cek=$r['id_user']; 

	if ($id_login = $cek) {
		print "<script>alert(\"user dengan nama $id_login sudah terdaftar, Silahkan Cek Kembali!!!\");
		location.href = \"server.php?module=user&act=tambahuser\";
		</script>";
	} elseif (empty($_POST['id_user'])){
		print "<script>alert(\"username tidak boleh kosong!!!\"); location.href = \"javascript:history.go(-1)\";</script>";
	} elseif (empty($_POST['password'])){
		print "<script>alert(\"password tidak boleh kosong!!!\"); location.href = \"javascript:history.go(-1)\";</script>";
	} else {
		$pass=$_POST['password'];
		$koneksi->query("INSERT INTO admin (id_user, password) VALUES ('$_POST[id_user]', '$pass')"); 
		header('location:server.php?module='.$module.'');
	}
} elseif ($module=='user' and $act=='update') { 
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
		header('location:server.php?module='.$module.'');
	}
} elseif ($module=='galeri' and $act=='input'){
	
	try {
		$nm_galeri = $_POST['nm_galeri'];
		$ket = $_POST['ket'];
		$tgl_galeri = date();

		$rand = rand();
		$ekstensi =  array('png','jpg','jpeg','gif');
		$filename = $_FILES['gambar']['name'];
		$ukuran = $_FILES['gambar']['size'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);

		if(!in_array($ext,$ekstensi) ) {
			print "<script>alert(\"ekstensi dilarang!!!\"); location.href = \"javascript:history.go(-1)\";</script>";
		}else{
			if($ukuran < 1044070){		
				$xx = $rand.'_'.$filename;
				$cek = $koneksi->query("INSERT INTO galeri (nm_galeri, ket, tgl_galeri, gambar) VALUES('$nm_galeri','$ket','$tgl_galeri','$xx')");
				if ($cek) {
					move_uploaded_file($_FILES['gambar']['tmp_name'], '../img/galeri/'.$rand.'_'.$filename);
					header('location:server.php?module='.$module.'');
				}else{
					print "<script>alert(\"Gagal upload!!!\"); location.href = \"javascript:history.go(-1)\";</script>";
				}
			}else{
				print "<script>alert(\"Size gambar harus kurang dari 2MB!!!\"); location.href = \"javascript:history.go(-1)\";</script>";
			}
		}
	} catch (Exception $e) {
		die($e->getMessage());
	}
} elseif ($module=="galeri" AND $act=='hapus') { 
	try {
		$id_galeri = $_GET['id'];
		$ambil = $koneksi->query("SELECT * FROM galeri WHERE id_galeri = $id_galeri")->fetch_assoc();
		$cek = $koneksi->query("DELETE FROM galeri WHERE id_galeri = $id_galeri");
		if ($cek) {
			unlink("../img/galeri/".$ambil['gambar']);
			header('location:server.php?module='.$module.'');
		}else{
			print "<script>alert(\"Gagal hapus!!!\"); location.href = \"javascript:history.go(-1)\";</script>";
		}
	} catch (Exception $e) {
		die($e->getMessage());
	}
} elseif ($module=="buku-tamu" AND $act=='input') { 
	try {
		$nm_bktamu = $_POST['nm_bktamu'];
		$email_bktamu = $_POST['email_bktamu'];
		$alamat_bktamu = $_POST['alamat_bktamu'];
		$komentar = $_POST['komentar'];

		$cek = $koneksi->query("INSERT INTO buku_tamu (nm_bktamu,email_bktamu,alamat_bktamu,komentar) VALUES ('$nm_bktamu', '$email_bktamu', '$alamat_bktamu', '$komentar')");

		if ($cek) {
			header('location:server.php?module='.$module.'');
		}else{
			print "<script>alert(\"Gagal simpan!!!\"); location.href = \"javascript:history.go(-1)\";</script>";
		}
	} catch (Exception $e) {
		die($e->getMessage());
	}
}
?>
