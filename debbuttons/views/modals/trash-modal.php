<!-- trash modal -->
<?php
$id = ($id) ? $id : $this->view->button_id;   // on the list, there are many ID's.
?>
<div class="maxmodal-data" id="trash-modal-<?php echo $id ?>">
  <span class='title'><?php _e("Trash button","debbuttons"); ?></span>
  <span class="content"><p><?php _e("The button will be moved to trash. It can be recovered from the trash bin later. Continue?", "debbuttons"); ?></p></span>
    <div class='controls'>
      <button type="button" class='button-primary' data-buttonaction='trash' data-buttonid='<?php echo $id ?>'>
      <?php _e('Yes','debbuttons'); ?></button>

      <a class="modal_close button-primary"><?php _e("No", "debbuttons"); ?></a>

    </div>
</div>
