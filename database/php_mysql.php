<?php

class MySqlDb{

    protected $host;
    protected $username;
    protected $password;
    protected $db;
    protected $charset;
    protected $port;
    protected $conn;

function __construct(){
    
       $this->host = $_ENV['mysql_host'];
       $this->username = $_ENV['mysql_username'];
       $this->password = $_ENV['mysql_password'];
       $this->db = $_ENV['mysql_database'];
       $this->charset = $_ENV['mysql_charset'];  
       $this->charset = $_ENV['mysql_port'];      
       $this->connect();
      
    }

    private function connect(){
        
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset;port=$this->port";

        try {
             $pdo = new \PDO($dsn, $this->username, $this->password, $options);
        } catch (\PDOException $e) {
             throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

}
