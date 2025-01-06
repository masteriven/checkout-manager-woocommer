<?php
session_start();
add_action( 'woocommerce_review_order_before_submit', 'change_order_notes_reviews' );
function change_order_notes_reviews()
{
	Global $wpdb;
	$ncmpch_order_review = 'ncmpch_order_review';
	$position            = $_POST['review_op'];
	$existing_pos = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_order_review}"));
	if ($existing_pos[0]->position == 'up')
	{
		?>

		   <script>
			 jQuery(function($){
				$('#order_review_heading').insertAfter('#order_review');
				$('.woocommerce-checkout-payment').insertAfter('.woocommerce-additional-fields');
			 });

			</script>
			<style>
				.checkout.woocommerce-checkout{
					display: flex;
   				 flex-direction: column-reverse;
				}
				.customer_details2{
					display: block !important;
				}
				.col2-set{
					width:100%;
				}
				select{
					width: 100% !important;
					height: 40px;
				}
				#order_review{
					width:100%;
				}

				#order_review_heading{
					width:100%;
				}
				.woocommerce-billing-fields{
					margin-top:20px;
				}

				
			</style>
		<?php
	

	}else if($existing_pos[0]->position == 'down'){
		
		
		?>
		<style>
			
			.col2-set{
				width:100%;
			}

			#order_review{
					width:100%;
				}

				#order_review_heading{
					width:100%;
				}
		
		</style>
	<?php


	}else if($existing_pos[0]->position == 'side'){
		
	}


	$ncmpch_init_mbl  = 'ncmpch_init_mbl';
	$existing_mblinit = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_init_mbl}"));
	if ( !isset($existing_mblinit) || empty($existing_mblinit) || $existing_mblinit[0]->tempid == 100	 ) 
	{
		// Do nothing on mobile for normal template
	}
	else
	{
		?>
		<style type="text/css">
			@media only screen and (max-width: 600px) 
			{
				.woocommerce-billing-fields, .woocommerce-billing-fields span, .woocommerce-billing-fields input{
					width: 100%;
				}
				
				#billing_first_name_field, #billing_last_name_field{
			  		width: 100%;
				}
				.woocommerce-billing-fields__field-wrapper{
					margin-top: 0 !important;
				}
				.woocommerce-billing-fields__field-wrapper p{
					padding: 0 !important;
				}
				.woocommerce-billing-fields__field-wrapper label{
					font-weight: bold;
				}
				.woocommerce-billing-fields__field-wrapper input, .woocommerce-billing-fields__field-wrapper textarea{
					border: 1px solid #222 !important;
					background: #f6f6f6;
				}
			}
			@media only screen and (min-width: 601px) 
			{
				.cmpch_progress_wrapper{
					display: none;	
				}
			}
		</style>

	<?php

	}

	
}

 

add_action( 'woocommerce_before_checkout_form', 'cmpch_checkout_page_handler' );
function cmpch_checkout_page_handler()
{
	Global $wpdb;
	$ncmpch_init        = 'ncmpch_init';
	$tempOP             = $_POST['cmpch_coption'];
	$existing_status    = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_init}"));
	$selected_template  = $existing_status[0]->tempid;
	$chosenColor    =     $existing_status[0]->color;

	if ( empty($selected_template) ) 
	{
		
	}
	else
	{
		if ( $selected_template == 1 ) {
		?>
			<style>
				body{
					background-color: #fff;
					color: #555;
				}
			</style>
		<?php
		}
		if ( $selected_template == 2 ) {
		?>
			<style>
				body{
					background-color: Black;
				}
			</style>
		<?php
		}
		if ( $selected_template == 3 ){

			
// change fields order
add_filter("woocommerce_checkout_fields", "custom_override_checkout_fields", 1);
function custom_override_checkout_fields($fields) {
	Global $wpdb;
	$ncmpch_fields   = 'ncmpch_fields';
	$existing_fields = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_fields}"));
	foreach ( explode("|",$existing_fields[0]->fm ) as $key => $value) 
	{
		if ( $key == 0 )
		{
    		$fields['billing']['billing_first_name']['priority'] = $value;
		}
		else
		{
			continue;
		}
	}
	foreach ( explode("|",$existing_fields[0]->ln ) as $key => $value) 
	{
		if ( $key == 0 )
		{
    		$fields['billing']['billing_last_name']['priority'] = $value;
		}
		else
		{
			continue;
		}
	}
	foreach ( explode("|",$existing_fields[0]->cn ) as $key => $value) 
	{
		if ( $key == 0 )
		{
    		$fields['billing']['billing_company']['priority']= $value;
		}
		else
		{
			continue;
		}
	}
	foreach ( explode("|",$existing_fields[0]->country ) as $key => $value) 
	{
		if ( $key == 0 )
		{
    		$fields['billing']['billing_country']['priority']= $value;
		}
		else
		{
			continue;
		}
	}
	foreach ( explode("|",$existing_fields[0]->ba1 ) as $key => $value) 
	{
		if ( $key == 0 )
		{
    		$fields['billing']['billing_address_1']['priority']= $value;
		}
		else
		{
			continue;
		}
	}
	foreach ( explode("|",$existing_fields[0]->ba2 ) as $key => $value) 
	{
		if ( $key == 0 )
		{
    		$fields['billing']['billing_address_2']['priority']= $value;
		}
		else
		{
			continue;
		}
	}
	foreach ( explode("|",$existing_fields[0]->town ) as $key => $value) 
	{
		if ( $key == 0 )
		{
    		$fields['billing']['billing_city']['priority']= $value;
		}
		else
		{
			continue;
		}
	}
	foreach ( explode("|",$existing_fields[0]->state ) as $key => $value) 
	{
		if ( $key == 0 )
		{
    		$fields['billing']['billing_state']['priority']= $value;
		}
		else
		{
			continue;
		}
	}
	foreach ( explode("|",$existing_fields[0]->zip ) as $key => $value) 
	{
		if ( $key == 0 )
		{
    		$fields['billing']['billing_postcode']['priority']= $value;
		}
		else
		{
			continue;
		}
	}
	foreach ( explode("|",$existing_fields[0]->phone ) as $key => $value) 
	{
		if ( $key == 0 )
		{
    		$fields['billing']['billing_phone']['priority']= $value;
		}
		else
		{
			continue;
		}
	}
	foreach ( explode("|",$existing_fields[0]->mail ) as $key => $value) 
	{
		if ( $key == 0 )
		{
    		$fields['billing']['billing_email']['priority']= $value;
		}
		else
		{
			continue;
		}
	}
    return $fields;
}

add_filter( 'woocommerce_default_address_fields', 'custom_override_default_locale_fields' );
function custom_override_default_locale_fields( $fields ) 
{
	Global $wpdb;
	$ncmpch_fields   = 'ncmpch_fields';
	$existing_fields = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_fields}"));
	foreach ( explode("|",$existing_fields[0]->state ) as $key => $value) 
	{
		if ( $key == 0 )
		{
    		$fields['state']['priority']= $value;
		}
		else
		{
			continue;
		}
	}
	foreach ( explode("|",$existing_fields[0]->ba1 ) as $key => $value) 
	{
		if ( $key == 0 )
		{
    		$fields['address_1']['priority']= $value;
		}
		else
		{
			continue;
		}
	}
	foreach ( explode("|",$existing_fields[0]->ba2 ) as $key => $value) 
	{
		if ( $key == 0 )
		{
    		$fields['address_2']['priority']= $value;
		}
		else
		{
			continue;
		}
	}
	foreach ( explode("|",$existing_fields[0]->town ) as $key => $value) 
	{
		if ( $key == 0 )
		{
    		$fields['city']['priority']= $value;
		}
		else
		{
			continue;
		}
	}
	foreach ( explode("|",$existing_fields[0]->zip ) as $key => $value) 
	{
		if ( $key == 0 )
		{
    		$fields['postcode']['priority']= $value;
		}
		else
		{
			continue;
		}
	}
    return $fields;
}

		?>
		<style>
		  .woocommerce-checkout{
			background-color:<?php echo get_option('chooseBgColorCMW') ?>;
		 }

		 .checkout.woocommerce-checkout h1, .checkout.woocommerce-checkout h2, .checkout.woocommerce-checkout h3,.checkout.woocommerce-checkout label, .checkout.woocommerce-checkout textarea,.checkout.woocommerce-checkout p,.checkout.woocommerce-checkout span{
			font-size:<?php echo get_option('fontSizeCMW')  ?>px !important;
			color:<?php echo get_option('chooseTextColorCMW')  ?> !important
		 }

		 .woocommerce-checkout-review-order-table th, .woocommerce-checkout-review-order-table td,
		 .woocommerce-checkout-payment li{
			font-size:<?php echo get_option('fontSizeCMW')  ?>px !important;
			color:<?php echo get_option('chooseTextColorCMW')  ?>  !important;
		 }
		<?php
			Global $wpdb;
			$ncmpch_fields   = 'ncmpch_fields';
			$existing_fields = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_fields}"));
			//first nsmae
			echo "#billing_first_name_field{";
			foreach ( explode("|",$existing_fields[0]->fm ) as $key => $value) 
			{
				if ( $key == 0 ) continue;
				if ( $key == 1 ) echo 'width:'.$value.'%;';
				if ( $key == 2 ) echo 'color:'.$value.';';
				if ( $key == 3 ) echo 'background-color:'.$value.';';
				echo 'display: inline-block; padding: 7px;';
			}
			echo "}";

			echo "#billing_last_name_field{";
			foreach ( explode("|",$existing_fields[0]->ln ) as $key => $value) 
			{
				if ( $key == 0 ) continue;
				if ( $key == 1 ) echo 'width:'.$value.'%;';
				if ( $key == 2 ) echo 'color:'.$value.';';
				if ( $key == 3 ) echo 'background-color:'.$value.';';
				echo 'display: inline-block; padding: 7px;';
			}
			echo "}";

			echo "#billing_company_field{";
			foreach ( explode("|",$existing_fields[0]->cn ) as $key => $value) 
			{
				if ( $key == 0 ) continue;
				if ( $key == 1 ) echo 'width:'.$value.'%;';
				if ( $key == 2 ) echo 'color:'.$value.';';
				if ( $key == 3 ) echo 'background-color:'.$value.';';
				echo 'display: inline-block; padding: 7px;';
			}
			echo "}";

			echo "#billing_country_field{";
			foreach ( explode("|",$existing_fields[0]->country ) as $key => $value) 
			{
				if ( $key == 0 ) continue;
				if ( $key == 1 ) echo 'width:'.$value.'%;';
				if ( $key == 2 ) echo 'color:'.$value.';';
				if ( $key == 3 ) echo 'background-color:'.$value.';';
				echo 'display: inline-block; padding: 7px;';
			}
			echo "}";

			echo "#billing_address_1_field{";
			foreach ( explode("|",$existing_fields[0]->ba1 ) as $key => $value) 
			{
				if ( $key == 0 ) continue;
				if ( $key == 1 ) echo 'width:'.$value.'%;';
				if ( $key == 2 ) echo 'color:'.$value.';';
				if ( $key == 3 ) echo 'background-color:'.$value.';';
				echo 'display: inline-block; padding: 7px;';
			}
			echo "}";

			echo "#billing_address_2_field{";
			foreach ( explode("|",$existing_fields[0]->ba2 ) as $key => $value) 
			{
				if ( $key == 0 ) continue;
				if ( $key == 1 ) echo 'width:'.$value.'%;';
				if ( $key == 2 ) echo 'color:'.$value.';';
				if ( $key == 3 ) echo 'background-color:'.$value.';';
				echo 'display: inline-block; padding: 7px;';
			}
			echo "}";

			echo "#billing_city_field{";
			foreach ( explode("|",$existing_fields[0]->town ) as $key => $value) 
			{
				if ( $key == 0 ) continue;
				if ( $key == 1 ) echo 'width:'.$value.'%;';
				if ( $key == 2 ) echo 'color:'.$value.';';
				if ( $key == 3 ) echo 'background-color:'.$value.';';
				echo 'display: inline-block; padding: 7px;';
			}
			echo "}";

			echo "#billing_state_field{";
			foreach ( explode("|",$existing_fields[0]->state ) as $key => $value) 
			{
				if ( $key == 0 ) continue;
				if ( $key == 1 ) echo 'width:'.$value.'%;';
				if ( $key == 2 ) echo 'color:'.$value.';';
				if ( $key == 3 ) echo 'background-color:'.$value.';';
				echo 'display: inline-block; padding: 7px;';
			}
			echo "}";

			echo "#billing_postcode_field{";
			foreach ( explode("|",$existing_fields[0]->zip ) as $key => $value) 
			{
				if ( $key == 0 ) continue;
				if ( $key == 1 ) echo 'width:'.$value.'%;';
				if ( $key == 2 ) echo 'color:'.$value.';';
				if ( $key == 3 ) echo 'background-color:'.$value.';';
				echo 'display: inline-block; padding: 7px;';
			}
			echo "}";

			echo "#billing_phone_field{";
			foreach ( explode("|",$existing_fields[0]->phone ) as $key => $value) 
			{
				if ( $key == 0 ) continue;
				if ( $key == 1 ) echo 'width:'.$value.'%;';
				if ( $key == 2 ) echo 'color:'.$value.';';
				if ( $key == 3 ) echo 'background-color:'.$value.';';
				echo 'display: inline-block; padding: 7px;';
			}
			echo "}";

			echo "#billing_email_field{";
			foreach ( explode("|",$existing_fields[0]->mail ) as $key => $value) 
			{
				if ( $key == 0 ) continue;
				if ( $key == 1 ) echo 'width:'.$value.'%;';
				if ( $key == 2 ) echo 'color:'.$value.';';
				if ( $key == 3 ) echo 'background-color:'.$value.';';
				echo 'display: inline-block; padding: 7px;';
			}
			echo "}";
		?>
		</style>
		<?php
		}
		
		if ( $selected_template == 4 ){
			add_filter("woocommerce_checkout_fields", "template_Checkout_1",10, 1);
			function template_Checkout_1($fields) {

				$fields['billing']['billing_email']['priority'] = '1';
				$fields['billing']['billing_country']['priority'] = '7';
				return $fields;
			}

			?>
				<style>
					#billing_state_field{
						width: 33%;
						margin: 0px 10px;
						display: inline-block;
					}

					#billing_country_field{
						    display: inline-block;
							width: 33%;
					}

					#billing_postcode_field{
						width: 26%;
    					display: inline-block;
					}
					.woocommerce-form-coupon{
						visibility:hidden;
						display: unset !important;
						height:0px !important;
					}

					.woocommerce-form-coupon p{
						display:none;
					}

				   .woocommerce-form-coupon-toggle{
					display:none;
				   }
				
		.woocommerce-checkout{
			background-color:<?php echo get_option('chooseBgColorCMW') ?>;
		 }

		 .checkout.woocommerce-checkout h1, .checkout.woocommerce-checkout h2, .checkout.woocommerce-checkout h3,.checkout.woocommerce-checkout label, .checkout.woocommerce-checkout textarea,.checkout.woocommerce-checkout p,.checkout.woocommerce-checkout span{
			font-size:<?php echo get_option('fontSizeCMW')  ?>px !important;
			color:<?php echo get_option('chooseTextColorCMW')  ?> !important
		 }

		 .woocommerce-checkout-review-order-table th, .woocommerce-checkout-review-order-table td,
		 .woocommerce-checkout-payment li{
			font-size:<?php echo get_option('fontSizeCMW')  ?>px !important;
			color:<?php echo get_option('chooseTextColorCMW')  ?>  !important;
		 }
				  

				</style>

				<script>
					jQuery(function($){
						$(document).on('updated_checkout',function(){
							$('.checkout_coupon.woocommerce-form-coupon').insertBefore('.woocommerce-checkout-payment');
							$('.woocommerce-form-coupon').css('visibility','visible');
							$('.woocommerce-form-coupon').css('height','unset');
							$('.woocommerce-form-coupon p').css('display','block');
						});
					});
				</script>
			<?php
		

		}

		

			
	}


	$ncmpch_customcss = 'ncmpch_customcss';
	$custom_css       = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_customcss}"));
	if ( !empty($custom_css) ) 
	{
		?>
		<style type="text/css">
			<?=$custom_css[0]->css?>
		</style>
		<?php
	}
}




