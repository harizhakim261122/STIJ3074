<?php
include_once('dbconnect.php');

if (isset($_GET['operation'])) {
    try {
        $sqlupdate = "UPDATE missing_items SET title = '$title', category = '$category', 
        description = '$description', storagePlace = '$storagePlace', dateFound = '$dateFound', locationFound = '$locationFound'";
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('mainpage.php?') </script>;";
      } 
      catch(PDOException $e) {
        echo "<script> alert('Update Error')</script>";
      }
    }
?>

<!DOCTYPE html>
<html>
  
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

    <title>Update</title>
  </head>

<body>



<div class="header">
  <a href="#default" class="logo">Lost and Found System</a>
  <div class="header-right">
    <a class="active" href="homepage.php">Logout</a>
  </div>
</div>

  <h2 align="center">Update Lost Items</h2>

  <form action="addItems.php" enctype="multipart/form-data" method="post" align="center"
  onsubmit="return confirm('Are you sure you want save changes?');">

  <label for="title">Title:</label><br>
  <input type="text" id="title" name="title" value="" required><br><br>
  
  <label for="category">Category:</label><br>
  <select id="category" name="category">
    <option value="Books" title="Books">Books</option>
	  <option value="Electronics" title="Electronics">Electronics</option>
	  <option value="Identitity" title="Identitity">Identitity Document</option>
    <option value="Personnal" title="Personnal">Personnal Item</option>
  </select><br><br>
    
  <label for="description">Description:</label><br>
  <textarea id="description" name="description" rows="4"></textarea><br><br>

  <label for="storagePlace">Storage place:</label><br>
  <input type="text" id="storagePlace" name="storagePlace" value="" required><br><br>

  <label for="dateFound">Date found:</label><br>
  <input type="text" id="dateFound" name="dateFound" value="" required><br><br>

  <label for="locationFound">Location found:</label><br>
  <input type="text" id="locationFound" name="locationFound" value="" required><br><br>

  <input type="submit" value="Submit" class="button">
  </form>
  <p align="center"><a href="homepageLogin.php">Cancel</a></p>

</body>

</html>