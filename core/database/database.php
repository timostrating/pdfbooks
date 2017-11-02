<?php 

/**
 *  We assume some IMPORTANT things about our database
 * 
 *  1. Every tabel will have these standard columns
 *      ID - We always have the primary key on this field
 *      updated_at - When any data is change in the row we will fill in the current timestemp
 *      created_at - When we create the row we will fill in the current timestemp
 */

class Database {

    private $dbtype = 'mysql';
    private $host = '127.0.0.1';
    private $db   = 'pdfbooks';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8';  // utf8mb4

    private $PDO_options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    private $db_handler;


    public function __construct() {
        $this->connect();
    }


    private function connect() {
        try {
            $dsn = $this->dbtype.":host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;            
            $this->db_handler = new PDO($dsn, $this->user, $this->pass, $this->PDO_options);                    
        } catch (PDOException $e) {

            echo "YOUR SELECTED DATABASE DOES NOT EXIST <br/>";
            
            try {
                $this->db_handler = new PDO("mysql:host=".$this->host, $this->user, $this->pass);                                    
            } catch (PDOException $e) {
                echo "WE CAN NOT CONNECT TO MYSQL <br/>";                
            }
        }
    }

    public function dropDB() {
        echo "drop <br/>";
        
        try {
            $this->db_handler->exec("DROP DATABASE `".$this->db."`;");
            $this->connect();            
        } catch (PDOException $e) {
            die("DB ERROR: ". $e->getMessage());
        }
    }

    public function createDB() {
        echo "create <br/>";
        try {
            $this->db_handler->exec("CREATE DATABASE `".$this->db."`;");
            $this->connect();
        } catch (PDOException $e) {
            die("DB ERROR - could not create database: ". $e->getMessage());
        }
    }

    public function seed() {
        $DB = $this;
        require_once(ROOTPATH."/config/seeds.php");
        echo "The seeds have grown to plants, let's start framing";        
    }


    public function query($queryString, $array=[]) {
        return $this->db_handler->query($queryString, $array);
        // while ($row = $stmt->fetch()) {
        //     echo $row['name'] . "\n";
        // }
    }

    public function execute($queryString) {
        try {
            $this->db_handler->exec($queryString);
        } catch (PDOException $e) {
            die("DB ERROR - execute on database went wrong: ". $e->getMessage());
        }
    }



    public static function insert($id, $columns = array('*')) {  
        $instance = new QueryBuilder;
        return $instance->select($id, $columns);
    }
}