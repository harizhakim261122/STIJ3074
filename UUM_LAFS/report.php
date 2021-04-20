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
  background-color: #606060;
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
  background-color: #00CC00;
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
    <title>Report Page</title>
</head>

<body>

<div class="header">
  <a href="report.php" class="logo">UUM LOST AND FOUND</a>
  <div class="header-right">
    <a class="active" href="staffManage.php">HOMEPAGE</a>
  </div>
</div>

</body>

</html>


<?php
include_once("dbconnect.php");

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
    $sql = "SELECT * FROM lodge_report";
    $stmt = $conn->prepare($sql );
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $lodge_report = $stmt->fetchAll();

    echo "<p><h1 align='center'>Lost Items Reported</h1></p>";
        echo "<table border='1' align='center'>
        <tr>
        <th>Report Number</th>
        <th>Name</th>
        <th>E-Mail</th>
        <th>Contact Number</th>
        <th>Category</th>
        <th>Description</th>
        <th>Date Reported</th>
        </tr>";

        foreach($lodge_report as $lodge_report) {
            echo "<tr>";
            echo "<td>".$lodge_report['reportNum']."</td>";
            echo "<td>".$lodge_report['name']."</td>";
            echo "<td>".$lodge_report['email']."</td>";
            echo "<td>".$lodge_report['contact']."</td>";
            echo "<td>".$lodge_report['category']."</td>";
            echo "<td>".$lodge_report['description']."</td>";
            echo "<td>".$lodge_report['dateReported']."</td>";
            echo "<tr>";
        }
        echo "</table>";

    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;

?>