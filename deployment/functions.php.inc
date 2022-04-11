<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class testdb
{
private $testdb;

public function __construct()
{
	$this->testdb = new mysqli("127.0.0.1","testUser","12345","testdb");

	if ($this->testdb->connect_errno != 0)
	{
		echo "Error connecting to database: ".$this->testdb->connect_error.PHP_EOL;
		exit(1);
	}
	echo "correctly connected to database".PHP_EOL;
}

public function packages($type,$package,$version){
	$ins = "INSERT INTO packages VALUES('$package','$version');";
$response = $this->testdb->query($ins);

}
}
?>
