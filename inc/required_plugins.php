<?php

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'backin88_register_required_plugins' );


function backin88_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'         	=> 'Advanced Custom Fields Pro', 
			'slug'         	=> 'advanced-custom-fields-pro', 
			'source'       	=> get_stylesheet_directory() . '/inc/plugins/advanced-custom-fields-pro.zip',
			'required'           => true,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 */
	$config = array(
		'id'           => 'backin88',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}