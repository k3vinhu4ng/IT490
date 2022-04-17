<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class testdb
{
private $testdb;

public function __construct()
{
	$this->testdb = new mysqli("127.0.0.1","test","test","bookrex");

	if ($this->testdb->connect_errno != 0)
	{
		echo "Error connecting to database: ".$this->testdb->connect_error.PHP_EOL;
		exit(1);
	}
	echo "correctly connected to database".PHP_EOL;
}

public function packages($package,$version){
	$ins = "INSERT INTO packages VALUES('$package','$version','testing');";
	$response = $this->testdb->query($ins);

	$sel = "select * from packages where packages = '$package' and version = '$version';";
        $response = $this->testdb->query($sel);
        $result = mysqli_fetch_array($response);
        $package = $result['packages'];
        $version = $result['version'];
        $depkg = $package . $version . ".tar";

        shell_exec("./expkg.sh $depkg");


}

public function qaPush($package, $version) {
	$sel = "select * from packages where packages = '$package' and version = '$version';";
	$response = $this->testdb->query($sel);
	$result = mysqli_fetch_array($response);
	$package = $result['packages'];
	$version = $result['version'];
	$depkg = $package . $version . ".tar";

	shell_exec("./expkg.sh $depkg");


}

public function rollback($badpkg, $badver){
	$sel = "select * from packages where packages = '$badpkg' and version = '$badver';";
	$response = $this->testdb->query($sel);
	//echo implode(",", mysqli_fetch_array($response));
	// execute shell script to rollback version
	//echo $response;
	$result = mysqli_fetch_array($response);
        $package = $result['packages']; 
        $version = $result['version'];  
        //echo $package;
	//echo $version;
	//echo $package . $version;
	$rollpkg = $package . $version . ".tar";
	//echo $rollpkg . PHP_EOL;
	
	// pass package and version as args for shell script
	shell_exec("./rollback.sh $rollpkg");

	$upd = "update packages set status = 'BAD' where packages = '$badpkg' and version = '$badver';";
	$updresponse = $this->testdb->query($upd);	

	// need to also change status in table to bad yeaaaa
	// after deleting bad pkg in temp folder
	// use previous working version (select from packages where status = good)
	// copy file to correct directory and extract 

}

// script that moves pkg from temp folder and extract it in this folder
// cd into directory that came from pkg 
// cp everything in there to the var 
// cp /path/to/temp/* /var/www/sample 
// pkg should be deleted in temp in the rollback function 

}
?>
