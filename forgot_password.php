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
        
        <input type="email" id="email" name="email" required placeholder="Enter your Email ID" class="inp"><br>
        <button type="submit" name="send" class="sub-btn">send password</button><br>
    </form>
    <?php
        // Function to generate a random password
        function generateRandomPassword($length = 8) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password = '';
            for ($i = 0; $i < $length; $i++) {
                $password .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $password;
        }
       
        
        if (isset($_POST["send"])) {
            $email = $_POST["email"];
            $errors = array();
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
               }
          
            if (count($errors)>0) {
                foreach ($errors as  $error) {
                    echo "<div class='alert alert-danger' >$error</div>";
                }
               }else{
            include('smtp/PHPMailerAutoload.php'); 
             function smtp_mailer($to,$subject, $msg){
    	$mail = new PHPMailer(); 
    	//$mail->SMTPDebug  = 3;
    	$mail->IsSMTP(); 
    	$mail->SMTPAuth = true; 
    	$mail->SMTPSecure = 'tls'; 
    	$mail->Host = "smtp.gmail.com";
    	$mail->Port = 587; 
    	$mail->IsHTML(true);
    	$mail->CharSet = 'UTF-8';
    	$mail->Username = "sbustrackingsystem@gmail.com";
    	$mail->Password = "oztzgkpukejtejxn";
    	$mail->SetFrom("sbustrackingsystem@gmail.com");
    	$mail->Subject = $subject;
    	$mail->Body =$msg;
    	$mail->AddAddress($to);
    	$mail->SMTPOptions=array('ssl'=>array(
    		'verify_peer'=>false,
    		'verify_peer_name'=>false,
    		'allow_self_signed'=>false
    	));
    	if(!$mail->Send()){
    		echo $mail->ErrorInfo;
    	}else{
    		return 'Sent';
    	}
    }
            $randomPassword = generateRandomPassword();
            
            $to = $email ;
            $subject = "please confirm your email ";
            $msg = '<html>
    <body>
        <p>Dear User,</p>
        <p>This is a mail from BTS NITC.The login credentials for your username.</p><br>
        
        <p>Username: ' . $email . '.</p><br>
        <p>Temporary Password: ' . $randomPassword . '.</p><br>
        
        <p>Kindly note that this temporary password is valid for your initial login only. For enhanced security measures, we will send a new password to your registered email address for subsequent logins.</p><br>
        
        <p>Should you encounter any difficulties or have any questions regarding accessing your account, please do not hesitate to reach out to us at svms1416@gmail.com. Our dedicated support team will be more than happy to assist you promptly.</p><br>
        
        <p>We are committed to delivering a seamless online experience, and we look forward to serving you.</p><br>
        
        <p>Best regards,</p><br>
        
        <p>BTS SUPPORT<br>nitcbusservice.online</p><br>
    </body>
    </html>';


           
            $headers = "From: ".$email;

            smtp_mailer($to,$subject, $msg);
            
           

           
            
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

            $ksql = "UPDATE users SET passkey = '$randomPassword' WHERE email = '$email'";
                $result = $conn->query($ksql);
                header("Location: enter_password.php");
            }
        }
        
        ?>
        </div>
    
    

</body>
</html>