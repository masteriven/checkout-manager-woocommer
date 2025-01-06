<?php

// this will handle coming soon page
function example_function()

{
	if ( !is_user_logged_in() ) 
	{
		if ( !is_admin() ) 
		{
			Global $wpdb;
			$nctch_init        = 'nctch_init';
			$existing_status   = $wpdb->get_results($wpdb->prepare("SELECT * from {$nctch_init}"));

			if ( !empty($existing_status) )
			{	
				if ( $existing_status[0]->status == 'on' ) 
				{
					if ( $GLOBALS['pagenow'] != 'wp-login.php') 
					{
						//status_header(503);
						require_once('package/coming_soon.php');
						exit();
					}
				}		
			}

		}
	}
}
add_action('init', 'example_function');