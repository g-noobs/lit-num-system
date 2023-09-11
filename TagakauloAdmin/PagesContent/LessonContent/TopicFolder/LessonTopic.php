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
    <h4 id="topic-name"> Add a new topic for lesson:</h4>
</div>

<div class="container">
    <form class="form-horizontal">
        <div class="form-group row">
            <div class="col-sm-3">
                <label for="topic_name" class="control-label">Topic:</label>
                <input type="text" name="topic_name" id="topic_name" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-5">
                <label for="topic_desc" class="control-label">Description:</label>
                <textarea name="topic_desc" id="topic_desc" cols="60" rows="5" class="form-control"
                    style="resize: none;"></textarea>
            </div>
        </div>
    </form>
</div>