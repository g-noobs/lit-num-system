<?php
class Connection{
    protected $host;
    protected $username;
    protected $password;
    protected $database;
    public $conn;

    public function __construct(){
        $this->host = "localhost:3306";  // Replace with your server name
        $this->username = "admin";  // Replace with your MySQL username
        $this->password = "admin";  // Replace with your MySQL password
        $this->database = "db_tagakaulo";  // Replace with your database name
        $this->connect();
    }
    public function connect(){
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    //This will close the Connection
    public function close(){
        if($this->conn){
            $this->conn->close();
        }
    }
    //This will be used to get connection once $conn is set to protected
    public function getConnection(){
        return $this->conn;
    }

    //This will be used to execute parameter 
    public function executePreparedStatement($query, $params, $header){
        $stmt = $this->conn->prepare($query);

        if(!$stmt){
            die("Error in prepared statement: ". $this->conn->error);
        }

        //Generate the data type string for bind_param dynamically
        $dataTypes = '';
        foreach ($params as $param) {
            if (is_int($param)) {
                $dataTypes .= 'i'; // integer
            } elseif (is_float($param)) {
                $dataTypes .= 'd'; // double
            }
            elseif (is_string($param) && strtotime($param)) { 
                $dataTypes .= 's'; // Bind dates as strings
            }  
            else {
                $dataTypes .= 's'; // string
            }
        }
        // Bind parameters dynamically
        $stmt->bind_param($dataTypes, ...$params);

        // Execute the statement
        $stmt->execute();

        // Check for errors during execution
        if ($stmt->error) {
            die("Error during execution of prepared statement: " . $stmt->error);
        }
         $stmt->close();

        header("Location: ". $header);
        exit();
    }

    public function executrePreState($query, $params){
        $stmt = $this->conn->prepare($query);

        if(!$stmt){
            die("Error in prepared statement: ". $this->conn->error);
        }

        //Generate the data type string for bind_param dynamically
        $dataTypes = '';
        foreach ($params as $param) {
            if (is_int($param)) {
                $dataTypes .= 'i'; // integer
            } elseif (is_float($param)) {
                $dataTypes .= 'd'; // double
            } else {
                $dataTypes .= 's'; // string
            }
        }
        // Bind parameters dynamically
        $stmt->bind_param($dataTypes, ...$params);

        // Execute the statement
        $stmt->execute();

        // Check for errors during execution
        if ($stmt->error) {
            die("Error during execution of prepared statement: " . $stmt->error);
        }
         $stmt->close();
    }
}
?>