<?php

class DbConnector {

	var $theQuery;
	var $link;

	function DbConnector(){
		echo "This is Db connection"
        	// Get the main settings from the array we just loaded
        	$host = 'localhost';
        	$db = 'teamproject';
        	$user = 'root';
        	$pass = 'mynewpassword';
		echo "auth success";

        	// Connect to the database
        	$this->link = mysqli_connect($host, $user, $pass);
        	mysqli_select_db($db);
        	register_shutdown_function(array(&$this, 'close'));

    	}
	
  	//*** Function: query, Purpose: Execute a database query ***
    	function query($query) {

        	$this->theQuery = $query;
        	return mysqli_query($query, $this->link);

    	}

    	//*** Function: fetchArray, Purpose: Get array of query results ***
   	 function fetchArray($result) {

        	return mysqli_fetch_array($result);

    	}

   	 //*** Function: close, Purpose: Close the connection ***
    	function close() {

        	mysqli_close($this->link);

    	}
	
}

?>
