<?php 
    $BatchID = $_GET['BatchID'];
    $Status = 'Insert';

    $con = new mysqli('localhost','root','1234','srms');
    $sql = "update batch set Status='$Status' where BatchID='$BatchID'";

    $success = $con->query($sql);

    if($success){
        header('location:DeleteBatchHistory.php');
    }
    else{
        echo "Delete Unsuccess";
    }

    $con->close();

?>