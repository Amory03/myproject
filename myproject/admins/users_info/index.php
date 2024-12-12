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
    <link rel="stylesheet" href="../../bootstrap_files/css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">

    <title>all users</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="../../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="logo">
            <span class = "text-white">all users</span>
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
    
    <table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col">#ID</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">date of registration</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
    <?php
        $sql = "SELECT * FROM `users`;";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["phone"]; ?></td>
            <?php $formattedDate = date("d - m - Y", strtotime($row["reg_date"])); ?>
            <td><?php echo $formattedDate; ?></td>

          </tr>
        <?php
        }
        ?>
    </tr>
  </tbody>
</table>
 



    <script src="../../bootstrap_files/js/popper.min.js"></script>
    <script src="../../bootstrap_files/js/jquery-3.6.4.min.js"></script>
    <script src="../../bootstrap_files/js/bootstrap.js"></script>
</body>
</html>