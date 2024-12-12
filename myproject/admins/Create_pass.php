<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a Create a password page">
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

                    <?php
					    
                        include '../db_function/conn.php';
						session_start();
                        if(!isset($_SESSION["Create_pass"])){
                            header("Location: check_email.php");
                            exit(); 
                        }

                        if(isset($_POST['submit'])){

                            $password =  $_POST['password'];
                            $password_confirm =  $_POST['password_confirm'];
                            $email = $_SESSION["Create_pass"];

                            if($password != $password_confirm ){
                                echo '<div class="alert alert-danger" role="alert"><h3>passwords not matching<h3> </div>';
                                
                            }else{
								$hash_password = password_hash( $password, PASSWORD_DEFAULT);
								$sql = "UPDATE `admin` SET `password` = '$hash_password' WHERE email = '$email'";
								$result = mysqli_query($conn, $sql);
								if($result){
									echo '
									<div class="alert alert-success" role="alert"><h4>Created  password successfully.<h4></div>
									<div class="alert alert-warning" role="alert"><h4>You will be directed to the Login page<h4></div> ';
									header("Refresh:1.5; url=index.php");
									exit();
								}
                            }
                            
                        }


                    ?>


                    
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Create a password</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" value="" required autofocus>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password-confirm">Confirm Password</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirm" required>
								</div>

								<div class="d-flex align-items-center">
									<button type="submit" name ="submit" class="btn btn-primary ms-auto">
                                    Create Password	
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
