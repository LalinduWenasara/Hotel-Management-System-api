<?php
session_start();
?>

<?php include 'commonvariables.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/signin.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">




<script>

function testfunc(){

Swal.fire({
title: 'Error!',
text: 'login error',
icon: 'error',
confirmButtonText: 'Cool'
}) 

}



</script>








<?php


if (isset($_POST['signin']) ){

$email= $_POST['email'];
$pass = $_POST['pass'];
$newpass = md5($pass);



$url = "$ipAndPort/api/AdminLogin"; 
echo  $url; 
//$url = "https://localhost:44311/api/AdminLogin";   
$con = array("Email"=>"$email", "Password"=>"$newpass");
$content=json_encode($con);
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
$json_response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);


curl_close($curl);
$response = json_decode($json_response, true);
echo $response;
if($response=="loginsuccess")
{
    $_SESSION["loggedadmin"] = $email;
header("Location: http://localhost/Distributed-Chat-Application-1/WebClient/dashboard.php");

}
else{
    

  echo '<script type="text/javascript">testfunc();</script>'; 

}

}

?>




















</head>

<body>

<div class="main">
 <!-- Sing in  Form -->
 <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/logo.svg" alt="sing up image"></figure>
                        <a href="signup.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                            
</h1>

                        </form>
                        
                    </div>
                </div>
            </div>
        </section>

    </div>
        <!-- JS -->
        <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/sign.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>