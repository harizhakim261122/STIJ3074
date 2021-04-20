<?php
include_once("dbconnect.php");
//$staffusername = $_POST['staffusername'];
//$staffpassword = sha1($_POST['staffpassword']);
//$email = $_POST['email'];

//delete operation
if (isset($_COOKIE["timer"])){
    if (isset($_GET['operation'])) {
      $IDnumber = $_GET['IDnumber'];
      try {
        $sql = "DELETE FROM courses WHERE IDnumber='$IDnumber'";
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

    echo "<p><h1 align='center'>Lost & Found System</h1></p>";
    echo "<p><h1 align='center'>Missing Items</h1></p>";
        echo "<table border='1' align='center'>
        <tr>
        <th>ID Number</th>
        <th>Title</th>
        <th>Category</th>
        <th>Description</th>
        <th>Storage Place</th>
        <th>Date Reported</th>
        <th>Location Found</th>
        <th>Operations</th>
        </tr>";

        foreach($missing_items as $missing_items) {
            echo "<tr>";
            echo "<td>".$missing_items['IDnumber']."</td>";
            echo "<td>".$missing_items['title']."</td>";
            echo "<td>".$missing_items['category']."</td>";
            echo "<td>".$missing_items['description']."</td>";
            echo "<td>".$missing_items['storagePlace']."</td>";
            echo "<td>".$missing_items['dateFound']."</td>";
            echo "<td>".$missing_items['locationFound']."</td>";
            echo "<td><a href='homepage.php?operation=del'>Delete</a><br><a href='update.php?operation=upd'>Update</a></td>";
            echo "<tr>";
        }
        echo "</table>";
        echo "<p align='center'><a href='lostitems.html'>Insert lost items</a></p>";

    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;

?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      body {font-family: Arial, Helvetica, sans-serif;}
      form {border: 3px solid #f1f1f1;}
    </style>
    <title>Main Page</title>
</head>

<body>
</body>

</html>