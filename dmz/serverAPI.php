#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('login.php.inc');

function search($search)
{
    $content = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=$search&key=AIzaSyDMX3vJz8MvfUAw0gomHHREUyuglJZc37Y");
    return $content;
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
    case "search":
	echo "search received";
	$safe = urlencode($request['search']);
	$data = search($safe);
	$jdata = json_decode($data, true);
	
//	$response = '';
//	$index = 0;
//	foreach($jdata as $books)
//	{
//		$response .= $books +'<br><br><br><br>';
		//$index +=1;
//	}
//	return $response;
	
	//return $jdata['items'][0]['volumeInfo']['title'];
	return $jdata;

  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>

