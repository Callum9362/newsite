<?php
require __DIR__. '\\..\\'."/vendor/autoload.php";
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__.'\\..\\'.'/');
$dotenv->load();
class MySqlDb{
protected $host;
    protected $username;
    protected $password;
    protected $db;
    protected $conn;

function __construct(){
$this->host = $_ENV['mysql_host'];
       $this->username = $_ENV['mysql_username'] ;
       $this->password = $_ENV['mysql_password'] ;
       $this->db = $_ENV['mysql_database'] ;      
       $this->connect();
      
    }
private function connect(){
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
function getData($table, $where){
        //$this->connect();
        $sql = "SELECT * FROM ".$table." WHERE ".$where;          
        $sql = $this->conn->query($sql);
        $sql = $sql->fetch_assoc();
        return $sql;
}
function updateData($table, $update_value, $where){
        $this->connect();
        $sql = "UPDATE ".$table." SET ".$update_value." WHERE ".$where;        
        $sql = $this->conn->query($sql);
        if($sql == true){
            return true;
        }else{
            return false;
        }
    }
function createData($table, $columns, $values){
        $this->connect();
        $sql = "INSERT INTO ".$table." ".$columns." VALUES ".$values;        
        $sql = $this->conn->query($sql);
        if($sql == true){
            return $sql;
        }else{
            return false;
        }
    }
function deleteData($table, $filter){
       
        $this->connect();
        $sql =  "DELETE FROM ".$table." ".$filter;  
        $sql = $this->conn->query($sql);
        if($sql == true){
            return true;
        }else{
            return false;
        }
    }
   
}
