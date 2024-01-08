<?php

add_action( 'wp_enqueue_scripts', function () {
 	wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/dist/js/scripts.js', array('jquery'), null, true );
	wp_localize_script('app',
		'ajax_object',
		array('ajax_url' => admin_url('admin-ajax.php')));

 	wp_enqueue_style( 'app-css', get_template_directory_uri() . '/assets/dist/css/styles.min.css', array(), null );
} );
