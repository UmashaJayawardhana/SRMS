<?php
$Code = $_POST['Code'];
$Name = $_POST['Name'];
$DepCode = $_POST['depCode'];
$SemId = $_POST['SemId'];
$Lecturer = $_POST['Lecturer'];
$Status = "Insert";

$con = new mysqli('localhost','root','1234','srms');

$nicsql = "select * from subject where Code='$Code'";

//database validation
$result = $con->query($nicsql);
$studentByNic = $result->fetch_object();

if($studentByNic != null){
    if($studentByNic->Code != $NCodeic){
        exit("Code is already exit");
    }
    
}

$sql = "insert into subject values(null, '$Code', '$Name','$DepCode','$SemId', '$Lecturer' '$Status')";

$success = $con->query($sql);

if($success){
    
    header("location:GetAllSubject.php?status=success'");

}
else {
    header('Location:InsertSubject.php?status=error');
}

$con->close();


?>