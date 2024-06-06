<!-- HTML form for the forgot password functionality -->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Forgot Password</title>
</head>
<body>
<div class="container"><h1 >Forgot Password</h1>
    <form method="POST" action="" id="forgot-form">
        <input type="text" id="roll" name="roll_no" required placeholder="Enter your Roll no in capitals" class="inp"><br>
        <input type="password" id="passkey" name="passkey" required placeholder="Enter password sent to your mail" class="inp"><br>
        
        <input type="password" id="new_password" name="new_password"placeholder=" Enter New Password" class="inp"required>
        <br>
        
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="inp"required>
        <br>
        <button type="submit" name="submit" class="sub-btn">Update Password</button>
    </form>
    <?php
    if (isset($_POST["submit"])) {
           $fullName = $_POST["roll_no"];
           $passkey=$_POST["passkey"];
           $password = $_POST["new_password"];
           $passwordRepeat = $_POST["confirm_password"];


           $errors = array();
           
           if ( empty($fullName) OR empty($password) OR empty($passkey)OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }

           if (!preg_match('/^[A-Z]+$/', $fullName)) {
               $error = "Please enter only capital letters (excluding numbers).";
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
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

           $sql = "SELECT * FROM users WHERE roll_number = '$fullName'";
           
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
                if (isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
                    $newPassword = $_POST['new_password'];
                    $confirmPassword = $_POST['confirm_password'];
                    $fullName = $_POST["roll_no"];
                    $passkey=$_POST["passkey"];
                    $row = $result->fetch_assoc();
                    if ($row["passkey"] === $passkey){

                    
                        // Check if the new password matches the confirmed password
                            if ($newPassword === $confirmPassword) {
                                // Store the new password in the database
                                $connection = new mysqli('localhost', 'root', '', 'vms');
                                if ($connection->connect_error) {
                                    die("Connection failed: " . $connection->connect_error);
                                }
                        
                                // Update the password field with the new password
                                $sql = "UPDATE users SET password = '$newPassword' WHERE roll_number = '$fullName'";
                                $result = $connection->query($sql);
                        
                                if ($result) {
                                    echo "Password updated successfully!";
                                } else {
                                    echo "Error updating password: " . $connection->error;
                                }
                        
                                $connection->close();
                            } else {
                                echo "Passwords do not match. Please try again.";
                            }
                    }else{
                        echo "Invalid passkey. Please try again.";
                    }
                }
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger' >$error</div>";
            }
           }
       

        }
        ?>
        </div>
    