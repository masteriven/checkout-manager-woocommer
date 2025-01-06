<?php
function CMPCH_temp_dashboard()
{
	if ( $_POST['cmpch_pcTemp'] ) 
	{		
		if ( empty($_POST['cmpch_coption']) || !isset($_POST['cmpch_coption']) ) 
		{
			echo 'Please template before saving.';
		}
		else
		{
			Global $wpdb;
			$ncmpch_init        = 'ncmpch_init';
			$tempOP             = $_POST['cmpch_coption'];
			$colorCode  = $_POST['chooseColor'];
			$existing_status    = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_init}"));
			if ( empty($existing_status) ) 
			{
				$wpdb->query($wpdb->prepare("INSERT INTO $ncmpch_init (`tempid`,`color`) VALUES (%s,%s)", $tempOP,$colorCode));
			}
			else
			{
				$wpdb->query($wpdb->prepare("UPDATE $ncmpch_init SET tempid=%s", $tempOP ));
				$wpdb->query($wpdb->prepare("UPDATE $ncmpch_init SET color=%s", $colorCode ));
			}
		}
	}

	if ( $_POST['cmpch_mblTemp'] ) 
	{		
		if ( empty($_POST['cmpch_coption_mbl']) || !isset($_POST['cmpch_coption_mbl']) ) 
		{
			echo 'Please Mobile Template before saving.';
		}
		else
		{
			Global $wpdb;
			$ncmpch_init_mbl    = 'ncmpch_init_mbl';
			$cmpch_coption_mbl  = $_POST['cmpch_coption_mbl'];
			$existing_status    = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_init_mbl}"));
			if ( empty($existing_status) ) 
			{
				$wpdb->query($wpdb->prepare("INSERT INTO $ncmpch_init_mbl (`tempid`) VALUES (%s)", $cmpch_coption_mbl ));
			}
			else
			{
				$wpdb->query($wpdb->prepare("UPDATE $ncmpch_init_mbl SET tempid=%s", $cmpch_coption_mbl ));
			}
		}
	}

	Global $wpdb;
	$ncmpch_init        = 'ncmpch_init';
	$existing_status    = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_init}"));
	$previous_choice    = $existing_status[0]->tempid;
	$chosenColor    =     $existing_status[0]->color;

	$ncmpch_init_mbl     = 'ncmpch_init_mbl';
	$existing_tempid     = $wpdb->get_results($wpdb->prepare("SELECT * from {$ncmpch_init_mbl}"));
	$previous_choice_mbl = $existing_tempid[0]->tempid;

	if(isset($_POST['chooseTextColorCMW'])){
		update_option('chooseTextColorCMW',$_POST['chooseTextColorCMW']);
	}

	if(isset($_POST['fontSizeCMW'])){
		update_option('fontSizeCMW',$_POST['fontSizeCMW']);
	}
?>
	<section class="cmpch-sec">
		<h5>Templates</h5>

		<form action="" method="post">
			<div class="cmpch-row">
				<div class="cmpch_opThumb">
					<img src="<?=CMPCH_PATH.'assets/images/lightmode.png'?>" class="cmpch_opDP">
					<label for="cmpch_lightM"> Default
						<input type="radio" value="1" class="cmpch_coption" name="cmpch_coption" id="cmpch_lightM" <?php if($previous_choice==1)echo 'checked'?> >
					</label>
				</div>
				<div class="cmpch_opThumb">
					<img src="<?=CMPCH_PATH.'assets/images/darkmode.png'?>" class="cmpch_opDP">
					<label for="cmpch_darkM">Black Color 
						<input type="radio" value="2" class="cmpch_coption" name="cmpch_coption" id="cmpch_darkM" <?php if($previous_choice==2)echo 'checked'?> >
					</label>
				</div>
				<div class="cmpch_opThumb">
					<img src="<?=CMPCH_PATH.'assets/images/templateType1.png'?>" class="cmpch_opDP">
					<label for="template1">Template 1
						<input type="radio" value="4" class="cmpch_coption" name="cmpch_coption" id="template1" <?php if($previous_choice==4)echo 'checked'?> >
					</label>
				</div>
				<div class="cmpch_opThumb lockedProVersion">
					<span>Pro Version</span>
					<img src="<?=CMPCH_PATH.'assets/images/templateType22.png'?>" class="cmpch_opDP">
					<label for="template2">Template 2
						<input type="radio" value="5" class="cmpch_coption" name="cmpch_coption" id="template2" <?php if($previous_choice==5)echo 'checked'?> >
					</label>
				</div>
				<div class="cmpch_opThumb">
					<img src="<?=CMPCH_PATH.'assets/images/custommode.png'?>" class="cmpch_opDP">
					<label for="cmpch_customM">Custom Template
						<input type="radio" value="3" class="cmpch_coption" name="cmpch_coption" id="cmpch_customM" <?php if($previous_choice==3)echo 'checked'?> >
					</label>
					<a href="/wp-admin/admin.php?page=CMPCH-template-main">(Go To Customization)</a>
				</div>
				<div class="cmpch_opThumb lockedProVersion">
				<span>Pro Version</span>
					<img src="<?=CMPCH_PATH.'assets/images/digitalOnly.png'?>" class="cmpch_opDP">
					<label for="template3">Template Digital Products
						<input type="radio" value="6" class="cmpch_coption" name="cmpch_coption" id="template3" <?php if($previous_choice==6)echo 'checked'?> >
					</label>
				</div>
				<div class="cmpch-row">
				<input type="hidden" value="true" name="cmpch_pcTemp">
				<i class="fa-regular fa-floppy-disk"></i>
				<button type="submit" class="btn btn-outline-success cmpch_selectTemp">
				<svg style="padding-right:10px;" height='32' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 96V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V170.5c0-4.2-1.7-8.3-4.7-11.3l33.9-33.9c12 12 18.7 28.3 18.7 45.3V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H309.5c17 0 33.3 6.7 45.3 18.7l74.5 74.5-33.9 33.9L320.8 84.7c-.3-.3-.5-.5-.8-.8V184c0 13.3-10.7 24-24 24H104c-13.3 0-24-10.7-24-24V80H64c-8.8 0-16 7.2-16 16zm80-16v80H272V80H128zm32 240a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z"/></svg>Save Changes
			</button>	
			</div>
			</div>
			
		</form>
	</section>
<?php		
}