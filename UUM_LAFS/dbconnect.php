<?php
//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uum_lafs";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>