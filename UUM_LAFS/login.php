<?php
include_once("dbconnect.php");

$username = $_POST['username']; 
$staffPassword = sha1($_POST['staffPassword']);

try {
    $sql = "SELECT * FROM staff WHERE username = '$username' AND staffPassword = '$staffPassword'";
    $stmt = $conn->prepare($sql );
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    $staffs = $stmt->fetchAll();

    if ($count > 0){
        foreach ($staffs as $staff) {
            $email = $staff['email'];
        }
        echo "<script> alert('Login Success')</script>";
        echo "<script> window.location.replace('staffManage.html?email=".$email."') </script>;";
    }else{
        echo "<script> alert('Login Failed')</script>";
        echo "<script> window.location.replace('login.html') </script>;";
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
  $conn = null;
?>