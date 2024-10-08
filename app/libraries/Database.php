<?php

class Database {
    private $host = DB_HOST; // Database host
    private $db   = DB_NAME; // Database name
    private $user = DB_USER; // Database username
    private $pass = DB_PASS; // Database password
    private $charset = DB_CHARSET; // Database charset
    private $pdo; // PDO instance to manage the connection

    // Constructor to establish a connection with the database using PDO
    public function __construct() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exceptions
        } catch (PDOException $e) {
            die("Database Connection Error: " . $e->getMessage()); // Catch and display connection errors
        }
    }

    // Returns the active PDO connection instance
    public function getConnection() {
        return $this->pdo;
    }
}
