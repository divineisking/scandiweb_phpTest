<?php

   abstract class DbCon {

   
    protected $user = 'root';
    protected $password = '';
    protected $host= 'localhost';
    protected $dbName='scandiweb';
            
    
    /*protected function connect() {
        try {
            
            $user = "root";
            $password = "";
            $dbh = new PDO('Mysql:host=localhost;dbname=scandiweb', $user, $password);
            return $dbh;
        }
        catch (PDOException $e) {
            print "Error: " . $e->getMessage() . "<br/>";
            die();
        }
    }*/
    
    public function connect() {
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->password);
        //$pdo->setAttribute(PDO::ATTR_DEFAULT_MODE, PDO::'FETCH_ASSOC');
        return $pdo;
    }
};

?>