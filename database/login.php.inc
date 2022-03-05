<?php

class loginDB
{
private $logindb;

public function __construct()
{
	$this->logindb = new mysqli("127.0.0.1","test","test","bookrex");

	if ($this->logindb->connect_errno != 0)
	{
		echo "Error connecting to database: ".$this->logindb->connect_error.PHP_EOL;
		exit(1);
	}
	echo "correctly connected to database".PHP_EOL;
}

public function validateLogin($username,$password)
{
	$un = $this->logindb->real_escape_string($username);
	$pw = $this->logindb->real_escape_string($password);
	$statement = "select * from users where userid = '$un'";
	$response = $this->logindb->query($statement);

	while ($row = $response->fetch_assoc())
	{
		echo "checking password for $username".PHP_EOL;
		if ($row["password"] == $pw)
		{
			echo "passwords match for $username".PHP_EOL;
			return 1;// password match value
		}
		echo "passwords did not match for $username".PHP_EOL;
	}
	return 0;//no users matched username
}



public function createUser($username,$password)
{
	$un = $this->logindb->real_escape_string($username);
	$pw = $this->logindb->real_escape_string($password);
	
	
	$check = "select * from users where userid = '$un';";
	$checkuser = $this->logindb->query($check);

	if(mysqli_num_rows($checkuser) == 0) {
		echo "user does not exist can register";
		$insert = "insert into users values ('$un','$pw');";
		$response = $this->logindb->query($insert);
		return 1;
	}
	else{
		echo "user exists";
		return 0;
	}
}


public function searchQuery($search)
{
	$search_term = $this->logindb->real_escape_string($search);

	
	$check = "select * from SEARCH where SEARCH_QUERY = '$search_term' limit 1;";
	$checksearch = $this->logindb->query($check);

	if(mysqli_num_rows($checksearch) == 0) {
		//	echo "contacting api";
		$request = array();
		$request["type"] = "search";
		$request["search"] = $search_term;

		$client = new rabbitMQClient("api.ini","apiServer");
		$response = $client->send_request($request);
		//$response = $client->publish($request);		


		$data = json_encode($response);
		
		echo "contacting api";
		//echo $data;	
		$data2 = $this->logindb->real_escape_string($data);
		$insert = "insert into SEARCH values('$search', '$data2');";
		//$insert = "insert in SEARCH (SEARCH_QUERY, RESULT) values ('test2', '{\"name\":\"2\"}');";
		//$insert = "insert into test values('lalalala')";


		$sql_action = $this->logindb->query($insert);
		return $response;
		//return 1;

	}
	else{
		echo "accessing database for book records";
		$rows = array();
		while ($r = mysqli_fetch_array($checksearch))
		{
			$answer = $r['RESULT'];
		}
		//echo $answer;
		$data = json_decode($answer, true);
		return $data;
		//return 0;
	}
}




}
?>
