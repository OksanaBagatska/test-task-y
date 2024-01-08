<?php

function create_subscribers_table() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'subscribers';

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        email varchar(100) NOT NULL,
        PRIMARY KEY  (id),
        UNIQUE KEY email (email)
    ) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

add_action( 'after_switch_theme', 'create_subscribers_table' );

add_action( 'admin_menu', 'subscribers_menu' );

function subscribers_menu() {
	add_menu_page( 'Subscribers', 'Subscribers', 'manage_options', 'subscribers', 'subscribers_page' );
}

function subscribers_page() {
	$subscribers = get_subscribers();
	?>

	<div class="wrap">
		<h1>Subscribers</h1>

		<?php if ( ! $subscribers ): ?>
			<p>No subscribers found.</p>
		<?php else: ?>
			<table class="wp-list-table widefat fixed striped">
				<thead>
				<tr>
					<th>Email</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ( $subscribers as $subscriber ): ?>
					<tr>
						<td><?php echo esc_html( $subscriber->email ); ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div>

	<?php
}


function get_subscribers() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'subscribers';

	return $wpdb->get_results( "SELECT * FROM $table_name" );
}
