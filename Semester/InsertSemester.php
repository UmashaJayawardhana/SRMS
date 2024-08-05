<?php
$Code = $_POST['semcode'];
$Name = $_POST['semname'];
$Duration = $_POST['duration'];
$Year = $_POST['year'];
$Status = "Insert";

$con = new mysqli('localhost','root','1234','srms');

$sql = "insert into semester values(null, '$Code', '$Name','$Duration', '$Year', '$Status')";

$success = $con->query($sql);

if($success){
    
    header("location:GetAllSemsters.php?status=success'");

}
else {
    header('Location:InsertSemster.html?status=error');
}

$con->close();


?>