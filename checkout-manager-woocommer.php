<?php
/**
 * Plugin Name: Omzas Checkout Manager
 * Description: Allow you to change checkout templates for woocommerce
 * Version:     1.0.0
 * Author:      Omzas
 * Text Domain: omzas-checkout-manager-woocommerce 
 */



require('functions.php');

if (!defined('WPINC')) {
	die();
}

if (!defined('CMPCH_PATH')) {
	define('CMPCH_PATH', plugin_dir_url( __FILE__ ));
}

function ncmpch_connect_table_func(){
	Global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$ncmpch_fields   = 'ncmpch_fields';
	$nctch_vtable = "CREATE TABLE $ncmpch_fields (
							`id` int(11) NOT NULL AUTO_INCREMENT,
							`fm` varchar(255) DEFAULT NULL,
							`ln` varchar(255) DEFAULT NULL,
							`cn` varchar(255) DEFAULT NULL,
							`country` varchar(255) DEFAULT NULL,
							`ba1` varchar(255) DEFAULT NULL,
							`ba2` varchar(255) DEFAULT NULL,
							`town` varchar(255) DEFAULT NULL,
							`state` varchar(255) DEFAULT NULL,
							`zip` varchar(255) DEFAULT NULL,
							`phone` varchar(255) DEFAULT NULL,
							`mail` varchar(255) DEFAULT NULL,
							PRIMARY KEY (`id`)
						) $charset_collate;";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($nctch_vtable);
}
register_activation_hook( __FILE__, 'ncmpch_connect_table_func' );

function ncmpch_init_table_func(){
	Global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$ncmpch_init     = 'ncmpch_init';
	$nctch_vtable = "CREATE TABLE $ncmpch_init (
							`id` int(11) NOT NULL AUTO_INCREMENT,
							`tempid` varchar(255) DEFAULT NULL,
							`color` varchar(255) DEFAULT NULL,
							PRIMARY KEY (`id`)
						) $charset_collate;";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($nctch_vtable);
}
register_activation_hook( __FILE__, 'ncmpch_init_table_func' );


function ncmpch_init_mobile_table_func(){
	Global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$ncmpch_init_mbl = 'ncmpch_init_mbl';
	$nctch_vtable = "CREATE TABLE $ncmpch_init_mbl (
							`id` int(11) NOT NULL AUTO_INCREMENT,
							`tempid` varchar(255) DEFAULT NULL,
							PRIMARY KEY (`id`)
						) $charset_collate;";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($nctch_vtable);
}
register_activation_hook( __FILE__, 'ncmpch_init_mobile_table_func' );

function ncmpch_order_review_table_func(){
	Global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$ncmpch_order_review   = 'ncmpch_order_review';
	$nctch_vtable = "CREATE TABLE $ncmpch_order_review (
							`id` int(11) NOT NULL AUTO_INCREMENT,
							`position` varchar(255) DEFAULT NULL,
							PRIMARY KEY (`id`)
						) $charset_collate;";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($nctch_vtable);
}
register_activation_hook( __FILE__, 'ncmpch_order_review_table_func' );


function ncmpch_customcss_func(){
	Global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$ncmpch_customcss   = 'ncmpch_customcss';
	$nctch_vtable = "CREATE TABLE $ncmpch_customcss (
							`id` int(11) NOT NULL AUTO_INCREMENT,
							`css` varchar(255) DEFAULT NULL,
							PRIMARY KEY (`id`)
						) $charset_collate;";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($nctch_vtable);
}
register_activation_hook( __FILE__, 'ncmpch_customcss_func' );

require_once('essential-asset.php');