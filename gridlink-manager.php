<?php
### Check Whether User Can Manage Polls
if(!current_user_can('manage_polls')) {
    die('Access Denied');
}
?>
<h1>Add a new Gridlink</h1>
<form action='POST'>
  <input type='text' name='title' placeholder='Titel des Gridlinks'/>
  <?php submit_button('Speichern') ?>
</form>
