<!DOCTYPE html>
<html>
    <head>
        <title>Profile menu</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    </head>
    <body>
        <div class="action">
            <div class="profile">
                <i class="fa fa-user"></i>
            </div>
            <div class="menu">
                <h3>Name</h3>
                <ul>
                    <li><i class = ""></i><a href="profile.php">My profile</a> </li>
                    <li><i class = ""></i><a href="members1.php?do=Edit&userid=<?php echo $_SESSION['ID']?>">Edit profile</a> </li>
                    <li><i class = ""></i><a href="setting.php">Settings</a> </li>
                    <li><i class = ""></i><a href="logout.php">Logout</a> </li>
                   
                </ul>

            </div>
        </div>
    </body>
</html>
