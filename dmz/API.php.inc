
<?php

function search($search)
{
    $content = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=$search&key=AIzaSyDMX3vJz8MvfUAw0gomHHREUyuglJZc37Y");
    return $content;
    //return false if not valid
}


function get_search($request)
{

	//echo "search received";
 //	$term = $request['search'];
	//echo $term;


	$safe = urlencode($request);
	$data = search($safe);
	$jdata = json_decode($data, true);
	
//	$response = '';
//	$index = 0;
//	foreach($jdata as $books)
//	{
//		$response .= $books +'<br><br><br><br>';
		//$index +=1;
//	}
//	return $response;
	
	//return $jdata['items'][0]['volumeInfo']['title'];
//	echo $jdata['items'];
	//return $jdata['items'];
	return $jdata;

  }

?>

