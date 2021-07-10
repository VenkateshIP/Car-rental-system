<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:../sign_in/login.php");  
}
else{
?>  
<!doctype html>  
<html>  
<head>  
<title>Booking</title> 
<link rel="stylesheet" href="user_dashboard.css">  
<!-- <link rel="stylesheet" href="../jquery.datetimepicker.min.css"> -->
<!--<link href= 
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' 
          rel='stylesheet'>
<script src="../jquery.js"></script>
<script src="../jquery.datetimepicker.full.js"></script>-->
<style>

#booking {
    border-bottom: 3px solid black;
    color: black;
}

.form-container{
    padding:60px;
    font-size: 20px;
    margin: 0px 0px 30px 480px;
}

.input{
    width:200px;
    height:15px;
    padding:10px;
}

input[type="text"]{
    margin:0px 0px 0px 20px;
}

input[type="submit"] {
  font-size: 16px;
  background: linear-gradient(black 5%, #8a8a8a 100%);
  border: 1px solid;
  color: white;
  cursor: pointer;
  width: 40%;
  border-radius: 5px;
  padding: 10px;
  outline: none;
}

.submit:hover {
  background: linear-gradient(#8a8a8a 5%, black 100%);
}

.ui-datepicker { 
            width: 12em;  
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
    <a href="user_dashboard_transtions.php" id="transactions">Transactions</a>
    </div>
    <div class="right-nav">
    <a href="../sign_in/logout.php" id="logout">Logout</a>
    </div>
    </div>
    </div>
    
<?php /*echo $_SESSION["sess_user"]*/ ?>

    <div class="form-container">
 <form method="post" class="form" action="">

<div class="component">
<lable id="name">Name</lable>
<input type="text" name="name" id="name-input" class="input" placeholder=
"Name" required><br><br>
</div>

<div class="component">
<lable id="Mobile No.">Mobile No.</lable>
<input type="text" name="mobile" id="mobile-input" class="input" pattern="[0-9]{10}" title="Invalid Phone Number" placeholder="Mobile_number" required><br><br>
</div>

<div class="input-group">
                      <span class="input-group-addon"><b>Vehicle Type</b></span> &nbsp;
                      <label><input type="radio" name="type" value="car">Sedan</label> &nbsp;
                      <label><input type="radio" name="type" value="bus">Suv</label>
                    </div>
                    <br>

<div class="component">
<lable id="req_date">required date</lable>
<input type="date" name="req_date" id="my_date_picker1" class="input" placeholder="Required Date and Time" autocomplete="off" required> 
<!-- <script>
$("#req_datetime").datetimepicker({
    minDate: 0
});
</script>-->
<br><br>
</div>

<div class="component">
<lable id="req_time">required time</lable>
<input type="time" id="req_time" name="req_time">
</div><br>

<div class="component">
<lable id="ret_date">return date</lable>
<input type="date" name="ret_date" id="my_date_picker2" class="input" placeholder="Return Date and Time" autocomplete="off" required>
<br><br>
<div class="component">
<lable id="ret_time">return time</lable>
<input type="time" id="ret_time" name="ret_time">
</div>

<!-- <script>
$("#ret_datetime").datetimepicker({
    minDate: 0
});
</script> -->
<!--<script src= 
"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> 
        </script> 
        <script src= 
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> 
        </script> 
        <script> 
            $(document).ready(function() { 
  
                $(function() { 
                    $("#my_date_picker1").datepicker({}); 
                }); 
  
                $(function() { 
                    $("#my_date_picker2").datepicker({}); 
                }); 
  
                $('#my_date_picker1').change(function() { 
                    startDate = $(this).datepicker('getDate'); 
                    $("#my_date_picker2").datepicker("option", "minDate", startDate); 
                }) 
  
                $('#my_date_picker2').change(function() { 
                    endDate = $(this).datepicker('getDate'); 
                    $("#my_date_picker1").datepicker("option", "maxDate", endDate); 
                }) 
            }) 
        </script> -->


 <br>
</div>

<div class="component">
<lable id="pickup">Pickup</lable>
<input type="text" name="pickup" id="pickup" class="input" placeholder="Pickup Address" required><br><br>
</div>

<div class="component">
<lable id="destination">Destination</lable>
<input type="text" name="destination" id="destination" class="input" placeholder="Destination Address" required><br><br>
</div>

<!--<div class="component">
<lable id="veh_id">Vehicle Id</lable>
<input type="text" name="veh_id" id="veh_id" class="input" placeholder="Vehicle ID to be booked" required><br><br>
</div>-->

<div class="component">
 <input type="submit" name="submit" class="submit" id="submit" value="Book"><br><br>
</div>

 </form>

<?php 

$con=mysqli_connect('localhost','root','','test');


if(isset($_POST["submit"])){ 
    
    $client_name=$_POST['name'] ;
    $mobile=$_POST['mobile'];
    $pickup=$_POST['pickup'];
    $dest=$_POST['destination'];
    $type=$_POST['type'];
    //$car=$_POST['veh_id'];
    //$req=$_POST['req_date'];
    $req=date('Y-m-d', strtotime($_POST['req_date']));
    $req_t=date("h:i", strtotime($_POST['req_time']));
    //$ret=$_POST['ret_date'];
    $ret=date('Y-m-d', strtotime($_POST['ret_date']));
    $ret_t=date("h:i", strtotime($_POST['ret_time']));
    
    /*$req_splitTimeStamp = explode(" ",$req);
    $req_date = $req_splitTimeStamp[0];
    $req_time = $req_splitTimeStamp[1];
    $ret_splitTimeStamp = explode(" ",$ret);
    $ret_date = $ret_splitTimeStamp[0];
    $ret_time = $ret_splitTimeStamp[1];*/

    $con=mysqli_connect('localhost','root','','test');
    $query1=mysqli_query($con,"select username, user_id, email from user where 
    username='".$_SESSION["sess_user"]."';");
    $row = mysqli_fetch_array($query1);
    $name = $row['username'];
    $user_id = $row['user_id'];
    $email = $row['email'];

    /*$con=mysqli_connect('localhost','root','','test');
    $query2=mysqli_query($con,"select status from vehicle where 
    vehicle_id=".$car.";");
    $row2 = mysqli_fetch_assoc($query2);
    $car_status= (int) $row2['status'];*/

    /*$con=mysqli_connect('localhost','root','','test');
    $query3=mysqli_query($con,"select driver_id from driver where 
    status=1;");
    $row3 = mysqli_fetch_assoc($query3);
    $dri_id = (int) $row3['driver_id'];*/

    if (true){  
    $result=mysqli_query($con, "Insert into booking (BOOKING_ID,name, username, email, mobile,DRIVER_ID,VEHICLE_REG, req_date,REQ_TIME, ret_date,RET_TIME,pickup, destination,CONFIRMATION,type) values ('','$client_name',
        '$name','$email','$mobile','0','0','$req','$req_t','$ret','$ret_t','$pickup','$dest','','$type');");

        if($result){  
    echo '<script>alert("Booking request Successfully!")</script>'; 
    } else {  
    echo '<script>alert("Failed")</script>';      
    }    
}
else{
    echo '<script>alert("car unavailable!")</script>';
} 
}
else {  
    echo '<script>alert("All Fields are required!")</script>';  
} 
 

?>


</div>
</body>  
</html> 
<?php } ?> 