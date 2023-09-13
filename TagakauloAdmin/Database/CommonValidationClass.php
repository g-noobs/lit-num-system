<?php 
include_once("Connection.php");

class CommonValidationClass extends Connection{
    function __construct(){
        parent :: __construct();
    }
    function validateColumns($table, $columns, $values) {

        //this will convert the columns into array
        if (!is_array($columns)) {
            $columns = [$columns];
        }
        //this will convr
        if (!is_array($values)) {
            $values = [$values];
        }
        // below will check if the columns and values are equal
        if (count($columns) !== count($values)) {
            echo "<script>console.log('Columns and values must have the same count.')</script>";
            throw new Exception("Columns and values must have the same count.");
        }
    
        $conditions = [];
        $params = [];
        
        //this will loop the columns and values
        foreach ($columns as $column) {
            $conditions[] = "$column = ?";
            $params[] = "s";
        }
    
        $conditionString = implode(" AND ", $conditions);
        $sql = "SELECT COUNT(*) FROM $table WHERE $conditionString";
    
        $stmt = $this->getConnection()->prepare($sql);
    
        if (!empty($params)) {
            $paramTypes = implode("", $params);
            $stmt->bind_param($paramTypes, ...$values);
        }
    
        $stmt->execute();
        $count = $stmt->get_result()->fetch_row()[0];
    
        if ($count > 0) {
            // Record already exists
            return false;
        } else {
            // OK to insert
            return true;
        }
    }
    
}

?>