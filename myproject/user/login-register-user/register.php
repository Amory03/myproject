<?php
include '../../db_function/conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a register page">
	<title>register Page</title>
	<link rel="stylesheet" href="../../bootstrap_files/css/bootstrap.css">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="../../images/logo.png" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
							<?php
								if (isset($_POST['submit']))
								{
									$num_error = 0;

									$name = ($_POST['name']);
									$phone = ($_POST['phone']);
									$password = ($_POST['password']);
									$email = ($_POST['email']);
									if(strlen($password) < 8 )
									{
										//Check the length of the password

										$num_error++;
										echo '<div class="alert alert-danger" role="alert"><h3> Password must be at least 8 characters long.<h3></div>';
									}

									$hash_password = password_hash( $password, PASSWORD_DEFAULT);

									if(!filter_var($email, FILTER_VALIDATE_EMAIL))
									{
										//Valid email verification
										$num_error++;
										echo '<div class="alert alert-danger" role="alert"><h3>The Email you have entered is invalid, please try again.<h3> </div>';
									}else{

										// Check if email exists in the table

										$unique_email = "SELECT * FROM users WHERE email = '$email'";
										$ok = $conn->query($unique_email);

										if ($ok->num_rows > 0) {
											$num_error++;
											echo '<div class="alert alert-danger" role="alert"><h3>This Email is already in use<h3> </div>';
										}

									}


									$file = $_FILES['image'];
									$f_name = $file['name'];
									$f_tmp_name = $file['tmp_name'];
									if($f_name != ''){
										$ext = pathinfo($f_name);

										$original_name = $ext['filename'];
										$original_ext = $ext['extension'];

										$allowed = array("png","jpg","jpeg","gif");
										if(in_array($original_ext, $allowed))
										{
											//Verify valid image extension 

											$new_name = uniqid('',true).".".$original_ext;
											$destnotion = "../../images/user_photos/".$new_name;
											move_uploaded_file($f_tmp_name, $destnotion);
										}
										else 
										{
											$num_error++;
											echo '<div class="alert alert-danger" role="alert"><h3>Your File Not Allowed<h3> </div>';
										}
									}else{
										$destnotion = "../../images/user_photos/avatar_icon.png";
									}


									if($num_error == 0){
										$query = "INSERT INTO `users` (`name`, `email`, `password` ,`phone` ,`photo`,`reg_date` ) 
										VALUES ('$name', '$email', '$hash_password' , '$phone' , '$destnotion' , NOW());";

										$done = mysqli_query($conn,$query);
										if($done)
										{
											echo '
											<div class="alert alert-success" role="alert"><h4>You are registered successfully.<h4></div>
											<div class="alert alert-success" role="alert"><h4>Click here to <a href="login.php">Login</a><h4></div>';
										}
									}

									$conn->close();
								}

							?>
							<!--form start-->

							<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" autocomplete="off">
								<!-- start full name-->
								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Full name *</label>
									<input id="name" type="text" class="form-control" name="name" value="" required autofocus>
								</div>
								<!-- end full name-->
								<!-- start phone number-->
								<div class="mb-3">
									<label class="mb-2 text-muted" for="phone">phone number *</label>
									<input  type="text" class="form-control" name="phone" value="" required>
								</div>
								<!-- end phone number-->
								<!-- start email-->
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail Address *</label>
									<input id="email" type="text" class="form-control" name="email" value="" required>
								</div>
								<!-- end email-->
								<!-- start password-->
								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Password *</label>
									<input id="password" type="password" class="form-control" name="password" required>
									<label class="mb-2 text-muted">Must be longer than 8 characters</label>
								</div>
								<!-- end password-->
								<!-- start photo-->
								<div class="mb-3">
									<label class="mb-2 text-muted" for="photo">photo</label>
									<input type="file" name="image" class="form-control">
									<label class="mb-2 text-muted">must be [JPEG , PNG , JPG , GIF ]</label>
								</div>
								<!-- end photo-->
								<div class="align-items-center d-flex">
									<button name="submit" type="submit" class="btn btn-primary ms-auto">
										Register	
									</button>
								</div>
							</form>

							<!--form end-->

						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Already have an account? <a href="login.php" class="text-primary">Login</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
