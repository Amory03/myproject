<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Employee</title>
    <link rel="stylesheet" href="../../bootstrap_files/css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  </style>
  <body>

  <!-- NAVBAR-->
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

<center>
  <div class="btn-group" role="group" aria-label="Basic mixed styles example">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addone">
  ADD ONE
</button>
&nbsp;
&nbsp;
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
Delete
</button>
</center>
<br>
<?php
        include '../../db_function/conn.php';  

        session_start();
        if(!isset($_SESSION['admin'] )){
          header("Location: ../index.php");
          exit(); 
        }

        
        if(isset($_POST["submit"])){
          $name = $_POST["name"];
          $email = $_POST["email"];
          $password = '';
          if($name == ''){

            echo '<div class="alert alert-danger" role="alert"><h3>please enter Name !!<h3> </div>';

          }else if($email == ''){

            echo '<div class="alert alert-danger" role="alert"><h3>please enter Email !!<h3> </div>';
          }
          elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            echo '<div class="alert alert-danger" role="alert"><h3>The Email you have entered is invalid, please try again.<h3> </div>';
          }else{
            $query = "INSERT INTO `admin` (`name`, `email`, `password`) 
            VALUES ('$name', '$email', '$password');";
            $done = mysqli_query($conn,$query);



            $conn->close();

            header("location: index.php");
            exit();
          }
        }
        ?>
<!-- Modal -->
<div class="modal fade" id="addone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!--form post add-->
  <form class="" action="" method="post" autocomplete="off">
  <div class="form-row">

    <div class="col">
    <input type="text" name="name" class="form-control" placeholder="Name">
    </div>
  </div>
  <div class="form-row">
      <div class="col">
        <input type="text" name="email" class="form-control" placeholder="email">
      </div>
  </div>
  </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-success">ADD</button>
      </div>
    </form>
      <!--form post add end-->
    </div>
  </div>
</div>


<!--Delete start-->


<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="delete.php" method="post">
    <div class="input-group mb-3">
          <input type="number" name="delete" class="form-control" placeholder="Enter ID" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
           <button type="submit" name="del" class="btn btn-outline-danger">Delete</button>
         </div>
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--Delete End-->
<br>
<!--table Start-->
<?php
$result = mysqli_query($conn,"SELECT * FROM `admin`");
?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
    </tr>
  </thead>
  <tbody>
  <?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	  <tr>
	    <td><?php echo $row["id"]; ?></td>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["email"]; ?></td>
    </tr>
			<?php
			$i++;
			}
	?>
  </tbody>
</table>

    <script src="../../bootstrap_files/js/popper.min.js"></script>
    <script src="../../bootstrap_files/js/jquery-3.6.4.min.js"></script>
    <script src="../../bootstrap_files/js/bootstrap.js"></script>
  </body>
</html>