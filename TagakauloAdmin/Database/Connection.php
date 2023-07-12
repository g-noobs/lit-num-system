<?php
class Connection{
    protected $host;
    protected $username;
    protected $password;
    protected $database;
    public $conn;

    public function __construct(){
        $this->host = "localhost:3306";  // Replace with your server name
        $this->username = "root";  // Replace with your MySQL username
        $this->password = "";  // Replace with your MySQL password
        $this->database = "db_tagakaulo";  // Replace with your database name
        $this->connect();
    }
    public function connect(){
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
}
?>
