<?php
$Batchname = $_POST['Batchname'];
$BatchStartDate = $_POST['BatchStartDate'];
$BatchEndDate = $_POST['BatchEndDate'];
$numofstudents = $_POST['numofstudents'];
$Status = "Insert";

$con = new mysqli('localhost','root','1234','srms');

$sql = "insert into batch values(null, '$Batchname', '$BatchStartDate','$BatchEndDate','$numofstudents', '$Status')";

$success = $con->query($sql);

if($success){
    
    header("location:GetAllBatch.php?status=success'");

}
else {
    header('Location:InsertBatch.html?status=error');
}

$con->close();


?>