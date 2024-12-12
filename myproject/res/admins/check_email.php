<?php
include '../db_function/conn.php';
	
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a cheak email page">
	<title>Create a password</title>
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
							<h1 class="fs-4 card-title fw-bold mb-4">Create a password</h1>

							<?php

							if(isset($_POST['submit'])){
								$email = ($_POST['email']);
								$unique_email = "SELECT * FROM `admin` WHERE email = '$email'";
								$ok = $conn->query($unique_email);
								if ($ok->num_rows != 1) {
									echo '<div class="alert alert-danger" role="alert"><h3>This Email is incorrect.<h3> </div>';
								}else{
									$row = $ok->fetch_assoc();
									if($row['password'] == ''){
                                        session_start();
                                        $_SESSION["Create_pass"] = $email;
										header("Location: Create_pass.php");
										exit();
									}else{
									echo '<div class="alert alert-danger" role="alert"><h3>This email already has a password !<h3> </div>';
                                    echo '<div class="alert alert-danger" role="alert"><h4>Click here to <a href="login.php">Login</a><h4></div>';
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
								<button type="submit" name= "submit" class="btn btn-primary">
                                Create a password
								</button>
							</form>

							<!--form end-->

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</body>
</html>
