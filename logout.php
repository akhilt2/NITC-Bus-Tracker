<?php
$servername = "localhost";
        $username = "u927048695_bts";
        $password = "NITC@B20s";
        $dbname = "u927048695_bts";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Something went wrong;");
        }
$email=$_SESSION['Email'];
$vsql="INSERT into login_details(email,status,role) values('$email','Logout Successfull','Passenger');";
 $res=mysqli_query($conn,$vsql);
session_start();
session_destroy();
header("Location: success_exit.php");
?>