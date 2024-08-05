<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Subject</title>
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
        <img src="../..assets/images/homepage.png" alt="Container" class="container-image" height:>
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

    $SubID = $_GET['SubID'];

        $con = new mysqli('localhost','root','1234','srms');
        $sql = "select * from subject where SubID=$SubID Status='Insert'";
        $result = $con->query($sql);

        

        while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['SubCode']."</td>";
                echo "<td>".$row['SubName']."</td>";
                echo "<td>".$row['DepID']."</td>";
                echo "<td>".$row['SemID']."</td>";
                echo "<td>".$row['ModuleLeader']."</td>";
                echo '<td><a class="myUpdateBtn" href=UpdateFormSubject.php?SubID='.$row['SubID'].'">Update</a></td>';
                echo "</tr>";
        }
?>

            </tbody>
        </table>

        <div class="buttonContainer">
        <a class="myAddBtn" href="InsertSubject.php">Add</a>
        <a class="myDetailBtn" href="GetAllSubject.php">All</a>
        <a class="myDeleteBtn" href="DeleteSubject.php">Delete</a>
        </div>
    </div>

</body>

<script>
    document.getElementById('code').addEventListener('change', function() {
        var subID = this.value;
        var searchLink = document.getElementById('searchLink');
        searchLink.href = 'GetASubjectforUpdate.php?SubID=' + subID;
    });
</script>
</html>
