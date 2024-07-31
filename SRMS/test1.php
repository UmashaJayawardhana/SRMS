<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Department</title>
    <link rel="stylesheet" href="assets/css/tablestyle.css" />
</head>
<body>
    <div class="head-section">
        <div class="system-logo">
        <a href="HomePageMain.php" onclick="loadPage(event, 'homeimage.html')"><img src="assets/images/Education-Logo.png" alt="System Logo"></a>
            </div>
            <div class="system-name">SRMS</div>
            
        <div class="system-subname">Student Result Management System</div>
        <button type="submit" class="logout-button" onclick="window.location.href='LoginForm.html'">Log Out</button>
           
            
        </div>
        <div>
        <img src="assets/images/homepage.png" alt="Container" class="container-image" height:>
    <div class="container">
        <h2>Departments</h2>
        <label for="depcode">Department code:</label>
        <select id="depcode" name="Code" required>
        <option value="--select--">--select--</option>
        <?php 
                        $con = new mysqli('localhost','root','1234','srms');

                        $department = "select DepID, DepCode from department";
                        $result =  $con->query($department);
                    
                        while ($row = mysqli_fetch_assoc($result)){

                        echo '<option value='.$row['DepID'].'>'.$row['DepCode']."</option>";
                        }  
                    ?>
      </select> 
      
      
        <table id="departmentTable">
            <thead>
                <tr>
                    <th>Department Code</th>
                    <th>Department Name</th>
                    <th>Number of Students</th>
                    <th>Head of the Division</th>
                    <th></th>
                </tr>
            </thead>
            
            <tbody>

            <?php

        $con = new mysqli('localhost','root','1234','srms');
        $sql = "select * from department";
        $result = $con->query($sql);

        

        while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                    echo "<td>".$row['DepCode']."</td>";
                    echo "<td>".$row['DepartmentName']."</td>";
                    
                    echo "<td>".$row['NumOfStuBatch']."</td>";
                    echo "<td>".$row['HOD']."</td>";
                    echo '<td><a class="myUpdateBtn" href="UpdateFormDepartment.php?id='.$row['DepID'].'">Update</a></td>';
                echo "</tr>";
        }
?>

            </tbody>
        </table>
    </div>

</body>
</html>
