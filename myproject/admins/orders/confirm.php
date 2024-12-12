<?php


include '../../db_function/conn.php';

session_start();
if(!isset($_SESSION['admin'] )){
	header("Location: ../index.php");
	exit(); 
}

$id = $_GET["id"];

$sql = "UPDATE orders SET state = 'confirmed' WHERE id = $id;";
$done = mysqli_query($conn,$sql);

header("Location: pending_orders.php");
exit();

?>