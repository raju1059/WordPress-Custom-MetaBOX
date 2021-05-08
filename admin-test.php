<?php

/**
* Plugin Name: RA Custom Metabox API
* Plugin URI: http://wordpress.org
* Description: WordPress Settings API 
* Author: Raju Ahmed
* Author URI: http://wordpress.org
* Version: 0.1
*/

require_once dirname( __FILE__ ) . '/jmra-pure-meta.php';
		
/**
* WordPress Custom Metabox API demo class
*
* @author Raju Ahmed
*/
if ( !class_exists('RA_CustomMetabox_API_Test' ) ):
class RA_CustomMetabox_API_Test {
		
	protected $metabox_api;

	public function __construct() {
		
		add_action( 'init', array($this, 'jmra_post') );
		add_action( 'init', array($this, 'jmra_student_tax') );
		add_action( 'init', array($this, 'jmra_student_subject_tax') );
		add_action( 'init', array($this, 'jmra_taxono_resident') );
		add_action( 'add_meta_boxes', array($this, 'jmra_metabox_page') );
	}
	/**
	 * Register custom post for student
	 *
	 * @return array to the register_post_type function
	 */
	function jmra_post() {
	  $labels = array(
		'name'                => __( 'Student', THEMENAME ),
		'singular_name'       => __( 'Student', THEMENAME ),
		'add_new'             => __( 'Add New', THEMENAME ),
		'add_new_item'        => __( 'Add New Student Enter ID', THEMENAME ),
		'edit_item'           => __( 'Edit Student ID ', THEMENAME ),
		'new_item'            => __( 'New Student', THEMENAME ),
		'all_items'           => __( 'All Students', THEMENAME ),
		'view_item'           => __( 'View Student', THEMENAME ),
		'search_items'        => __( 'Search Students', THEMENAME ),
		'not_found'           => __( 'No Student found', THEMENAME ),
		'not_found_in_trash'  => __( 'No Student found in Trash', THEMENAME ),
		'menu_name'           => __( 'Student', THEMENAME ),
	  );

	  $supports = array( 'title','thumbnail');
	  //$supports = array( 'title');

	  $slug = get_theme_mod( 'student-jmra' );
	  $slug = ( empty( $slug ) ) ? 'student' : $slug;

	  $args = array(
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => array( 'slug' => $slug ),
		'capability_type'     => 'post',
		'has_archive'         => true,
		'hierarchical'        => false,
		'menu_position'       => 1,
		'supports'            => $supports,
	  );

	  register_post_type( 'student', $args );

	}

	/**
	 * Register custom taxonomy for class
	 *
	 * @return array to the register_taxonomy function
	 */
	function jmra_student_tax() {

	  $labels = array(
		'name'                => __( 'Class', THEMENAME ),
		'singular_name'       => __( 'Class', THEMENAME ),
		'add_items'             => __( 'Add New', THEMENAME ),
		'add_new_item'        => __( 'Add New Class', THEMENAME ),
		'edit_item'           => __( 'Edit Class ', THEMENAME ),
		'new_item'            => __( 'New Class', THEMENAME ),
		'all_items'           => __( 'All Class', THEMENAME ),
		'view_item'           => __( 'View Class', THEMENAME ),
		'parent_item'        => __( 'Parent Class', THEMENAME ),
		'search_items'        => __( 'Search Class', THEMENAME ),
		'not_found'           => __( 'No Class found', THEMENAME ),
		'not_found_in_trash'  => __( 'No Class found in Trash', THEMENAME ),
		'menu_name'           => __( 'Class Cat', THEMENAME ),
	  );

	  $slug = get_theme_mod( 'Class-tax' );
	  $slug = ( empty( $slug ) ) ? 'Class-tax' : $slug;

	  $args = array(
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => array( 'slug' => $slug ),
		'capability_type'     => 'post',
		'has_archive'         => true,
		'hierarchical'        => true,
		'menu_position'       => null,    
	  );

	  register_taxonomy( 'student_taxono','student', $args );

	}

	/**
	 * Register custom taxonomy for subject
	 *
	 * @return array to the register_taxonomy function
	 */
	function jmra_student_subject_tax() {

	  $labels = array(
		'name'                => __( 'Subjects', THEMENAME ),
		'singular_name'       => __( 'Subject', THEMENAME ),
		'add_items'             => __( 'Add New', THEMENAME ),
		'add_new_item'        => __( 'Add New Subject', THEMENAME ),
		'edit_item'           => __( 'Edit Subject ', THEMENAME ),
		'new_item'            => __( 'New Subject', THEMENAME ),
		'all_items'           => __( 'All Subject', THEMENAME ),
		'view_item'           => __( 'View Subject', THEMENAME ),
		'parent_item'        => __( 'Parent Subject', THEMENAME ),
		'search_items'        => __( 'Search Subject', THEMENAME ),
		'not_found'           => __( 'No Subject found', THEMENAME ),
		'not_found_in_trash'  => __( 'No Subject found in Trash', THEMENAME ),
		'menu_name'           => __( 'Subject Cat', THEMENAME ),
	  );

	  $slug = get_theme_mod( 'subject-tax' );
	  $slug = ( empty( $slug ) ) ? 'subject-tax' : $slug;

	  $args = array(
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => array( 'slug' => $slug ),
		'capability_type'     => 'post',
		'has_archive'         => true,
		'hierarchical'        => true,
		'menu_position'       => null,    
	  );

	  register_taxonomy( 'student_subject_taxono','student', $args );

	}
	/**
	 * Register custom taxonomy for resident
	 *
	 * @return array to the register_taxonomy function
	 */
	function jmra_taxono_resident() {

	  $labels = array(
		'name'                => __( 'Resident or non resident', THEMENAME ),
		'singular_name'       => __( 'Resident', THEMENAME ),
		'add_items'             => __( 'Add New', THEMENAME ),
		'add_new_item'        => __( 'Add New Resident', THEMENAME ),
		'edit_item'           => __( 'Edit Resident ', THEMENAME ),
		'new_item'            => __( 'New Resident', THEMENAME ),
		'all_items'           => __( 'All Resident', THEMENAME ),
		'view_item'           => __( 'View Resident', THEMENAME ),
		'parent_item'        => __( 'Parent Resident', THEMENAME ),
		'search_items'        => __( 'Search Resident', THEMENAME ),
		'not_found'           => __( 'No Resident found', THEMENAME ),
		'not_found_in_trash'  => __( 'No Resident found in Trash', THEMENAME ),
		'menu_name'           => __( 'Resident Cat', THEMENAME ),
	  );

	  $slug = get_theme_mod( 'resident-tax' );
	  $slug = ( empty( $slug ) ) ? 'resident-tax' : $slug;

	  $args = array(
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => array( 'slug' => $slug ),
		'capability_type'     => 'post',
		'has_archive'         => true,
		'hierarchical'        => true,
		'menu_position'       => null,    
	  );

	  register_taxonomy( 'student_resident','student', $args );

	}

	/**
	 * Return all the metaboxs field
	 *
	 * @return array metaboxs fields
	 */
	function jmra_metabox_page(){

	  $meta_box = array(
		'id' => 'jmra-metabox-page',
		'title' => __( 'Student Information', 'jmra' ),
		'description' => __( 'Modon', 'jmra' ),
		'page' => 'student',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('First Name', 'jmra'),
				'desc' => __('', 'jmra'),
				'id' => '_jmra_first_name',
				'type' => 'text',
				'std' => 'Raju'
			),
			array(
				'name' => __('Last Name', 'jmra'),
				'desc' => __('', 'jmra'),
				'id' => '_jmra_last_name',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => __('Session', 'jmra'),
				'desc' => __('', 'jmra'),
				'id' => '_jmra_session',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => __('Father Name', 'jmra'),
				'desc' => __('', 'jmra'),
				'id' => '_jmra_fname',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => __('Mother Name', 'jmra'),
				'desc' => __('', 'jmra'),
				'id' => '_jmra_mname',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => __('Mobile', 'jmra'),
				'desc' => __('', 'jmra'),
				'id' => '_jmra_mobile',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => __('Address', 'jmra'),
				'desc' => __('', 'jmra'),
				'id' => '_jmra_address',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => __('Student Picture', 'stag'),
				'desc' => __('', 'stag'),
				'id' => '_stag_student_images',
				'type' => 'images',
				'std' => __('Upload Student Picture', 'stag')
			),
		  )
		);
		
		jmra_add_meta_box($meta_box);
	}

}
endif;

$settings = new RA_CustomMetabox_API_Test();