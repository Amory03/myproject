<!DOCTYPE html>
<html>
<head>
	<title>Upload File</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>

<h1 class="col text-center bg-success p-2">Upload File Using PHP</h1>




<div class="container">
	<div class="row">
		<form class="col-sm-6" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>"  
			enctype="multipart/form-data" >

		    <div class="form-group">
			    <label >Image</label>
			    <input type="file" name="image"  class="form-control"  >
		    </div>

		     <div class="form-group">
			   	<hr>
		    </div>

		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>

		<div class="card-body text-center">
                        <img src="../images/user_photos/65051c339c0658.54156571.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">ahmed samy</h5>
                        <p class="text-muted mb-1">Full Stack Developer</p>
                        <p class="text-muted mb-4">sobk eldhak, El menofia, Egypt</p>
                    </div>
		<div class="col-sm-6">

			<?php 

				$error = '';
				$success = '';
				

				if($_SERVER['REQUEST_METHOD'] == "POST")
				{
					$file = $_FILES['image'];

					$f_name = $file['name'];
					$f_type = $file['type'];
					$f_tmp_name = $file['tmp_name'];
					$f_error = $file['error'];
					$f_size = $file['size'];


					if($f_name != '')
					{
						$ext = pathinfo($f_name);

						$original_name = $ext['filename'];
						$original_ext = $ext['extension'];

						$allowed = array("png","jpg","jpeg","gif");
						if(in_array($original_ext, $allowed))
						{
							if($f_error === 0)
							{
							
									
									$new_name = uniqid('',true).".".$original_ext;
									$destnotion = "../uploads/".$new_name;

									move_uploaded_file($f_tmp_name, $destnotion);
									$success = "Your File Hvee Been Uploaded";


									
						

							}
							else 
							{
								$error = "Your Have An Error";
							}
						}
						else 
						{
							$error = "Your File Not Allowed";
						}

						// echo "<pre>";
						// 	print_r($ext);
						// echo "</pre>";
					}
					else
					{
						$error = "Please Choose Image";
					}

					

				}

			?>


			<?php if($error != ''){  ?>
				<h4 class="alert alert-danger col text-center"><?php echo $error; ?></h4>
			<?php } ?>

			<?php if($success != ''){  ?>
				<h4 class="alert alert-success col text-center"><?php echo $success; ?></h4>
			<?php } ?>

		


			

		</div>
	</div>						
</div>








<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
</body>
</html>
