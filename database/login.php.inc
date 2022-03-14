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
		echo "contacting api".PHP_EOL;
		
		$client = new rabbitMQClient("api.ini","apiServer");

		
		$request = array();
		$request["type"] = "search";
		$request["search"] = $search_term;
		
		$response = $client->send_request($request);
		//$response = $client->publish($request);		
		unset($client);	
		//$close = $client->disconnect();

		$data = json_encode($response);
		
		echo "data got from api".PHP_EOL;
		//echo $data;	
		$data2 = $this->logindb->real_escape_string($data);
		$insert = "insert into SEARCH values('$search', '$data2');";
			

		$sql_action = $this->logindb->query($insert);

		echo "api data stored in database".PHP_EOL;
		return $response;
		//return 1;

	}
	else{
		echo "accessing database for book records".PHP_EOL;
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


public function db_add_book($username,$book_id, $book_data)
{
	$un = $this->logindb->real_escape_string($username);
	$book_id = $this->logindb->real_escape_string($book_id);
	$data = $this->logindb->real_escape_string($book_data);
	
	
	$check = "select * from BOOKSHELF where userid = '$un' and BOOK_ID ='$book_id';";
	$checkbook = $this->logindb->query($check);

	if(mysqli_num_rows($checkbook) == 0) {
		echo "not in bookshelf".PHP_EOL;
		$insert = "insert into BOOKSHELF values('$un', '$book_id', '$data');";
		$action = $this->logindb->query($insert);
		echo mysqli_errno($this->logindb).PHP_EOL;
		echo "0 = successfully added".PHP_EOL;
		return 1;
	}
	else{
		echo "book exists in bookshelf";
		return 0;
	}
}


public function bookshelf($username)
{
	$un = $this->logindb->real_escape_string($username);
	
	
	$check = "select * from BOOKSHELF where userid = '$un';";
	$checkbook = $this->logindb->query($check);
	//echo mysql_fetch_array($checkbook);
	//return mysql_fetch_array($checkbook);

	//$bookshelf = array();

	//while ($row = mysql
	$result = array();

	while($row = mysqli_fetch_array($checkbook))
	{
		
		//echo $row['BOOK'].PHP_EOL;
		array_push($result, $row['BOOK']);	
	
	}
	//echo implode("|", $result);
	//echo "returning json encoded results".PHP_EOL;
	return $result;
}





}
?>
