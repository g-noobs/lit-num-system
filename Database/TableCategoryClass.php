<?php 
include_once("Connection.php");
class TableCategoryClass extends Connection{
    public $conn; 
    function __construct(){
        parent :: __construct();
    }

    function tableCategory($sql){
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row["category_status"] == 0){
                    $status = "<b><span class='text-danger'>Inactive</b></span>";
                }
                else{
                    $status = "<b><span class='text-success'>Active</b></span>";
                }
                
                echo "<tr>";
                echo "<td>";
                echo "<a href='#' class='edit' data-toggle='modal' data-target='#archive-category' style='margin-right:10px; color:#f0ad4e'><span class='glyphicon glyphicon-edit' ></span></a>";
                
                echo "</td>";

                echo "<td>".$row['category_id']."</td>";
                echo "<td>".$row['category_name']."</td>";
                echo "<td>".$row['category_info']."</td>";
                echo "<td>". $status ."</td>";

                
                
                echo "</tr>";
            }
        }
    }
}
?>