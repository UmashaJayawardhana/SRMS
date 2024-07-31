<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="assets/css/style2.css" />
   
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
    </div>
    <div class="left-section">
        <ul>
            <li><a href="Department.html">Department</a></li>
            <li><a href="Batch.html" >Batch</a></li>
            <li><a href="#">Student</a></li>
            <li><a href="#">Semester</a></li>
            <li><a href="#">Subject</a></li>
            <li><a href="#">Result</a></li>
            <li><a href="#">Module Leader</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </div>
    <div class="middle-section" id="middle-section">
        <img src="assets/images/homepage.png" alt="Container" width="100%" height="100%" class="container-image">
    </div>

    <!-- <script>
        function loadPage(event, page) {
            if (event) {
                event.preventDefault();  
            }
            var xhr = new XMLHttpRequest();
            xhr.open('GET', page, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('middle-section').innerHTML = xhr.responseText;
                    history.pushState(null, null, page);
                }
            };
            xhr.send();
        }

        window.onpopstate = function() {
    var path = window.location.pathname;
    loadPage(null, path.substring(path.lastIndexOf('/') + 1));
};


        window.onload = function() {
            loadPage(null, 'homeimage.html');  
        };
    </script> -->
</body>
</html>

