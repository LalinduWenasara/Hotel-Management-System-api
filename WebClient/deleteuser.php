<?php
    //echo $_GET['userid'];
    $id=$_GET['userid'];
    //echo $id;

    $url = "https://localhost:44311/api/User/$id"
    
  //  $url = $this->__url.$path;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $result;
/*
  
    $ch = curl_init($url );
    
    
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_HEADER, false);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  






    $headers = [];
    $headers[] = 'Content-Type:application/json';
    $token = "your_token";
    $headers[] = "Authorization: Bearer ".$token;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  
    $result = curl_exec($ch);
    $result = json_decode($result);
  
    curl_close($ch);
  
    echo($result);








   /* $url = "https://localhost:44311/api/User/$id";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if($result="Deleted Successfully"){
        header("Location: http://localhost/Distributed-Chat-Application-1/WebClient/viewusers.php");
    }
    else{
        
    }
*/
?>