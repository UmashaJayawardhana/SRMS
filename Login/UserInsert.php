<?php
$Name = $_POST['name'];
$Type = $_POST['usertype'];
$UserName = $_POST['username'];
$Password = $_POST['password1'];


$con = new mysqli('localhost','root','1234','srms');

$sql = "insert into login values(null, '$Name', '$Type','$UserName','$Password')";

$success = $con->query($sql);

if($success){
    header("location:LoginForm.html?status=success'");
}
else {
    header('Location:RegisterForm.html?status=error');
}

$con->close();


?>