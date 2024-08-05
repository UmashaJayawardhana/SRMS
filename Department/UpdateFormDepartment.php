<?php 
    $DepartmentID = $_GET['DepID'];

    $con = new mysqli('localhost','root','1234','srms');
    $sql = "select * from department where DepID='$DepartmentID'";

    $success = $con->query($sql);

    $result = $success->fetch_object();

    if($result == null){
    exit("Department is not found");
    }

?>
<html>
    <head>
        <title>Update details of <?php echo $result->DepartmentName; ?> </title>
        <link rel="stylesheet" href="../../assets/css/updateform.css" />
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
        <h2>Update details of <?php echo $result->DepartmentName; ?> </h2>

        <form action="UpdateDep.php" method="POST" id="form">
            <input type="hidden" name="id" value="<?php echo $result->DepID ?>" >
            <label for="depcode">Department Code</label>
            <input  value="<?php echo $result->DepCode; ?>" type="text" id="txtdepcode" name="depcode" required>
            <div><span class="error-msg" id="depcodemsg"></span></div>

            <label for="depname">Department Name</label>
            <input  value="<?php echo $result->DepartmentName; ?>" type="text" id="txtdepname" name="depname" required>
            <div><span class="error-msg" id="depnamemsg"></span></div>

            <label for="numofstudents">Number of Students</label>
            <input  value="<?php echo $result->NumOfStuBatch; ?>" type="number" id="txtnumOfstudents" name="numofstudents" required>
            <div><span class="error-msg" id="numstumsg"></span></div>

            <label for="headofdivision">Head of the Division</label>
            <input  value="<?php echo $result->HOD; ?>" type="text" id="txtheadofdivision" name="headofdivision" required>
            <div><span class="error-msg" id="hodmsg"></span></div>
            <button type="submit" class="myUpdateBtn">Update</button>
        </form>
        <div class="buttonContainer">
    <a class="myDetailBtn" href="GetAllDepartment.php">All</a>
        <a class="addbutton" href="InsertDepartment.html">Add</a>
        <a class="myDeleteBtn" href="DeleteFormDepartment.php">Delete</a>
        </div>
    </div>
</div>
</body>
    <script>
        
            // Get form data
            const depcode = document.getElementById('txtdepcode');
            const depname = document.getElementById('txtdepname');
            const numofstudents = document.getElementById('txtnumOfstudents');
            const headofdivision = document.getElementById('txtheadofdivision');

            //Validate Department Code
        function validateDepCode() {
                const depcode = txtdepcode.value.trim();
                const crti1 = depcode != "";
                if (!crti1) {
                    depcodemsg.innerHTML = "Department Code is required";
                    return false;
                
                } else {
                    depcodemsg.innerHTML = "";
                    return true;
                }
            }
        
        //Validate Department Name
            function validateDepName() {
                const depname = txtdepname.value.trim();
                const crti1 = depname != "";
                if (!crti1) {
                    depnamemsg.innerHTML = "Department Name is required";
                    return false;
                } else {
                    depnamemsg.innerHTML = "";
                    return true;
                }
            }

            //Validate Num of Stu
        function validateNumStu() {
                const numofstudents = numofstudents.value.trim();
                const crti1 = numofstudents != "";
                if (!crti1) {
                    numstumsg.innerHTML = "Number Of Student is required";
                    return false;
                
                } else {
                    numstumsg.innerHTML = "";
                    return true;
                }
            }
        
        //Validate Department HOD
            function validateDepHOD() {
                const headofdivision = txtheadofdivision.value.trim();
                const crti1 = headofdivision != "";
                if (!crti1) {
                    hodmsg.innerHTML = "HOD Name is required";
                    return false;
                } else {
                    hodmsg.innerHTML = "";
                    return true;
                }
            }

            addDepartmentForm.addEventListener('submit', function(e){

const depcodeValidity = validateDepCode();
const depnameValidity = validateDepName();
const numstuValidity = validateNumStu();
const hodValidity = validateDepHOD();

if( !depcodeValidity || !depnameValidity || !numstuValidity || !hodValidity) e.preventDefault();
});


</script>

<style type="text/css">
.error-msg {
color: #e60e0e;
font-size: 15px;
}
</style>

</html>