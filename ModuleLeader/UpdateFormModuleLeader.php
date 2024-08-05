<?php 
    $ModuleLeaderID = $_GET['ModuleLeaderID'];

    $con = new mysqli('localhost','root','1234','srms');
    $sql = "select * from moduleleader where ModuleLeaderID='$ModuleLeaderID'";

    $success = $con->query($sql);

    $result = $success->fetch_object();

    if($result == null){
    exit("Module Leader is not found");
    }

?>
<html>
    <head>
        <title>Update details of <?php echo $result->Name; ?> </title>
        <link rel="stylesheet" href="../../assets/css/updateform.css" />
        <style>
            select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
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
        <h2>Update details of <?php echo $result->Name; ?> </h2>

        <form action="UpdateModuleLeader.php" method="POST" id="form">
            <input type="hidden" name="id" value="<?php echo $result->ModuleLeaderID ?>" >
            <label for="Name">Name</label>
            <input  value="<?php echo $result->Name; ?>" type="text" id="txtName" name="Name" required>
            <div><span class="error-msg" id="Namemsg"></span></div>

            <label for="Tele">Telephone No.</label>
            <input  value="<?php echo $result->Tele; ?>" type="number" id="txtTele" name="Tele" required>
            <div><span class="error-msg" id="Telemsg"></span></div>

            <label for="Nic">NIC</label>
            <input  value="<?php echo $result->NIC; ?>" type="number" id="txtNic" name="Nic" required>
            <div><span class="error-msg" id="numstumsg"></span></div>

            <label for="Gender">Gender</label>
            <select id="gender" name="Gender" required>
            <option value="">--Select--</option>
            <option value="male" <?php if ($result->Gender == 'male') echo 'selected'; ?>>Male</option>
            <option value="female" <?php if ($result->Gender == 'female') echo 'selected'; ?>>Female</option>
            </select>
            <div><span class="error-msg" id="gendermsg"></span></div>

            <label for="Depcode">Assign Department:</label>
            <select id="depcode" name="Code" required>
            <option value="--select--">--select--</option>
            <?php 
                            $con = new mysqli('localhost','root','1234','srms');

                            $department = "select DepID, DepCode from department where Status='Insert'";
                            $result =  $con->query($department);
                        
                            while ($row = mysqli_fetch_assoc($result)){
                            $selected = ($result->DepID == $row['DepID']) ? 'selected' : '';
                            echo '<option value='.$row['DepID'].'>'.$row['DepCode']."</option>";
                            }  
                        ?>
        </select> 
        <div><span class="error-msg" id="depcodemsg"></span></div>

            <button type="submit" class="myUpdateBtn">Update</button>
        </form>
        <div class="buttonContainer">
        <a class="myDetailBtn" href="GetAllModuleLeader.php">All</a>
        <a class="addbutton" href="InsertModuleLeader.php">Add</a>
        <a class="myDeleteBtn" href="DeleteModuleLeader.php">Delete</a>
        </div>
    </div>
</div>
</body>
    <script>
        
            // Get form data
            const Name = document.getElementById('txtName');
            const Tele = document.getElementById('txtTele');
            const Nic = document.getElementById('txtNic');
            const Gender = document.getElementById('gender');
            const Depcode = document.getElementById('depcode');

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
        
        //Validate Tele
            function validateTele() {
                const Tele = txtTele.value.trim();
                const crti1 = Tele != "";
                if (!crti1) {
                    Telemsg.innerHTML = "Telephone No. required";
                    return false;
                } else {
                    Telemsg.innerHTML = "";
                    return true;
                }
            }

            
        //Validate NIC
        function validateNIC() {
                const Nic = txtNic.value.trim();
                const crti1 = Nic != "";
                if (!crti1) {
                    Nicmsg.innerHTML = "NIC is required";
                    return false;
                } else {
                    Nicmsg.innerHTML = "";
                    return true;
                }
            }

            //Validate Gender
        function validateGender() {
                const Gender = gender.value;
                const crti1 = Gender != "";
                if (!crti1) {
                    gendermsg.innerHTML = "Gender required";
                    return false;
                
                } else {
                    gendermsg.innerHTML = "";
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

const validateName = validateName();
const validateTele = validateTele();
const validateNIC = validateNIC();
const validateGender = validateGender();
const validateDepcode = validateDepcode();

if( !validateName || !validateTele || !validateNIC || !validateGender || !validateDepcode) e.preventDefault();
});


</script>

<style type="text/css">
.error-msg {
color: #e60e0e;
font-size: 15px;
}
</style>

</html>