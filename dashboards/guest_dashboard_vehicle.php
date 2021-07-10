<?php
    $connection= mysqli_connect("localhost","root","","test");
    $sql= "SELECT * FROM `vehicle`";
    $res=mysqli_query($connection,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>guest_dashboard_vehicle</title>
    <link rel="stylesheet" href="./dashboard.css">
    <style>
    h2{
        text-align: center;
    }
    img{
        display: inline-flex;
        margin:20px 200px 20px 230px;
        height: 300px;
        width: 450px;
    }

    img:hover { 
        transform: scale(1.5); 
        transition: 0.5s all ease-in-out;
    } 

    #vehicles {
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

    <br><h2>Our Cars</h2><br>
      <?php
        if(mysqli_num_rows($res)>0){ ?>
        <table>
                    <?php while($row=mysqli_fetch_assoc($res)) {  ?>
                        <tr><td>
                    <img src="<?php echo $row["image"]; ?>" alt=""></td>
                <td><?php echo "BRAND: ";echo $row["brand"]; echo "<br>TYPE: "; echo $row["type"]; echo "<br>DESCRIPTION: "; echo $row["description"]; ?> </td></tr>
                <?php } }?>
        </table>
</body>
</html>