
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
    <title>ordsrs</title>
    <link rel="stylesheet" href="../../bootstrap_files/css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="../../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="logo">
            <span class = "text-white">orders</span>
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
        <div class="col-4">
         <form action="../logout_admin.php" method="POST" >
            <button class="btn btn-danger my-2 my-sm-0 float-right" type="submit">logout</button>
         </form>
    </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center">orders</h1>
        <div class="row mt-4">
            <div class="col-md-6 crud-card">
                <div class="card mb-3 h-100">
                    <div class="card-body">
                        <h5 class="card-title">pending orders</h5>
                        <p class="card-text">Can see  pending orders and confirm it.</p>
                        <p class="card-text"></p>
                        <a href="pending_orders.php" class="btn btn-primary btn-lg btn-block crud-button">GO</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 crud-card">
                <div class="card mb-3 h-100">
                    <div class="card-body">
                        <h5 class="card-title">all orders</h5>
                        <p class="card-text">All meal orders from all users</p>
                        <a href="all_orders.php" class="btn btn-success btn-lg btn-block crud-button">GO</a>
                    </div>
                </div>
            </div>
    <script src="../../bootstrap_files/js/popper.min.js"></script>
    <script src="../../bootstrap_files/js/jquery-3.6.4.min.js"></script>
    <script src="../../bootstrap_files/js/bootstrap.js"></script>
</body>
</html>
