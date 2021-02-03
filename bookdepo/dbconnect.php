<?php

//get data first
$title = $_GET['title'];
$author = $_GET['author'];
$price = $_GET['price'];
$description = $_GET['description'];
$publisher = $_GET['publisher'];
$isbn = $_GET['isbn'];

//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookdepo";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, 
  $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO book (title, author, price, description, publisher, isbn)
  VALUES ('$title', '$author','$price','$description','$publisher','$isbn')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
  echo "<script> window.location.replace('mainpage.php') </script>;";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>