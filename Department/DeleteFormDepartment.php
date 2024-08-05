<?php 
    $DepartmentID = $_GET['DepID'];
    $Status = 'Delete';

    $con = new mysqli('localhost','root','1234','srms');
    $sql = "update department set Status='$Status' where DepID='$DepartmentID'";

    $success = $con->query($sql);

    if($success){
        header('location:DeleteDepartment.php');
    }
    else{
        echo "Delete Unsuccess";
    }

    $con->close();

?>
