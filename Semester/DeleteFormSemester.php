<?php 
    $SemID = $_GET['SemID'];
    $Status = 'Delete';

    $con = new mysqli('localhost','root','1234','srms');
    $sql = "update semester set Status='$Status' where SemID='$SemID'";

    $success = $con->query($sql);

    if($success){
        header('location:DeleteSemester.php');
    }
    else{
        echo "Delete Unsuccess";
    }

    $con->close();

?>
