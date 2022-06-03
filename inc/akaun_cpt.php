<?php
/* @package Jombazar */
/*========================
  AKAUN CUSTOM POST TYPE
========================*/

/* Activate CPT */
$daftar = get_option ('activate_daftar');
if(@$daftar == 1){
	add_action('init', 'stk_pendaftaran_custom_post_type');
}

/* Register CPT */
function stk_pendaftaran_custom_post_type(){
	
	$singular	= __('Daftar');
	$plural	= __('Daftar');
	
	$labels = array (
		'name' 					=> $singular,
		'singular_name'			=> $singular,
		'add_new'					=>	__('Add ').$singular,
		'add_new_item'			=>	__('New ').$plural,
		'edit_item'				=> __('Edit ').$singular,
		'new_item'				=> __('New ').$singular,
		'view_item'				=> __('View ').$singular,
		'view_items'				=> __('View ').$plural,
		'search_items'			=> __('Search ').$plural,
		'not_found'				=> __('No ').$singular.__(' found'),
		'not_found_in_trash'		=> __('No ').$singular.__(' found in Trash'),
		/* 'parent_item_colon'	=> '', */
		'all_items'				=> __('All ').$plural,
		'archives'				=> $singular.__(' Archives'),
		'attributes'				=> $singular.__(' Attributes'),
		'insert_into_item'		=> __('Insert into ').$plural,
		'uploaded_to_this_item'	=> __('Uploaded to this ').$singular,
		/* 'featured_image'		=> $singular.__(' Image'), */
		/* 'set_featured_image'	=> __('Set ').$singular.__(' Image'), */
		/* 'remove_featured_image'=> __('Remove ').$singular.__(' Image'), */
		/* 'use_featured_image'	=> __('Use ').$singular.__(' Image'), */
		'menu_name'				=>	$plural,
		'filter_items_list'		=> __('Filter ').$plural.__(' list'),
		'items_list_navigation'	=> $plural.__(' list navigation'),
		'items_list'				=> $plural.__(' list'),
		'name_admin_bar'			=>	$singular,
	);
	
	$args = array(
		'labels'					=>	$labels,
		'description'        	=> __( 'This is Contact page.', 'bzbr001-contact' ),
		'public'					=>	false,
		'exclude_from_search'	=> true,
		'publicly_queryable'  	=> true,
		'show_ui'					=>	true,
		'show_in_nav_menus'   	=> true,
		'show_in_menu'			=>	true,
		'show_in_admin_bar'		=>	true,
		'menu_position'			=>	26,
		'menu_icon'				=> get_template_directory_uri().'/img/admin/message.png',
		/* 'rewrite'            	=> true, */
		'capability_type'		=>	'post',
		/* 'capabilities' 		=> array('create_posts' => 'do_not_allow',), // Prior to Wordpress 4.5, this was false */
		/* 'map_meta_cap' 		=> true,  */
		'hierarchical'			=>	false,
		'supports'				=>	array('title', 'editor'),
		'has_archive'         	=> false,
		/* 'rewrite' 				=> array(
											'with_front' => false,
											'slug'       => 'daftar'
											), */
		'query_var'           	=> true,
		'show_in_rest'			=> true,
	);
	
	register_post_type('stk-daftar', $args);
}

/* Set Column */
function stk_set_daftar_columns($columns){
	$newColumns = array(
		'cb'		=> '<input type="checkbox" />',
		'date'		=> __( 'Date' ),
		'email'	=> __( 'Email' ),
		'title'	=> __( 'Nombor Telefon' ),
		'nama'	=> __( 'Nama Penuh' ),
	);
	return $newColumns;
	
}
add_filter('manage_stk-daftar_posts_columns', 'stk_set_daftar_columns');

/* Display content in column */
function stk_daftar_custom_column($column, $post_id){
	switch($column){
		case 'nama' :
			$nama = get_post_meta($post_id, '_daftar_nama_value_key', true);
			echo get_the_excerpt();
			break;
		
		case 'email' :
			$email = get_post_meta($post_id, '_daftar_email_value_key', true);
			echo '<a href="mailto:'.$email.'">'.$email.'</a>';
			break;
		
	}
}
add_action('manage_stk-daftar_posts_columns', 'stk_daftar_custom_column', 10, 2);

/* Change title placeholder */
function stk_daftar_change_title_text( $title ){
     $screen = get_current_screen();
 
     if  ( 'stk-contact' == $screen->post_type ) {
          $title = __('Nombor Telefon');
     }
 
     return $title;
}
add_filter( 'enter_title_here', 'stk_daftar_change_title_text' );

/* Contact Meta Boxes */
function stk_daftar_add_meta_box(){
	add_meta_box('daftar_email', __('User Email'), 'stk_daftar_email_callback', 'stk-daftar', 'side', 'default');
}
add_action('add_meta_boxes', 'stk_daftar_add_meta_box');

function stk_daftar_email_callback($post){
	wp_nonce_field('stk_save_daftar_email_data', 'stk_daftar_email_meta_box_nonce');
	$value = get_post_meta($post->ID, '_daftar_email_value_key', true);
	echo __('<label for="stk_daftar_email_field">User Email Address</label>');
	echo '<input type="email" id="stk" name="stk_daftar_email_field" value="'.esc_attr($value).'" size="25" />';
}

/* Save Contact Meta Boxes */
function stk_save_daftar_email_data($post_id){
	if(! isset($_POST['stk_daftar_email_meta_box_nonce'])){
		return;
	}
	if(! wp_verify_nonce($_POST['stk_daftar_email_meta_box_nonce'], 'stk_save_daftar_email_data')) {
		return;
	}
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}
	if(! current_user_can('edit_post', $post_id)){
		return;
	}
	if(! isset($_POST['stk_daftar_email_field'])){
		return;
	}
	$my_data = sanitize_text_field($_POST['stk_daftar_email_field']);
	update_post_meta($post_id, '_daftar_email_value_key', $my_data);
}
add_action('save_post', 'stk_save_daftar_email_data');
