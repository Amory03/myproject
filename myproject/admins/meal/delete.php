<?php


include '../../db_function/conn.php';

session_start();
if(!isset($_SESSION['admin'] )){
	header("Location: ../index.php");
	exit(); 
}

$id = $_GET["id"];
$q_photo = "SELECT `image` FROM meal WHERE ID = $id";
$result = mysqli_query($conn, $q_photo);
$row = $result->fetch_assoc();
$photo = $row["image"];

if (file_exists($photo)) {

	unlink($photo);
}

$sql = "DELETE FROM `meal` WHERE id = $id";
mysqli_query($conn, $sql);

header("Location: index.php");
exit();
?>