<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:../sign_in/login.php");  
} else {  
?>  
<!doctype html>  
<html>  
<head>  
<title>user_drivers</title> 
<link rel="stylesheet" href="user_dashboard.css">  
<style>
    #drivers {
        border-bottom: 3px solid black;
        color: black;
}

img{
        display: inline-flex;
        margin:20px 200px 20px 230px;
        height: 100px;
        width: 80px;
    }

    img:hover { 
        transform: scale(1.5); 
        transition: 0.5s all ease-in-out;
    } 

    .add-del-btn {
  margin-left: 43%;
  font-family: "Raleway", sans-serif;
}

    #add,#del {
  font-size: 16px;
  background: linear-gradient(black 5%, #8a8a8a 100%);
  border: 1px solid;
  color: white;
  cursor: pointer;
  width: 100%;
  border-radius: 5px;
  padding: 10px;
  outline: none;
}
#add:hover,#del:hover {
  background: linear-gradient(#8a8a8a 5%, black 100%);
}
#add{
    margin-left: 8px;
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
    <a href="user_dashboard_booking.php" id="booking">Bookings</a>
    <a href="user_dashboard_transactions.php" id="transactions">Transactions</a>
    </div>
    <div class="right-nav">
    <a href="../sign_in/logout.php" id="logout">Logout</a>
    </div>
    </div>
    </div>
    <br><br><br><br><br>

    <?php
    $connection= mysqli_connect("localhost","root","","test");
    $sql= "SELECT * FROM `driver`";
    $res=mysqli_query($connection,$sql);
    if(mysqli_num_rows($res)>0){ ?>
        <table>
                    <?php while($row=mysqli_fetch_assoc($res)) {  ?>
                        <tr><td>
                    <img src="<?php echo $row["image"]; ?>" alt=""></td>
                <td><?php echo "ID: " ; echo $row["driver_id"]; echo "<br>DRIVER NAME: ";echo $row["driver_name"]; echo "<br>LICENSE NO: ";echo $row["license_no"]; echo "<br>CONTACT: ";echo $row["contact"]; echo "<br>ADDRESS: "; echo $row["address"]; echo "<br> STATUS: ";
                if($row["status"]==1){
                    echo "Available";
                }
                else
                echo "Unavailable";
                ?> </td></tr>
                <?php } } ?>
        </table>


</body>  
</html>  
<?php } ?>