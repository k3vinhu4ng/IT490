#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");//connect to MQ exchange
$request = array();
$requesst['type'] = "login";
$request['message']= "HI";
echo"A";//test echo
echo "B"; //test echo
//conenct and pull data from API
//
//
$search = "cats";
$curl = curl_init();
curl_setopt_array($curl, array(
        CURLOPT_URL =>"https://www.googleapis.com/books/v1/volumes?q=$search&key=AIzaSyDMX3vJz8MvfUAw0gomHHREUyuglJZc37Y",
        $data = curl_exec($curl),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(

                "key=AIzaSyDMX3vJz8MvfUAw0gomHHREUyuglJZc37Y"
        ),
));

$respons= curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);


if ($err) {
        echo "cURL Error #:" . $err;
} else {
echo "---------------------------";
$database=print_r(json_decode($respons),true);
//store and reformat API JSON into PHP OBJECT
echo"-------------";
//echo $database;//test to double php format
$database=$client->publish($database);//upload to queue

//MQshovel queues te
//PUT /api/parameters/shovel/%2f/my-shovel
//{"value":{"src-protocol": "amqp091", "src-uri":  "amqp://",
//        "src-queue":  "my-queue",
//      "dest-protocol": "amqp091", "dest-uri": "amqp://remote-server",
//    "dest-queue": "another-queue"}}
}?>
