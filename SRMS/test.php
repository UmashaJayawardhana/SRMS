<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .welcome-message {
            flex-grow: 1;
            text-align: center;
        }
        

        .logout-button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        .logout-button:hover {
            background-color: #c82333;
        }

        .content-section {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .item-wrapper {
            border: 1px solid #F7F7F5;
            overflow: hidden;
            margin-bottom: 30px;
            box-shadow: 5px 5px 5px #E8E8E8;
            padding: 3px;
            width: 200px;
            text-align: center;
        }

        .item-wrapper img {
            width: 100%;
            height: auto;
        }

        .item-wrapper label {
            background-color: rgb(235, 233, 233);
            display: block;
            padding: 5px 0;
            font-size: large;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="top-section">
            <div></div>
            <div class="welcome-message">
                Welcome, 
            </div>
            <form method="post" action="logout.php" style="margin: 0;">
                <button type="submit" class="logout-button">Log Out</button>
            </form>
        </div>

        <div class="content-section">
            <!-- Finance Section -->
            <div class="item-wrapper">
                <a href="finance.php">
                    <img src="img/png/finance.png" alt="Finance">
                    <label>Finance</label>
                </a>
            </div>

            <!-- Fixed Asset Section -->
            <div class="item-wrapper">
                <a href="fixed_asset.php">
                    <img src="img/jpg/contract.jpg" alt="Fixed Asset">
                    <label>Fixed Asset</label>
                </a>
            </div>

            <!-- Consumable Section -->
            <div class="item-wrapper">
                <a href="consumable.php">
                    <img src="img/supplies.jpg" alt="Consumable">
                    <label>Consumable</label>
                </a>
            </div>

            <!-- Training Section -->
            <div class="item-wrapper">
                <a href="training.php">
                    <img src="img/TrainingNew.jpg" alt="Training">
                    <label>Training</label>
                </a>
            </div>

            <!-- Transport Section -->
            <div class="item-wrapper">
                <a href="transport.php">
                    <img src="img/png/transport.jpg" alt="Transport">
                    <label>Transport</label>
                </a>
            </div>

            <!-- Human Resource Section -->
            <div class="item-wrapper">
                <a href="hr.php">
                    <img src="img/png/consultancy.png" alt="Human Resource">
                    <label>Human Resource</label>
                </a>
            </div>

            <!-- Procurement Section -->
            <div class="item-wrapper">
                <a href="procurement.php">
                    <img src="img/png/procu.png" alt="Procurement">
                    <label>Procurement</label>
                </a>
            </div>

            <!-- Control Panel Section -->
            <div class="item-wrapper">
                <a href="control_panel.php">
                    <img src="img/administration_gears.jpg" alt="Control Panel">
                    <label>Control Panel</label>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
