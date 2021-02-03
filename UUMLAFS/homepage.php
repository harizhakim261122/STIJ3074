<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      body {font-family: Arial, Helvetica, sans-serif;}
      form {border: 3px solid #f1f1f1;}

      * {box-sizing: border-box;}

      body {
      background-color: #f2f2f2;
      }

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #00cc00;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}

    </style>
    <title>Main Page</title>
</head>

<body>

<div class="header">
  <a href="homepage.php" class="logo">UUM Lost and Found System</a>
  <div class="header-right">
    <a class="active" href="homepage.php">Home</a>
    <a href="register.html">Register</a>
    <a href="login.html">Login</a>
  </div>
</div>

</body>

</html>


<?php
include_once("dbconnect.php");
//$staffusername = $_POST['staffusername'];
//$staffpassword = sha1($_POST['staffpassword']);
//$email = $_GET['email'];
//$name = $_GET['name'];
//$title = $_GET['title'];
//$category = $_GET['category'];

//delete operation
if (isset($_COOKIE["timer"])){
    if (isset($_GET['operation'])) {
      $IDnumber = $_GET['IDnumber'];
      try {
        $sql = "DELETE FROM missing_items WHERE title='$title' AND category='$category'";
        $conn->exec($sql);
        echo "<script> alert('Record deleted successfully')</script>";
      } catch(PDOException $e) {
        echo "<script> alert('Error deleting record')</script>";
      }
    }
}

try {
    $sql = "SELECT * FROM missing_items";
    $stmt = $conn->prepare($sql );
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $missing_items = $stmt->fetchAll();

    echo "<p><h1 align='center'>Lost & Found Items</h1></p>";
        echo "<table border='1' align='center'>
        <tr>
        <th>Picture</th>
        <th>ID Number</th>
        <th>Title</th>
        <th>Category</th>
        <th>Description</th>
        <th>Storage Place</th>
        <th>Date Reported</th>
        <th>Location Found</th>
        </tr>";

        foreach($missing_items as $missing_items) {
            echo "<tr>";
            echo "<tr><td> <img src='laptop.jpg'".$missing_items['picture'].".jpg' width='150' height='100' class = 'center'> </td>";
            echo "<td>".$missing_items['IDnumber']."</td>";
            echo "<td>".$missing_items['title']."</td>";
            echo "<td>".$missing_items['category']."</td>";
            echo "<td>".$missing_items['description']."</td>";
            echo "<td>".$missing_items['storagePlace']."</td>";
            echo "<td>".$missing_items['dateFound']."</td>";
            echo "<td>".$missing_items['locationFound']."</td>";
            echo "<tr>";
        }
        echo "</table>";

    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;

?>