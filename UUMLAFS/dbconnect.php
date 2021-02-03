<?php
//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uumlafs";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>