<?php 
include_once("Connection.php");

class CommonValidationClass extends Connection{
    function __construct(){
        parent :: __construct();
    }
    function validateColumns($table, $columns, $values) {
        if (!is_array($columns)) {
            $columns = [$columns];
        }
        
        if (!is_array($values)) {
            $values = [$values];
        }
    
        if (count($columns) !== count($values)) {
            throw new Exception("Columns and values must have the same count.");
        }
    
        $conditions = [];
        $params = [];
    
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