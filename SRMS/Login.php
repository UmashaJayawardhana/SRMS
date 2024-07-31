<?php
$UserName = $_POST['username'];
$Password = $_POST['password'];


$con = new mysqli('localhost','root','1234','srms');

$sql1 = "select * from login where UserName = '$UserName'";
$result1 = $con->query($sql1);
if($result1->num_rows < 1 ) exit("Enter the valid Username");

$sql2 = "select * from login where Password = '$Password'";
$result2 = $con->query($sql2);
if($result2->num_rows < 1 ) exit("Incorrect password");





if($result1 !== null){
    if($result2 !== null){
        header("location:HomePageMain.php");
    }

    else{
        header("location:Login.html");
    }
}
else{
    echo "Invalid Username";
}
$con->close();


?>