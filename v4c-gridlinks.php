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


### Create Admin menu entry
add_action( 'admin_menu', 'gridlink_menu' );

### Create manage poll admin page
function gridlink_menu() {
    add_menu_page( __( 'Gridlinks', 'v4c-gridlinks' ), __( 'Gridlinks', 'v4c-gridlinks' ), 'manage_polls', 'v4c-gridlinks/gridlink-manager.php' );
}

function install_table() {
  ### Gridlink Table Names
  global $wpdb;
  $wpdb->grid_cat = $wpdb->prefix.'grid_cat';
  $wpdb->grid_link = $wpdb->prefix.'grid_link';

  $charset_collate = $wpdb->get_charset_collate();

  $create_table['cat'] = "CREATE TABLE $wpdb->grid_cat (".
                                  "cat_id int(10) NOT NULL auto_increment,".
                                  "title varchar(200) character set utf8 NOT NULL default '',".
                                  "cat_timestamp varchar(20) NOT NULL default '',".
                                  "PRIMARY KEY (cat_id)) $charset_collate;";

  $create_table['link'] = "CREATE TABLE $wpdb->grid_link (".
                                  "link_id int(10) NOT NULL auto_increment,".
                                  "title varchar(200) character set utf8 NOT NULL default '',".
                                  "icon_path varchar(200) character set utf8 NOT NULL default '',".
                                  "link varchar(200) character set utf8 NOT NULL default '',".
                                  "link_timestamp varchar(20) NOT NULL default '',".
                                  "PRIMARY KEY (link_id)) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $create_table['cat'] );
  dbDelta( $create_table['link'] );
}

register_activation_hook( __FILE__, 'install_table' );
?>
