<?php 
session_start();

if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses halaman ini, anda harus login terlebih dahulu <br>";
	echo "<a href=index.php><b>LOGIN</b></a></center>";
} else {
	?>
	<html>
	<head>
		<title>.:: Halaman Utama Administrator ::.</title>
		<link href="../include/admin_style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan="2" align="left" valign="top" background="../images/header_xxx.gif">

					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="57%"> </td>
							<td width="43%" valign="bottom">

								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td align="right" class="judul">
											<a href="server.php?module=home">Beranda</a> | <a href="server.php?module=gantipwd&id=<?= $_SESSION['namauser'];?>">Ganti Password</a> | <a href="logout.php">Logout</a>&nbsp;</td>
										</tr>
									</table>

								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="200" valign="top" bgcolor="#CFD7C0" id="menu">
						<?php include "menu.php"; ?>
					</td>
					<td align="left" valign="top" bgcolor="#FEFDF7" class="text" id="content">
						<?php include "konten.php"; ?>

					</td>
				</tr>
				<tr>
					<td height="40" colspan="2" align="center" valign="middle" background="../images/background_1.jpg">
						<span class="kecil">Copyright <b>Polindra</b> &copy; 2011. All Right Reserved<br>
							<span class="style_text">Design By <a href="http://www.polindra.ac.id" target="_blank">Training Center TI Polindra</a></span>
						</span>
					</td>
				</tr>
			</table>
		</body>
		</html>
		<?php
	}
?>