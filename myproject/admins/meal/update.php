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
            <a class="nav-link active text-white" aria-current="page" href="../home/index.php">Home</a>

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
         <h3>UPDATE MEAL</h3>
         <p>When done, click on UPDATE</p>
      </div>

      
<!--php start-->
      <?php
        include '../../db_function/conn.php';
        session_start();
        if(!isset($_SESSION['admin'] )){
          header("Location: ../index.php");
          exit(); 
        }

        $id = $_GET["id"];
        $sql = "SELECT * FROM `meal` WHERE ID = '$id' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if (isset($_POST["submit"])) {


          $num_error = 0;

          $name = ($_POST['name']);
          $price = ($_POST['price']);
          $shor_des = ($_POST['short_des']);
          $long_des = ($_POST['long_des']);
          $state = $_POST['state'];


          $file = $_FILES['image'];
          $f_name = $file['name'];
          $f_tmp_name = $file['tmp_name'];

          if($f_name != ''){
            $photo = $row["image"];
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
                $destnotion = "../../images/meal_photos/".$new_name;
                move_uploaded_file($f_tmp_name, $destnotion);

              }
              else 
              {
                $num_error++;
                echo '<div class="alert alert-danger" role="alert"><h3>Your File Not Allowed<h3> </div>';
              }
            
          }else{

            $destnotion = $row['image'];

          }
        

        if( $num_error == 0){
          $sql = "UPDATE meal SET name = '$name' , price = $price , short_des = '$shor_des', long_des = '$long_des' , state = '$state', image ='$destnotion'  WHERE ID = $id";
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

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">name: </label>
                  <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" placeholder="name">
               </div>

               <div class="col">
                  <label class="form-label">price:</label>
                  <input type="number" class="form-control" name="price" value="<?php echo $row['price'] ?>" placeholder="price">
               </div>
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">short description:</label>
                  <textarea class="form-control" name="short_des" rows="3"  placeholder="short description"> <?php echo $row['short_des'] ?> </textarea>
               </div>

               <div class="col">
                  <label class="form-label">long description: </label>
                  <textarea class="form-control" name="long_des" rows="3"   placeholder="long description"> <?php echo $row['long_des'] ?></textarea>
               </div>
            </div>

            <div class="mb-3">
              <label class="mb-2 text-muted" for="photo">photo</label>
               <input type="file" name="image" class="form-control">
               <label class="form-label">If you want to update an image, choose a new image; otherwise, do nothing.</label>
               <br>
               <label class="mb-2 text-muted">must be [JPEG , PNG , JPG , GIF ]</label>
            </div>

            <div class="form-group mb-3">
               <label class ="gen">state:</label>
             
               <input type="radio" class="form-check-input" name="state" id="available" value="available" <?php if( $row['state'] == "available") echo"checked"; ?> >
               <label for="available" class="form-input-label gen">available</label>

               <input type="radio" class="form-check-input" name="state" id="not available" value="not available" <?php if( $row['state'] == "not available") echo"checked"; ?>>
               <label for="not available" class="form-input-label gen">not available</label>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">UPDATE</button>
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