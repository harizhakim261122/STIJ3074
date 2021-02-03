<?php
include_once("dbconnect.php");

$staffusername = $_POST['staffusername']; 
$staffpassword = sha1($_POST['staffpassword']);

try {
    $sql = "SELECT * FROM user WHERE staffusername = '$staffusername' AND staffpassword = '$staffpassword'";
    $stmt = $conn->prepare($sql );
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    $users = $stmt->fetchAll();

    if ($count > 0){
        foreach ($users as $user) {
            $email = $user['email'];
        }
        echo "<script> alert('Login Success')</script>";
        echo "<script> window.location.replace('homepageLogin.php?email=".$email."') </script>;";
    }else{
        echo "<script> alert('Login Failed')</script>";
        echo "<script> window.location.replace('login.html') </script>;";
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
  $conn = null;
?>