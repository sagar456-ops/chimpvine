
<?php
class Database{
	
private $host  = "localhost";
    private $user  = "root";
    private $password   = "";
    private $database  = "sagar"; 
    
    public function getConnection(){		
		$con = new mysqli($this->host, $this->user, $this->password, $this->database);
		if($con->connect_error){
			die("Error failed to connect to MySQL: " . $con->connect_error);
      echo "fail";

    } else {
			return $con;
      echo "sucess";

		}
    }
}
?>