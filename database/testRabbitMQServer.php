#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('login.php.inc');
//include('login.php.inc');


function doLogin($username,$password)
{
    // lookup username in databas
    // check password
    $login = new loginDB();
    return $login->validateLogin($username,$password);
    //return false if not valid
}


function createLogin($username,$password)
{
    // lookup username in databas
    // check password
    $login = new loginDB();
    return $login->CreateUser($username,$password);
    //return false if not valid
}


function checkSearch($search)
{
    // lookup search query in database
    // 
    $login = new loginDB();
    return $login->SearchQuery($search);
    //return false if not valid
}


function checkSearch1($search)
{
    // lookup search query in database
    // 
    $login = new loginDB();
    return $login->SearchQuery1($search);
    //return false if not valid
}




function addBook($username, $book_id, $book_data)
{
    // lookup search query in database
    // 
    $login = new loginDB();
    return $login->db_add_book($username, $book_id, $book_data);
    //return false if not valid
}



function addBook1($username, $book_id, $image, $genre, $description)
{
    // lookup search query in database
    // 
    $login = new loginDB();
    return $login->db_add_book1($username, $book_id, $image, $genre, $description);
    //return false if not valid
}




function showBookShelf($username)
{
	$login = new loginDB();
	return $login->bookshelf($username);
}


function showBookShelf1($username)
{
	$login = new loginDB();
	return $login->bookshelf1($username);
}



function logoutUser($username)
{
	$login = new loginDB();
	return $login->deleteSession($username);
}


function doValidate($username, $sessionID)
{
	$login = new loginDB();
	return $login->validateSession($username, $sessionID);

}



function setGoals($username, $goals){
	$login = new loginDB();
	return $login->setGoals($username, $goals);
}



function showGoals($username){
	$login = new loginDB();
	return $login->getReadingGoal($username);
}


function setLike($username, $title, $like){
	$login = new loginDB();
	return $login->updateLike($username, $title, $like);
}


function setLike1($username, $title, $like){
	$login = new loginDB();
	return $login->updateLike1($username, $title, $like);
}

function postForum($username,$subject, $post){
	$login = new loginDB();
	return $login->add_review($username, $subject, $post);
}

function changePassword($username, $password){

	$login = new loginDB();
	return $login->updatePassword($username, $password);
}

function changeUser($username, $new_user){

	$login = new loginDB();
	return $login->updateUsername($username, $new_user);
}




function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }

//$log_client = new rabbitMQClient("log.ini", "testServer");
//$log_client ->publish($request);
//echo "Published Request".PHP_EOL;



  switch ($request['type'])
  {
    case "login":
	    return doLogin($request['username'],$request['password']);
	    break;
    case "validate_session":
	    return doValidate($request['user'],$request['sessionID']);
	    //echo "hello".PHP_EOL;
	    break;
    case "new":
	    return createLogin($request['username'],$request['password']);
	    break;
    case "search":
	    //echo "running once".PHP_EOL;
	    return checkSearch1($request['search']);
	    break;
	    //echo "received search request term";
    case "add":
	    //echo $request["bookdata"];
	    return addBook1($request['user'],$request['bookid'],$request['image'], $request['genre'], $request['description']);
	    break;
    case "bookshelf":
	    return showBookshelf1($request['user']);
	    break;
    case "logout":
	    return logoutUser($request['user']);
	    break;
    case "goals":
	    return setGoals($request['user'],$request['goals']);
	    break;
    case "getgoals":
	    return showGoals($request['user']);
	    break;
    case "like":
	    return setLike1($request['user'], $request['title'], $request['like']);
	    break;
    case "addReview":
	    return postForum($request['user'], $request['subject'], $request['message']);
	    break;

	case "password":
		return changePassword($request['user'], $request['password']);
		break;
	case "changeuser":
		return changeUser($request['user'], $request['newuser']);
		break;



  }
  //return array("returnCode" => '0', 'message'=>"Server received request and processed");


}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');


unset($server);
exit();
?>

