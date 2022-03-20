#!/usr/bin/php


<?php


require_once('path.inc');
    require_once('get_host_info.inc');
    require_once('rabbitMQLib.inc');
require_once('login3.php.inc');

function addReview($username,$subject,$message) {
        $login=new loginDB();
        return $login->add_review($username,$subject,$message);
}
function getforum() {
	$login=new loginDB();
	return $login->get_forum();

}
function requestProcessor($request)
{
	echo "received request".PHP_EOL;
var_dump($request);
switch ($request['type'])
{
case "addReview":
	 return addReview($request['username'],$request['subject'],$request['message']);
	 break;
case "getforum":
         return getforum();
	break;
 }
        echo "received request".PHP_EOL;

       // return add_review($request);

//}
return array("returnCode" => '0', 'message'=>"Server received request and processed");
}
$server = new rabbitMQServer("sampleClient.ini","testServer");

echo "Server BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "MQServer END".PHP_EOL;
exit();




?>
