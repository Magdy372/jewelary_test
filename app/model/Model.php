<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once("../db/Dbh.php");
abstract class Model{
    protected $db;
    protected $conn;

    public function connect(){
        if(null === $this->conn ){
            $this->db = new Dbh();
        }
        return $this->db;
    }
    
}
?>