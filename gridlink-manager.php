<?php
### Check Whether User Can Manage Polls
if(!current_user_can('manage_polls')) {
  die('Access Denied');
}

if ( ! function_exists( 'wp_handle_upload' ) ) {
  require_once( ABSPATH . 'wp-admin/includes/file.php' );
}

$page_select_args = $args = array(
  'depth'                 => 2,
  'child_of'              => 0,
  'selected'              => 0,
  'echo'                  => 1,
  'name'                  => 'grid_link',
  'id'                    => 'page-link', // string
  'class'                 => null, // string
  'show_option_none'      => null, // string
  'show_option_no_change' => null, // string
  'option_none_value'     => null, // string
);

if(isset($_POST['grid_title']) && isset($_POST['grid_link']) && isset($_POST['grid_logo'])) {
  $wpdb->grid_link = $wpdb->prefix.'grid_link';
  $title = strip_tags($_POST['grid_title'], '');
  $link = strip_tags($_POST['grid_link'], '');
  // $uploaded_file = $_FILE['grid_logo'];

  // $upload_overrides = array( 'test_form' => false );
  // $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

  // if($movefile && !isset( $movefile['error'])) {
  //   echo 'File was uploaded SWAG';
  //   var_dump( $movefile );
  // } else {
  //   echo $movefile['error'];
  // }

  $wpdb->insert(
    $wpdb->grid_link,
    array(
      'title' => $title,
      'link' => $link
    )
  );
}

if(isset($_POST['cat_title'])) {
  $wpdb->grid_cat = $wpdb->prefix.'grid_cat';
  $title = strip_tags($_POST['cat_title'], '');

  $wpdb->insert(
    $wpdb->grid_cat,
    array(
      'title' => $title
    )
  );
}

?>
<h1>Gridlinks verwalten</h1>
<hr />
<h2>Neuen Gridlink hinzuf&uuml;gen</h2>
<form method='POST' action="<?php echo admin_url('admin.php?page='.plugin_basename(__FILE__)); ?>" enctype="multipart/form-data">
  <label for='grid-title'>Titel: </label>
  <input id='grid-title' type='text' name='grid_title' placeholder='Titel des Gridlinks'/>
  <br />
  <label for='grid-title'>Seiten Link:</label>
  <?php wp_dropdown_pages( $args ); ?>
  <br />
  <label for='logo-input'>Logo:</label>
  <input type='file' name='grid_logo' id='logo-input' />
  <?php submit_button('Speichern') ?>
</form>
<hr />
<h2>Neue Kategorie hinzuf&uuml;gen</h2>
<form method='POST' action="<?php echo admin_url('admin.php?page='.plugin_basename(__FILE__)); ?>" enctype="multipart/form-data">
  <label for='category-title'>Titel: </label>
  <input id='category-title' type='text' name='cat_title' placeholder='Titel der Kategorie'/>
  <?php submit_button('Speichern') ?>
</form>
