<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Department</title>
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
        <h2>Departments</h2>
        <label for="depcode">Department code:</label>
        <select id="depcode" name="Code" required>
        <option value="--select--">--select--</option>
        <?php 
                        $con = new mysqli('localhost','root','1234','srms');

                        $department = "select DepID, DepCode from department where Status='Insert'";
                        $result =  $con->query($department);
                    
                        while ($row = mysqli_fetch_assoc($result)){

                        echo '<option value='.$row['DepID'].'>'.$row['DepCode']."</option>";
                        }  
                    ?>
      </select> 
      <a id="searchLink" class="myAddBtn" href="#">Search</a>
        <table id="departmentTable">
            <thead>
                <tr>
                    <th>Department Code</th>
                    <th>Department Name</th>
                    <th>Number of Students</th>
                    <th>Head of the Division</th>
                </tr>
            </thead>
            <tbody>

            <?php

        $con = new mysqli('localhost','root','1234','srms');
        $sql = "select * from department where Status='Insert'";
        $result = $con->query($sql);

        

        while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                    echo "<td>".$row['DepCode']."</td>";
                    echo "<td>".$row['DepartmentName']."</td>";
                    
                    echo "<td>".$row['NumOfStuBatch']."</td>";
                    echo "<td>".$row['HOD']."</td>";
                echo "</tr>";
        }
?>

            </tbody>
        </table>

        <div class="buttonContainer">
        <a class="myAddBtn" href="InsertDepartment.html">Add</a>
        <a class="myUpdateBtn" href="EditDepartment.php">Edit</a>
        <a class="myDeleteBtn" href="DeleteDepartment.php">Delete</a>
        </div>
    </div> 
    </div>
</body>
<script>
    document.getElementById('depcode').addEventListener('change', function() {
        var depID = this.value;
        var searchLink = document.getElementById('searchLink');
        searchLink.href = 'GetADepartment.php?DepID=' + depID;
    });
</script>
</html>
