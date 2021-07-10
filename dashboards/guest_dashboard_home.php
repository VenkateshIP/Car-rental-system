<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>guest_dashboard_home</title>
    <link rel="stylesheet" href="./dashboard.css">
    <style>
        body {
                background-image: url("dashboard_bg_image.jpg");
                background-repeat: no-repeat;
                background-size: cover;
            }
    #home {
        border-bottom: 3px solid black;
        color: black;
}
    </style>
</head>
<body>
    <div class="container">
    <div class="main">
    <div class="left-nav">
    <a href="guest_dashboard_home.php" id="home">Home</a>
    <a href="guest_dashboard_vehicle.php" id="vehicles">vehicles</a>
    <a href="dashboard_contact_us.php" id="contact">Contact Us</a>
    <a href="dashboard_about_us.php" id="about">About Us</a>
    </div>
    <div class="right-nav">
    <a href="../sign_in/user_login.php" id="login">Login</a>
    <a href="../sign_in/user_sign_up.php" id="signup">Sign-up</a>
    </div>
    </div>
    </div>
</body>
</html>