<?php
include_once("dbconnect.php");
$id = $_GET['id'];
$title = $_GET['title'];
$author = $_GET['author'];
$price = $_GET['price'];
$description = $_GET['description'];
$publisher = $_GET['publisher'];
$isbn = $_GET['isbn'];

if (isset($_GET['operation'])) {
    try {
        $sqlupdate = "UPDATE book SET title = '$title', author = '$author', price = '$price', 
        description = '$description', publisher = '$publisher' AND isbn = '$isbn';
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('mainpage.php? title =".$title.") </script>;";
      } 
      catch(PDOException $e) {
        echo "<script> alert('Update Error')</script>";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>
<body>
<p>
<h2 align='center'><?php echo $name?></h2>
</p>

   <h3 align="center">Update <?php echo $isbn?> </h3>

    <form action="update.php" method="get" align="center" onsubmit="return confirm('Update?');">
        <input type="hidden" id="title" name="title" value="<?php echo $title;?>"><br>
        <input type="hidden" id="author" name="author" value="<?php echo $author;?>"><br>
        <input type="hidden" id="price" name="price" value="<?php echo $price;?>" required><br>
        <input type="hidden" id="description" name="description" value="<?php echo $description;?>"><br>
        <input type="hidden" id="publisher" name="publisher" value="<?php echo $publisher;?>"><br>
        <input type="hidden" id="isbn" name="isbn" value="<?php echo $isbn;?>" required><br>
        <input type="hidden" id="operation" name="operation" value="update"><br>
        <input type="submit" value="Update">
    </form>
    <p align="center"><a href="index.html?isbn=<?php echo $isbn?>">Cancel update.</a></p>
</body>

</html> 