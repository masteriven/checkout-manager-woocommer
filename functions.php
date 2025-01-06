<?php


function remove_footer_admin () {
	return;
}
 
add_filter('admin_footer_text', 'remove_footer_admin');
add_filter( 'update_footer',     '__return_empty_string', 11 );

?>