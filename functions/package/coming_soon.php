<?php
	Global $wpdb;
	$nctch_init        = 'nctch_init';
	$existing_status   = $wpdb->get_results($wpdb->prepare("SELECT * FROM `nctch_init`"));
	$heading  = empty($existing_status[0]->heading) ? '' : $existing_status[0]->heading; 
	$time     = empty($existing_status[0]->time) ? '' : $existing_status[0]->time; 
	$template = empty($existing_status[0]->template) ? '' : $existing_status[0]->template;

	$nctch_temp   = 'nctch_temp';
	$temp_design  = $wpdb->get_results($wpdb->prepare("SELECT * from {$nctch_temp}"));
	$page_title         = empty($temp_design[0]->page_title) ? 'GET READY... SOMETHING REALLY COOL IS COMING SOON' : $temp_design[0]->page_title; 
	$page_bg            = empty($temp_design[0]->page_bg) ? NCTCH_PATH.'/functions/data/default.jpg' : $temp_design[0]->page_bg; 
	$main_heading       = empty($temp_design[0]->main_heading) ? 'GET READY... SOMETHING REALLY COOL IS COMING SOON' : $temp_design[0]->main_heading; 
	$main_heading_color = empty($temp_design[0]->main_heading_color) ? '#000000' : $temp_design[0]->main_heading_color; 
	$timer_color        = empty($temp_design[0]->timer_color) ? '#000000' : $temp_design[0]->timer_color; 
	$timer_bgcolor      = empty($temp_design[0]->timer_bgcolor) ? '' : $temp_design[0]->timer_bgcolor; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=$page_title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style type="text/css">
	*{
		box-sizing: border-box;
		margin: 0;
		padding: 
	}	
	body{
		background-position: center;
		background-size: 100% 200vh;
		background-repeat: no-repeat;
	}
	h1{
		margin-top: 150px;
		margin-bottom: 30px;
	}
	/* general styling */
	:root {
	  --smaller: .75;
	}

	

	body {
	  align-items: center;
	  display: flex;
	  font-family: -apple-system, 
	    BlinkMacSystemFont, 
	    "Segoe UI", 
	    Roboto, 
	    Oxygen-Sans, 
	    Ubuntu, 
	    Cantarell, 
	    "Helvetica Neue", 
	    sans-serif;
	}

	.container {
	  color: #333;
	  margin: 0 auto;
	  text-align: center;
	}

	h1 {
	  font-weight: normal;
	  letter-spacing: .125rem;
	  text-transform: uppercase;
	}

	li {
	  display: inline-block;
	  font-size: 1.5em;
	  list-style-type: none;
	  padding: 1em;
	  text-transform: uppercase;
	}

	li span {
	  display: block;
	  font-size: 4.5rem;
	}

	.emoji {
	  display: none;
	  padding: 1rem;
	}

	.emoji span {
	  font-size: 4rem;
	  padding: 0 .5rem;
	}

	@media all and (max-width: 768px) {
	  h1 {
	    font-size: calc(1.5rem * var(--smaller));
	  }
	  
	  li {
	    font-size: calc(1.125rem * var(--smaller));
	  }
	  
	  li span {
	    font-size: calc(3.375rem * var(--smaller));
	  }
	}
</style>
<script>
	(function () {
	  const second = 1000,
	        minute = second * 60,
	        hour = minute * 60,
	        day = hour * 24;

	  //I'm adding this section so I don't have to keep updating this pen every year :-)
	  //remove this if you don't need it
	  <?php
	  if ( empty($time) ) 
	  {
	  	?>
	  		let today = new Date(),
			      dd = String(today.getDate()).padStart(2, "0"),
			      mm = String(today.getMonth() + 1).padStart(2, "0"),
			      yyyy = today.getFullYear(),
			      nextYear = yyyy + 1,
			      dayMonth = "10/28/",
			      birthday = dayMonth + yyyy;
			  
			  today = mm + "/" + dd + "/" + yyyy;
			  if (today > birthday) {
			    birthday = dayMonth + nextYear;
			  }
	  	<?php
	  }
	  else
	  {
	  	?>
	  		birthday = <?='"'.$time.'"'?>;
	  	<?php
	  }
	  ?>
	  
	  //end
	  
	  const countDown = new Date(birthday).getTime(),
	      x = setInterval(function() {    

	        const now = new Date().getTime(),
	              distance = countDown - now;

	        document.getElementById("days").innerText = Math.floor(distance / (day)),
	          document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
	          document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
	          document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

	        //do something later when date is reached
	        // if (distance < 0) {
	        //   document.getElementById("headline").innerText = "It's my birthday!";
	        //   document.getElementById("countdown").style.display = "none";
	        //   document.getElementById("content").style.display = "block";
	        //   clearInterval(x);
	        // }
	        //seconds
	      }, 0)
	  }());
</script>
<body class="ycd-body" style="background: url(<?=$page_bg?>);">
	<section style="text-align: center; width: 100%;">
    	<div class="container">
		<h1 id="headline" style="color: <?=$main_heading_color?>"><?=$main_heading?></h1>
		  <div id="countdown">
		    <ul style="color: <?=$timer_color?>">
		      <li style="background: <?=$timer_bgcolor?>"><span id="days"></span>days</li>
		      <li style="background: <?=$timer_bgcolor?>"><span id="hours"></span>Hours</li>
		      <li style="background: <?=$timer_bgcolor?>"><span id="minutes"></span>Minutes</li>
		      <li style="background: <?=$timer_bgcolor?>"><span id="seconds"></span>Seconds</li>
		    </ul>
		  </div>
		  <div id="content" class="emoji">
		    <span>🥳</span>
		    <span>🎉</span>
		    <span>🎂</span>
		  </div>
		</div>
	</section>
</body>
</html>