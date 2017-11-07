<?php 

/**
 *  This class is responsible for handeling everything that has to do with the database.
 * 
 *  TODO: add 'updated_at' and 'created_at'
 *      updated_at - When any data is change in the row we will fill in the current timestemp
 *      created_at - When we create the row we will fill in the current timestemp
 *  TODO: add the database options to the config file.
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
    

    // Private construct so nobody else can instantiate it
    // see https://stackoverflow.com/questions/203336/creating-the-singleton-design-pattern-in-php5
    public function __construct() { 
        $this->connect();
    }


    public static function Instance() {
        static $inst = null;
        if ($inst === null) {
            $inst = new Database();
        }
        return $inst;
    }


    public function connect() {
        try {
            $dsn = $this->dbtype.":host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;            
            $this->db_handler = new PDO($dsn, $this->user, $this->pass, $this->PDO_options);                    
        } catch (PDOException $e) {

            console_warning("DB WARNING: your selected database does not exist, trying general connection");
            
            try {
                $this->db_handler = new PDO("mysql:host=".$this->host, $this->user, $this->pass);                                    
            } catch (PDOException $e) {
                die("DB ERROR: CAN NOT CONNECT TO MYSQL");                
            }
        }
    }


    public function dropDB() {
        console_error("DATABASE DROP");
        try {
            $this->db_handler->exec("DROP DATABASE `".$this->db."`;");
            $this->connect();            
        } catch (PDOException $e) {
            die("DB ERROR: ". $e->getMessage());
        }
    }


    public function createDB() {
        console_error("DATABASE CREATE");
        try {
            $this->db_handler->exec("CREATE DATABASE `".$this->db."`;");
            $this->connect();
        } catch (PDOException $e) {
            die("DB ERROR - could not create database: ". $e->getMessage());
        }
    }
    

    public function seed() {
        $DB = $this;
        require_once(ROOT."/config/seeds.php");
        echo "The seeds have grown to plants, let's start framing";        
    }

    
    public function execute($sql) { return $this->query($sql); }  // TODO: remove this
    public function query($sql, $array=[], $fetchClass="") {
        try {
            console_warning("DB QUERY: ".$sql);
            $dbs = $this->db_handler->prepare($sql);
            $dbs->execute($array);
            if (empty($fetchClass) == false) {
                $dbs->setFetchMode(PDO::FETCH_CLASS, $fetchClass); // We return them as there model class
            }
            return $dbs->fetchAll();
        } catch (PDOException $e) {
            die("DB ERROR - execute on database went wrong: ". $e->getMessage());
        }
    }
}