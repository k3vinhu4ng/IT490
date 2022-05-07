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

public function packages($package,$version, $lay, $vm){
	$ins = "INSERT INTO packages VALUES('$package','$version','TESTING');";
	$response = $this->testdb->query($ins);

	$sel = "select * from packages where packages = '$package' and version = '$version';";
        $response = $this->testdb->query($sel);
        $result = mysqli_fetch_array($response);
        $package = $result['packages'];
        $version = $result['version'];
        $depkg = $package . $version . ".tar";

	shell_exec('./backup.sh');
//	shell_exec("./expkg.sh $depkg");

	if ($lay == 'QA'){
                if ($vm == 'FE'){
                        shell_exec("./deployFEQA.sh $depkg");
                }
		elseif ($vm == 'BE'){
                        shell_exec("./deployDBQA.sh $depkg");
                }
		elseif ($vm == 'API'){
                        shell_exec("./deployAPIQA.sh $depkg");
                }
	}

	elseif ($lay == 'Prod'){
		$upd = "update packages set status = 'GOOD' where packages = '$package' and version = '$version';";
        	$updresponse = $this->testdb->query($upd);
        	echo "Changed status of package to GOOD.".PHP_EOL;

		if ($vm == 'FE'){
                        shell_exec("./deployFEProd.sh $depkg");
                }
		elseif ($vm == 'BE'){
                        shell_exec("./deployDBProd.sh $depkg");
                }
		elseif ($vm == 'API'){
                        shell_exec("./deployAPIProd.sh $depkg");
                }
        }

}

public function rollback($badpkg, $badver, $vm){
//	$sel = "select * from packages where packages = '$badpkg' and version = '$badver';";
//	$response = $this->testdb->query($sel);

	$upd = "update packages set status = 'BAD' where packages = '$badpkg' and version = '$badver';";
	$updresponse = $this->testdb->query($upd);

	$sel2 = "select * from packages where packages = '$badpkg' and version < '$badver' order by version desc limit 1;";
	$response2 = $this->testdb->query($sel2);	
	$result = mysqli_fetch_array($response2);
	$package = $result['packages'];
	$version = $result['version'];
	$rollpkg = $package . $version . ".tar";

	if ($vm == 'FE'){
		shell_exec("./rollbackFEQA.sh $rollpkg");
	}
	elseif ($vm == 'BE'){
		shell_exec("./rollbackDBQA.sh $rollpkg");
	}
	elseif ($vm == 'API'){
		shell_exec("./rollbackAPIQA.sh $rollpkg");
	}
		
	
}

public function change($package, $version){
	// change initial status from TESTING to GOOD 
	$upd = "update packages set status = 'GOOD' where packages = '$package' and version = '$version';";
	$updresponse = $this->testdb->query($upd);
	echo "Changed status of package to GOOD.".PHP_EOL;

}

}
?>
