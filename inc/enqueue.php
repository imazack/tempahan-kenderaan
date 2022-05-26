<?php
function pendaftarankenderaan_load_scripts(){
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/vendor/bootstrap.min.css', array(), '4.0.0', 'all' );
}

add_action('wp_enqueue_scripts', 'pendaftarankenderaan_load_scripts');
