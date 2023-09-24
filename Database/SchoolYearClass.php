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
                echo "<td><input type='radio' name='radioGroup' value='".$row["sy_id"]."'></td>";

                echo "<td>".$row["sy_id"]. "</td>";
                echo "<td>".$row["sy_start"]."-".$row["sy_end"]."</td>";
                echo "<td class='".$statusColor."'><b>" .$status. "</b></td>";

                echo "<td><a href='#' type='button' id='editBtn-".$row['sy_id']."' data-toggle='modal' data-target='#editModal' style='margin-right:10px; color: blue;'><span class='glyphicon glyphicon-edit' ></span></a></td>";
                
                echo "<td><a href='#' type='button' id='archiveBtn-".$row['sy_id']."' data-toggle='modal' data-target='#archiveModal' style='color:red';> <span class='glyphicon glyphicon-trash'></span></a></td>";
                
                echo "</tr>";

            }
        }
    }
}
?>