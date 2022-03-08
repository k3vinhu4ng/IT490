#!/usr/bin/php
<?php

error_reporting(E_ALL);

   ini_set('display_errors', 'Off');
   ini_set('log_errors', 1);

    require_once('path.inc');
    require_once('get_host_info.inc');
    require_once('rabbitMQLib.inc');
//require_once('log3.inc');


ini_set('error_log', 'log.txt');

function logfunction($request){
        $file = fopen("log.txt","r");
//      $error = fgets($file);
       $errorArray = [];
        while(! feof($file)){
            array_push($errorArray, fgets($file));
        }

        fclose($file);
        //      for($x=0; $x<count($errorArray); $x++)
        //      
//      echo $errorArray[0];

        $fp = fopen("logHistory.txt", "a");
        for($x = 0; $x < count($errorArray); $x++){
            fwrite($fp, $errorArray[$x]);

        file_put_contents("log.txt", "");
//      echo "test123";
//return $request;      
        }

$request = array();
$request['type'] = "idk";
for($x = 0; $x < count($errorArray); $x++){
        $request['error_string'] = $errorArray[$x];
//      echo 'hello'; 
}
}
function requestProcessor($request)
{
        echo "received request".PHP_EOL;

         return logfunction($request);

//return array("returnCode" => '0', 'message'=>"Server received request and processed");
}
$server = new rabbitMQServer("log.ini","testServer");

echo "logServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "logMQServer END".PHP_EOL;
exit();

?>
