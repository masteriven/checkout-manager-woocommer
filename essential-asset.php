<?php

require_once('temp/backend/dashboard.php');
require_once('temp/backend/customization.php');
require_once('temp/frontend/checkout.php');
require_once('inc/ajaxHandler.php');

function CMPCH_ADDING_MENU()
{
	add_menu_page('Checkout Manager', 'Checkout Manager', 'manage_options', 'CMPCH-dashboard-main', 'CMPCH_temp_dashboard',plugin_dir_url(__FILE__).'url/receipt.png');
	add_submenu_page( 'CMPCH-dashboard-main', 'Templates | Checkout Manager', 'Templates', 'manage_options', 'CMPCH-dashboard-main');
	add_submenu_page( 'CMPCH-dashboard-main', 'Customization | Checkout Manager', 'Customization', 'manage_options', 'CMPCH-template-main','CMPCH_temp_templates');
}
add_action('admin_menu','CMPCH_ADDING_MENU');


function CMPCH_ENQUEUE_SCRIPTS() 
{
	wp_enqueue_script('jquery');
    wp_enqueue_style('CMPCH_MAIN_CSS', plugin_dir_url( __FILE__ ). '/assets/css/main.css');
    wp_enqueue_script('CMPCH_MAIN_JS', plugin_dir_url( __FILE__ ). '/assets/js/main.js');
    wp_localize_script( 'CMPCH_MAIN_JS', 'olm_ajax_url', array( 'ajax_url' => admin_url( 'admin-ajax.php' )));

    wp_enqueue_style('CMPCH_MAIN_CSS_2', 'https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css');
    wp_enqueue_script('CMPCH_MAIN_JS_2', 'https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js');

}
add_action( 'admin_enqueue_scripts', 'CMPCH_ENQUEUE_SCRIPTS' );
add_action( 'wp_enqueue_scripts', 'CMPCH_ENQUEUE_SCRIPTS' );


global $pagenow;
if ( $pagenow == 'admin.php' ) {
	if ( $_GET['page'] == 'CMPCH-dashboard-main' || $_GET['page'] == 'CMPCH-template-main' )
	{
		function CMPCH_BOOTSTRAP()
		{
			wp_enqueue_style('CMPCH_BSCSS', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
		    wp_enqueue_script('CMPCH_BSJS', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js');
			// wp_enqueue_style('CMPCH_BSCSS', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/codemirror.min.css' );
		 //    wp_enqueue_script('CMPCH_BSJS', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/codemirror.min.js');
		}
		add_action( 'admin_enqueue_scripts', 'CMPCH_BOOTSTRAP' );
	}
}

