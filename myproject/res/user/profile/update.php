<?php
include '../../db_function/conn.php';
session_start();
if(!isset($_SESSION["id"])){
	header("Location: ../login-register-user/login.php");
	exit(); 
	
}
$id = $_SESSION["id"];
$sql = "SELECT * FROM `users` WHERE id = '$id' LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a register page">
	<title>Update Page</title>
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
									$email = ($_POST['email']);
									

									if(!filter_var($email, FILTER_VALIDATE_EMAIL))
									{
										//Valid email verification
										$num_error++;
										echo '<div class="alert alert-danger" role="alert"><h3>The Email you have entered is invalid, please try again.<h3> </div>';
									}


									$file = $_FILES['image'];
									$f_name = $file['name'];
									$f_tmp_name = $file['tmp_name'];

									if($f_name != ''){
										
										$photo = $row["photo"];
										if (file_exists($photo)) {

										unlink($photo);

										}

									
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

										$destnotion = $row['photo'];

									}


									if( $num_error == 0){
										$sql = "UPDATE `users` SET `name` = '$name' , `email` = '$email' , `phone` = '$phone' , `photo` ='$destnotion'  WHERE id = '$id'";
										$done = mysqli_query($conn,$sql);
										if($done)
										{
											echo '
											<div class="alert alert-success" role="alert"><h4> Updated successfully <h4></div> 
											<div class="alert alert-warning" role="alert"><h4>You will be directed to the meal page<h4></div> ';
											
											header("Refresh:1.5; url=index.php");
											exit();
										}
									}

									

								
								}

							?>
							<!--form start-->

							<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" autocomplete="off">
								<!-- start full name-->
								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Full name *</label>
									<input id="name" type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" required autofocus>
								</div>
								<!-- end full name-->
								<!-- start phone number-->
								<div class="mb-3">
									<label class="mb-2 text-muted" for="phone">phone number *</label>
									<input  type="text" class="form-control" name="phone" value="<?php echo $row['phone'] ?>" required>
								</div>
								<!-- end phone number-->
								<!-- start email-->
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail Address *</label>
									<input id="email" type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>" required>
								</div>
								<!-- end email-->
								<!-- start photo-->
								<div class="mb-3">
									<label class="mb-2 text-muted" for="photo">photo</label>
									<input type="file" name="image" class="form-control">
									<label class="mb-2 text-muted">must be [JPEG , PNG , JPG , GIF ]</label>
									<label class="form-label">If you want to update an image, choose a new image; otherwise, do nothing.</label>
								</div>
								<!-- end photo-->
								<div class="align-items-center d-flex">
									<button name="submit" type="submit" class="btn btn-primary ms-auto">
										update	
									</button>
								</div>
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
