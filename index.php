<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notify_IP_Address</title>  
</head>
<body>
    <?php
    
        function getUserIpAddr(){
            if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                //ip from share internet
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                //ip pass from proxy
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }       

        $clientIpaddress = getUserIpAddr();
        $file = file_get_contents('ip0306.txt'); 
        $lines = explode("\n", $file);
        $flag = 0;  
        foreach($lines as $line) {
            if(strpos($clientIpaddress, $line) !== false){
                $flag = 1;   
                header("Location: http://www.example.com/another-page.php");
                break;                
            }             
        }           
        if($flag == 0) {      
            header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
        }
    ?>
</body>
</html>

