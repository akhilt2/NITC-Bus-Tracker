<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        function isValidOrganizationalEmail($email) {
         // Split the email address into username and domain parts
         list($username, $domain) = explode('@', $email);
     
         // Check if the domain matches the organizational domain
         $organizationalDomain = 'nitc.ac.in'; 
         return $domain === $organizationalDomain;
     }

     if (isset($_POST["submit"])) {
        $fullName = $_POST["roll_no"];
        $email = $_POST["uname"];
        $Password = $_POST["pass"];
        $passwordRepeat = $_POST["repass"];
        
       

        $errors = array();
        
        if (empty($fullName) OR empty($email) OR empty($Password) OR empty($passwordRepeat)) {
         array_push($errors,"*All fields are required");
        }
        if (!preg_match('/^[A-Z]+$/', $fullName)) {
            $error = "Please enter only capital letters (excluding numbers).";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         array_push($errors, "*Email is not valid");
        }
       
        if (strlen($Password)<8) {
         array_push($errors,"*Password must be at least 8 charactes long");
        }
        if ($Password!==$passwordRepeat) {
         array_push($errors,"*Password does not match");
        }
        
        $servername = "localhost";
    $username = "u927048695_bts";
    $password = "NITC@B20s";
    $dbname = "u927048695_bts";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

        $sql = "SELECT * FROM users WHERE email = '$email' OR roll_number ='$fullName'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount>0) {
         array_push($errors,"*Email or Roll no already exists!");
        }
        if (count($errors)>0) {
         foreach ($errors as  $error) {
             echo "<div class='alert alert-danger'>$error</div><br>";
         }

        }else{
         
         $psql = "INSERT INTO users (roll_number, email, password) VALUES ('$fullName','$email','$Password' );";
         $query=mysqli_query($conn,$psql);
       
         echo "<div class='alert alert-success'>You are registered successfully.</div>";
        }
       

     }
        ?>
        <h2 >REGISTER</h2>
        <form action="registration.php" method="post">
            <input type="email" name="uname" placeholder="Enter mail id" class="inp" required autofocus /><br />
            <input type="text" name="roll_no" placeholder="Enter Roll number" class="inp" required /><br />
            <input type="password" name="pass" placeholder="Enter Password" class="inp" required /><br />
            <input type="password" name="repass" placeholder="Confirm Password" class="inp" required /><br />
            <input type="submit" name="submit" value="SIGN UP" class="sub-btn" />
        </form>
        <div>
        <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
      </div>
    </div>
</body>
</html>