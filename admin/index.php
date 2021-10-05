<?php include '../include/header.php'; ?>
<body class="bg-gradient-primary">

	<div class="container mt-5">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-7 col-lg-9 col-md-8">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
							</div>
							<form class="user" action="cek_login.php" method="post">
								<div class="form-group">
									<input type="text" class="form-control form-control-user" name="id_user" placeholder="Masukan id...">
								</div>
								<div class="form-group">
									<input type="password" class="form-control form-control-user" name="password" placeholder="Password">
								</div>
								<button class="btn btn-primary btn-user btn-block">Login</button>
							</form>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<?php include '../include/footer.php'; ?>