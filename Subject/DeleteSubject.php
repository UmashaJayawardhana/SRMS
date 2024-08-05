<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Subject</title>
    <link rel="stylesheet" href="../../assets/css/tablestyle.css" />
    <style>
        .myHistoryBtn{
    text-align: center;
    display: inline-block;
    background-color:rgb(16, 16, 17);
    color : white;
    padding: 4px 8px;
    text-decoration : none;
    font-family: calibri , sans-serif;
    border-radius: 5px;
    width: 100px;
 }

 .myHistoryBtn:hover{
    background-color:#353a3e;
 }
 </style>
</head>
<body>
    <div class="head-section">
        <div class="system-logo">
        <a href="../../Home/HomePageMain.php" onclick="loadPage(event, 'homeimage.html')"><img src="../../assets/images/Education-Logo.png" alt="System Logo"></a>
            </div>
            <div class="system-name">SRMS</div>
            
        <div class="system-subname">Student Result Management System</div>
        <button type="submit" class="logout-button" onclick="window.location.href='../Login/LoginForm.html'">Log Out</button>
           
            
        </div>
        <div>
        <img src="../../assets/images/homepage.png" alt="Container" class="container-image" height:>
    <div class="container">
        <h2>Subject</h2>
        <label for="code">Name:</label>
        <select id="code" name="code" required>
        <option value="--select--">--select--</option>
        <?php 
                        $con = new mysqli('localhost','root','1234','srms');

                        $sql0 = "select SubID, SubName from subject where Status='Insert'";
                        $result =  $con->query($sql0);
                    
                        while ($row = mysqli_fetch_assoc($result)){

                        echo '<option value='.$row['SubID'].'>'.$row['SubName']."</option>";
                        }  
                    ?>
      </select>  
      <a id="searchLink" class="myAddBtn" href="#">Search</a>
      <table id="SubjectsTable">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Semester</th>
                    <th>Module Leader</th>
                </tr>
            </thead>
            <tbody>

            <?php

            $con = new mysqli('localhost','root','1234','srms');
            $sql = "select * from subject where Status='Insert'";
            $result = $con->query($sql);   



            while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$row['SubCode']."</td>";
                    echo "<td>".$row['SubName']."</td>";
                    echo "<td>".$row['DepID']."</td>";
                    echo "<td>".$row['SemID']."</td>";
                    echo "<td>".$row['ModuleLeader']."</td>";
                    echo '<td><a class="myDeleteBtn" href="DeleteFormSubject.php?SubID='.$row['SubID'].'">Delete</a></td>';
                echo "</tr>";
        }
?>

            </tbody>
        </table>

        <div class="buttonContainer">
        <a class="myAddBtn" href="InsertSubject.php">Add</a>
        <a class="myDetailBtn" href="GetAllSubject.php">All</a>
        <a class="myUpdateBtn" href="EditSubject.php">Edit</a>
        <a class="myHistoryBtn" href="DeleteSubjectHistory.php">Delete History</a>
        </div>
    </div>

</body>
<script>
    document.getElementById('code').addEventListener('change', function() {
        var subID = this.value;
        var searchLink = document.getElementById('searchLink');
        searchLink.href = 'GetASubjectforDelete.php?SubID=' + subID;
    });
</script>
</html>
