<?php 
session_start();

if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses halaman ini, anda harus login terlebih dahulu <br>";
	echo "<a href=index.php><b>LOGIN</b></a></center>";
} else {
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>.:: Administrator ::.</title>

		<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

		<link href="../css/sb-admin-2.min.css" rel="stylesheet">

	</head>

	<body id="page-top">

		<div id="wrapper">

			<?php include './menu.php'; ?>

			<div id="content-wrapper" class="d-flex flex-column">

				<div id="content">

					<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

						<ul class="navbar-nav ml-auto">

							<div class="topbar-divider d-none d-sm-block"></div>

							<li class="nav-item dropdown no-arrow">
								<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['namauser'] ?></span>
									<img class="img-profile rounded-circle"
									src="../img/undraw_profile.svg">
								</a>
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
									<a class="dropdown-item" href="./logout.php">
										<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
										Logout
									</a>
								</div>
							</li>

						</ul>

					</nav>

					<?php include './konten.php'; ?>

				</div>
			</div>
		</div>

		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

		<script src="../js/sb-admin-2.min.js"></script>

		<script src="../vendor/chart.js/Chart.min.js"></script>

		<script src="../js/demo/chart-area-demo.js"></script>
		<script src="../js/demo/chart-pie-demo.js"></script>

		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

		<script>
			tinymce.init({
				selector: '#ket',
				height: 400
			});
		</script>


	</body>
	<?php
}
?>