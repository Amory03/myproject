<?php
include '../db_function/conn.php';
session_start();
if(isset($_SESSION["admin"])){
	header("Location: home_admin/index.php");
	exit(); 
}
if(isset($_SESSION["Create_pass"])){
	session_unset();
	session_destroy();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page">
	<title>admin Login Page</title>
    <link rel="stylesheet" href="../bootstrap_files/css/bootstrap.css">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="../images/logo.png" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">admin Login</h1>

							<?php

							if(isset($_POST['submit'])){
								$email = ($_POST['email']);
								$unique_email = "SELECT * FROM `admin` WHERE email = '$email'";
								$ok = $conn->query($unique_email);
								if ($ok->num_rows != 1) {
									echo '<div class="alert alert-danger" role="alert"><h3>This Email is incorrect.<h3> </div>';
								}else{
									$row = $ok->fetch_assoc();
									$password = ($_POST['password']);
									if(password_verify( $password, $row['password'])){

										$_SESSION['admin'] = $row['id'];
										header("Location: home_admin/index.php");
										exit();

									}else{

									echo '<div class="alert alert-danger" role="alert"><h3>The password is incorrect !<h3> </div>';

									}

								}
								

							}

							?>

							<!--form start-->
							<form method="POST"  action="<?php $_SERVER['PHP_SELF'] ?>">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password</label>
									</div>
									<input id="password" type="password" class="form-control" name="password" required>
								</div>

								<button type="submit" name= "submit" class="btn btn-primary">
									Login
								</button>
							</form>

							<!--form end-->

						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
							This is my first time , <a href="check_email.php" class="text-primary">Create a password</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</body>
</html>
