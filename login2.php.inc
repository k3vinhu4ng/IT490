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

public function genSessionID($timestamp) {
	$ts = $this->logindb->real_escape_string($timestamp);
	
	// get timestamp from front end to send over to backend as a request!
	// pass the time stamp as a string 
	// hash it using sha1() 
	// store the string to the sessions table 
}

public function hashTime()
{

        $t = date("Y-m-d h:i:sa");
        $ht = sha1($t);

        return $ht;

}


public function storeHash($username)
{

        $un = $this->logindb->real_escape_string($username);
	$hasht = $this->hashTime();

	$sel = "select * from usersessions where userid='$un';";
	$selq = $this->logindb->query($sel);
	$ins = "insert into usersessions values ('$un','$hasht');";
	
	if(mysqli_num_rows($selq) == 0) {
		echo "session stored.";
		$response = $this->logindb->query($ins);
		return 1;
	}
}


public function validateLogin($username,$password)
{
	$un = $this->logindb->real_escape_string($username);
	$pw = $this->logindb->real_escape_string($password);
	$statement = "select * from users where userid = '$un'";
	$response = $this->logindb->query($statement);

	$hasht = $this->hashTime();
	$storehasht = $this->storeHash($un);

	while ($row = $response->fetch_assoc())
	{
		echo "checking password for $username".PHP_EOL;
		if ($row["password"] == $pw)
		{
			echo "passwords match for $username".PHP_EOL;
//			$ins = "insert into usersessions values('$un','$hasht');";
//			$response = $this->logindb->query($ins);
			return 1;
			//$response2 = $this->logindb->query($ins);
		}
		
		echo "passwords did not match for $username".PHP_EOL;
			
	}	
	return 0;//no users matched username
}



public function createLogin($username,$password)
{
        $un = $this->logindb->real_escape_string($username);
        $pw = $this->logindb->real_escape_string($password);
	$sel = "select * from users where userid = '$un';";
	$selquery = $this->logindb->query($sel);
	$ins = "insert into users values('$un','$pw');";

	if(mysqli_num_rows($selquery) ==0) {

		echo "good to register user";
		$response = $this->logindb->query($ins);
		return 1;
	}

	else{
		echo "username exists. try a different username.";
		return 0;
	}
	
	//$response = $this->logindb->query($statement);

}

public function logOutUser($username){

	$un = $this->logindb->real_escape_string($username);
	$stmt = "delete from usersessions where userid = '$un';";
	$response = $this->logindb->query($stmt);
	return 1;

}


// make a function that takes timestamp and hashes it

public function checkGoals($user) {

	$un = $this->logindb->real_escape_string($user);
	$sel = "select * from bookgoals where username = '$un';";
	$selquery = $this->logindb->query($sel); 

	if(mysqli_num_rows($selquery) == 0) {
		echo "user does not have reading goal set.";
		return 0;
	}

	else {
		echo "user has a reading goal set.";
		return 1;
	}

}

public function setGoals($goals,$user)
{
	$un = $this->logindb->real_escape_string($user);
	$goal = $this->logindb->real_escape_string($goals);
	$sel = "select * from bookgoals where username = '$un';";
	$selquery = $this->logindb->query($sel);
	// if selq == 0 then insert blah blah blah
	$ins = "insert into bookgoals values('$un','$goal');";
	//$rep = "replace into bookgoals(username, numgoals) values('$un','$goal');";
	$up = "update bookgoals set numgoal='$goal' where username='$un';";

 
	if(mysqli_num_rows($selquery) == 0) {
		echo "reading goal set!";
		$response = $this->logindb->query($ins);
		return 1;
	}
	else {
		echo "new reading goal set!";
		//$up = "update bookgoals set numgoals = '$goal' where username = '$un';";
		$response = $this->logindb->query($up);
		return 1;
	}

	return 0;

}

public function likeBook($username,$book_id, $liked)
{

	$un = $this->logindb->real_escape_string($username);
	$book_id = $this->logindb->real_escape_string($book_id);
	$li = $this->logindb->real_escape_string($liked);

	//select where user and book equals this then
	$sel = "select * from BOOKSHELF where userid='$un' and BOOK_ID='$book_id';";
	$selq = $this->logindb->query($sel);
	while ($row = $selq->fetch_assoc()){
		//like column not made yet; need to alter table
		$ins = "insert into BOOKSHELF(like) values('$li');";
		$response = $this->logindb->query($ins);
		return 1;
	}
	//while fetching row 
	//insert into BOOKSHELF value liked blah blah blah
	

}

}

?>
