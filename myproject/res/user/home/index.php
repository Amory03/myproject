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
    <link rel="stylesheet" href="../../bootstrap_files/css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <title>home</title>
</head>
<body>
    <!-- Image and text -->
    <nav class="navbar navbar-expand-lg bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="../../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="logo">
         <span class = "text-white">home</span>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active text-white" aria-current="page" href="">Home</a>
            <a class="nav-link text-white" href="../all-orders-user/index.php?id=<?php echo $_SESSION["id"] ; ?>">all my orders</a>
            <a class="nav-link text-white" href="../pending-orders-user/index.php?id=<?php echo $_SESSION["id"] ; ?>">pending orders</a>
          </div>
        </div>
      </div>
      <div class="col-4">
        <form action="../../db_function/logout.php" method="POST" >
        <button class="btn btn-danger my-2 my-sm-0 float-right" type="submit">logout</button>
        </form>
        <button class="btn btn-outline-success my-2 my-sm-0 float-right" type="submit"><a href="../profile/index.php">My profile</a></button>
  </div>
  </nav>



  
<div class="container">
  <div class="row">
  <?php
    $sql = "SELECT * FROM `meal` WHERE state = 'available';";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
   ?>
      <div class="col-md-4">
        <div class="card mb-4">
          <img class="card-img-top sz" src="<?php echo $row['image']; ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['name']; ?></h5>
            <p class="card-text"><?php echo $row['short_des']; ?></p>
            <p class="card-price"><?php echo $row['price']."$" ; ?></p>
            <a href="../meal/index.php?id=<?php echo $row['ID']; ?>" class="btn btn-primary">view</a>
            <a href="../order_now/index.php?id=<?php echo $row['ID']; ?>" class="btn btn-secondary">order</a>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
    
  </div>
</div>










    <script src="../../bootstrap_files/js/popper.min.js"></script>
    <script src="../../bootstrap_files/js/jquery-3.6.4.min.js"></script>
    <script src="../../bootstrap_files/js/bootstrap.js"></script>
</body>
</html>