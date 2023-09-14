<style>
a {
    color: none;
    /* This makes links inherit their color from their parent elements */
    text-decoration: none;
    /* This removes the underline */
}
</style>
<div id="Recent Topic"></div>


<form id="addTopic" enctype="multipart/form-data">
    <section class="container">
        <a href="#" type="button" id="back-table"><i class="glyphicon glyphicon-chevron-left"></i></a>
        <h4 id="topic-name"> Add a new topic for lesson:</h4>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="topic_name" class="control-label">Topic:</label>
                        <input type="text" name="topic_name" id="topic_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="topic_desc" class="control-label">Description:</label>
                        <textarea name="topic_desc" id="topic_desc" cols="60" rows="5" class="form-control"
                            style="resize: vertical;" required></textarea>
                    </div>
                </div>

                <div class="col-sm-6">
                <label for="file">Add Materials:</label>
                    <div class="row" id="addFile">
                        <div class="form-group">
                            <div class="col-sm-9" id="input-group-container">
                               
                                <div class="input-group">
                                    <input type="file" class="form-control" id="file" name="file[]" multiple required>
                                    <span class="input-group-btn">
                                        <a href="#" class="btn text-danger cancelFile" data-toggle="tooltip" title="Cancel"><i
                                                class="fa fa-remove"></i></a></a>
                                    </span>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" id="addMedia" type="button" data-toggle="tooltip" title="Add More Media"
                                class="text-success"><i class="fa fa-plus"></i></a>
                </div>



            </div>
            <button id="submit" class="btn btn-warning">Submit</button>
            <button id="reset-cancel" type="reset" class="btn btn-default">Cancel</button>
        </div>
    </section>
</form>