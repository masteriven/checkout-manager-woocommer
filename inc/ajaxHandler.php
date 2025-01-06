<?php
function changeTimerStatus(){
	Global $wpdb;
	$nctch_init        = 'nctch_init';
	$status            = $_GET['status'];
	$existing_status = $wpdb->get_results($wpdb->prepare("SELECT * from {$nctch_init}"));
	if ( empty($existing_status) ) 
	{
		$wpdb->query($wpdb->prepare("INSERT INTO $nctch_init (`status`) VALUES (%s)", $status ));
		wp_die();
	}
	else
	{
		$wpdb->query($wpdb->prepare("UPDATE $nctch_init SET status=%s", $status ));
    	wp_die();
	}
}
add_action('wp_ajax_changeTimerStatus', 'changeTimerStatus');
add_action('wp_ajax_nopriv_changeTimerStatus', 'changeTimerStatus');



function get_subscriptionPro(){
	$curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => NCTCH_PROVIDER.'/wp-json/cmpch/v1/getGlobal-product',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      // CURLOPT_POSTFIELDS => array('url' => 'http://46.99.182.202:8181/BilancWebServerMercury/rest/public/items/itemsV3/%7BserviceUnitID=3%7D', 'method' => 'GET','auth' => 'EcCCLFBUWfDa9WyZ7CcWOqtU0fYrvG3ZfK9oCmkFGwc=', 'req_type' => '1'),
    ));

    $response = curl_exec($curl);
    $result   = json_decode($response);

    curl_close($curl);
    if ( empty($result) || $result->status == 0 ) 
    {
    	echo '0';
		wp_die();
    }
    else
    {
    	print_r($result->message);
    	wp_die();
    }
}
add_action('wp_ajax_get_subscriptionPro', 'get_subscriptionPro');
add_action('wp_ajax_nopriv_get_subscriptionPro', 'get_subscriptionPro');




function get_login_access(){
	$email = $_GET['email'];
	$pass  = $_GET['pass'];
	$fields = array(
        'email'     => $email,
        'password'  => $pass,
    );

	$fields_string = http_build_query($fields);
	$curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => NCTCH_PROVIDER.'/wp-json/cmpch/v1/login-request?'.$fields_string,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      // CURLOPT_POSTFIELDS => array('email' => $email, 'password' => $pass),
    ));	

    $response = curl_exec($curl);
    $result   = json_decode($response);

    curl_close($curl);
    if ( empty($result) || $result->status == 0 ) 
    {
    	echo '0';
		wp_die();
    }
    else
    {
    	Global $wpdb;
		$nctch_connect     = 'nctch_connect';
		$connection_exit   = $wpdb->get_results($wpdb->prepare("SELECT * from {$nctch_connect}"));
		if ( empty($connection_exit) ) 
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $nctch_connect (`mail`, `pass`) VALUES (%s, %s)", $email, $pass ));
		}
		else
		{
			$wpdb->query($wpdb->prepare("UPDATE $nctch_connect SET mail=%s, pass=%s", $email, $pass ));
		}
		echo "1";
    	wp_die();
    }
}
add_action('wp_ajax_get_login_access', 'get_login_access');
add_action('wp_ajax_nopriv_get_login_access', 'get_login_access');



