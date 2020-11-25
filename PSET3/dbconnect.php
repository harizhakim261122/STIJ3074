<?php
// //get data first
// $foodname = $GET['foodname'];
// $price = $GET['price']; 
// $quantity = $_GET['quantity'];
// $calorie = $_GET['calorie'];

//connect to db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pset3";

// Create connection
$dbname = new mysqli($servername, $username, $password, $pset3);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>