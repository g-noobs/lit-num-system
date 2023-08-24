<br>
<div class="container">
    <a href="#" type="button" id="back-table"><i class="glyphicon glyphicon-chevron-left"></i></a>


    <div class="row">
        <h4> Add a new topic for lesson:
            <h3>
                <?php 
                $name = $_POST['name'];
                $id = $_POST['id'];
                echo $name . $id;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name = $_POST['name'];
                    $id = $_POST['id'];
                    
                    // Do something with the received data
                    
                    // Send a response back to the JavaScript code
                    echo "Data received successfully!";
                }
                else{
                    echo "No Data Received";
                }
                ?>


            </h3>

            <?php 
          
            
            include_once("../Database/LessonDisplayClass.php");
                $lessonName = new LessonDisplayClass();
       

                
            ?>
        </h4>

    </div>




    <div class="row">
        <div class="col-lg-8">
            <div class="btn-group btn-group-justified">
                <a href="#" type="button" class="btn btn-default" id="btn-pdf">PDF</a>
                <a href="#" type="button" class="btn btn-default" id="btn-img">Image</a>
                <a href="#" type="button" class="btn btn-default" id="btn-video">Video</a>
                <a href="#" type="button" class="btn btn-default" id="btn-other">Others. .</a>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>


</div>