#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$type = readline("Do you want to zip, rollback, or change a package?: ");		
$testdb = new mysqli('25.81.36.24','test4','test','bookrex');
if ($testdb->errno != 0){
        echo "Failed to connect to database: ".$testdb->error.PHP_EOL;
        exit(0);
}


$inc = "1";
if ($type == 'zip'){
//	exec('./zipPackage.sh');
	$package = readline("Package name: ");
	$select = mysqli_query($testdb, "select * from packages where packages = '$package'");
	if (mysqli_num_rows($select)>0){
        	$select = mysqli_query($testdb, "select * from packages where packages = '$package' order by version DESC");
        	$row = mysqli_fetch_assoc($select);
        	$version = $row['version'];
		echo "This package already exists, creating version #" . ($version + $inc).PHP_EOL;
	}
	else{
        	echo "Created new package.".PHP_EOL;
        	$version = "0";
	}

	$lay = readline("Which layer? QA or Prod?: ");
	$vm = readline("FE, BE, or API?: ");

	$request = array();
        $request['type'] = $type;
        $request['package'] = $package;
        $request['version'] = $version + $inc;
        $request['lay'] = $lay;
	$request['vm'] = $vm;

	if ($lay == 'QA' && $vm == 'FE') {
		exec('./zipFEQA.sh');
		rename("/home/kevin/testing/package.tar","/home/kevin/testing/".$request['package'].$request['version'].".tar");	
		exec('./scpFE.sh');
	}

	elseif ($lay == 'QA' && $vm == 'BE') {
		exec('./zipBEQA.sh');
		rename("/home/kevin2/testing/package.tar","/home/kevin2/testing/".$request['package'].$request['version'].".tar");
		exec('./scpBE.sh');
	}

	elseif ($lay == 'QA' && $vm == 'API') {
		exec('./zipAPIQA.sh');
		rename("/home/kevin1/testing/package.tar","/home/kevin1/testing/".$request['package'].$request['version'].".tar");
        }

	// scp files from dev layer to deployment server 
	if ($vm == 'FE') {
		exec('./scpFE.sh');
	}

	elseif ($vm == 'BE') {
		exec('./scpBE.sh');
	}

	elseif ($vm == 'API') {
		exec('./scpAPI.sh');
	}


}

if ($type == 'rollback'){
	$badpkg = readline("Bad package? ");
	$badver = readline("Bad version? ");

        $vm = readline("FE, BE, or API?: ");

	$request = array();
	$request['type'] = $type;
	$request['badpkg'] = $badpkg;
	$request['badver'] = $badver;
        $request['vm'] = $vm;

}

if ($type == 'change'){
	$package = readline("Package name: ");	
	$version = readline("Version number: ");
	$vm = readline("FE, BE, or API?: ");
	
	$request = array();
        $request['type'] = $type;
        $request['package'] = $package;
	$request['version'] = $version;
	$request['vm'] = $vm;

	echo "Updated status of package.".PHP_EOL;

}

$client = new rabbitMQClient("deployment.ini","testServer");
$response = $client->send_request($request);
?>
