<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Module Leader</title>
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
        <h2>Module Leader</h2>
        <label for="name">Name:</label>
        <select id="name" name="name" required>
        <option value="--select--">--select--</option>
        <?php 
                        $con = new mysqli('localhost','root','1234','srms');

                        $sql0 = "select ModuleLeaderID, Name from moduleleader where Status='Insert'";
                        $result =  $con->query($sql0);
                    
                        while ($row = mysqli_fetch_assoc($result)){

                        echo '<option value='.$row['ModuleLeaderID'].'>'.$row['Name']."</option>";
                        }  
                    ?>
      </select>  
      <a id="searchLink" class="myAddBtn" href="#">Search</a>
      <table id="ModuleLeadersTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Telephone No.</th>
                    <th>NIC</th>
                    <th>Gender</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>

            <?php

            $con = new mysqli('localhost','root','1234','srms');
            $sql = "select * from moduleleader where Status='Insert'";
            $result = $con->query($sql);



            while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$row['Name']."</td>";
                    echo "<td>".$row['Tele']."</td>";
                    echo "<td>".$row['NIC']."</td>";
                    echo "<td>".$row['Gender']."</td>";
                    echo "<td>".$row['Department']."</td>";
                    echo '<td><a class="myDeleteBtn" href="DeleteFormModuleLeader.php?ModuleLeaderID='.$row['ModuleLeaderID'].'">Delete</a></td>';
                echo "</tr>";
        }
?>

            </tbody>
        </table>

        <div class="buttonContainer">
        <a class="myAddBtn" href="InsertModuleLeader.php">Add</a>
        <a class="myDetailBtn" href="GetAllModuleLeader.php">All</a>
        <a class="myUpdateBtn" href="EditModuleLeader.php">Update</a>
        <a class="myHistoryBtn" href="DeleteModuleLeaderHistory.php">Delete History</a>
        </div>
    </div>

</body>
<script>
    document.getElementById('name').addEventListener('change', function() {
        var moduleLeaderID = this.value;
        var searchLink = document.getElementById('searchLink');
        searchLink.href = 'GetAModuleLeaderforDelete.php?ModuleLeaderID=' + moduleLeaderID;
    });
</script>
</html>
