<?php
class DatabaseConnSingleton {
    private static $conn = null;
    
    public static function getConn(){
        require_once '../../vendor/autoload.php';
        $dotenv = Dotenv\Dotenv::createImmutable('../..');
        $dotenv->load();
        $dbhost = $_ENV['DBHOST'];
        $dbuser = $_ENV['DBUSER'];
        $dbpass = $_ENV['DBPASS'];
        $db = $_ENV['DB'];
        if (null === self:: $conn ){
            self::$conn = new mysqli($dbhost,$dbuser,$dbpass,$db) or die("Connect failed: %s\n". $conn -> error);            
            //created new DB connection
        }else{
            //DB connection already existed
        }
        return self::$conn;
    }
    public static function closeConn()
    {
        self::$conn->close();
    }

}
?>