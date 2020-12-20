<?php
//include_once("dbconnect.php");

//get data first
$title = $_GET['title'];
$author = $_GET['author'];
$price = $_GET['price'];
$description = $_GET['description'];
$publisher = $_GET['publisher'];
$isbn = $_GET['isbn'];

//connect to db
$servername = "localhost";
$username = "root";
$passworddb = "";
$dbname = "bookdepo";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, 
  $password);

    $sql = "INSERT INTO book (title, author, price, description, publisher, isbn)
    VALUES ('$title', '$author','$price', '$description', '$publisher', '$isbn')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Add Successful')</script>";
    echo "<script> window.location.replace('mainpage.php') </script>;";
  } catch(PDOException $e) {
    //echo $sql . "<br>" . $e->getMessage();
    echo "<script> alert('Add Error')</script>";
    echo "<script> window.location.replace('mainpage.php') </script>;";
  }

  $conn = null;


// $isbn = $_POST['isbn'];
// try {
//   $sql = "SELECT" * FROM book WHERE title = '$title', author = '$author', price = '$price', 
//   description = '$description', publisher = '$publisher' AND isbn = '$isbn';
//   $stmt = $conn->prepare($sql);
//   $stmt ->execute();

//     // set the resulting array to associative
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $count = $stmt->rowCount();
//     $title = $stmt->fetchAll();  
//     if ($count > 0){
//         foreach($title as $user) {
//             $matric = $user['matric'];
//             $name = $user['name'];
//         } 
//         setcookie("timer", "10s", time()+100000,"/");

//         $_SESSION["name"] = $name;
//         $_SESSION["email"] = $email;
//         $_SESSION["password"] = $password;

//         echo "<script> alert('Login Success')</script>";
//         echo "<script> window.location.replace('mainpage.php?matric=".$matric."&name=".$name."') </script>;";
//     }else{
//         echo "<script> alert('Login Failed')</script>";
//         echo "<script> window.location.replace('index.html') </script>;";
//     }
// } catch(PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }
//   $conn = null;
// 
?>