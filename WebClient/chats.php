

<?php
session_start();
?>
<?php include 'commonvariables.php'; ?>
<?php

echo "RoomId " . $_GET['RoomId'];
$roomid=$_GET['RoomId'];

$messagesenderemail=$_SESSION["loggedadmin"];
?>



<?php


if (isset($_POST['msgsend']) ){

$MessageBody= $_POST['MessageBody'];


$url = "$ipAndPort/api/Message";   
$con = array("RoomId"=>"$roomid", "MessageBody"=>"$MessageBody", "SenderEmail"=>"$messagesenderemail");
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
if($response=="Added Successfully")
{
  echo '<script>alert("message sent")</script>';  

}
else{
    
    echo '<script>alert("An Error occured")</script>';  
}

}

?>








<?php



$url = "$ipAndPort/api/MessageForRoom";   
$con = array("RoomID"=>"$roomid");
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
$data=$response;


?>







<?php echo $_SESSION["loggedadmin"]; ?>







<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="refresh" content = "30" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>chat</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/chats.css">
    <style>
      body {
  background-color: lightgrey;
  color: blue;
}
    </style>
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Chats- <?php

echo "RoomId " . $_GET['RoomId'];


?></h2>

<div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-8">
            <div class="card card-bordered">
              <div class="card-header">
                <h4 class="card-title"><strong>Chat</strong></h4>
                
              </div>
              <div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height:400px !important;">
<?php
for ($x = 0; $x <= 50; $x++) {
  

   
 
  $RoomId = $data[$x]["RoomID"];
  $DateTime = $data[$x]["DateTime"];
  $MessageBody = $data[$x]["MessageBody"];
  $SenderEmail = $data[$x]["SenderEmail"];


  error_reporting(E_ALL & ~E_NOTICE);
  //echo $RoomId;
  if (!empty($RoomId)) {




    if($_SESSION["loggedadmin"]==$SenderEmail){

?>


                 <div class="media media-chat media-chat-reverse">
                  <div class="media-body">
                    <p>
 
                 <?php echo $MessageBody; ?></p>
                 <p><?php echo $SenderEmail; ?></p>
                  <p class="meta"><time datetime="2018" style="color:blue;text-align:center;">  <?php echo $DateTime; ?></time></p>
                  </div>
                </div>

                

<?php
    }
    else{
?>



 

<div class="media media-chat">
                  <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                  <div class="media-body">
                  <p>  <?php echo $MessageBody; ?></p>
                  <p><?php echo $SenderEmail; ?></p>
                  <p class="meta"><time datetime="2018">  <?php echo $DateTime; ?></time></p>
                  </div>
                </div>




<?php


    }





 ?>






<?php

}






}
?>

                        
  
     

              <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div></div></div>

              <div class="publisher bt-1 border-light">
                <img class="avatar avatar-xs" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
          

                <form method="POST" class="register-form" id="login-form">

                <label for="MessageBody"><i class="zmdi zmdi-email"></i></label>
                <input  name="MessageBody" id="MessageBody" placeholder="" required/>
                <input type="submit" name="msgsend" id="msgsend" class="form-submit" value="Send"/>
     </form>

                <span class="publisher-btn file-group">
                  <i class="fa fa-paperclip file-browser"></i>
                  <input type="file">
                </span>
                <a class="publisher-btn" href="#" data-abc="true"><i class="fa fa-smile"></i></a>
                <a class="publisher-btn text-info" href="#" data-abc="true"><i class="fa fa-paper-plane"></i></a>
              </div>

             </div>
          </div>
          </div>
          </div>
          </div>
                                    </div>
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