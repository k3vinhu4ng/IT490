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
    return $login->SearchQUery($search);
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

function showBookShelf($username)
{
	$login = new loginDB();
	return $login->bookshelf($username);
}




function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "login":
	    return doLogin($request['username'],$request['password']);
    case "validate_session":
	    return doValidate($request['sessionId']);
    case "new":
	    return createLogin($request['username'],$request['password']);
    case "search":
	//echo "running once".PHP_EOL;
	return checkSearch($request['search']);
	break;
	//echo "received search request term";
    case "add":
	 //echo $request["bookdata"];
	return addBook($request['user'],$request['bookid'],$request['bookdata']);
	break;
    case "bookshelf":
	return showBookshelf($request['user']);

  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>

