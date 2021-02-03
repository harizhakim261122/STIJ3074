<?php
session_start();
include_once("dbconnect.php");

echo "Welcome " . $_SESSION["title"] . ".<br>";
if (isset($_SESSION["title"])){

//delete operation
if (isset($_GET['operation'])) {
  $isbn = $_GET['isbn'];
  try {
    $sql = "DELETE FROM book WHERE isbn='$isbn'";
    $conn->exec($sql);
    echo "<script> alert('Delete Success')</script>";
  } catch(PDOException $e) {
    echo "<script> alert('Delete Error')</script>";
  }
}
?>