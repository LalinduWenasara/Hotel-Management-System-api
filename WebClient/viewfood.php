
<?php include 'commonvariables.php'; ?>
<?php
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

$response = file_get_contents("$ipAndPort/api/Food", false, stream_context_create($arrContextOptions));

$data = json_decode($response,true);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View rooms</title>
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
                        <h2 class="form-title">Food Menu</h2>
                       


                        <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Menu</h6>
                                        <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="addfood.php">Add Food</a></div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><img src="images/food.png" alt="users"></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Price</th>
                                                        <th>availability</th>
                                                        
                                                        <th> </th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                           
                                                   
                                                   <?php
                           for ($x = 0; $x <= 10; $x++) {
                             
                           
                              
                            
                             //$RoomId = $data[$x]["RoomId"];
                             $FoodId = $data[$x]["FoodId"];
                             $Price = $data[$x]["Price"];
                             $Availability = $data[$x]["Availability"];
                             $Title = $data[$x]["Title"];
                            
                           
                            error_reporting(E_ALL & ~E_NOTICE);
                             //echo $RoomId;
                             if (!empty($FoodId)) {
                            
                           if($Availability=="1"){
                           ?>
                           <tr >
                       
                                                                                       <td>  <?php echo $Title; ?></td>
                                                                                       <th><?php echo $Price; ?></th>
                                                                                       <td>available</td>


                                                                                       <td>      <a href="http://localhost/Distributed-Chat-Application-1/WebClient/chats.php?RoomId=<?=$FoodId?>"> delete</a></td>









                                                                                      
                                                                                   </tr>
                           
                           
                           <?php
                           }else{
?>
                            <tr style="background-color:#FEB2A2">
                       
                            <td>  <?php echo $Title; ?></td>
                            <th><?php echo $Price; ?></th>
                            <td>not available</td>

                         <td>   <a href="http://localhost/Distributed-Chat-Application-1/WebClient/chats.php?RoomId=<?=$FoodId?>">  <?php echo $FoodId; ?></a></td>










                           
                        </tr>

<?php

                           }
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