<?php
$BatchId = $_POST['id'];
$Batchname = $_POST['Batchname'];
$BatchStartDate = $_POST['BatchStartDate'];
$BatchEndDate = $_POST['BatchEndDate'];
$numofstudents = $_POST['numofstudents'];

$con = new mysqli('localhost','root','1234','srms');

$nicsql = "select * from batch where BatchID='$BatchId'";

//database validation
$result = $con->query($nicsql);
$studentByNic = $result->fetch_object();

if($studentByNic != null){
    if($studentByNic->Batch != $Batchname){
        exit("Batch Name is already exit");
    }
    
}

$sql ="update batch set Batch='$Batchname', StartDate='$BatchStartDate',EndDate='$BatchEndDate',NoOfStu='$numofstudents' where BatchID='$BatchId'";

$success = $con->query($sql);

if($success){
    header("location:EditBatch.php?BatchID=$BatchId");
}
else {
    echo "Update unsuccess";
}
$con->close();
?>