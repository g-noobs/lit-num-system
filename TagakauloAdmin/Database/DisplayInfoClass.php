<?php 
include_once("Connection.php");
class DisplayInfoClass extends Connection{
    public $conn; 
    function __construct(){
        parent :: __construct();
    }
    function displayAdminProfile($sql){
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){



                echo '<div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text"  name="first_name" class="form-control" id="exampleInputEmail1" placeholder="First Name" value="'.$row['first_name'].'">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text"  name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Last Name" value="'.$row['last_name'] .'">
                    </div>
                    <div class="form-group">
                        <label for="gender">Select Gender:</label>
                        <select class="form-control" name="gender" value="'.$row['gender'].' placeholder="'.$row['gender'].'">
                            <option>MALE</option>
                            <option>FEMALE</option>
                            <option>None</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Enter Email Address:</label>
                        <input type="email"  name="email" class="form-control" id="exampleInputPassword1" placeholder="Email" value="'.$row['email'].'">
                    </div>
                    <div class="form-group">
                        <label for="date">Select Birthday:</label>
                        <input type="date"  name="date" class="form-control" id="exampleInputPassword1" placeholder="Birthdate" value="'.$row['birthdate'].'">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text"  name="username" class="form-control" id="exampleInputEmail1" placeholder="Username" value="'.$row['username'].'">
                    </div>
                    <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="text"  name="password" class="form-control" id="exampleInputEmail1" placeholder="Passoword" value="'.$row['password'].'">
                </div>
                    ';
            }
        }
        
    }

    function displayUserName($sql){
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo $row['first_name']." " .$row['last_name'];
            }
        }

    }

}