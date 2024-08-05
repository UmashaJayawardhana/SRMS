<?php 
    $BatchID = $_GET['BatchID'];
    $Status = 'Delete';

    $con = new mysqli('localhost','root','1234','srms');
    $sql = "update batch set Status='$Status' where BatchID='$BatchID'";

    $success = $con->query($sql);

    if($success){
        header('location:DeleteBatch.php');
    }
    else{
        echo "Delete Unsuccess";
    }

    $con->close();

?>
