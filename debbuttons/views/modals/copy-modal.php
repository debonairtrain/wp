
  <!-- copy modal -->
  <?php
  $id = ($id) ? $id : $this->view->button_id;   // on the list, there are many ID's.
  ?>
  <div class='maxmodal-data' id='copy-modal-<?php echo $id ?>' data-load='window.maxFoundry.maxadmin.checkCopyModal'>
    <span class='title'><?php _e("Copy this button","debbuttons"); ?></span>
    <span class="content">

        <div class='copy-warning'>
        <h3><?php _e('You probably don\'t want to copy your button!', 'debbuttons'); ?></h3>
        <p><?php _e( sprintf("Changing %sText%s and %sURL%s can be done with the same button. %s This will save you time in the near future", "<b>","</b>","<b>","</b>","<br>"),'debbuttons'); ?> </p>

        <p class="example">

        <strong><?php _e("Add the same button with different link","debbuttons");  ?></strong><br>
          &nbsp; [debbutton id="<?php echo $id ?>" url="http://yoururl"]
        </p>

        <p class="example"><strong><?php _e("Use the same button but change the text","debbuttons"); ?> </strong><br />
          &nbsp; [debbutton id="<?php echo $id ?>" text="yourtext"]
        </p>

        <p class="example"><strong><?php _e("Both","debbuttons"); ?> </strong><br />
          &nbsp; [debbutton id="<?php echo $id ?>" text="yourtext" url="http://yoururl"]
        </p>

        <p class="example"><strong><?php _e('All Options', 'debbuttons'); ?></strong><br />
          &nbsp; [debbutton id="<?php echo $id ?>" text="yourtext" url="http://yoururl" linktitle="tooltip" window="new" nofollow="true"] </p>
        </div>


    <div class='mb-message mb-notice copy-notice hidden'><p><?php _e('Your button has not been saved. Any changes will be lost!','debbuttons'); ?></p>
    </div>
    <p><?php _e("Do you want to copy this button to a new button?","debbuttons"); ?></p>
    </span>
    <span class="controls">
    <button type="button" class='button-primary' data-buttonaction='copy' data-buttonid='<?php echo $id ?>'>
    <?php _e('Copy','debbuttons'); ?></button>

    <a class='button modal_close'><?php _e("Cancel",'debbuttons'); ?></a>
    </span>
  </div>
