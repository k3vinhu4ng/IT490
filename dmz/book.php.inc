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






}
?>
