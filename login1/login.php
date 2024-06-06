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
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        
        if (isset($_POST["login"])) {
           $email = $_POST["username"];
           $Password = $_POST["password"];
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

            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (($Password==$user["password"])&&($email ==$user["email"])) {
                   if($email == 'bts_nitc@nitc.ac.in'){//enter username and password for driver
                     session_start();
                       $_SESSION["admin"] = "yes";
                       header("Location: customer.php");//drivers header location
                       die();
                   }else{  
                     session_start();
                       $_SESSION["user"] = "yes";
                       header("Location: index.php");//users header location
                       die();
                     }
                }else{
                    echo "<div class='alert alert-danger' >Invalid login credentials</div><br>";
                }
            }else{
                echo "<div class='alert alert-danger'>Invalid login credentials</div><br>";
            }
        }
        ?>
        <h2 >BUS TRACKING SERVICE NITC</h2>
      <form action="login.php" method="post">
      <input type="email" name="username" placeholder="Enter Email id" class="inp" required autofocus /><br />
          <input type="password" name="password" placeholder="Password" class="inp" required /><br />
          <a href="forgot_password.php" id="forgot" >Forgot Password?</a><br />
          <input type="submit" name="login" value="SIGN IN" class="sub-btn"  />
          
      </form>
     <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
    </div>
</body>
</html>