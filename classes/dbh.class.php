<?php

//database connection class
   abstract class DbCon {

   
    protected $user = 'root';
    protected $password = '';
    protected $host= 'localhost';
    protected $dbName='scandiweb';
    
    public function connect() {
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->password);
        return $pdo;
    }
};

?>