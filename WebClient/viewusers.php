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
$response = file_get_contents("https://localhost:44311/api/User", false, stream_context_create($arrContextOptions));

$data = json_decode($response,true);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">View Users</h2>


                        <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">










                                                <thead>
                                                    <tr>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>UserEmail</th>
                                                        <th>NIC</th>
                                                        <th>MobileNo</th>
                                                        <th></th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                        <?php
for ($x = 0; $x <= 10; $x++) {
  

   
 
  $UserId = $data[$x]["UserId"];
  $UserFirstName = $data[$x]["UserFirstName"];
  $UserLastName = $data[$x]["UserLastName"];
  $UserEmail = $data[$x]["UserEmail"];
  $UserNIC = $data[$x]["UserNIC"];
  $UserMobile = $data[$x]["UserMobile"];
 

  error_reporting(E_ALL & ~E_NOTICE);
  //echo $RoomId;
  if (!empty($UserId)) {
 ?>


<tr>
                                                            <td>  <?php echo $UserFirstName; ?></td>
                                                            <th><?php echo $UserLastName; ?></th>
                                                            <td><?php echo $UserEmail; ?></td>
                                                            <td><?php echo $UserNIC; ?></td>
                                                            <td><?php echo $UserMobile; ?></td>
                                                        </tr>


<?php

}








}
?>






                                                    
                                                 

                                                </tbody>
                                            </table>
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