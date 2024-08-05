<?php 
    $SemID = $_GET['SemID'];

    $con = new mysqli('localhost','root','1234','srms');
    $sql = "select * from semester where SemID='$SemID'";

    $success = $con->query($sql);

    $result = $success->fetch_object();

    if($result == null){
    exit("Semester is not found");
    }

?>
<html>
    <head>
        <title>Update details of <?php echo $result->SemName; ?> </title>
        <link rel="stylesheet" href="../../assets/css/updateform.css" />
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
        <h2>Update details of <?php echo $result->SemName; ?> </h2>

        <form action="UpdateSem.php" method="POST" id="form">
            <input type="hidden" name="id" value="<?php echo $result->SemID ?>" >

            <label for="semcode">Semester Code</label>
            <input  value="<?php echo $result->SemCode; ?>" type="text" id="txtsemcode" name="semcode" required>
            <div><span class="error-msg" id="semcodemsg"></span></div>

            <label for="semname">Semester Name</label>
            <input  value="<?php echo $result->SemName; ?>" type="text" id="txtsemname" name="semname" required>
            <div><span class="error-msg" id="semnamemsg"></span></div>

            <label for="duration">Duration(Months)</label>
            <input value="<?php echo $result->Duration; ?>" type="text" id="txtduration" name="duration">
            <div><span class="error-msg" id="durationmsg"></span></div>

            <label for="Yera">Year</label>
            <select id="year" name="year" required>
                <option value="">--Select--</option>
                <option value="1st" <?php if ($result->YearSem == '1st') echo 'selected'; ?>>1st</option>
                <option value="2nd" <?php if ($result->YearSem == '2nd') echo 'selected'; ?>>2nd</option>
                <option value="3rd" <?php if ($result->YearSem == '3rd') echo 'selected'; ?>>3rd</option>
                <option value="4th" <?php if ($result->YearSem == '4th') echo 'selected'; ?>>4th</option>
            </select>
            <div><span class="error-msg" id="yearmsg"></span></div>


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
            const Semcode = document.getElementById('txtsemcode');
            const Semname = document.getElementById('txtsemname');
            const Duration = document.getElementById('txtduration');

            //Validate Semester Code
        function validateSemcode() {
                const Semcode = txtsemcode.value.trim();
                const crti1 = Semcode != "";
                if (!crti1) {
                    semcodemsg.innerHTML = "Semester Code is required";
                    return false;
                
                } else {
                    semcodemsg.innerHTML = "";
                    return true;
                }
            }
        
        //Validate Semester name
            function validateSemname() {
                const Semname = txtsemname.value.trim();
                const crti1 = Semname != "";
                if (!crti1) {
                    semnamemsg.innerHTML = "Semester Name is required";
                    return false;
                } else {
                    semnamemsg.innerHTML = "";
                    return true;
                }
            }
            


            //Validate Duration
        function validateDuration() {
                const Duration = txtduration.value.trim();
                const crti1 = Duration != "";
                if (!crti1) {
                    durationmsg.innerHTML = "Duration is required";
                    return false;
                
                } else {
                    durationmsg.innerHTML = "";
                    return true;
                }
            }
        
        

            addDepartmentForm.addEventListener('submit', function(e){

const semcodeValidity = validateSemcode();
const semnameDateValidity = validateSemname();
const durationValidity = validateDuration();

if( !semcodeValidity || !semnameDateValidity || !durationValidity ) e.preventDefault();
});



</script>

<style type="text/css">
.error-msg {
color: #e60e0e;
font-size: 15px;
}
</style>

</html>