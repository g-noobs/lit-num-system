<?php 
include_once("Connection.php");
class SchoolYearClass extends Connection{
    function __construct(){
        parent :: __construct();
    }

    function displaySyTable(){
        $sql = "SELECT * FROM tbl_schoolyear;";
        $result = $this->getConnection()->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){

                if($row["sy_status"] == 1){
                    $status = "Active";
                    $statusColor = "text-success";
                }
                else{
                    $status = "Inactive";
                    $statusColor = "text-danger";
                }
                echo "<tr>";

                echo "<td>".$row["sy_id"]. "</td>";
                echo "<td>".$row["sy_name"]. "</td>";
                echo "<td class='".$statusColor."'><b>" .$status. "</b></td>";

                echo "<td><a href='#' type='button' id='editBtn-".$row['sy_id']."' data-toggle='modal' data-target='#editModal' style='margin-right:10px; color: blue;'><span class='glyphicon glyphicon-edit' ></span></a></td>";
                
                echo "<td><a href='#' type='button' id='archiveBtn-".$row['sy_id']."' data-toggle='modal' data-target='#archiveModal' style='color:red';> <span class='glyphicon glyphicon-trash'></span></a></td>";
                
                echo "</tr>";

            }
        }
    }
    function validateColumn($table, $column, $value) {        
        // Check if record with same name already exists
        $sql = "SELECT COUNT(*) FROM $table WHERE UPPER($column) = UPPER(?)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param("s", $value);  
        $stmt->execute();
        $count = $stmt->get_result()->fetch_row()[0];

        if($count > 0) {
        // Record already exists 
        return false;
        } else {
        // OK to insert
        return true; 
        }
      }
    
}