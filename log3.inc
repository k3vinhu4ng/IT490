#!/usr/bin/php
<?php


require_once('path.inc');
    require_once('get_host_info.inc');
    require_once('rabbitMQLib.inc');


    $file = fopen("log.txt","r");
//      $error = fgets($file);
       $errorArray = [];
        while(! feof($file)){
            array_push($errorArray, fgets($file));
        }

        fclose($file);
        //      for($x=0; $x<count($errorArray); $x++)
        //      
//        echo $errorArray[0];

        $fp = fopen("logHistory.txt", "a");
        for($x = 0; $x < count($errorArray); $x++){
            fwrite($fp, $errorArray[$x]);

        file_put_contents("log.txt", "");
}

$request = array();
$request['type'] = "idk";
for($x = 0; $x < count($errorArray); $x++){
        $request['error_string'] = $errorArray[$x];
}

       // $request['error_string'] = $errorArray[0];

//function logClient($request){  
        $client = new rabbitMQClient("log.ini", "testServer");
       echo 'test';

        $response = $client->publish($request);
        return $response;

//}
?>

