
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>meal</title>
  <link rel="stylesheet" href="../../bootstrap_files/css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="../../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="logo">
         <span class = "text-white">the meal</span>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active text-white" aria-current="page" href="../home/">Home</a>
            <a class="nav-link text-white" href="../all-orders-user/">all my orders</a>
            <a class="nav-link text-white" href="../res/pending-orders-user/">pending orders</a>
          </div>
        </div>
      </div>
      <div class="col-4">
      <form action="../../db_function/logout.php" method="POST" >
        <button class="btn btn-danger my-2 my-sm-0 float-right mar_btn" type="submit">logout</button>
        </form>
        <button class="btn btn-outline-success my-2 my-sm-0 float-right mar_btn" type="submit"><a href="../profile/index.php">My profile</a></button>
  </div>
  </nav>

  <?php
  include '../../db_function/conn.php';
  session_start();
  $id = $_GET["id"];
  $sql = "SELECT * FROM `meal` WHERE ID = '$id' LIMIT 1";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  ?>
  
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
  
        <img src="<?php echo $row['image']; ?>" alt="meal_image" class="img-fluid sz_image">
      </div>
      <div class="col-md-6">

        <h1> <?php echo $row['name']; ?> </h1>
        <p><?php echo $row['long_des']; ?></p>
        <p> price : <?php echo $row['price']."$"; ?></p>

         <a href="../order_now/index.php?id=<?php echo $id; ?>" class="btn btn-success">order now</a>
        
        
        <h3>Comments</h3>
        <!-- Comments-->
        <?php
        if(isset($_SESSION["id"])){

       echo'
        <div class="mt-4">
          <h4>Add a new comment</h4>
          <form method="post">
            <div class="form-group">
              <label for="commentText">Comment text</label>
              <textarea class="form-control" id="commentText" name="commentText" rows="4" placeholder="write here.."></textarea>
            </div>
            <button name="submit" type="submit" class="btn btn-primary sand_mar">send</button>
          </form>
        </div>';
        }
        ?>
        <?php
          
          if (isset($_POST['submit'])) {

            $user_id = $_SESSION["id"];
            $commentText = $_POST['commentText'];
            $meal_id = $id;
            
            if($commentText == ''){
              echo '<div class="alert alert-danger" role="alert"><h3>You cannot enter an empty comment !!<h3> </div>';
            }else{
              $query = "INSERT INTO `comments` (`user_id`, `content`, `meal_id` ,`date` ) 
              VALUES ('$user_id', '$commentText' , '$meal_id', NOW());";

              $done = mysqli_query($conn,$query);
              if($done)
              {
                header("Location: index.php?id=".$id);
  
              }

            }


          }

        $sql_com = "SELECT * FROM `comments` WHERE meal_id = $id;";
        $query_comment = mysqli_query($conn, $sql_com);
        while ($com = mysqli_fetch_assoc($query_comment)) {
          $sql_user_id = $com['user_id'];
          $sql_user_name = "SELECT `name` FROM `users` WHERE id = '$sql_user_id' LIMIT 1";
          $query_user_name = mysqli_query($conn, $sql_user_name);
          $user_name = mysqli_fetch_assoc($query_user_name);


        
            echo '<h5 class="card-title">' . $user_name['name'] . '</h5>';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<p class="card-text">' . $com['content'] . '</p>';
            echo '</div>';
            echo '</div>';
            $formattedDate = date("d - m - Y", strtotime($com["date"]));
            echo "<p class='date float-right'>". $formattedDate."</p>";
            echo '<hr>';

        
        }
        ?>
         
          <?php
          /*foreach ($comments as $comment) {
            echo '<h5 class="card-title">' . $comment[0] . '</h5>';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<p class="card-text">' . $comment[1] . '</p>';
            echo '</div>';
            echo '</div>';
            echo "<p class='date float-right'>14/6/2023</p>";
            echo '<hr>';

            
          }*/
        ?>
      </div>
    </div>
  </div>

    <script src="../bootstrap_files/js/popper.min.js"></script>
    <script src="../bootstrap_files/js/jquery-3.6.4.min.js"></script>
    <script src="../bootstrap_files/js/bootstrap.js"></script>
    
</body>
</html>
