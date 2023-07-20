<?php 
include_once("Connection.php");
class TableAreaClass extends Connection{
    public $conn; 
    function __construct(){
        parent :: __construct();
    }

    function tableArea($sql){
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row["status_id"] == 0){
                    $status = "<b><span class='text-danger'>Inactive</b></span>";
                }
                else{
                    $status = "<b><span class='text-success'>Active</b></span>";
                }
                
                echo "<tr>";
                echo "<td><a href='#'><span class='glyphicon glyphicon-info-sign' style = 'padding-left: 10px;'></span></a></td>";

                echo "<td>".$row['area_id']."</td>";
                echo "<td>".$row['area_name']."</td>";
                echo "<td>".$row['area_address']."</td>";
                echo "<td>". $status ."</td>";

                echo "<td>";
                echo "<a href='#' class='edit' data-toggle='modal' data-target='#archive-area' style='margin-right:10px; color:#f0ad4e'><span class='glyphicon glyphicon-edit' ></span> Edit Area</a>";
                
                echo "</td>";
                
                echo "</tr>";
            }
        }
    }
}
?>