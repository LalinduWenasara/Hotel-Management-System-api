<?php
session_start();
?>
<?php include 'commonvariables.php'; ?>
<?php
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  
$emailid=$_SESSION["loggedadmin"]; 
$response = file_get_contents("$ipAndPort/api/MessageForRoom", false, stream_context_create($arrContextOptions));

$data = json_decode($response,true);

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat rooms</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/chats.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">View Room Chats</h2>


                        <?php
for ($x = 0; $x <= 10; $x++) {
  

   
 
  $RoomId = $data[$x]["RoomID"];

  error_reporting(E_ALL & ~E_NOTICE);
  //echo $RoomId;
  if (!empty($RoomId)) {
 ?>
<h1>
<a href="http://localhost/Distributed-Chat-Application-1/WebClient/chats.php?RoomId=<?=$RoomId?>">  <?php echo $RoomId; ?></a>
  </h1>
  </br>


<?php

}








}
?>

       


                            

                         


                                          



                    </div>
                    
                </div>
            </div>
        </section>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/sign.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>