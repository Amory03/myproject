<?php
include '../../db_function/conn.php';
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../login-register-user/login.php");
    exit();
}

$errors = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['card-num'])) {
        $errors['card-num'] = "Card number is required.";
    } elseif (!preg_match("/^\d{16}$/", $_POST['card-num'])) {
        $errors['card-num'] = "Card number must be exactly 16 digits.";
    }

    if (empty($_POST['expire'])) {
        $errors['expire'] = "Expiry date is required.";
    } elseif (!preg_match("/^(0[1-9]|1[0-2])\/\d{4}$/", $_POST['expire'])) {
        $errors['expire'] = "Expiry date must be in MM/YYYY format.";
    }

    if (empty($_POST['cvv'])) {
        $errors['cvv'] = "CVV is required.";
    } elseif (!preg_match("/^\d{3}$/", $_POST['cvv'])) {
        $errors['cvv'] = "CVV must be exactly 3 digits.";
    }


    if (empty($errors)) {
        header("Location: ../home/");
        exit();
    }
}

$id = $_GET["id"];
$sql = "SELECT * FROM `meal` WHERE ID = '$id' LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="payment ticket price">
    <link rel="icon" href="photo/icon.png">
    <title>Payment Page</title>
    <link rel="stylesheet" href="../../bootstrap_files/css/bootstrap.css">
    <link rel="stylesheet" href="css/payment.css">
</head>
<body>

<section>
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 col-lg-7 col-xl-5">
                <div class="card">
                    <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="event photo" />
                    <div class="card-body">
                        <div class="card-title d-flex justify-content-between mb-0">
                            <p class="text-muted mb-0"><?php echo $row['name']; ?></p>
                        </div>
                    </div>

                    <form method="POST" action="">
                        <div class="pay">
                            <div class="card-body">
                                <p class="mb-4">Your payment details</p>

                                <div class="form-outline mb-3">
                                    <input type="text" id="formControlLgXM8" class="form-control" name="card-num" value="<?php echo isset($_POST['card-num']) ? $_POST['card-num'] : ''; ?>" placeholder="1234 5678 1234 5678" />
                                    <label class="form-label" for="formControlLgXM8">Card Number</label>
                                    <?php if (isset($errors['card-num'])): ?>
                                        <div class="error" style="color: red;"><?php echo $errors['card-num']; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <div class="form-outline">
                                            <input type="text" id="formControlLgExpk8" class="form-control" name="expire" value="<?php echo isset($_POST['expire']) ? $_POST['expire'] : ''; ?>" placeholder="MM/YYYY" />
                                            <label class="form-label" for="formControlLgExpk8">Expire</label>
                                            <?php if (isset($errors['expire'])): ?>
                                                <div class="error" style="color: red;"><?php echo $errors['expire']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-outline">
                                            <input type="text" id="formControlLgcvv8" class="form-control" name="cvv" value="<?php echo isset($_POST['cvv']) ? $_POST['cvv'] : ''; ?>" placeholder="Cvv" />
                                            <label class="form-label" for="formControlLgcvv8">Cvv</label>
                                            <?php if (isset($errors['cvv'])): ?>
                                                <div class="error" style="color: red;"><?php echo $errors['cvv']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" name="submit" class="btn btn-success btn-block">Book Now</button>
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
