<?php
$Id = $_POST['id'];
$Code = $_POST['depcode'];
$Name = $_POST['depname'];
$NumOfStu = $_POST['numofstudents'];
$HODName = $_POST['headofdivision'];

$con = new mysqli('localhost','root','1234','srms');

$nicsql = "select * from department where DepCode='$Code'";

//database validation
$result = $con->query($nicsql);
$studentByNic = $result->fetch_object();

if($studentByNic != null){
    if($studentByNic->DepCode != $Code){
        exit("Deaprtment Code is already exit");
    }
    
}

$sql ="update department set DepCode='$Code', DepartmentName='$Name',NumOfStuBatch='$NumOfStu',HOD='$HODName' where DepID='$Id'";

$success = $con->query($sql);

if($success){
    header("location:EditDepartment.php?DepID=$Id");
}
else {
    echo "Update unsuccess";
}
$con->close();
?>