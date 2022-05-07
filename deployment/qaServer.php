#!/usr/bin/php
<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('functions.php.inc');

function qaPush($package, $version){
	//exec(./'extract.sh);
	//^^^^so here, call the script to extract the package
	//i do not know what to put here... not sure 
	//that it's even necessary
	//help...
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
	  #idk if this case would be here
	  #just a copy of deployment server for now
  case "zip":
      return qaPush($request['package'],$request['version']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("qa.ini","testServer");

echo "QA Server BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "QA Server END".PHP_EOL;
exit();
?>
