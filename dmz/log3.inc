#!/usr/bin/php
<?php


require_once('path.inc');
    require_once('get_host_info.inc');
    require_once('rabbitMQLib.inc');

error_reporting(E_ALL);

   ini_set('display_errors', 'Off');
   ini_set('log_errors', 1);

    
ini_set('error_log', 'log.txt');
function logClient($error){

    //make a function that takes a log message as the parameter
    //create the client to the logging RMQ server
    //PUBLISH the log message
    //grab some coffee and relax
        $client = new rabbitMQClient("log.ini", "testServer");
       echo 'test';

        $response = $client->publish($error);
        return $response;

}

logClient('error');
?>

