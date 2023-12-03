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
                echo "<td><input type='checkbox' class='checkbox' name='selected[]' value='" . $row['category_id'] ."'></td>";
                echo "<td><a href='#' class='edit' data-id='" . $row['category_id'] ."' style='color:#f0ad4e'><span class='glyphicon glyphicon-edit' ></span></a></td>";

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