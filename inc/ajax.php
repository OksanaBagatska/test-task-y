<?php

add_action( 'wp_ajax_subscribe', 'subscribe_process_function' );
add_action( 'wp_ajax_nopriv_subscribe', 'subscribe_process_function' );

function subscribe_process_function() {

	if ( ! isset( $_POST['email'] ) ) {
		wp_send_json_error( array( 'message' => 'Email not provided.' ) );
	}

	$email = sanitize_email( $_POST['email'] );

	if ( empty( $email ) ) {
		wp_send_json_error( array( 'message' => 'Invalid email address.' ) );
	}

	global $wpdb;
	$table_name = $wpdb->prefix . 'subscribers';

	$existing_email = $wpdb->get_var( $wpdb->prepare( "SELECT email FROM $table_name WHERE email = %s", $email ) );
	if ( $existing_email ) {
		wp_send_json_error( array( 'message' => 'Email already subscribed.' ) );
	}

	$wpdb->insert( $table_name, array( 'email' => $email ) );

	wp_send_json_success( array( 'message' => 'Subscription successful!' ) );
}
