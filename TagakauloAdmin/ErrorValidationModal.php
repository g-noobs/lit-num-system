<?php 
// check for errors in session
if(!empty($_SESSION['errors'])) {

  // display modal
  echo '<div id="errorModal" class="modal fade show" tabindex="-1" role="dialog">';
  echo '<div class="modal-dialog" role="document">';

  echo '<div class="modal-content">';
  echo '<div class="modal-header">';
  echo '<h5 class="modal-title">Errors:</h5>';
  echo '</div>';

  echo '<div class="modal-body">';
  echo '<ul>';

  // loop through errors and display them
  foreach($_SESSION['errors'] as $error){
    echo '<li>'.$error.'</li>';
  }

  echo '</ul>';
  echo '</div>';

  echo '</div>';
  echo '</div>';
  echo '</div>';

  // clear errors
  unset($_SESSION['errors']);

}
?>
