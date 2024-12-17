<?php

require_once("config.php");
class Db{
	private $servername;
	private $username;
	private $password;
	private $dbname;

	private $conn;
	private $result;
	public $sql;
    
    private static $dbInstance = null;

	private function __construct(){
        $this->servername = DB_SERVER;
		$this->username = DB_USER;
		$this->password = DB_PASS;
		$this->dbname = DB_DATABASE;
		$this->connect();
    } //private so one instance only availiable (singelton)
	
	private function __clone(){}//so it cant be cloned

	public static function getInstance() {

		if (!isset(self::$dbInstance)) {

            self::$dbInstance = new self();
        }
        return self::$dbInstance;
	}


	private function connect(){

		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($this->conn->connect_error) {

			throw new Exception("Connection failed: " . $this->conn->connect_error);
		}
		echo "connected";
		return $this->conn;
	}

	public function getConn(){
        
		return $this->conn;
	}

	function query($sql){
		if (!empty($sql)){
			$this->sql = $sql;
			$this->result = $this->conn->query($sql);
			return $this->result;
		}
		else{
			echo "sql is empty";
			return false;
		}
	}

	function fetchRow($result=""){
		if (empty($result)){ 
			$result = $this->result; 
		}
		return $result->fetch_assoc();
	}

	function __destruct(){
		$this->conn->close();
	}
}
?>