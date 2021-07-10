<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:../sign_in/login.php");  
} else {  
?>  
<!doctype html>  
<html>  
<head>  
<title>user_dashboard</title> 
<link rel="stylesheet" href="user_dashboard.css">  
<style>
        body {
                background-image: url("../dashboards/dashboard_bg_image.jpg");
                background-repeat: no-repeat;
                background-size: cover;
            }
    #home {
        border-bottom: 3px solid black;
        color: black;
}
h1{
    text-align: center;
}

</style>
</head>  
<body> 
    <div class="container">
    <div class="main">
    <div class="left-nav">
    <a href="user_dashboard.php" id="home">Home</a>
    <a href="user_dashboard_vehicle.php" id="vehicles">Vehicles</a>
    <a href="user_dashboard_driver.php" id="drivers">Drivers</a>
    <a href="user_dashboard_booking.php" id="booking">Booking</a>
    <a href="user_dashboard_transactions.php" id="transactions">Transactions</a>
    </div>
    <div class="right-nav">
    <a href="../sign_in/logout.php" id="logout">Logout</a>
    </div>
    </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><h1>Welcome to your personlized dashboard...</h1>
</body>  
</html>  
<?php } ?>