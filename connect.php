<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$password = $_POST['password'];
$uname = $_POST['uname'];
$phone_number = $_POST['phone'];
$mail = $_POST['mail'];

//Database connection
$broker_port = "10.243.190.61";
$port = "5672";
$dbname = "databaseproject";
$dbuser = "test";
$dbpassword = "test";

$conn = new mysqli($broker_port,$port,$dbname,$dbuser,$dbpassword);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into registration(fname,lname,password,uname,phone,mail)
        values(?,?,?,?,?,?)");
    $stmt->bind_param("sssssi", $fname , $lname, $password, $uname, $phone, $mail);
    $stmt->execute(); 
    echo "Login Successful";
    $stmt->close();
    $conn->close();

}
?>
