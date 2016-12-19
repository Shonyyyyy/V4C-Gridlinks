<?php
### Check Whether User Can Manage Polls
if(!current_user_can('manage_polls')) {
    die('Access Denied');
}

$page_select_args = $args = array(
    'depth'                 => 2,
    'child_of'              => 0,
    'selected'              => 0,
    'echo'                  => 1,
    'name'                  => 'link',
    'id'                    => 'page-link', // string
    'class'                 => null, // string
    'show_option_none'      => null, // string
    'show_option_no_change' => null, // string
    'option_none_value'     => null, // string
);

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
  <label for='grid-title'>Title: </label>
  <input id='grid-title' type='text' name='title' placeholder='Titel des Gridlinks'/>
  <br />
  <label for='gridtitle'>Page Link:</label>
  <?php wp_dropdown_pages( $args ); ?>
  <?php submit_button('Speichern') ?>
</form>
