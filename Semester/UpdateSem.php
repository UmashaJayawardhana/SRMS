<?php
$Id = $_POST['id'];
$Code = $_POST['semcode'];
$Name = $_POST['semname'];
$Duration = $_POST['duration'];
$Year = $_POST['year'];


$con = new mysqli('localhost','root','1234','srms');

$nicsql = "select * from semester where SemCode='$Code'";

//database validation
$result = $con->query($nicsql);
$studentByNic = $result->fetch_object();

if($studentByNic != null){
    if($studentByNic->SemCode != $Code){
        exit("Semester Code is already exit");
    }
    
}

$sql ="update semester set SemCode='$Code', SemName='$Name',Duration='$Duration', YearSem='$Year' where SemID='$Id'";

$success = $con->query($sql);

if($success){
    header("location:EditSemester.php?SemID=$Id");
}
else {
    echo "Update unsuccess";
}
$con->close();
?>