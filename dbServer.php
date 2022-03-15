#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('login2.php.inc');

function doLogin($username,$password)
{
    // lookup username in databas
    // check password
    $login = new loginDB();
    return $login->validateLogin($username,$password);
    return $login->storeHash($username);
    //return false if not valid
}

function doValidate($sessionId) {

	$login = new loginDB();
	return $login->doValidate($sessionId);

}

function createLogin($username,$password)
{
	$login = new loginDB();
	return $login->createLogin($username,$password);
}

function logOutUser($username)
{
	$login = new loginDB();
	return $login->logOutUser($username);
}

function setGoals($goals, $username){
	$login = new loginDB();
	return $login->setGoals($goals, $username);
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
    	break;
    case "new":
	    return createLogin($request['username'],$request['password']);
	    break;
    case "goals":
	    return setGoals($request['goals'], $request['username']);
	    break;
    case "logout":
	    return logOutUser($request['username']);
	    break;
    case "validate_session":
      return doValidate($request['sessionId']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>

