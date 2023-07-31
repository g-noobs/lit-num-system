<?php
include_once("Connection.php");
class AddDeleteClass extends Connection{
    public $conn; 
    public $message = "";
    public $class = "";
    function __construct(){
        parent :: __construct();
    }

    function addManyData($sql, $header){
        $result = $this->conn->multi_query($sql);
            if($result=== TRUE){
                $this->message = "Data updated successfully.";
                $this->class = "success";
            }
            else{
                $this->message = "Error inserting data ".$this->conn->error;
                $this->class = "error";
            }
            header("$header");
            exit();
    }

    function addMany($sql){
        $result = $this->conn->multi_query($sql);
            if($result=== TRUE){
                $this->message = "Data updated successfully.";
                $this->class = "success";
            }
            else{
                $this->message = "Error inserting data ".$this->conn->error;
                $this->class = "error";
            }
            header("Location: ../../pages/user.php");
            exit();
    }
    function addArea($sql){
        $result = $this->conn->query($sql);
        if($result=== TRUE){
            $this->message = "Data updated successfully.";
            $this->class = "success";
        }
        else{
            $this->message = "Error inserting data ".$this->conn->error;
            $this->class = "error";
        }
        header("Location: ../../pages/area.php");
        exit();
    }

    function addData($sql){
        $result = $this->conn->query($sql);
        if($result=== TRUE){
            $this->message = "Data updated successfully.";
            $this->class = "success";
        }
        else{
            $this->message = "Error inserting data ".$this->conn->error;
            $this->class = "error";
        }
        header("Location: ../../pages/user.php");
        exit();
    }
    function removeData($sql){
        $result = $this->conn->query($sql);
        if($result === TRUE){
            $this->message = "Data Removed Successfully!";
            $this->class = "success";
        }
        else{
            $this->message = "Error removing data ".$this->conn->error;
            $this->class = "error";
            
        }
        header("Location: ../../pages/user.php");
        exit();
    }

    function updateData($sql){
        $result = $this->conn->query($sql);
        if($result === TRUE){
            $this->message = "Edited Successfully!";
            $this->class = "success";
        }
        else{
            $this->message = "Error updating data ".$this->conn->error;
            $this->class = "error";
        }
        header("Location: ../../pages/user.php");
        exit();
    }

    function addLesson($sql){
        $result = $this->conn->multi_query($sql);
        if($result=== TRUE){
            $this->message = "Data updated successfully.";
            $this->class = "success";
        }
        else{
            $this->message = "Error inserting data ".$this->conn->error;
            $this->class = "error";
        }
        header("Location: ../../pages/lesson.php");
        exit();
    }
    function updateCreds($sql){
        $result = $this->conn->query($sql);
        if($result === TRUE){
            $this->message = "Edited Successfully!";
            $this->class = "success";
        }
        else{
            $this->message = "Error updating data ".$this->conn->error;
            $this->class = "error";
        }
    }

    function updateAdmin($sql){
        $result = $this->conn->query($sql);
        if($result === TRUE){
            $this->message = "Edited Successfully!";
            $this->class = "success";
        }
        else{
            $this->message = "Error updating data ".$this->conn->error;
            $this->class = "error";
        }
        header("Location: ../pages/profile.php");
        exit();
    }
    

}
?>