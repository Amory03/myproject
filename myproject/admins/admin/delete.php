<?php
include '../../db_function/conn.php'; 
  session_start();
  if(!isset($_SESSION['admin'] )){
    header("Location: ../index.php");
    exit(); 
  }

if(isset($_POST["del"])){
  $id =$_POST["delete"];
  
  $query = "DELETE FROM `admin` WHERE id=$id";

  mysqli_query($conn,$query);

  header("location: index.php");
}
?>

