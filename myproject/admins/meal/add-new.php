
<?php
include '../../db_function/conn.php';

session_start();
if(!isset($_SESSION['admin'] )){
	header("Location: ../index.php");
	exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">

   <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="../../bootstrap_files/css/bootstrap.css">

  <link rel="stylesheet" href="css/main.css">
   
   <title>Add meal</title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="../../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="logo">
            <span class = "text-white">Add meal</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active text-white" aria-current="page" href="../home_admin/index.php">Home</a>

          </div>
        </div>
      </div>
        </div>
        <div class="col-4">
         <form action="../db_function/logout.php" method="POST" >
            <button class="btn btn-danger my-2 my-sm-0 float-right" type="submit">logout</button>
         </form>
    </div>
    </nav>
   <div class="container">
      <div class="text-center mb-4">
         <h3>ADD NEW MEAL</h3>
         <p>When done, click on save</p>
      </div>

<!--php start-->
      <?php


      if (isset($_POST["submit"])) {

         $num_error = 0;

         $name = ($_POST['name']);
         $price = ($_POST['price']);
         $shor_des = ($_POST['short_des']);
         $long_des = ($_POST['long_des']);

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
               $destnotion = "../../images/meal_photos/".$new_name;
               move_uploaded_file($f_tmp_name, $destnotion);

            }
            else 
            {
               $num_error++;
               echo '<div class="alert alert-danger" role="alert"><h3>Your File Not Allowed<h3> </div>';
            }
         }else{
            $num_error++;
            echo '<div class="alert alert-danger" role="alert"><h3>Please add a photo<h3> </div>';
         }

         if (!isset($_POST['state'])) {
            $num_error++;
            echo '<div class="alert alert-danger" role="alert"><h3>Please choose "state"<h3> </div>';

         }else{
            $state = $_POST['state'];
         }

       if( $num_error == 0){
       $sql ="INSERT INTO `meal` (`ID`, `name`, `price`, `short_des`, `long_des`, `state`, `image`) VALUES  (NULL, '$name', '$price', '$shor_des', '$long_des', '$state' , '$destnotion' );";

            $done = mysqli_query($conn,$sql);
            if($done)
            {
               echo '
               <div class="alert alert-success" role="alert"><h4>The ' .$name.' has been added successfully<h4></div> 
               <div class="alert alert-warning" role="alert"><h4>You will be directed to the home page<h4></div> ';
               
               header("Refresh:1.5; url=index.php");
               exit();
            }
         }

      }

      ?>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">name: </label>
                  <input type="text" class="form-control" name="name" placeholder="name">
               </div>

               <div class="col">
                  <label class="form-label">price:</label>
                  <input type="number" class="form-control" name="price" placeholder="price">
               </div>
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">short description:</label>
                  <textarea class="form-control" name="short_des" rows="3" placeholder="short description"></textarea>
               </div>

               <div class="col">
                  <label class="form-label">long description: </label>
                  <textarea class="form-control" name="long_des" rows="3" placeholder="long description"></textarea>
               </div>
            </div>

            <div class="mb-3">
               <label class="mb-2 text-muted" for="photo">photo</label>
               <input type="file" name="image" class="form-control">
               <label class="mb-2 text-muted">must be [JPEG , PNG , JPG , GIF ]</label>
            </div>

            <div class="form-group mb-3">
               <label class ="gen">state:</label>
             
               <input type="radio" class="form-check-input" name="state" id="available" value="available">
               <label for="male" class="form-input-label gen">available</label>

               <input type="radio" class="form-check-input" name="state" id="not available" value="not available">
               <label for="female" class="form-input-label gen">not available</label>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
  
   <script src="../../bootstrap_files/js/popper.min.js"></script>
    <script src="../../bootstrap_files/js/jquery-3.6.4.min.js"></script>
    <script src="../../bootstrap_files/js/bootstrap.js"></script>

</body>

</html>