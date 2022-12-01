<!-- delete modal -->
<?php
$id = ($id) ? $id : $this->view->button_id;   // on the list, there are many ID's.
?>
<div class="maxmodal-data" id="delete-modal-<?php echo $id ?>">
  <span class='title'><?php _e("Removing button","debbuttons"); ?></span>
  <span class="content"><p><?php _e("You are about to permanently remove this button. Are you sure?", "debbuttons"); ?></p></span>
    <div class='controls'>
      <button type="button" class='button-primary' data-buttonaction='delete' data-buttonid='<?php echo $id ?>'>
      <?php _e('Yes','debbuttons'); ?></button>

      <a class="modal_close button-primary"><?php _e("No", "debbuttons"); ?></a>

    </div>
</div>
