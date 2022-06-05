
<?php include 'commonvariables.php'; ?>




<?php
if (isset($_POST['msgsend']) ){

$Title= $_POST['Title'];
$Price = $_POST['Price'];
$Availability = true;



$url = "$ipAndPort/api/Food"; 
echo  $url; 
$con = array("Title"=>"$Title", "Price"=>$Price, "Availability"=>"$Availability");
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

if($response=="Added Successfully")
{

    header("Location: http://localhost/Distributed-Chat-Application-1/WebClient/viewfood.php");
}
else{
    

    echo '<script type="text/javascript">alert("not added");</script>'; 
}

}
















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
                        <h2 class="form-title">Add To Menu</h2>
                       


                        <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                     
                                        <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               
                                                
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
                                                        <th></th>
                                                        
                                                        <th></th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <form method="POST" class="register-form" id="login-form">
                                                        <tr>
                                                            <td><div class="form-group">
                                <input name="Title" id="Title"  required/>

                                
                            </div>
                        
                        
                        
                        
                        </br></br></br></br></br></br></td>
                                                            <th>
                                                            <input name="Price" id="Price"  required/>                    


</th>
                                                            <td>

                                                         

<input type="submit" name="msgsend" id="msgsend" class="form-submit" value="Add"/>
</form>




                                                            </td>
                                                         
                                                    
                                                        </tr>
                                                        

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