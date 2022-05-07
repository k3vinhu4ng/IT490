#!/usr/bin/php
<?php


error_reporting(E_ALL);

    ini_set('display_errors', 'Off');
    ini_set('log_errors', 'On');
    ini_set('error_log', 'log.log');



require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

//require_once('testRabbitMQClient.php');



//require_once('log.php');
function doLogin($username,$password)
{
    // lookup username in databas
    // check password
    return true;
    //return false if not valid
}



function requestProcessor($request)
{
        echo "received request".PHP_EOL;
        var_dump($request);
        if(!isset($request['type']))
        {
        return "ERROR: unsupported message type";
        }
        switch ($request['type'])
        {
        //case "login":
        //      return doLogin($request['username'],$request['password']);
//      case "validate_session":
//              return doValidate($request['sessionId']); 
        case "search":
                echo "Case Search";
                $search=$request['search'];

                //return 0;

                $page=file_get_contents("https://www.googleapis.com/books/v1/volumes?q=$search&key=AIzaSyDMX3vJz8MvfUAw0gomHHREUyuglJZc37Y");
                $data = json_decode($page, true);

                $newArray =[];
                foreach($data['items'] as $item){
//                      foreach($item["volumeInfo"] as $key =>$value){
                        //$newArray[''] = $value;
//                      return $value;
//                      }
//                      }

//              return $key;
        array_push($newArray, $item['volumeInfo']['title']);
        array_push($newArray, $item['volumeInfo']['authors']);
                //$newArray[$item] = $item['volumeInfo']['title'];

        }

        return $newArray;

        }       }
        //return array("returnCode" => '0', 'message'=>"Server received request and processed");


$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>
~                
