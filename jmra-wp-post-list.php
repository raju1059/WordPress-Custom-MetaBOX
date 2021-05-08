<?php
//include( ABSPATH . 'wp-admin/includes/class-wp-posts-list-table.php' );
	if ( !class_exists('JMRA_WP_List_Table' ) ):
	class JMRA_WP_List_Table{
		
		private $settings_api;
		
		function __construct() {
			//$this->settings_api = new WP_Posts_List_Table;

		}

	}
	endif;
	$setting = new JMRA_WP_List_Table();