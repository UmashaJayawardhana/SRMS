<?php 
    $DepartmentID = $_GET['DepID'];
    $Status = 'Insert';

    $con = new mysqli('localhost','root','1234','srms');
    $sql = "update department set Status='$Status' where DepID='$DepartmentID'";

    $success = $con->query($sql);

    if($success){
        header('location:DeleteDepHistory.php');
    }
    else{
        echo "Delete Unsuccess";
    }

    $con->close();

?>