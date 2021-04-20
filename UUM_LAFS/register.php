<?php
include_once 'dbconnect.php';

$username = $_POST['username'];
$email = $_POST['email'];
$phoneNum = $_POST['phoneNum'];
$staffPassword = sha1($_POST['staffPassword']);
$confirmPassword = sha1($_POST['confirmPassword']);

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO staff(username, email, phoneNum, staffPassword, confirmPassword)
    VALUES ('$username', '$email', '$phoneNum', '$staffPassword', '$confirmPassword')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Registration Success')</script>";
    echo "<script> window.location.replace('staffMainpage.html') </script>;";
} catch(PDOException $e) {
    echo "<script> alert('Registration Error')</script>";
    echo "<script> window.location.replace('register.html') </script>;";
}
$conn = null;
?>