<?php 
    $ModuleLeaderID = $_GET['ModuleLeaderID'];
    $Status = 'Insert';

    $con = new mysqli('localhost','root','1234','srms');
    $sql = "update moduleleader set Status='$Status' where ModuleLeaderID='$ModuleLeaderID'";

    $success = $con->query($sql);

    if($success){
        header('location:DeleteModuleLeaderHistory.php');
    }
    else{
        echo "Delete Unsuccess";
    }

    $con->close();

?>