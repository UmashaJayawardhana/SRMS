<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Semesters</title>
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
        <h2>Semesters</h2>
        <table id="semesterTable">
            <thead>
                <tr>
                    <th>Semester Code</th>
                    <th>Semester Name</th>
                    <th>Duration</th>
                    <th>Year</th>
                </tr>
            </thead>
            <tbody>

            <?php

        $con = new mysqli('localhost','root','1234','srms');
        $sql = "select * from semester where Status='Insert'";
        $result = $con->query($sql);

        

        while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                    echo "<td>".$row['SemCode']."</td>";
                    echo "<td>".$row['SemName']."</td>";
                    echo "<td>".$row['Duration']."</td>";
                    echo "<td>".$row['YearSem']."</td>";
                echo "</tr>";
        }
?>

            </tbody>
        </table>

        <div class="buttonContainer">
        <a class="myAddBtn" href="InsertSemster.html">Add</a>
        <a class="myUpdateBtn" href="EditSemester.php">Edit</a>
        <a class="myDeleteBtn" href="DeleteSemester.php">Delete</a>
        </div>
    </div> 
    </div>
</body>
</html>
