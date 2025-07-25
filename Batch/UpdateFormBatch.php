<?php 
    $BatchID = $_GET['BatchID'];

    $con = new mysqli('localhost','root','1234','srms');
    $sql = "select * from batch where BatchID='$BatchID'";

    $success = $con->query($sql);

    $result = $success->fetch_object();

    if($result == null){
    exit("Batch is not found");
    }

?>
<html>
    <head>
        <title>Update details of <?php echo $result->Batch; ?> </title>
        <link rel="stylesheet" href="../../assets/css/updateform.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
        <h2>Update details of <?php echo $result->Batch; ?> </h2>

        <form action="UpdateBatch.php" method="POST" id="form">
            <input type="hidden" name="id" value="<?php echo $result->BatchID ?>" >
            <label for="Batchname">Batch Name</label>
            <input  value="<?php echo $result->Batch; ?>" type="text" id="txtBatchname" name="Batchname" required>
            <div><span class="error-msg" id="Batchnamemsg"></span></div>

            <label for="BatchStartDate">Start Date</label>
            <input  value="<?php echo $result->StartDate; ?>" type="text" id="txtBatchStartDate" name="BatchStartDate" placeholder="mm/dd/yyyy" required>
            <div><span class="error-msg" id="BatchStartDatemsg"></span></div>

            <label for="BatchEndDate">End Date</label>
            <input  value="<?php echo $result->EndDate; ?>" type="text" id="txtBatchEndDate" name="BatchEndDate" placeholder="mm/dd/yyyy" required>
            <div><span class="error-msg" id="BatchEndDatemsg"></span></div>

            <label for="numofstudents">Number of Students</label>
            <input  value="<?php echo $result->NoOfStu; ?>" type="number" id="txtnumOfstudents" name="numofstudents" required>
            <div><span class="error-msg" id="numstumsg"></span></div>

            <button type="submit" class="myUpdateBtn">Update</button>
        </form>
        <div class="buttonContainer">
        <a class="myDetailBtn" href="GetAllBatch.php">All</a>
        <a class="addbutton" href="InsertBatch.html">Add</a>
        <a class="myDeleteBtn" href="DeleteBatch.php">Delete</a>
        
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#txtBatchStartDate", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
    flatpickr("#txtBatchEndDate", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
        
            // Get form data
            const Batchname = document.getElementById('txtBatchname');
            const BatchStartDate = document.getElementById('txtBatchStartDate');
            const BatchEndDate = document.getElementById('txtBatchEndDate');
            const numofstudents = document.getElementById('txtnumOfstudents');

            //Validate Batch Code
        function validateBatchname() {
                const Batchname = txtBatchname.value.trim();
                const crti1 = Batchname != "";
                if (!crti1) {
                    Batchnamemsg.innerHTML = "Batch Code is required";
                    return false;
                
                } else {
                    Batchnamemsg.innerHTML = "";
                    return true;
                }
            }
        
        //Validate Batch Start Date
            function validateBatchStartDate() {
                const BatchStartDate = txtBatchStartDate.value.trim();
                const crti1 = BatchStartDate != "";
                if (!crti1) {
                    BatchStartDatemsg.innerHTML = "Start Date is required";
                    return false;
                } else {
                    BatchStartDatemsg.innerHTML = "";
                    return true;
                }

                const now = new Date();
                const selectedDate = new Date(BatchStartDate);

                if (selectedDate < now) {
                    BatchStartDatemsg.innerHTML =  'The start date cannot be in the past.';
                } else {
                    BatchStartDatemsg.innerHTML = "";
                        return true;
                }
            }
            
            //Validate Batch End Date
            function validateBatchEndDate() {
                const BatchEndDate = txtBatchEndDate.value.trim();
                const crti1 = BatchEndDate != "";
                if (!crti1) {
                    BatchEndDatemsg.innerHTML = "End Date is required";
                    return false;
                } else {
                    BatchEndDatemsg.innerHTML = "";
                    return true;
                }

                const now = new Date();
                const selectedDate = new Date(BatchEndDate);

                if (selectedDate < now) {
                    BatchEndDatemsg.innerHTML =  'The End date cannot be in the past.';
                } else {
                    BatchEndDatemsg.innerHTML = "";
                        return true;
                }
            }
            


            //Validate Num of Stu
        function validateNumStu() {
                const numofstudents = txtnumOfstudents.value.trim();
                const crti1 = numofstudents != "";
                if (!crti1) {
                    numstumsg.innerHTML = "Number Of Student is required";
                    return false;
                
                } else {
                    numstumsg.innerHTML = "";
                    return true;
                }
            }
        
        

            addDepartmentForm.addEventListener('submit', function(e){

const batchcodeValidity = validateBatchname();
const batchStartDateValidity = validateBatchStartDate();
const batchEndDateValidity = validateBatchEndDate();
const numStuValidity = validateNumStu();

if( !batchcodeValidity || !batchStartDateValidity || !batchEndDateValidity || !numStuValidity) e.preventDefault();
});


</script>

<style type="text/css">
.error-msg {
color: #e60e0e;
font-size: 15px;
}
</style>

</html>