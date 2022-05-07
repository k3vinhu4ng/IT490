#!/usr/bin/php
<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('functions.php.inc');

function packages($package, $version, $status){
	$test = new testdb();
	return $test->packages($package, $version, $status);
}

function rollback($package, $version, $status){
        $test = new testdb();
        return $test->packages($package, $version, $status);
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
      return packages($request['package'],$request['version'], $request['status']);
  }
  case "rollback":
      return rollback($request['package'],$request['version'], $request['status']);
  }

  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("deployment.ini","testServer");

echo "Deployment Server BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "Deployment Server END".PHP_EOL;
exit();
?>
