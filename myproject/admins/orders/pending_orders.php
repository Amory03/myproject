
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

    <title>pending order for admin</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="../../images/logo.png" width="50" height="50" class="d-inline-block align-top" alt="logo">
            <span class = "text-white">pending order</span>
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
      <th scope="col">meal name</th>
      <th scope="col">user name</th>
      <th scope="col">address</th>
      <th scope="col">quantity</th>
      <th scope="col">Date</th>
      <th scope="col">go to meal</th>
      <th scope="col">confirm</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
    <?php
        $sql = "SELECT * FROM `orders` WHERE state = 'pending'; ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["meal_name"]; ?></td>
            <td><?php echo $row["user_name"]; ?></td>
            <td><?php echo $row["address"]; ?></td>
            <td><?php echo $row["num_of_meal"]; ?></td>
            <?php $formattedDate = date("d - m - Y", strtotime($row["date"])); ?>
            <td><?php echo $formattedDate; ?></td>
            <td><a href="../../user/meal/index.php?id=<?php echo $row["meal_id"]; ?>" class="link-dark">view</a></td>
           <td> <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a href="confirm.php?id=<?php echo $row["id"]; ?>">confirm</a></button></td>

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