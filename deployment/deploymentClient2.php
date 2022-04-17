#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

exec('./zipPackage.sh');

$type = readline("Do you want to zip or rollback a package?: ");		
//$package = readline("Package name: ");


$testdb = new mysqli('127.0.0.1','test','test','bookrex');
if ($testdb->errno != 0){
        echo "Failed to connect to database: ".$testdb->error.PHP_EOL;
        exit(0);
}


//$select = mysqli_query($testdb, "select * from packages where packages = '$package'");

$inc = "1";
if ($type == 'zip'){
	$package = readline("Package name: ");
	$select = mysqli_query($testdb, "select * from packages where packages = '$package'");
	if (mysqli_num_rows($select)>0){
        	$select = mysqli_query($testdb, "select * from packages where packages = '$package' order by version DESC");
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

	rename("/home/cristina/realtest/package.tar","/home/cristina/realtest/".$request['package'].$request['version'].".tar");

	exec('./backup.sh');

	exec('./deploy.sh ');


}

if ($type == 'rollback'){
	$badpkg = readline("Bad package? ");
	$badver = readline("Bad version? ");

	$request = array();
	$request['type'] = $type;
	$request['badpkg'] = $badpkg;
	$request['badver'] = $badver;

}


$client = new rabbitMQClient("deployment.ini","testServer");
$response = $client->send_request($request);
?>