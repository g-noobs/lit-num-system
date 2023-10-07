<?php 
include_once "Connection.php";

class DisplaySubject extends Connection{
    function __construct(){
        parent :: __construct();
    }

    function displaySubjectList(){
        $sql = "SELECT * FROM tbl_subject;";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row["subj_status"] == 1){
                    $status = "<b><span class='text-success'>Active</b></span>";
                }
                else{
                    $status = "<b><span class='text-danger'>Inactive</b></span>";
                }
                echo "<tr>";
                echo "<td>".$row["subj_id"]."</td>";
                echo "<td>".$row["subj_name"]."</td>";
                echo "<td>".$row["subj_description"]."</td>";
                echo "<td><b>".$status."</b></td>";

                echo "<td><a href='#' type='button' id='editBtn-".$row['subj_id']."' data-toggle='modal' data-target='#editSubjModal' style='margin-right:10px; color: blue;'><span class='glyphicon glyphicon-edit' ></span></a></td>";
                
                echo "<td><a href='#' type='button' id='archiveBtn-".$row['subj_id']."' data-toggle='modal' data-target='#archiveSubjModal' style='color:red';> <span class='glyphicon glyphicon-trash'></span></a></td>";
                echo "</tr>";
            }
        }
    }
}
?>