<?Php
include_once("dbconnect.php");
$title = $_GET('title');

try {

  $sql = "SELECT * FROM book WHERE title = '$title'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $book = $stmt->fetchAll();

  echo "<table border='1' align='center'>
     <tr>
       <th>Book ID</th>
       <th>Title</th>
       <th>Author</th>
       <th>Price</th>
       <th>Description</th>
       <th>Publisher</th>
       <th>ISBN</th>
     </tr>";

    foreach($book as $book) {
        echo "<tr>";
        echo "<td>".$book['id']."</td>";
        echo "<td>".$book['title']."</td>";
        echo "<td>".$book['author']."</td>";
        echo "<td>".$book['price']."</td>";
        echo "<td>".$book['description']."</td>";
        echo "<td>".$book['publisher']."</td>";
        echo "<td>".$book['isbn']."</td>";

        echo "<td><a href='mainpage.php? id=".$id."&title=".$title."&author=".$author."&price=".$price."&description=".$description."&publisher=".$publisher."&isbn=".$isbn.">Delete</a><br>
        <a href='update.php? id=".$id."&title=".$title."&author=".$author."&price=".$price."&description=".$description."&publisher=".$publisher."&isbn=".$isbn.">Update</a></td>";
        echo "</tr>";
        <p align="center"><a href="form.html" >Click to add book.</a></p>
    } 
    echo "</table>";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

  $conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>