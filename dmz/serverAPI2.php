#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('book.php.inc');
require_once('API.php.inc');


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
	//echo "search received";
	$term = $request['search'];
	$response = get_search($term);
	return $response;
	
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("api.ini","apiServer");

$server->process_requests("requestProcessor"); //intially single quotes
unset($server);
exit();
?>

