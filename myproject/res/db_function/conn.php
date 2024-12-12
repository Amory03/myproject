<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "res";

$conn = new mysqli($dbhost , $dbuser, $dbpass , $dbname);

if ($conn->connect_error) {
    echo '<div class="alert alert-danger">connection error ' . $conn->connect_error . '</div>';
    die();
}


?>
