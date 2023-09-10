<br>
<style>
a {
    color: inherit;
    /* This makes links inherit their color from their parent elements */
    text-decoration: none;
    /* This removes the underline */
}
</style>
<div class="container-fluid">
    <a href="#" type="button" id="back-table"><i class="glyphicon glyphicon-chevron-left"></i></a>
    <h4> Add a new topic for lesson:</h4>
</div>

<div class="container-fluid">

    <ul class="nav nav-tabs">
        <li class="panel-btn active" data-panelid="panel-pdf"><a href="#">PDF</a></li>
        <li class="panel-btn" data-panelid="panel-image"><a href="#">Image</a></li>
        <li class="panel-btn" data-panelid="panel-audio"><a href="#">Audio</a></li>
        <li class="panel-btn" data-panelid="panel-video"><a href="#">Video</a></li>
    </ul>

    <div id="panel-pdf" class="panel panel-default">
        <div class="panel-body">Upload PDF
        </div>
    </div>
    <div id="panel-image" class="panel panel-default">
        <div class="panel-body">
            <h3><strong>Upload Image</strong></h3>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label for="fileToUpload"></label>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload File" name="submit">
        </div>
    </div>
    <div id="panel-audio" class="panel panel-default">
        <div class="panel-body">Upload Audio
        </div>
    </div>
    <div id="panel-video" class="panel panel-default">
        <div class="panel-body">Upload Video
        </div>
    </div>
</div>