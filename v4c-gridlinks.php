<?php
/*
Plugin Name: V4C-Gridlinks
Plugin URI:
Description: Adds a Gridlink with links to other internal pages
Version: 1.0.0
Author: Jonas Moeller
Author URI:
Text Domain: v4c-gridlinks
*/

### Version
define( 'VISIONS_GRIDLINKS_VERSION', '1.0.0' );

add_action( 'admin_menu', 'v4c_gridlinks_menu' );

function v4c_gridlinks_menu() {
  add_menu_page( 'V4C-Gridlinks', 'V4C-Gridlinks', 'manage_v4c_gridlinks', 'v4c-gridlinks', 'manage_gridlinks' );
}

function manage_gridlinks() {
  if ( !current_user_can( 'manage_v4c_gridlinks' ) ) {
    wp_die( __( 'You are not allowed to manage V4C Gridlinks' ) );
  }
  echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}
?>
