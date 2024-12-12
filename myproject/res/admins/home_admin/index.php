
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
    <title>admin home</title>
    <link rel="stylesheet" href="../../bootstrap_files/css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="../../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="logo">
            <span class = "text-white">home</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white"></span>
            </button>
            
        </div>
        <div class="col-4">
         <form action="../logout_admin.php" method="POST" >
            <button class="btn btn-danger my-2 my-sm-0 float-right" type="submit">logout</button>
         </form>
    </div>
    </nav>
    <div class="container mt-5">
        <div class="row mt-4">
            <div class="col-md-6 crud-card">
                <div class="card mb-3 h-100">
                    <div class="card-body">
                        <h5 class="card-title">orders</h5>
                        <p class="card-text">pending orders</p>
                        <p class="card-text">all orders</p>
                        <a href="../orders/orders.php" class="btn btn-primary btn-lg btn-block crud-button">GO</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 crud-card">
                <div class="card mb-3 h-100">
                    <div class="card-body">
                        <h5 class="card-title">admins</h5>
                        <p class="card-text">delete admin</p>
                        <p class="card-text">add admin</p>
                        <a href="../admin/index.php" class="btn btn-success btn-lg btn-block crud-button">GO</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 crud-card">
                <div class="card mb-3 h-100">
                    <div class="card-body">
                        <h5 class="card-title">meals</h5>
                        <p class="card-text">add meal</p>
                        <p class="card-text">all meals</p>
                        <a href="../meal/index.php" class="btn btn-warning btn-lg btn-block crud-button">GO</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 crud-card">
                <div class="card mb-3 h-100">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">All Users</p>
                        <p class="card-text">Users info</p>
                        <a href="../users_info/index.php" class="btn btn-secondary btn-lg btn-block crud-button">GO</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <script src="../../bootstrap_files/js/popper.min.js"></script>
    <script src="../../bootstrap_files/js/jquery-3.6.4.min.js"></script>
    <script src="../../bootstrap_files/js/bootstrap.js"></script>
</body>
</html>

