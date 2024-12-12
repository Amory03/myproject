
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

  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/main.css">

  <title>meal</title>
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
         <form action="../logout_admin.php" method="POST" >
            <button class="btn btn-danger my-2 my-sm-0 float-right" type="submit">logout</button>
         </form>
    </div>
    </nav>

  <div class="container">
   
    <a href="add-new.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">name</th>
          <th scope="col">price</th>
          <th scope="col">short description</th>
          <th scope="col">long description</th>
          <th scope="col">state</th>
          <th scope="col">view</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `meal`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["ID"] ?></td>
            <td><?php echo $row["name"] ?></td>
            <td><?php echo $row["price"] ?></td>
            <td><?php echo $row["short_des"] ?></td>
            <td><?php echo $row["long_des"] ?></td>
            <td><?php echo $row["state"] ?></td>
            <td><a href="../../user/meal/index.php?id=<?php echo $row["ID"] ?>" class="link-dark">view</a></td>
            <td>
             <div> <a href="update.php?id=<?php echo $row["ID"] ?>" class="link-dark">Update</a> </div> 
             <div> <a href="delete.php?id=<?php echo $row["ID"] ?>" class="link-dark">Delete</i></a> </div> 
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap -->
  
    <script src="../../bootstrap_files/js/popper.min.js"></script>
    <script src="../../bootstrap_files/js/jquery-3.6.4.min.js"></script>
    <script src="../../bootstrap_files/js/bootstrap.js"></script>
</body>

</html>