<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Subject</title>
    <link rel="stylesheet" href="../../assets/css/insertformstyle.css" />
    <style>
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .container {
            max-width: 800px;
            height: 550px;
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
        <h2>Add New Subject</h2>
        <form id="addDepartmentForm" action="InsertSub.php" method="post">
            <label for="Code">Code</label>
            <input type="text" id="txtCode" name="Code" required>
            <div><span class="error-msg" id="Codemsg"></span></div>

            <label for="Name">Name</label>
            <input type="text" id="txtName" name="Name" required>
            <div><span class="error-msg" id="Namemsg"></span></div>
            
            <label for="Depcode">Department:</label>
            <select id="depcode" name="depCode" required>
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
        <div><span class="error-msg" id="depcodemsg"></span></div>

        <label for="SemId">Semester:</label>
            <select id="SemId" name="SemId" required>
            <option value="--select--">--select--</option>
            <?php 
                            $con = new mysqli('localhost','root','1234','srms');

                            $sem = "select SemID, SemName from semester where Status='Insert'";
                            $result =  $con->query($sem);
                        
                            while ($row = mysqli_fetch_assoc($result)){

                            echo '<option value='.$row['SemID'].'>'.$row['SemName']."</option>";
                            }  
                        ?>
        </select> 
        <div><span class="error-msg" id="SemIdmsg"></span></div>

        <label for="Lecturer">Module Leader:</label>
            <select id="Lecturer" name="Lecturer" required>
            <option value="--select--">--select--</option>
            <?php 
                            $con = new mysqli('localhost','root','1234','srms');

                            $lec = "select ModuleLeaderID, Name from moduleleader where Status='Insert'";
                            $result =  $con->query($lec);
                        
                            while ($row = mysqli_fetch_assoc($result)){

                            echo '<option value='.$row['ModuleLeaderID'].'>'.$row['Name']."</option>";
                            }  
                        ?>
        </select> 
        <div><span class="error-msg" id="Lecturermsg"></span></div>


            <button type="submit" class="addbutton">Add Subject</button>
        </form>
        <div class="buttonContainer">
        <a class="myDetailBtn" href="GetAllSubject.php">All</a>
        <a class="myUpdateBtn" href="EditSubject.php">Edit</a>
        <a class="myDeleteBtn" href="DeleteSubject.php">Delete</a>
        </div>
    </div>
</div>
</body>
    <script>
        
            // Get form data
            const Code = document.getElementById('txtCode');
            const Name = document.getElementById('txtName');
            const Depcode = document.getElementById('depcoLecturerde');
            const Sem = document.getElementById('SemId');
            const Lecturer = document.getElementById('Lecturer');

            //Validate Code
            function validateCode() {
                const Code = txtCode.value.trim();
                const crti1 = Code != "";
                if (!crti1) {
                    Codemsg.innerHTML = "Subject Code is required";
                    return false;
                
                } else {
                    Codemsg.innerHTML = "";
                    return true;
                }
            }   

            //Validate Name
        function validateName() {
                const Name = txtName.value.trim();
                const crti1 = Name != "";
                if (!crti1) {
                    Namemsg.innerHTML = "Name is required";
                    return false;
                
                } else {
                    Namemsg.innerHTML = "";
                    return true;
                }
            }
        
        //Validate Sem
            function validateSem() {
                const Sem = SemId.value;
                const crti1 = Sem != "";
                if (!crti1) {
                    SemIdmsg.innerHTML = "Semester Is required";
                    return false;
                } else {
                    SemIdmsg.innerHTML = "";
                    return true;
                }
            }

            
        //Validate Lecturer
        function validateLecturer() {
                const Lecturer = Lecturer.value;
                const crti1 = Lecturer != "";
                if (!crti1) {
                    Lecturermsg.innerHTML = "Lecturer is required";
                    return false;
                } else {
                    Lecturermsg.innerHTML = "";
                    return true;
                }
            }

            // Validate Depcode
            function validateDepcode() {
                const Depcode = depcode.value;
                const crti1 = Depcode != "";
                if (!crti1) {
                    depcodemsg.innerHTML = "Department required";
                    return false;
                
                } else {
                    depcodemsg.innerHTML = "";
                    return true;
                }
            }
        

            addDepartmentForm.addEventListener('submit', function(e){

const validateCode = validateCode();
const validateName = validateName();
const validateSem = validateSem();
const validateLecturer = validateLecturer();
const validateDepcode = validateDepcode();

if( !validateCode || !validateName || !validateSem || !validateLecturer || !validateDepcode ) e.preventDefault();
});


</script>

<style type="text/css">
.error-msg {
color: #e60e0e;
font-size: 15px;
}
</style>

</html>
