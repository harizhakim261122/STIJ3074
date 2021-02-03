<?php
include_once 'dbconnect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$staffusername = $_POST['staffusername'];
$staffpassword = sha1($_POST['staffpassword']);
$confirmPassword = sha1($_POST['confirmPassword']);

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO user(name, email, phoneNumber, staffusername, staffpassword, confirmPassword)
    VALUES ('$name', '$email', '$phoneNumber', '$staffusername', '$staffpassword', '$confirmPassword')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Registration Success')</script>";
    echo "<script> window.location.replace('login.html') </script>;";
} catch(PDOException $e) {
    echo "<script> alert('Registration Error')</script>";
    echo "<script> window.location.replace('register.html') </script>;";
}
$conn = null;
?>