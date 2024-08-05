<?php
$Id = $_POST['id'];
$Name = $_POST['Name'];
$Tele = $_POST['Tele'];
$Nic = $_POST['Nic'];
$Gender = $_POST['Gender'];
$Code = $_POST['Code'];

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

$sql ="update moduleleader set Name='$Name', Tele='$Tele',Nic='$Nic',Gender='$Gender', Department='$Code' where ModuleLeaderID='$Id'";

$success = $con->query($sql);

if($success){
    header("location:EditModuleLeader.php?ModuleLeaderID=$Id");
}
else {
    echo "Update unsuccess";
}
$con->close();
?>