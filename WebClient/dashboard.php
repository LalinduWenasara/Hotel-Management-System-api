<?php
    $fname = "lalindu";
    $lname = "wenasara";
    $contact ="0000007777";
    $email="lalindu@gmail.com";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/signin.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Dashboard</h2>
                        <h1><?php
echo $fname;
?><h1>
    <h1><?php
echo $lname;
?><h1>
    <h1><?php
echo $contact;
?><h1>
    <h1><?php
echo $email;
?><h1>

                    </div>
                    <div class="signup-image">
                        <figure><img src="images/profile.svg" alt="sing up image"></figure>
                       
                    </div>
                </div>
            </div>
        </section>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/sign.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>