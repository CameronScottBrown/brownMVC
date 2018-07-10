<?php

/* PDO Database Class
 * Connect to database
 * Create prepared statements
 * Bind values
 * Return rows and results
 * 
*/

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    private $port = 3306;  //custom for XAMPP MySQL instance

    private $dbh; //database handler
    private $stmt; //statement
    private $error;

    public function __construct(){
        //set DSN
        $dsn = 'mysql:host=' .$this->host. 
                ';port='.$this->port. 
                ';dbname=' .$this->dbname;

        //set some PDO attributes
        $options = array(
            PDO::ATTR_PERSISTENT => true, //persistent connection
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //use exceptions
        );

        //create PDO instance
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error; //print error
        }
    }


    //prepare statement with query
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    //bind values with param type recognition
    public function bind($param, $value, $type = null){
        if(is_null($type)){ //if type not passed
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT; 
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL; 
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL; 
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        
        //bind values to statement with PDO bindValue method
        $this->stmt->bindValue($param, $value, $type);

    }

    //execute the prepared statement
    public function execute(){
        return $this->stmt->execute();
    }

    //get result set (array of objects)
    public function resultSet(){
        $this->execute(); //set stmt via execute
        return $this->stmt->fetchAll(PDO::FETCH_OBJ); //fetch all data as objects
    }

    //get result row (single object)
    public function single(){
        $this->execute(); //set stmt via execute
        return $this->stmt->fetch(PDO::FETCH_OBJ); //fetch single data row as object
    }

    //get row count in data
    public function rowCount(){
        return $this->stmt->rowCount(); //PDO method for row count
    }


}


?>