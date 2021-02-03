<?php
include_once("dbconnect.php");

$title = $_POST['title'];
$category = $_POST['category'];
$description = $_POST['description'];
$storagePlace = $_POST['storagePlace'];
$dateFound = $_POST['dateFound'];
$locationFound = $_POST['locationFound'];

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO missing_items(title, category, description, storagePlace, dateFound, locationFound)
    VALUES ('$title', '$category', '$description', '$storagePlace', '$dateFound', '$locationFound')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Insert Successful')</script>";
    echo "<script> window.location.replace('homepageLogin.php') </script>;";
} catch(PDOException $e) {
    echo "<script> alert('Insert Error')</script>";
    echo "<script> window.location.replace('addlostitems.html') </script>;";
}
$conn = null;
?>