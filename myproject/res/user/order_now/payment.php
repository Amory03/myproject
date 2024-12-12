
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="payment ticket price">
	<link rel="icon" href="photo/icon.png">
	<title>payment Page</title>
	<link rel="stylesheet" href="../../bootstrap_files/css/bootstrap.css">
	<link rel="stylesheet" href="css/payment.css">
</head>

<body>
<?php
    $id = $_GET["id"];
    $sql = "SELECT * FROM `meal` WHERE ID = '$id' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

  ?>
    <section>
        <div class="container py-5">
          <div class="row d-flex justify-content-center">
            <div class="col-md-9 col-lg-7 col-xl-5">
              <div class="card">
                <img src="<?php echo$row['image']; ?>" class="card-img-top" alt="event photo" />
                <div class="card-body">
                  <div class="card-title d-flex justify-content-between mb-0">
                    <p class="text-muted mb-0"><?php echo$row['name']; ?></p>
                    <p class="mb-0"></p>
                  </div>
                </div>
                <form method="POST" action="../home">
                <div class="pay">
                  <div class="card-body">
                    <p class="mb-4">Your payment details</p>
                    <div class="form-outline mb-3">
                      <input type="text" id="formControlLgXM8" class="form-control" name="card-num"  placeholder="1234 5678 1234 5678" />
                      <label class="form-label" for="formControlLgXM8">Card Number</label>
                    </div>
      
                    <div class="row mb-3">
                      <div class="col-6">
                        <div class="form-outline">
                          <input type="password" id="formControlLgExpk8" class="form-control"  name="expire" placeholder="MM/YYYY" />
                          <label class="form-label" for="formControlLgExpk8">Expire</label>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-outline">
                          <input type="password" id="formControlLgcvv8" class="form-control"  name="cvv" placeholder="Cvv" />
                          <label class="form-label" for="formControlLgcvv8">Cvv</label>
                        </div>
                      </div>
                    </div>
                   <button type="submit" name="submit" class="btn btn-success btn-block">book now</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

</body>
</html>
