<?php 
include_once("Connection.php");
class TableDisplayClass extends Connection{
    public $conn; 
    function __construct(){
        parent :: __construct();
    }

    function classTable($sql){
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){

                if($row['class_status'] == 1){
                    $status = '<p class="text-success">Active</p>';
                }
                else{
                    $status = '<p class="text-danger">Inactive</p>';
                }
                echo "<tr>";
                
                echo "<td style='white-space: nowrap;'>";
                echo "<a href='#' class='edit text-primary' data-toggle='modal' data-target='#edit-class'><span class='glyphicon glyphicon-edit'></span></a>";
                echo "</td>";
                
                echo "<td>".$row['class_id']."</td>";
                echo "<td>".$row['class_name']."</td>";
                echo "<td><b>".$status."</b></td>";

                echo "<td>";
                echo " <a href='#' class='archive text-danger' data-toggle='modal' data-target='#archive-class'> <span class='glyphicon glyphicon-trash'></span></a>";
                echo "</td>";
                
                echo "</tr>";
            }
        }
    }
}
?>