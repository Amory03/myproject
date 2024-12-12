<?php
include '../../db_function/conn.php';
session_start();
if(!isset($_SESSION["id"])){
	header("Location: ../login-register-user/login.php");
	exit(); 
}
$result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_SESSION["id"] . "'");
$row= mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap_files/css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">

    <title>profile</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="../../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="logo">
         <span class = "text-white">profile</span>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active text-white" aria-current="page" href="../home/index.php">Home</a>
            <a class="nav-link text-white" href="../all-orders-user/index.php?id=<?php echo $_SESSION["id"] ; ?>">all my orders</a>
            <a class="nav-link text-white" href="../pending-orders-user/index.php?id=<?php echo $_SESSION["id"] ; ?>">pending orders</a>
          </div>
        </div>
      </div>
      <div class="col-4">
        <form action="../../db_function/logout.php" method="POST" >
        <button class="btn btn-danger my-2 my-sm-0 float-right" type="submit">logout</button>
        </form>
        <button class="btn btn-outline-success my-2 my-sm-0 float-right" type="submit"><a href="update.php">update profile</a></button>
    </div>
    </nav>
    

<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="<?php echo $row['photo']; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3"><?php echo $row['name']; ?></h5>
                        <p class="text-muted mb-1">Joined on</p>
                        <?php

                            $date = $row["reg_date"];
                            $formattedDate = date("d - M - Y", strtotime($date));

                        ?>
                        <p class="text-muted mb-4"><?php echo  $formattedDate?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row['name']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row['email']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row['phone']; ?></p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>
    <script src="../../bootstrap_files/js/popper.min.js"></script>
    <script src="../../bootstrap_files/js/jquery-3.6.4.min.js"></script>
    <script src="../../bootstrap_files/js/bootstrap.js"></script>
</body>
</html>