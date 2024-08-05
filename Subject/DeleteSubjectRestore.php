<?php 
    $SubID = $_GET['SubID'];
    $Status = 'Insert';

    $con = new mysqli('localhost','root','1234','srms');
    $sql = "update subject set Status='$Status' where SubID='$SubID'";

    $success = $con->query($sql);

    if($success){
        header('location:DeleteSubjectHistory.php');
    }
    else{
        echo "Delete Unsuccess";
    }

    $con->close();

?>