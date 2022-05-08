<?php
session_start();
?>



<?php
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  
 $emailid=$_SESSION["loggedadmin"]; 
$response = file_get_contents("https://localhost:44311/api/Admin/$emailid", false, stream_context_create($arrContextOptions));

$data = json_decode($response,true);
//print_r($data);

//print_r($data["0"]["FirstName"]);
//echo $data["0"]["FirstName"];
?>
<?php
    $fname = $data["0"]["FirstName"];
    $lname = $data["0"]["LastName"];
    
    $email = $data["0"]["Email"];
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
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Main css -->
    <link rel="stylesheet" href="css/signin.css">
    <link href="css/style2.css" rel="stylesheet">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Profile</h2>
                        
                        

                         
 


          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="images/avfe.svg" alt="">
              <h4><?php
echo $fname;
?>   <?php
echo $lname;
?> </h4>
        

<h5><?php
echo $email;
?> </h5>
              <p>
                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
   
      </div>
   















                 








                </div>
            </div>
        </section>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/sign.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>