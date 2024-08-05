<?php
$Name = $_POST['Name'];
$Tele = $_POST['Tele'];
$Nic = $_POST['Nic'];
$Gender = $_POST['Gender'];
$Code = $_POST['Code'];
$Status = "Insert";

$con = new mysqli('localhost','root','1234','srms');

$nicsql = "select * from moduleleader where Nic='$Nic'";

//database validation
$result = $con->query($nicsql);
$studentByNic = $result->fetch_object();

if($studentByNic != null){
    if($studentByNic->Nic != $Nic){
        exit("Nic is already exit");
    }
    
}

$sql = "insert into moduleleader values(null, '$Name', '$Tele','$Nic','$Gender', '$Code' '$Status')";

$success = $con->query($sql);

if($success){
    
    header("location:GetAllModuleLeader.php?status=success'");

}
else {
    header('Location:InsertModuleLeader.php?status=error');
}

$con->close();


?>