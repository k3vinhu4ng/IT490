<?php

class loginDB
{
private $logindb;

public function __construct()
{
        $this->logindb = new mysqli("127.0.0.1","testUser","12345","testdb");

        if ($this->logindb->connect_errno != 0)
        {
                echo "Error connecting to database: ".$this->logindb->connect_error.PHP_EOL;
                exit(1);
        }
        echo "correctly connected to database".PHP_EOL;
}

public function add_review($username,$subject,$message) {
	  $un = $this->logindb->real_escape_string($username);
        $subject = $this->logindb->real_escape_string($subject);
        $message = $this->logindb->real_escape_string($message);


        $insert="insert into forum values('$un','$subject','$message');";
        $action = $this->logindb->query($insert);
                echo mysqli_errno($this->logindb).PHP_EOL;
                echo "0 = successfully added".PHP_EOL;
                return 1;

}

public function get_forum() {

        // $un = $this->logindb->real_escape_string($username);
        $select = "select * from forum;";

        echo "Fetching forum".PHP_EOL;
	$data = $this->logindb->query($select);
 echo "SQL CODE: ";
        echo mysqli_errno($this->logindb).PHP_EOL;

	 if(mysqli_num_rows($data) == 0) {
               echo "Oops...Forum is empty:(".PHP_EOL;

                return 0;
	 }
	 else {
		 echo "Got the forum">PHP_EOL;

		 $row=mysqli_fetch_all($data,MYSQLI_ASSOC);
		 $result=$row;
                echo $result.PHP_EOL;
                //$answer = json_encode($result);
                return $result;
	 }

  
}

}
	
?>
