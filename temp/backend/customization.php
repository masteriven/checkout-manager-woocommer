<?php
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

function CMPCH_temp_templates()
{
	if ( $_POST['save_fields'] ) 
	{
		//save fields
		$fm_priority = empty($_POST['fm_priority']) ? '1' : $_POST['fm_priority']; 
		$fm_width    = empty($_POST['fm_width']) ? '40' : $_POST['fm_width']; 
		$fm_fcolor   = empty($_POST['fm_fcolor']) ? '#000000' : $_POST['fm_fcolor']; 
		$fm_bcolor   = empty($_POST['fm_bcolor']) ? '#ffffff' : $_POST['fm_bcolor'];
		$fm = $fm_priority.'|'.$fm_width.'|'.$fm_fcolor.'|'.$fm_bcolor;

		$ln_priority = empty($_POST['ln_priority']) ? '2' : $_POST['ln_priority']; 
		$ln_width    = empty($_POST['ln_width']) ? '50' : $_POST['ln_width']; 
		$ln_fcolor   = empty($_POST['ln_fcolor']) ? '#000000' : $_POST['ln_fcolor']; 
		$ln_bcolor   = empty($_POST['ln_bcolor']) ? '#ffffff' : $_POST['ln_bcolor'];
		$ln = $ln_priority.'|'.$ln_width.'|'.$ln_fcolor.'|'.$ln_bcolor;

		$cn_priority = empty($_POST['cn_priority']) ? '3' : $_POST['cn_priority']; 
		$cn_width    = empty($_POST['cn_width']) ? '100' : $_POST['cn_width']; 
		$cn_fcolor   = empty($_POST['cn_fcolor']) ? '#000000' : $_POST['cn_fcolor']; 
		$cn_bcolor   = empty($_POST['cn_bcolor']) ? '#ffffff' : $_POST['cn_bcolor'];
		$cn = $cn_priority.'|'.$cn_width.'|'.$cn_fcolor.'|'.$cn_bcolor;

		$country_priority = empty($_POST['country_priority']) ? '4' : $_POST['country_priority']; 
		$country_width    = empty($_POST['country_width']) ? '100' : $_POST['country_width']; 
		$country_fcolor   = empty($_POST['country_fcolor']) ? '#000000' : $_POST['country_fcolor']; 
		$country_bcolor   = empty($_POST['country_bcolor']) ? '#ffffff' : $_POST['country_bcolor'];
		$country = $country_priority.'|'.$country_width.'|'.$country_fcolor.'|'.$country_bcolor;

		$ba1_priority = empty($_POST['ba1_priority']) ? '5' : $_POST['ba1_priority']; 
		$ba1_width    = empty($_POST['ba1_width']) ? '100' : $_POST['ba1_width']; 
		$ba1_fcolor   = empty($_POST['ba1_fcolor']) ? '#000000' : $_POST['ba1_fcolor']; 
		$ba1_bcolor   = empty($_POST['ba1_bcolor']) ? '#ffffff' : $_POST['ba1_bcolor'];
		$ba1 = $ba1_priority.'|'.$ba1_width.'|'.$ba1_fcolor.'|'.$ba1_bcolor;

		$ba2_priority = empty($_POST['ba2_priority']) ? '6' : $_POST['ba2_priority']; 
		$ba2_width    = empty($_POST['ba2_width']) ? '100' : $_POST['ba2_width']; 
		$ba2_fcolor   = empty($_POST['ba2_fcolor']) ? '#000000' : $_POST['ba2_fcolor']; 
		$ba2_bcolor   = empty($_POST['ba2_bcolor']) ? '#ffffff' : $_POST['ba2_bcolor'];
		$ba2 = $ba2_priority.'|'.$ba2_width.'|'.$ba2_fcolor.'|'.$ba2_bcolor;

		$town_priority = empty($_POST['town_priority']) ? '7' : $_POST['town_priority']; 
		$town_width    = empty($_POST['town_width']) ? '100' : $_POST['town_width']; 
		$town_fcolor   = empty($_POST['town_fcolor']) ? '#000000' : $_POST['town_fcolor']; 
		$town_bcolor   = empty($_POST['town_bcolor']) ? '#ffffff' : $_POST['town_bcolor'];
		$town = $town_priority.'|'.$town_width.'|'.$town_fcolor.'|'.$town_bcolor;

		$state_priority = empty($_POST['state_priority']) ? '8' : $_POST['state_priority']; 
		$state_width    = empty($_POST['state_width']) ? '100' : $_POST['state_width']; 
		$state_fcolor   = empty($_POST['state_fcolor']) ? '#000000' : $_POST['state_fcolor']; 
		$state_bcolor   = empty($_POST['state_bcolor']) ? '#ffffff' : $_POST['state_bcolor'];
		$state = $state_priority.'|'.$state_width.'|'.$state_fcolor.'|'.$state_bcolor;

		$zip_priority = empty($_POST['zip_priority']) ? '9' : $_POST['zip_priority']; 
		$zip_width    = empty($_POST['zip_width']) ? '100' : $_POST['zip_width']; 
		$zip_fcolor   = empty($_POST['zip_fcolor']) ? '#000000' : $_POST['zip_fcolor']; 
		$zip_bcolor   = empty($_POST['zip_bcolor']) ? '#ffffff' : $_POST['zip_bcolor'];
		$zip = $zip_priority.'|'.$zip_width.'|'.$zip_fcolor.'|'.$zip_bcolor;

		$phone_priority = empty($_POST['phone_priority']) ? '10' : $_POST['phone_priority']; 
		$phone_width    = empty($_POST['phone_width']) ? '100' : $_POST['phone_width']; 
		$phone_fcolor   = empty($_POST['phone_fcolor']) ? '#000000' : $_POST['phone_fcolor']; 
		$phone_bcolor   = empty($_POST['phone_bcolor']) ? '#ffffff' : $_POST['phone_bcolor'];
		$phone = $phone_priority.'|'.$phone_width.'|'.$phone_fcolor.'|'.$phone_bcolor;

		$mail_priority = empty($_POST['mail_priority']) ? '11' : $_POST['mail_priority']; 
		$mail_width    = empty($_POST['mail_width']) ? '100' : $_POST['mail_width']; 
		$mail_fcolor   = empty($_POST['mail_fcolor']) ? '#000000' : $_POST['mail_fcolor']; 
		$mail_bcolor   = empty($_POST['mail_bcolor']) ? '#ffffff' : $_POST['mail_bcolor'];
		$mail = $mail_priority.'|'.$mail_width.'|'.$mail_fcolor.'|'.$mail_bcolor;


		Global $wpdb;
		$ncmpch_fields   = 'ncmpch_fields';
		$existing_fields = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_fields}"));
		if ( empty($existing_fields) ) 
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $ncmpch_fields (`fm`,`ln`, `cn`,`country`,`ba1`,`ba2`,`town`,`state`,`zip`,`phone`,`mail`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", $fm,$ln, $cn,$country,$ba1,$ba2,$town,$state,$zip,$phone,$mail ));
		}
		else
		{
			$wpdb->query($wpdb->prepare("UPDATE $ncmpch_fields SET fm=%s, ln=%s, cn=%s, country=%s, ba1=%s, ba2=%s, town=%s, state=%s, zip=%s, phone=%s, mail=%s", $fm,$ln, $cn,$country, $ba1, $ba2,$town,$state,$zip,$phone,$mail ));
		}
		echo 'Fields Saved Successfully.';
	}

	if ( $_POST['save_reviewOP'] ) 
	{
		//change review position
		Global $wpdb;
		$ncmpch_order_review = 'ncmpch_order_review';
		$position            = $_POST['review_op'];
		$existing_pos = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_order_review}"));
		if ( empty($existing_pos) ) 
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $ncmpch_order_review (`position`) VALUES (%s)", $position ));
		}
		else
		{
			$wpdb->query($wpdb->prepare("UPDATE $ncmpch_order_review SET position=%s", $position ));
		}
		
	}

	if ( $_POST['cmpch_customcss'] ) 
	{
		//adding custom css
		Global $wpdb;
		$ncmpch_customcss = 'ncmpch_customcss';
		$css              = $_POST['cmpc_hcss'];
		$existing_pos = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_customcss}"));
		if ( empty($existing_pos) ) 
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $ncmpch_customcss (`css`) VALUES (%s)", $css ));
		}
		else
		{
			$wpdb->query($wpdb->prepare("UPDATE $ncmpch_customcss SET css=%s", $css ));
		}
	}
	?>
	<section class="cmpch-sec">
		<h5>Customize Your Template:</h5>
		<small>Customize your checkout page easily. Assign priority to fields to re-arrange them. Decrease width to arrange multiple fields in a row. Like first and last name here ( note: to keep them in one row priority should also be aligned ). You can also apply any font colour or background colour to any field.</small>


		<?php
		// Getting existing fields
		Global $wpdb;
		$ncmpch_fields   = 'ncmpch_fields';
		$existing_fields = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_fields}"));
		
		if (!empty($existing_fields))
		{
			foreach ( explode("|",$existing_fields[0]->fm ) as $key => $value) 
			{
				if ( $key == 0 ) $fm_priority = $value;
				if ( $key == 1 ) $fm_width    = $value;
				if ( $key == 2 ) $fm_fcolor   = $value;
				if ( $key == 3 ) $fm_bcolor   = $value;
			}

			foreach ( explode("|",$existing_fields[0]->ln ) as $key => $value) 
			{
				if ( $key == 0 ) $ln_priority = $value;
				if ( $key == 1 ) $ln_width    = $value;
				if ( $key == 2 ) $ln_fcolor   = $value;
				if ( $key == 3 ) $ln_bcolor   = $value;
			}

			foreach ( explode("|",$existing_fields[0]->cn ) as $key => $value) 
			{
				if ( $key == 0 ) $cn_priority = $value;
				if ( $key == 1 ) $cn_width    = $value;
				if ( $key == 2 ) $cn_fcolor   = $value;
				if ( $key == 3 ) $cn_bcolor   = $value;
			}

				
			foreach ( explode("|",$existing_fields[0]->country ) as $key => $value) 
			{
				if ( $key == 0 ) $country_priority = $value;
				if ( $key == 1 ) $country_width    = $value;
				if ( $key == 2 ) $country_fcolor   = $value;
				if ( $key == 3 ) $country_bcolor   = $value;
			}
			
		
			foreach ( explode("|",$existing_fields[0]->ba1 ) as $key => $value) 
			{
				if ( $key == 0 ) $ba1_priority = $value;
				if ( $key == 1 ) $ba1_width    = $value;
				if ( $key == 2 ) $ba1_fcolor   = $value;
				if ( $key == 3 ) $ba1_bcolor   = $value;
			}
			

			foreach ( explode("|",$existing_fields[0]->ba2 ) as $key => $value) 
			{
				if ( $key == 0 ) $ba2_priority = $value;
				if ( $key == 1 ) $ba2_width    = $value;
				if ( $key == 2 ) $ba2_fcolor   = $value;
				if ( $key == 3 ) $ba2_bcolor   = $value;
			}

			foreach ( explode("|",$existing_fields[0]->town ) as $key => $value) 
			{
				if ( $key == 0 ) $town_priority = $value;
				if ( $key == 1 ) $town_width    = $value;
				if ( $key == 2 ) $town_fcolor   = $value;
				if ( $key == 3 ) $town_bcolor   = $value;
			}

				
			foreach ( explode("|",$existing_fields[0]->state ) as $key => $value) 
			{
				if ( $key == 0 ) $state_priority = $value;
				if ( $key == 1 ) $state_width    = $value;
				if ( $key == 2 ) $state_fcolor   = $value;
				if ( $key == 3 ) $state_bcolor   = $value;
			}

			foreach ( explode("|",$existing_fields[0]->zip ) as $key => $value) 
			{
				if ( $key == 0 ) $zip_priority = $value;
				if ( $key == 1 ) $zip_width    = $value;
				if ( $key == 2 ) $zip_fcolor   = $value;
				if ( $key == 3 ) $zip_bcolor   = $value;
			}

			foreach ( explode("|",$existing_fields[0]->phone ) as $key => $value) 
			{
				if ( $key == 0 ) $phone_priority = $value;
				if ( $key == 1 ) $phone_width    = $value;
				if ( $key == 2 ) $phone_fcolor   = $value;
				if ( $key == 3 ) $phone_bcolor   = $value;
			}

			foreach ( explode("|",$existing_fields[0]->mail ) as $key => $value) 
			{
				if ( $key == 0 ) $mail_priority = $value;
				if ( $key == 1 ) $mail_width    = $value;
				if ( $key == 2 ) $mail_fcolor   = $value;
				if ( $key == 3 ) $mail_bcolor   = $value;
			}
		}
		else
		{
 			//If fields settings is not saved
			$fm_priority = '1';
			$fm_width    = '40';
			$fm_fcolor   = '#000000';
			$fm_bcolor   = '#ffffff';

			$ln_priority = '2';
			$ln_width    = '50';
			$ln_fcolor   = '#000000';
			$ln_bcolor   = '#ffffff';

			$cn_priority = '3';
			$cn_width    = '100';
			$cn_fcolor   = '#000000';
			$cn_bcolor   = '#ffffff';

			$country_priority = '4';
			$country_width    = '100';
			$country_fcolor   = '#000000';
			$country_bcolor   = '#ffffff';

			$ba1_priority = '5';
			$ba1_width    = '100';
			$ba1_fcolor   = '#000000';
			$ba1_bcolor   = '#ffffff';

			$ba2_priority = '6';
			$ba2_width    = '100';
			$ba2_fcolor   = '#000000';
			$ba2_bcolor   = '#ffffff';

			$town_priority = '7';
			$town_width    = '100';
			$town_fcolor   = '#000000';
			$town_bcolor   = '#ffffff';

			$state_priority = '8';
			$state_width    = '100';
			$state_fcolor   = '#000000';
			$state_bcolor   = '#ffffff';

			$zip_priority = '9';
			$zip_width    = '100';
			$zip_fcolor   = '#000000';
			$zip_bcolor   = '#ffffff';

			$phone_priority = '10';
			$phone_width    = '100';
			$phone_fcolor   = '#000000';
			$phone_bcolor   = '#ffffff';

			$mail_priority = '11';
			$mail_width    = '100';
			$mail_fcolor   = '#000000';
			$mail_bcolor   = '#ffffff';

		}

		?>
		<form action="" method="post">
		<div class="cmpch-row">
			<h6 style="margin-top: 30px;">Re-Order Checkout Fields</h6>
			<table class="table table-striped">
				<thead class="thead-dark">
			    	<tr>
		    			<th scope="col">Field</th>
		    			<th scope="col">Priority</th>
		    			<th scope="col">Width (%)</th>
		    			<th scope="col">Font Color</th>
		    			<th scope="col">Background Color</th>
					</tr>
				</thead>
				<tbody>
			    	<tr>
			    		<th>First Name</th>
			    		<td><input type="number" value="<?=$fm_priority?>" name="fm_priority" class="form-control"></td>
			    		<td><input type="number" value="<?=$fm_width?>" name="fm_width" class="form-control"></td>
			    		<td><input type="text" value="<?=$fm_fcolor?>" name="fm_fcolor" class="form-control"></td>
			    		<td><input type="text" value="<?=$fm_bcolor?>" name="fm_bcolor" class="form-control"></td>
			    	</tr>
			    	<tr>
			    		<th scope="row">Last Name</th>
			    		<td><input type="number" value="<?=$ln_priority?>" name="ln_priority" class="form-control"></td>
			    		<td><input type="number" value="<?=$ln_width?>" name="ln_width" class="form-control"></td>
		    			<td><input type="text" value="<?=$ln_fcolor?>" name="ln_fcolor" class="form-control"></td>
			    		<td><input type="text" value="<?=$ln_bcolor?>" name="ln_bcolor" class="form-control"></td>
			    	</tr>
			    	<tr>
			    		<th scope="row">Company Name</th>
			    		<td><input type="number" value="<?=$cn_priority?>" name="cn_priority" class="form-control"></td>
			    		<td><input type="number" value="<?=$cn_width?>" name="cn_width" class="form-control"></td>
			    		<td><input type="text" value="<?=$cn_fcolor?>" name="cn_fcolor" class="form-control"></td>
			    		<td><input type="text" value="<?=$cn_bcolor?>" name="cn_bcolor" class="form-control"></td>
			    	</tr>
			    	<tr>
			    		<th scope="row">Country</th>
			    		<td><input type="number" value="<?=$country_priority?>" name="country_priority" class="form-control"></td>
			    		<td><input type="number" value="<?=$country_width?>" name="country_width" class="form-control"></td>
			    		<td><input type="text" value="<?=$country_fcolor?>" name="country_fcolor" class="form-control"></td>
			    		<td><input type="text" value="<?=$country_bcolor?>" name="country_bcolor" class="form-control"></td>
			    	</tr>
			    	<tr>
			    		<th scope="row">Billing Address 1</th>
			    		<td><input type="number" value="<?=$ba1_priority?>" name="ba1_priority" class="form-control"></td>
			    		<td><input type="number" value="<?=$ba1_width?>" name="ba1_width" class="form-control"></td>
			    		<td><input type="text" value="<?=$ba1_fcolor?>" name="ba1_fcolor" class="form-control"></td>
			    		<td><input type="text" value="<?=$ba1_bcolor?>" name="ba1_bcolor" class="form-control"></td>
			    	</tr>
			    	<tr>
			    		<th scope="row">Billing Address 2</th>
			    		<td><input type="number" value="<?=$ba2_priority?>" name="ba2_priority" class="form-control"></td>
			    		<td><input type="number" value="<?=$ba2_width?>" name="ba2_width" class="form-control"></td>
			    		<td><input type="text" value="<?=$ba2_fcolor?>" name="ba2_fcolor" class="form-control"></td>
			    		<td><input type="text" value="<?=$ba2_bcolor?>" name="ba2_bcolor" class="form-control"></td>
			    	</tr>
			    	<tr>
			    		<th scope="row">Town/City</th>
			    		<td><input type="number" value="<?=$town_priority?>" name="town_priority" class="form-control"></td>
			    		<td><input type="number" value="<?=$town_width?>" name="town_width" class="form-control"></td>
			    		<td><input type="text" value="<?=$town_fcolor?>" name="town_fcolor" class="form-control"></td>
			    		<td><input type="text" value="<?=$town_bcolor?>" name="town_bcolor" class="form-control"></td>
			    	</tr>
			    	<tr>
			    		<th scope="row">State</th>
			    		<td><input type="number" value="<?=$state_priority?>" name="state_priority" class="form-control"></td>
			    		<td><input type="number" value="<?=$state_width?>" name="state_width" class="form-control"></td>
			    		<td><input type="text" value="<?=$state_fcolor?>" name="state_fcolor" class="form-control"></td>
			    		<td><input type="text" value="<?=$state_bcolor?>" name="state_bcolor" class="form-control"></td>
			    	</tr>
			    	<tr>
			    		<th scope="row">Postcode</th>
			    		<td><input type="number" value="<?=$zip_priority?>" name="zip_priority" class="form-control"></td>
			    		<td><input type="number" value="<?=$zip_width?>" name="zip_width" class="form-control"></td>
			    		<td><input type="text" value="<?=$zip_fcolor?>" name="zip_fcolor" class="form-control"></td>
			    		<td><input type="text" value="<?=$zip_bcolor?>" name="zip_bcolor" class="form-control"></td>
			    	</tr>
			    	<tr>
			    		<th scope="row">Phone</th>
			    		<td><input type="number" value="<?=$phone_priority?>" name="phone_priority" class="form-control"></td>
			    		<td><input type="number" value="<?=$phone_width?>" name="phone_width" class="form-control"></td>
			    		<td><input type="text" value="<?=$phone_fcolor?>" name="phone_fcolor" class="form-control"></td>
			    		<td><input type="text" value="<?=$phone_bcolor?>" name="phone_bcolor" class="form-control"></td>
			    	</tr>
			    	<tr>
			    		<th scope="row">Email</th>
			    		<td><input type="number" value="<?=$mail_priority?>" name="mail_priority" class="form-control"></td>
			    		<td><input type="number" value="<?=$mail_width?>" name="mail_width" class="form-control"></td>
			    		<td><input type="text" value="<?=$mail_fcolor?>" name="mail_fcolor" class="form-control"></td>
			    		<td><input type="text" value="<?=$mail_bcolor?>" name="mail_bcolor" class="form-control"></td>
			    	</tr>
				</tbody>
			</table>
		</div>

		<div class="cmpch-row">
			<input type="hidden" name="save_fields" value="true">
		</div>
	


		<?php
			// get existing review position
			Global $wpdb;
			$ncmpch_order_review = 'ncmpch_order_review';
			$position            = $_POST['review_op'];
			$existing_pos = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_order_review}"));

			

			if(isset($_POST['chooseBgColorCMW'])){
				update_option('chooseBgColorCMW',$_POST['chooseBgColorCMW']);
			}

			if(isset($_POST['chooseTextColorCMW'])){
				update_option('chooseTextColorCMW',$_POST['chooseTextColorCMW']);
			}
		
			if(isset($_POST['fontSizeCMW'])){
				update_option('fontSizeCMW',$_POST['fontSizeCMW']);
			}

			if(isset($_POST['imagesInCheckout'])){
				update_option('imagesInCheckoutCMW',$_POST['imagesInCheckout']);
			}

			if(isset($_POST['stepperIcons'])){
				update_option('stepperIcons',$_POST['stepperIcons']);
			}
		?>
			<h6 style="margin-top: 50px;">Order Review Position</h6>
			<div class="cmpch-row">
				 <label>
					Side-by-Side
					<input type="radio" value="side" name="review_op" <?php if ($existing_pos[0]->position == 'side')echo 'checked'; ?> >
				</label>
				<label>
					Top
					<input type="radio" value="up" name="review_op" <?php if ($existing_pos[0]->position == 'up')echo 'checked'; ?> >
				</label>
				<label>
					Bottom
					<input type="radio" value="down" name="review_op" <?php if ($existing_pos[0]->position == 'down')echo 'checked'; ?> >
				</label>
			</div>
			<div class ="locked">
			<label>Images Inside Checkout Review Order Table</label>		
			<div class="imagesCheckoutOption">
				<?php
				if(get_option('imagesInCheckoutCMW') == 'Yes'){
				   $checkedYes = "checked";
				   $checkedNo = "";
				}else{
					$checkedYes = '';
					$checkedNo = "checked";
				}

		
		   ?>
				<input type="radio" value="Yes" name="imagesInCheckout" <?php echo $checkedYes ?> >Yes</input>
				<input type="radio" value="No" name="imagesInCheckout" <?php echo $checkedNo ?>>No</input>
		 <br></br>
		</div>
		</div>
		<div class ="locked">
		 <label>Stepper Icons In Cart,Checkout and Thank You Page</label>
		 <div class="image-container">
		  <img src="<?php echo CMPCH_PATH ."assets/images/steppersIconscheckout.png" ?>"/>
		 </div>
			<div class="imagesCheckoutOption">
				<?php
				if(get_option('stepperIcons') == 'Yes'){
				   $checkedYes = "checked";
				   $checkedNo = "";
				}else{
					$checkedYes = '';
					$checkedNo = "checked";
				}

		
			   ?>

				<input type="radio" value="Yes" name="stepperIcons" <?php echo $checkedYes ?> >Yes</input>
				<input type="radio" value="No" name="stepperIcons" <?php echo $checkedNo ?>>No</input>
			</div>
			</div>
			</br>
			<input type="hidden" name="save_reviewOP" value="true">

			<br></br>
			<div class ="locked">
			<div class="colorSection">
			 Background Color:
			<input type="color" value="<?php echo get_option('chooseBgColorCMW') ?>" id="chooseBgColorCMW" name="chooseBgColorCMW" name="chooseBgColorCMW">
			</div>
			<br>
			<div class="colorSection">
			 Text Color:
			<input type="color" value="<?php echo get_option('chooseTextColorCMW') ?>" id="chooseTextColorCMW" name="chooseTextColorCMW">
			</div>
			<br>
			<div class="colorSection">
			 Font Size:
			<input style="width:60px;" type="number" value="<?php echo get_option('fontSizeCMW') ?>" id="fontSizeCMW" name="fontSizeCMW">px
			</div>
			</div>
			<div class="cmpch-row">
				<input type="hidden" value="true" name="cmpch_pcTemp">
			</div>
	
		


		<?php
			$ncmpch_customcss = 'ncmpch_customcss';
			$custom_css       = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_customcss}"));
			if ( !empty($custom_css) )
			{
				$exiting_css = $custom_css[0]->css;
			}
			else{
				$exiting_css = '';
			}
			
			if(isset($_POST['beforeCheckoutCheckBox']) == 1){
				update_option('beforeCheckoutCheckBox','true');
				 
			}else{
				update_option('beforeCheckoutCheckBox','false');
			}
	
			if(get_option('beforeCheckoutCheckBox') == 'true'){
				$checked = 'checked';
			}
		

			if(isset($_POST['beforeBillingCheckoutCheckBox']) == 1){
				update_option('beforeBillingCheckoutCheckBox','true');
				 
			}else{
				update_option('beforeBillingCheckoutCheckBox','false');
			}
	
			if(get_option('beforeBillingCheckoutCheckBox') == 'true'){
				$checked1 = 'checked';
			}

			if(isset($_POST['checkoutShippingCheckbox']) == 1){
				update_option('checkoutShippingCheckbox','true');
				 
			}else{
				update_option('checkoutShippingCheckbox','false');
			}
	
			if(get_option('checkoutShippingCheckbox') == 'true'){
				$checked2 = 'checked';
			}

			if(isset($_POST['checkoutShippingAfterCheckbox']) == 1){
				update_option('checkoutShippingAfterCheckbox','true');
				 
			}else{
				update_option('checkoutShippingAfterCheckbox','false');
			}
	
			if(get_option('checkoutShippingAfterCheckbox') == 'true'){
				$checked3 = 'checked';
			}

			if(isset($_POST['bOrderReviewHeadingSectionCheckBox']) == 1){
				update_option('bOrderReviewHeadingSectionCheckBox','true');
				 
			}else{
				update_option('bOrderReviewHeadingSectionCheckBox','false');
			}
	
			if(get_option('bOrderReviewHeadingSectionCheckBox') == 'true'){
				$checked4 = 'checked';
			}

			if(isset($_POST['beforeOrderReviewPeymentCheckbox']) == 1){
				update_option('beforeOrderReviewPeymentCheckbox','true');
				 
			}else{
				update_option('beforeOrderReviewPeymentCheckbox','false');
			}
	
			if(get_option('beforeOrderReviewPeymentCheckbox') == 'true'){
				$checked5 = 'checked';
			}
			
			if(isset($_POST['AfterOrderReviewPaymentCheckbox']) == 1){
				update_option('AfterOrderReviewPaymentCheckbox','true');
				 
			}else{
				update_option('AfterOrderReviewPaymentCheckbox','false');
			}
	
			if(get_option('AfterOrderReviewPaymentCheckbox') == 'true'){
				$checked6 = 'checked';
			}
			
			if(isset($_POST['reviewOrderBeforeSubCheckbox']) == 1){
				update_option('reviewOrderBeforeSubCheckbox','true');
				 
			}else{
				update_option('reviewOrderBeforeSubCheckbox','false');
			}
	
			if(get_option('reviewOrderBeforeSubCheckbox') == 'true'){
				$checked7 = 'checked';
			}
			

			if(isset($_POST['checkoutBeforeTermsCheckbox']) == 1){
				update_option('checkoutBeforeTermsCheckbox','true');
				 
			}else{
				update_option('checkoutBeforeTermsCheckbox','false');
			}
	
			if(get_option('checkoutBeforeTermsCheckbox') == 'true'){
				$checked8 = 'checked';
			}
			

			
			function postExist($wpdb,$postType){
				$tableName = $wpdb->prefix ."posts";
				$postExist = $wpdb->get_results("SELECT * FROM $tableName WHERE post_type = '$postType'");
				return $postExist;
			}


			function insertNewPost($post_title,$post_content,$post_type,$wpdb){
				$tableName = $wpdb->prefix ."posts";
				if(!postExist($wpdb,$post_type)[0]){
					$wpdb->query($wpdb->prepare("INSERT INTO $tableName (post_title,post_content,post_type)  VALUES ('$post_title','$post_content','$post_type')"));
				}else{
					$wpdb->query($wpdb->prepare("UPDATE $tableName SET post_title = '$post_title', post_content = '$post_content' WHERE post_type = '$post_type'"));
				}
			}

			if(isset($_POST['contentBeforetextArea'])){
				$post_title = 'contentBeforetextAre';
				$post_content = $_POST['contentBeforetextArea'];
				$postType = 'contentBeforetextAre';
				insertNewPost($post_title,$post_content,$postType,$wpdb);
			}

			if(isset($_POST['contentBeforeBilling'])){
				$post_title = 'contentBeforeBilling';
				$post_content = $_POST['contentBeforeBilling'];
				$postType = 'contentBeforeBilling';
				insertNewPost($post_title,$post_content,$postType,$wpdb);
			}

			if(isset($_POST['checkoutShipping'])){
				$post_title = 'checkoutShipping';
				$post_content = $_POST['checkoutShipping'];
				$postType = 'checkoutShipping';
				insertNewPost($post_title,$post_content,$postType,$wpdb);
			}
			if(isset($_POST['ShippingAfter'])){
				$post_title = 'ShippingAfter';
				$post_content = $_POST['ShippingAfter'];
				$postType = 'ShippingAfter';
				insertNewPost($post_title,$post_content,$postType,$wpdb);
			}

			if(isset($_POST['bOrderReviewHeading'])){
				$post_title = 'bOrderReviewHeading';
				$post_content = $_POST['bOrderReviewHeading'];
				$postType = 'bOrderReviewHeading';
				insertNewPost($post_title,$post_content,$postType,$wpdb);
			}

			if(isset($_POST['beforeOrderReviewPey'])){
				$post_title = 'beforeOrderReviewPey';
				$post_content = $_POST['beforeOrderReviewPey'];
				$postType = 'beforeOrderReviewPey';
				insertNewPost($post_title,$post_content,$postType,$wpdb);
			}

			if(isset($_POST['AfterOrderReviewPay'])){
				$post_title = 'AfterOrderReviewPay';
				$post_content = $_POST['AfterOrderReviewPay'];
				$postType = 'AfterOrderReviewPay';
				insertNewPost($post_title,$post_content,$postType,$wpdb);
			}		
			
			if(isset($_POST['reviewOrderBeforeSub'])){
				$post_title = 'reviewOrderBeforeSub';
				$post_content = $_POST['reviewOrderBeforeSub'];
				$postType = 'reviewOrderBeforeSub';
				insertNewPost($post_title,$post_content,$postType,$wpdb);
			}

			if(isset($_POST['checkoutBeforeTerms'])){
				$post_title = 'checkoutBeforeTerms';
				$post_content = $_POST['checkoutBeforeTerms'];
				$postType = 'checkoutBeforeTerms';
				insertNewPost($post_title,$post_content,$postType,$wpdb);
			}
			

			
			
		?>
		<div class ="locked" style="font-size:30px;">
			<div class ="content_position">
			<h5>Add Content</h5>
			<br>
			<div class="contentBeforeCheckoutContainer">
			  <h6 style="display:inline-block;">Add Content Before Checkout Form</h6>
			  <input style="display:inline-block;" type="checkbox" name="beforeCheckoutCheckBox" <?php echo $checked ?> />
			  <br></br>
			  <h6>Example:</h6>
			  <img style="display:block;"src="<? echo CMPCH_PATH. 'assets/images/beforeCheckoutContentImg1.png'?>" />
				<?php wp_editor( postExist($wpdb,'contentBeforetextAre')[0]->post_content, 'contentBeforetextArea' ); ?>
			</div>
		</div>
		<br></br>
		<div class="contentBeforeCheckoutBillingContainer">
			  <h6 style="display:inline-block;">Add Content Before Checkout Billing Form</h6>
			  <input style="display:inline-block;" type="checkbox" name="beforeBillingCheckoutCheckBox" <?php echo $checked1 ?> />
			  <br></br>
			  <h6>Example:</h6>
			  <img style="display:block; margin-left:-65px;margin-bottom:28px;width:388px;"src="<? echo CMPCH_PATH. 'assets/images/beforeBIlingForm.png'?>" />
				<?php wp_editor( postExist($wpdb,'contentBeforeBilling')[0]->post_content, 'contentBeforeBilling' ); ?>

			</div>
		<br></br>
		<div class="checkoutShippingContainer">
			  <h6 style="display:inline-block;">Add Content Before Checkout Shipping Form</h6>
			  <input style="display:inline-block;" type="checkbox" name="checkoutShippingCheckbox" <?php echo $checked2 ?> />
			  <br></br>
			  <h6>Example:</h6>
			  <img style="display:block; margin-left:-26px;width:388px;"src="<? echo CMPCH_PATH. 'assets/images/checkoutShipping.png'?>" />
				<?php wp_editor( postExist($wpdb,'checkoutShipping')[0]->post_content, 'checkoutShipping' ); ?>

			</div>
		<br></br>
		<div class="checkoutAfterShippingContainer">
			  <h6 style="display:inline-block;">Add Content After Checkout Shipping Form</h6>
			  <input style="display:inline-block;" type="checkbox" name="checkoutShippingAfterCheckbox" <?php echo $checked3 ?> />
			  <br></br>
			  <h6>Example:</h6>
			  <img style="display:block; margin-left:-26px;width:388px;"src="<? echo CMPCH_PATH. 'assets/images/afterShipping.png'?>" />
				<?php wp_editor( postExist($wpdb,'ShippingAfter')[0]->post_content, 'ShippingAfter' ); ?>
			</div>
			<br></br>
		<div class="beforeOrderReviewHeadingSection">
			  <h6 style="display:inline-block;">Add Content Before Checkout Order Review Heading</h6>
			  <input style="display:inline-block;" type="checkbox" name="bOrderReviewHeadingSectionCheckBox" <?php echo $checked4 ?> />
			  <br></br>
			  <h6>Example:</h6>
			  <img style="display:block; margin-left:-26px;width:388px;"src="<? echo CMPCH_PATH. 'assets/images/before_order_review_heading.png'?>" />
				<?php wp_editor( postExist($wpdb,'bOrderReviewHeading')[0]->post_content, 'bOrderReviewHeading' ); ?>

			</div>
			<br></br>
			<div class="beforeOrderReviewPeymentSection">
			  <h6 style="display:inline-block;">Add Content Before Checkout Order Review Payment</h6>
			  <input style="display:inline-block;" type="checkbox" name="beforeOrderReviewPeymentCheckbox" <?php echo $checked5 ?> />
			  <br></br>
			  <h6>Example:</h6>
			  <img style="display:block; margin-left:-26px;width:388px;"src="<? echo CMPCH_PATH. 'assets/images/before_review_order_payment.png'?>" />
				<?php wp_editor( postExist($wpdb,'beforeOrderReviewPey')[0]->post_content, 'beforeOrderReviewPey' ); ?>
			</div>
			<br></br>
			<div class="AfterOrderReviewPaymentSection">
			  <h6 style="display:inline-block;">Add Content After Checkout Order Review Payment</h6>
			  <input style="display:inline-block;" type="checkbox" name="AfterOrderReviewPaymentCheckbox" <?php echo $checked6 ?> />
			  <br></br>
			  <h6>Example:</h6>
			  <img style="display:block; margin-left:-26px;width:388px;"src="<? echo CMPCH_PATH. 'assets/images/woocommerce_review_order_after_payment.png'?>" />
				<?php wp_editor( postExist($wpdb,'AfterOrderReviewPay')[0]->post_content, 'AfterOrderReviewPay' ); ?>

			</div>
			<br></br>
			<div class="reviewOrderBeforeSubmitSection">
			  <h6 style="display:inline-block;">Add Content Before Order Submit</h6>
			  <input style="display:inline-block;" type="checkbox" name="reviewOrderBeforeSubCheckbox" <?php echo $checked7 ?> />
			  <br></br>
			  <h6>Example:</h6>
			  <img style="display:block; margin-left:-26px;width:388px;"src="<? echo CMPCH_PATH. 'assets/images/woocommerce_review_order_before_submit.png'?>" />
			  <br></br>
				<?php wp_editor( postExist($wpdb,'reviewOrderBeforeSub')[0]->post_content, 'reviewOrderBeforeSub' ); ?>
			</div>
			<br></br>
			<div class="checkoutBeforeTermsAndConditionsSection">
			  <h6 style="display:inline-block;">Add Content Before Terms And Conditions</h6>
			  <input style="display:inline-block;" type="checkbox" name="checkoutBeforeTermsCheckbox" <?php echo $checked8 ?> />
			  <br></br>
			  <h6>Example:</h6>
			  <img style="display:block; margin-left:-26px;width:388px;"src="<? echo CMPCH_PATH. 'assets/images/woocommerce_checkout_before_terms_and_conditions.png'?>" />
			  <br></br>
				<?php wp_editor( postExist($wpdb,'checkoutBeforeTerms')[0]->post_content, 'checkoutBeforeTerms' ); ?>
			</div>
			<h6 style="margin-top: 50px;">Custom CSS</h6>
			<div class="cmpch-row">
				<textarea name="cmpc_hcss" class="cmpch_css"><?=$exiting_css?></textarea>
			</div>
			</div>
			<input type="hidden" name="cmpch_customcss" value="true">
			<button type="submit" class="btn btn-outline-success">
			<svg style="padding-right:10px;" height='32' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 96V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V170.5c0-4.2-1.7-8.3-4.7-11.3l33.9-33.9c12 12 18.7 28.3 18.7 45.3V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H309.5c17 0 33.3 6.7 45.3 18.7l74.5 74.5-33.9 33.9L320.8 84.7c-.3-.3-.5-.5-.8-.8V184c0 13.3-10.7 24-24 24H104c-13.3 0-24-10.7-24-24V80H64c-8.8 0-16 7.2-16 16zm80-16v80H272V80H128zm32 240a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z"/></svg>Save Options</button>	
		</form>
	</section>
<?php
}