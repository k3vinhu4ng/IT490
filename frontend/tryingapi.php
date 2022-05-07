#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$request = $_POST;
//$request['type'] = "login";
//$request['message']= "HI";
echo"A";//test echo
echo "B"; //test echo

switch ($request["type"]) {
        case "search";
        $client = new rabbitMQClient("testRabbitMQ.ini","testServer");//connect to MQ exchange

        $response = $client->send_request($request);
//i
//
}

//if(isset($_POST['search'])){
//      $search = $_POST['search'];
        //function bookSearch($search){
$search="fish";
$page=file_get_contents("https://www.googleapis.com/books/v1/volumes?q=$search&key=AIzaSyDMX3vJz8MvfUAw0gomHHREUyuglJZc37Y");
                $data = json_decode($page, true);
                //$img = $data['items'][$a]['volumeInfo']['imageLinks']['thumbnail'];
                //print '<img src="'.$img.'" alt="ScanLine"/>';
                //echo "hello";
                return "Title = " . $data['items'][0]['volumeInfo']['title'];
                //return "Authors = " . @implode(",", $data['items'][0]['volumeInfo']['authors']);
                //return "Pagecount = " . $data['items'][0]['volumeInfo']['pageCount'];
//}
//}
echo json_encode($response);
exit(0);


//store and reformat API JSON into PHP OBJECT


$database=$client->publish($data);//upload to queue


?>

~     
