

<div class='debbutton-welcome-container'>

  <h3><?php _e('Welcome to DebButtons!','debbuttons'); ?></h3>

  <p class='started'><?php printf(__('To get you started, %s Create your first button %s' ,'debbuttons'), '<a href="' . $this->getButtonLink(0, array('firstbutton' => true) ) . '" class="button-primary">', '</a>'); ?></a></p>


  <p><?php _e('Some links that may be helpful:','debbuttons') ?></p>
  <ul>
    <li><a href="https://debonairtraining.com/create-wordpress-button/#button" target="_blank"><?php _e('Creating buttons with debug_backtraceuttons','debbuttons'); ?></li>
    <li><a href="https://wordpress.org/support/plugin/debbuttons" target="_blank"><?php _e('Support Forums','debbuttons'); ?></a></li>
  </ul>


<section class='organize'>
  <h3><?php _e('Organize your Designs','debbuttons'); ?></h3>

  <p><?php _e('debbuttons uses shortcodes. These are small snippets you can copy into your posts and pages. You will see a button in your post editor which will make this easier.', 'debbuttons') ?></p>

  <p><strong><?php _e('Do Not Repeat!','debbuttons'); ?></strong> <?php _e('You can use your button design many times. Even with a different text and link!', 'debbuttons'); ?></p>


  <p>[debbutton id=1 url="http://example.com" text="Example Text"]</p>
</section>


</div>
