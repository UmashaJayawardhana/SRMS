<?php
$Id = $_POST['id'];
$Code = $_POST['Code'];
$Name = $_POST['Name'];
$depCode = $_POST['depCode'];
$SemId = $_POST['SemId'];
$Lecturer = $_POST['Lecturer'];

$con = new mysqli('localhost','root','1234','srms');

$nicsql = "select * from subject where SubCode='$Code'";

//database validation
$result = $con->query($nicsql);
$studentByNic = $result->fetch_object();

if($studentByNic != null){
    if($studentByNic->SubCode != $Code){
        exit("Subject Code is already exit");
    }
    
}

$sql ="update moduleleader set SubCode='$Code', SubName='$Name',DepID='$depCode',SemID='$SemId', ModuleLeader='$Lecturer' where SubID='$Id'";

$success = $con->query($sql);

if($success){
    header("location:EditSubject.php?SubID=$Id");
}
else {
    echo "Update unsuccess";
}
$con->close();
?>