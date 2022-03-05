#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('login.php.inc');

function doLogin($username,$password)
{
    // lookup username in databas
    // check password
    $login = new loginDB();
    return $login->validateLogin($username,$password);
    //return false if not valid
}


function createLogin($username,$password)
{
    // lookup username in databas
    // check password
    $login = new loginDB();
    return $login->CreateUser($username,$password);
    //return false if not valid
}


function checkSearch($search)
{
    // lookup search query in database
    // 
    $login = new loginDB();
    return $login->SearchQUery($search);
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
    case "login":
      return doLogin($request['username'],$request['password']);
    case "validate_session":
	return doValidate($request['sessionId']);
    case "new":
	 return createLogin($request['username'],$request['password']);
    case "search":
	return checkSearch($request['search']);
	//echo "received search request term";


  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>

