<!-- Error pop up modal -->
<div id="errorModal" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b><?= urldecode($_GET['msg']) ?></b></h4>
            </div>

            <div class="modal-body">
                <p>Please try again!</p>
            </div>

        </div>
    </div>
</div>

<!-- Error pop up modal -->
<div id="validationError" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Incorrect Format</b></h4>
            </div>

            <div class="modal-body">
                <p>Please try again!</p>
            </div>

        </div>
    </div>
</div>