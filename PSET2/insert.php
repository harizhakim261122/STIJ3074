<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$phoneNumber = $_POST['phoneNumber'];
$address = $_POST['address'];

if(!empty($name) || !empty($email) || !empty($)) || !empty($password) ||
 !empty($confirmPassword) || !empty($phoneNumber) || !empty($address)) {
     $host = "localhost";
     $dbUsername = "root";
     $dbPassword = "";
     $dbName = "stij3074";

     $conn = new mysql_connect($host, $dbUsername, $dbPassword, $dbName);

     if (mysql_connect_error()) {
        die('Connect Error('. mysql_connect_error().')'. mysql_connect_error());
    } else {
        $SELECT = "SELECT email From registration_form Where email = ? Limit 1";
        $INSERT = "INSERT Into registration_form (name, email, password, confirmPassword, phoneNumber, address) 
            values(?, ?, ?, ?, ?, ?)";

        //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $stmt->store_result();
     $stmt->fetch();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $name, $email, $password, $confirmPassword, $phoneNumber, $address);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
     echo "All field are required";
     die();
 }
?>