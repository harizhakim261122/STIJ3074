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
    echo "<script> alert('Insert Successful')</script>";
    echo "<script> window.location.replace('staffManage.php') </script>;";
} catch(PDOException $e) {
    echo "<script> alert('Insert Error')</script>";
    echo "<script> window.location.replace('lodgeReportStaff.html') </script>;";
}
$conn = null;
?>