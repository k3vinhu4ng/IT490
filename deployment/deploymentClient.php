#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

exec('./zipPackage.sh');

$type = readline("Do you want to zip or rollback a package?: ");		
$package = readline("Package name: ");


$testdb = new mysqli('127.0.0.1','testUser','12345','testdb');
if ($testdb->errno != 0){
        echo "Failed to connect to database: ".$testdb->error.PHP_EOL;
        exit(0);
}


$select = mysqli_query($testdb, "select * from packages where package = '$package'");

$inc = "1";
if ($type == 'zip'){
	if (mysqli_num_rows($select)>0){
        	$select = mysqli_query($testdb, "select * from packages where package = '$package' order by version DESC");
        	$row = mysqli_fetch_assoc($select);
        	$version = $row['version'];
		echo "This package already exists, creating version #" . ($version + $inc);
	}
	else{
        	echo "Created new package.";
        	$version = "0";
	}
	$request = array();
	$request['type'] = $type;
	$request['package'] = $package;
	$request['version'] = $version + $inc;

	rename("/home/winonapatrick/winonapatrick/testing/package.tar","/home/winonapatrick/winonapatrick/testing/".$request['package'].$request['version'].".tar");

	exec('./deploy.sh ');
	exec('./qaPull.sh');
	//first script scp the package from dev to deployment
	//second script scp the pack from deployment to QA... hopefully

}

$client = new rabbitMQClient("deployment.ini","testServer");
$response = $client->send_request($request);
$client2 = new rabbitMQClient("QA.ini","testServer");
//new client for QA server...
$response2 = $client2->send_request($request);
// send to QA server 
?>
