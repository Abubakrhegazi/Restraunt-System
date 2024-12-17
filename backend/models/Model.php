<?php
session_start();
require_once("../db/db.php");
abstract class Model{
    protected $db;
    protected $conn;

    public function connect(){
        if(null === $this->conn ){

            $this->db = Db::getInstance();
            $this->conn = $this->db->getConn();
            
               
        }
        return $this->db;
    }
}
?>