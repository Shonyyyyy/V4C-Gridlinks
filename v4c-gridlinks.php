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

add_action( 'admin_menu', 'gridlink_menu' );

function gridlink_menu() {
    add_menu_page( __( 'Gridlinks', 'v4c-gridlinks' ), __( 'Gridlinks', 'v4c-gridlinks' ), 'manage_polls', 'v4c-gridlinks/gridlink-manager.php' );
}
?>
