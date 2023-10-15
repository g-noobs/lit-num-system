<?php
class Connection {
    protected $primaryHost;
    protected $backupHost;
    protected $username;
    protected $password;
    protected $database;
    public $conn;

    public function __construct() {
        $this->primaryHost = "156.67.222.1"; // Primary host (online deployment)
        $this->backupHost = "localhost:3306";  // Backup host (local)
        $this->username = "u170333284_admin"; // Replace with your MySQL username
        $this->password = "Capstone1!";  // Replace with your MySQL password
        $this->database = "u170333284_db_tagakaulo"; // Replace with your database name
        $this->connect();
    }

    public function connect() {
        $this->conn = mysqli_connect($this->primaryHost, $this->username, $this->password, $this->database);

        if (!$this->conn) {
            // Primary host connection failed; try the backup host
            $this->conn = mysqli_connect($this->backupHost, $this->username, $this->password, $this->database);

            if (!$this->conn) {
                die("Connection failed for both primary and backup hosts: " . mysqli_connect_error());
            }
        }
    }

    // This will close the Connection
    public function close() {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    // This will be used to get the connection once $conn is set to protected
    public function getConnection() {
        return $this->conn;
    }
}

?>