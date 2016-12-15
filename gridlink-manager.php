<?php
### Check Whether User Can Manage Polls
if(!current_user_can('manage_polls')) {
    die('Access Denied');
}

if(isset($_POST['title'])) {
  $wpdb->grid_link = $wpdb->prefix.'grid_link';
  $title = strip_tags($_POST['title'], '');
  $link = strip_tags($_POST['link'], '');

  $wpdb->insert(
    $wpdb->grid_link,
    array(
      'title' => $title,
      'link' => $link
    )
  );
}
?>
<h1>Add a new Gridlink</h1>
<form method='POST' action="<?php echo admin_url('admin.php?page='.plugin_basename(__FILE__)); ?>">
  <input type='text' name='title' placeholder='Titel des Gridlinks'/>
  <input type='text' name='link' placeholder='Seite auf die gelinkt wird'/>
  <?php submit_button('Speichern') ?>
</form>
