<?php


if ( isset($_POST['nctch-pagetitle']) && !empty($_POST['nctch-pagetitle']) ) 
{
	addTempData( $_POST['nctch-pagetitle'], 'page_title' );
}


function addTempData( $data, $column )
{
	Global $wpdb;
	$nctch_temp      = 'nctch_temp';
	$existing_status = $wpdb->get_results($wpdb->prepare("SELECT * from {$nctch_temp}"));
	if ( empty($existing_status) ) 
	{
		$wpdb->query($wpdb->prepare("INSERT INTO $nctch_temp (`$column`) VALUES (%s)", $data ));
	}
	else
	{
		$wpdb->query($wpdb->prepare("UPDATE $nctch_temp SET $column=%s", $data ));
	}
}