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
        // example  "mysql:host=127.0.0.1;dbname=pdfbooks;charset=utf8"        
        $dsn = $this->dbtype.":host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
        try {
            $this->db_handler = new PDO($dsn, $this->user, $this->pass, $this->PDO_options);
        } catch (PDOException $e) {
            echo "WE CAN NOT CONNECT TO YOUR CONFIGURED DATABASE";
            $this->createDB();
            $this->buildDB();
            $this->fillDB();
        }
    }


    public function createDB() {
        try {
            $this->db_handler = new PDO("mysql:host=".$this->host, $this->user, $this->pass);
            $this->db_handler->exec("CREATE DATABASE `".$this->db."`;") or die(print_r($this->db_handler->errorInfo(), true));
        } catch (PDOException $e) {
            die("DB ERROR - could not create database: ". $e->getMessage());
        }
    }

    public function buildDB() {
        // TODO
    }

    public function fillDB() {
        // TODO
    }

    public function query($queryString, $array) {
        return $this->db_handler->query($queryString, $array);
        // while ($row = $stmt->fetch()) {
        //     echo $row['name'] . "\n";
        // }
    }
}