<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Module Leader</title>
    <link rel="stylesheet" href="../../assets/css/tablestyle.css" />
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
        <h2> Module Leader</h2>
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

        $ModuleLeaderID = $_GET['ModuleLeaderID'];

        $con = new mysqli('localhost','root','1234','srms');
        $sql = "select * from moduleleader where ModuleLeaderID=$ModuleLeaderID and Status='Insert'";
        $result = $con->query($sql);

        

        while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['Tele']."</td>";
                echo "<td>".$row['NIC']."</td>";
                echo "<td>".$row['Gender']."</td>";
                echo "<td>".$row['Department']."</td>";
                echo "</tr>";
        }
?>

            </tbody>
        </table>

        <div class="buttonContainer">
        <a class="myAddBtn" href="InsertModuleLeader.php">Add</a>
        <a class="myUpdateBtn" href="EditModuleLeader.php">Edit</a>
        <a class="myDeleteBtn" href="DeleteModuleLeader.php">Delete</a>
        </div>
    </div> 
    </div>
</body>
<script>
    document.getElementById('name').addEventListener('change', function() {
        var moduleLeaderID = this.value;
        var searchLink = document.getElementById('searchLink');
        searchLink.href = 'GetAModuleLeader.php?ModuleLeaderID=' + moduleLeaderID;
    });
</script>
</html>
