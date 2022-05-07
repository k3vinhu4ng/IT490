#!/usr/bin/php
<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('functions.php.inc');

function packages($package, $version, $lay, $vm){
	$test = new testdb();
	return $test->packages($package, $version, $lay, $vm);
}

function rollback($badpkg, $badver, $vm){
	$test = new testdb();
	return $test->rollback($badpkg, $badver, $vm);
}

function change($package, $version, $vm){
	$test = new testdb();
        return $test->change($package, $version, $vm);
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
  case "zip":
	  return packages($request['package'], $request['version'], $request['lay'], $request['vm']);
  case "rollback":
	return rollback($request['badpkg'], $request['badver'], $request['vm']);
  case "change":
	return change($request['package'], $request['version'], $request['vm']);  
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("deployment.ini","testServer");

echo "Deployment Server BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "Deployment Server END".PHP_EOL;
exit();
?>
