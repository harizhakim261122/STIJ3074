<?php

//get data
$foodname = $_GET['foodname'];
$price = $_GET['price'];
$quantity = $_GET['quantity'];
$calories = $_GET['calories'];

//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pset3";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, 
  $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO food_menu (foodname, price, quantity, calories)
  VALUES ('$foodname', '$price', '$quantity', $calories)";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
