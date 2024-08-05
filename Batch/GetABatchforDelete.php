<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Batch</title>
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
        <h2>Batch</h2>
        <label for="Batchcode">Batch Name:</label>
        <select id="Batchcode" name="Name" required>
        <option value="--select--">--select--</option>
        <?php 
                        $con = new mysqli('localhost','root','1234','srms');

                        $sql0 = "select BatchID, Batch from batch where Status='Insert'";
                        $result =  $con->query($sql0);
                    
                        while ($row = mysqli_fetch_assoc($result)){

                        echo '<option value='.$row['BatchID'].'>'.$row['Batch']."</option>";
                        }  
                    ?>
      </select> 
      <a id="searchLink" class="myAddBtn" href="#">Search</a>
      <table id="batchTable">
            <thead>
                <tr>
                    <th>Batch Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Number of Students</th>
                </tr>
            </thead>
            <tbody>

            <?php
        $BatchID = $_GET['BatchID'];

        $con = new mysqli('localhost','root','1234','srms');
        $sql = "select * from Batch where BatchID=$BatchID and Status='Insert'";
        $result = $con->query($sql);

        

        while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['Batch']."</td>";
                echo "<td>".$row['StartDate']."</td>";
                echo "<td>".$row['EndDate']."</td>";
                echo "<td>".$row['NoOfStu']."</td>";
                    echo '<td><a class="myDeleteBtn" href="DeleteFormBatch.php?BatchID='.$row['BatchID'].'">Delete</a></td>';
                echo "</tr>";
        }
?>

            </tbody>
        </table>

        <div class="buttonContainer">
        <a class="myAddBtn" href="InsertBatch.html">Add</a>
        <a class="myDetailBtn" href="GetAllBatch.php">All</a>
        <a class="myUpdateBtn" href="EditBatch.php">Edit</a>
        </div>
    </div>

</body>
<script>
    document.getElementById('Batchcode').addEventListener('change', function() {
        var batchID = this.value;
        var searchLink = document.getElementById('searchLink');
        searchLink.href = 'GetABatchforDelete.php?BatchID=' + batchID;
    });
</script>
</html>
