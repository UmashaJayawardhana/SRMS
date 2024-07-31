<?php
$Code = $_POST['depcode'];
$Name = $_POST['depname'];
$NumOfStu = $_POST['numofstudents'];
$HODName = $_POST['headofdivision'];
$Status = "Insert";

$con = new mysqli('localhost','root','1234','srms');

$sql = "insert into department values(null, '$Code', '$Name','$NumOfStu','$HODName', '$Status')";

$success = $con->query($sql);

if($success){
    
    header("location:GetAllDepartment.php?status=success'");

}
else {
    header('Location: InsertDepartment.html?status=error');
}

$con->close();


?>