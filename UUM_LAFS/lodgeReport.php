<?php
include_once 'dbconnect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$category = $_POST['category'];
$description = $_POST['description'];

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO lodge_report(name, email, contact, category, description)
    VALUES ('$name', '$email', '$contact', '$category', '$description')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Report Successful')</script>";
    echo "<script> window.location.replace('userMainpage.php') </script>;";
} catch(PDOException $e) {
    echo "<script> alert('Error')</script>";
    echo "<script> window.location.replace('lodgeReport.html') </script>;";
}
$conn = null;
?>