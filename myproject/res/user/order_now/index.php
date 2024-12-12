<?php
include '../../db_function/conn.php';

session_start();
if(!isset($_SESSION["id"])){
	header("Location: ../login-register-user/login.php");
	exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm your meal order</title>
    <link rel="stylesheet" href="../../bootstrap_files/css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="../../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="logo">
         <span class = "text-white">Order now</span>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active text-white" aria-current="page" href="../home/">Home</a>
            <a class="nav-link text-white" href="../all-orders-user/">all my orders</a>
            <a class="nav-link text-white" href="../pending-orders-user/">pending orders</a>
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
    $id = $_GET["id"];
    $sql = "SELECT * FROM `meal` WHERE ID = '$id' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

  ?>
    <div class="container mt-5">
        <h1 class="mb-4">Confirm your meal order</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="<?php echo$row['image']; ?>" class="card-img-top" alt="meal_image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo$row['name']; ?></h5>
                        <p class="card-text">price : <?php echo$row['price']."$"; ?></p>
                        <label for="totalPrice">total price:</label>
                        <span id="totalPrice">0</span><span>$</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
              <?php
              if(isset($_POST['submit'])){

								$quantity = ($_POST['quantity']);
								$address = ($_POST['address']);

                $meal_name = $row['name'];
                $user_id = $_SESSION["id"];
                $name_for_user = "SELECT `name` FROM `users` WHERE id = '$user_id' LIMIT 1";
                $name_user_query = mysqli_query($conn, $name_for_user);
                $user_name_row = mysqli_fetch_assoc($name_user_query);
                $user_name= $user_name_row['name'];



                $order ="INSERT INTO `orders` (`id`, `meal_id`, `meal_name`, `user_id`, `user_name`, `num_of_meal`, `address`, `date`, `state`) VALUES (NULL, '$id', '$meal_name', '$user_id', '$user_name', '$quantity', '$address', NOW(), 'pending');";
                $done = mysqli_query($conn,$order);
								if($done)
								{
                  echo '
									<div class="alert alert-success" role="alert"><h4>The meal order was completed successfully<h4></div>
									<div class="alert alert-warning" role="alert"><h4>You will be directed to the payment page<h4></div> ';
									header("Refresh:2; url=payment.php?id=$id");
									exit();
								}



              }



							?>





                <form method="POST"  action="<?php $_SERVER['PHP_SELF'] ?>">
                    <div class="form-group">
                        <label for="quantity">Number of meal: </label>
                        <input type="number" class="form-control" id="numberOfMeals" name="quantity" onkeyup="myFunction(<?php echo$row['price']; ?>)" required>
                    </div>
                    <div class="form-group">
                        <label for="address">address:</label>
                        <textarea class="form-control" id="address" name="address" rows="4" required></textarea>
                    </div>
                    <button name ="submit" type="submit" class="btn btn-primary">Done</button>
                </form>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>
    <script src="../../bootstrap_files/js/popper.min.js"></script>
    <script src="../../bootstrap_files/js/jquery-3.6.4.min.js"></script>
    <script src="../../bootstrap_files/js/bootstrap.js"></script>
</body>
</html>
