<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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


public function deleteSession($username)
{

	$un = $this->logindb->real_escape_string($username);
	$statement = "delete from SESSIONS where userid = '$un';";
	$response = $this->logindb->query($statement);


}


public function setGoals($user, $goals)
{
	$un = $this->logindb->real_escape_string($user);
	//$goal = $this->logindb->real_escape_string($goals);
	$sel = "select * from GOALS where userid = '$un';";
	$selquery = $this->logindb->query($sel);
	echo "SQL CODE: ";
        echo mysqli_errno($this->logindb).PHP_EOL;
	

	//$rep = "replace into bookgoals values('$un','$goal');";

	if(mysqli_num_rows($selquery) == 0) {
		
		echo "User has no previous goal!".PHP_EOL;
		$ins = "insert into GOALS values('$un',$goals);";
		$sql_action = $this->logindb->query($ins);
	
		echo "SQL CODE: ";
	        echo mysqli_errno($this->logindb).PHP_EOL;

		return 1;
	}
	if(mysqli_num_rows($selquery) == 1)
	{
		echo "User has previous goals. Will update".PHP_EOL;
		$update = "update GOALS set goals = $goals where userid = '$un';";
		$sql_action = $this->logindb->query($update);

		echo "SQL CODE: ";
       		 echo mysqli_errno($this->logindb).PHP_EOL;
	

		return 1;
	}
}



public function getReadingGoal($username)
{
	$un = $this->logindb->real_escape_string($username);
	$select = "select goals from GOALS where userid = '$un' LIMIT 1;";
	
	echo "Fetching user reading goals".PHP_EOL;
	$sql_action = $this->logindb->query($select);

        echo "SQL CODE: ";
        echo mysqli_errno($this->logindb).PHP_EOL;

	if(mysqli_num_rows($sql_action) == 0) {

                echo "User has no reading goals yet.".PHP_EOL;
            
                return 0;
        }
	
        if(mysqli_num_rows($sql_action) == 1) {

                echo "Got user reading goals.".PHP_EOL;
		$row = mysqli_fetch_array($sql_action);
		$result = $row['goals'];
		//$data = array($result, '1');
		echo $result.PHP_EOL;	
		//$answer = json_encode($result);
		return $result;

	}

}


public function validateSession($username, $sessionID)
{
	$un = $this->logindb->real_escape_string($username);
	$statement = "select * from SESSIONS where userid = '$un' and sessionID = '$sessionID';";
	$response = $this->logindb->query($statement);


	 while ($row = $response->fetch_assoc())
	{
		if($row['sessionID'] == $sessionID)
		{
		return 1;
		}
		else
		{
		return 0;
		}

	}

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

			//code for creating and inserting sessionID
			//return sessionID variable in array with 1

			$result = array();
			$sessionID = $this->hashTime();
			echo $sessionID.PHP_EOL;
			
			$session_statement = "insert into SESSIONS(userid, sessionID) values('$username', '$sessionID');";
			//echo $session_statement.PHP_EOL;
			$sql_action = $this->logindb->query($session_statement);
			echo "SQL CODE: ";
			echo mysqli_errno($this->logindb).PHP_EOL;
			array_push($result, $username, $sessionID);
			//echo implode("|", $result);


			return $result;// password match value
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
	echo "SQL SELECT Code Error: ";
	echo mysqli_errno($this->logindb).PHP_EOL;

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
		echo "SQL INSERT :";

		echo mysqli_errno($this->logindb).PHP_EOL;

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




public function searchQuery1($search)
{
	$search_term = $this->logindb->real_escape_string($search);

	
	$check = "select * from SEARCH1 where SEARCH_QUERY = '$search_term';";
	echo "SQL SELECT Code Error: ";
	echo mysqli_errno($this->logindb).PHP_EOL;

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
		//$data2 = $this->logindb->real_escape_string($data);
		//echo $response;	
		foreach($response as $key => $value)
		{
			$title =  $response[$key][0];
			$image =  $response[$key][1];
			$description = $response[$key][2];
			$genre = $response[$key][3];



	$title_clean = $this->logindb->real_escape_string($title);
	$image_clean = $this->logindb->real_escape_string($image);
	$description_clean = $this->logindb->real_escape_string($description);
	$genre_clean = $this->logindb->real_escape_string($genre);




			//echo $genre;
		$insert = "insert into SEARCH1(SEARCH_QUERY, TITLE, IMAGE, DESCRIPTION, GENRE) values('$search_term', '$title_clean', '$image_clean', '$description_clean', '$genre_clean');";
			

		$sql_action = $this->logindb->query($insert);
		echo "SQL INSERT :";

		echo mysqli_errno($this->logindb).PHP_EOL;

		}
		echo "api data stored in database".PHP_EOL;
		return $response;
		//return 1;

	}
	else{
		echo "accessing database for book records".PHP_EOL;
		$final_result = array();
		while ($r = mysqli_fetch_array($checksearch))
		{
			//$answer = $r['RESULT'];
			$book = array();
			//echo $r['TITLE'];
			array_push($book, $r['TITLE'], $r['IMAGE'], $r['DESCRIPTION'], $r['GENRE']);
			array_push($final_result, $book);
		}
		//echo $answer;
		//$data = json_decode($answer, true);
		return $final_result;
		//return 0;
	}
}





public function updateLike($username, $title, $like)
{
	$un = $this->logindb->real_escape_string($username);
        $book_id = $this->logindb->real_escape_string($title);
        $like_value = $this->logindb->real_escape_string($like);

	//$check = "select LIKE_VALUE from BOOKSHELF where userid = '$un' and BOOK_ID ='$book_id' LIMIT 1;";
        //$sql_action = $this->logindb->query($check);

	 $update = "update BOOKSHELF set LIKE_VALUE = '$like_value' WHERE userid = '$un' and BOOK_ID ='$book_id';";
         $action = $this->logindb->query($update);
	echo "SQL CODE: ";
	 echo mysqli_errno($this->logindb).PHP_EOL;
         
                return 1;


        }


 

public function updateLike1($username, $title, $like)
{
	$un = $this->logindb->real_escape_string($username);
        $book_id = $this->logindb->real_escape_string($title);
        $like_value = $this->logindb->real_escape_string($like);

	//$check = "select LIKE_VALUE from BOOKSHELF where userid = '$un' and BOOK_ID ='$book_id' LIMIT 1;";
        //$sql_action = $this->logindb->query($check);

	 $update = "update BOOKSHELF1 set LIKE_VALUE = '$like_value' WHERE userid = '$un' and TITLE ='$book_id';";
         $action = $this->logindb->query($update);
	echo "SQL CODE: ";
	 echo mysqli_errno($this->logindb).PHP_EOL;
         
                return 1;


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
		$insert = "insert into BOOKSHELF(userid, BOOK_ID, BOOK) values('$un', '$book_id', '$data');";
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







public function db_add_book1($username,$book_id, $image, $genre, $description)
{
	$un = $this->logindb->real_escape_string($username);
	$book_id_clean = $this->logindb->real_escape_string($book_id);
	//$data = $this->logindb->real_escape_string($book_data);
	$image_clean = $this->logindb->real_escape_string($image);
	$genre_clean = $this->logindb->real_escape_string($genre);
	$description_clean = $this->logindb->real_escape_string($description);


	$check = "select * from BOOKSHELF1 where userid = '$un' and TITLE ='$book_id_clean';";
	$checkbook = $this->logindb->query($check);

	if(mysqli_num_rows($checkbook) == 0) {
		echo "not in bookshelf".PHP_EOL;
		$insert = "insert into BOOKSHELF1(userid, TITLE, IMAGE, DESCRIPTION, GENRE) values('$un', '$book_id_clean', '$image_clean', '$description_clean', '$genre_clean');";
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
		array_push($result, [$row['BOOK'], $row['LIKE_VALUE']]);	
	
	}
	//echo implode("|", $result);
	//echo "returning json encoded results".PHP_EOL;
	return $result;
}




public function bookshelf1($username)
{
	$un = $this->logindb->real_escape_string($username);
	
	
	$check = "select * from BOOKSHELF1 where userid = '$un';";
	$checkbook = $this->logindb->query($check);
	//echo mysql_fetch_array($checkbook);
	//return mysql_fetch_array($checkbook);

	//$bookshelf = array();

	//while ($row = mysql
	$result = array();

	while($row = mysqli_fetch_array($checkbook))
	{
		
		//echo $row['BOOK'].PHP_EOL;
		array_push($result, [$row['TITLE'], $row['IMAGE'], $row['DESCRIPTION'], $row['GENRE'],$row['LIKE_VALUE']]);	
	
	}
	//echo implode("|", $result);
	//echo "returning json encoded results".PHP_EOL;
	return $result;
}





}
?>
