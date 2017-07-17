<?php

//Geo-Tagging Comments 

function Geo_Get_Author_Location($Author)
{
	global $wpdb;
	
	//Get Comment ID
	$Comment_ID = get_comment_ID(); //Get Comment ID from the loop
	
	$Table_Name = $wpdb->prefix; //Get WordPress Table Prefix
	
	//Get the location from the comments table will return latt,longt
	$Location_Query = @mysql_query('SELECT location FROM `'.$Table_Name.'geo_comments` WHERE `comment_id` = '.$Comment_ID.'');
	$Location_Res = mysql_fetch_array($Location_Query);
	if($Location_Res['location'] != ''){
	//Map Link with Pin
	
	$Map = '<a href="http://maps.google.com/?q=Powered by WordPress Geo-Location@'.$Location_Res['location'].'" target="_blank">
	<img src="'. plugins_url('images/pin.png',__FILE__).'" style="height:15px; width:auto;" title="Location Where This Comment Posted From" /> </a>';
	
	echo $Author . $Map;
	 }
	 else
	 {
		 echo $Author;
		 
		 }
		 
		 
	}

add_filter('get_comment_author', 'Geo_Get_Author_Location');


//Add Geo-Location Link In comments form

function Geo_Add_Form_Link(){
	$tag  = '<script type="text/javascript"  src = "'. plugins_url('js/jquery.js',__FILE__).'"></script>';
	$tag .= '<script type="text/javascript"  src = "'. plugins_url('js/comments_general.js',__FILE__).'"></script>';
	$tag .= "<div id='GeoAPI'></div>";
	$tag .=  '<div id="geo_td" style="background:url('. plugins_url('images/pin.png',__FILE__).') left top no-repeat; background-size:15px; height:30px; width:auto; padding-left:17px;"><a style = "color:red;" href = "#locate" id = "locate">Add Your Location (Geo-Tag Your Comment)</a></div>';
	$tag .= "<input type = 'hidden' name = 'location' id = 'geo_location' value='' />";
	echo $tag;
	
}
	
add_action('comment_form_top', 'Geo_Add_Form_Link');

//Update Comment Location on Database After Submit
function Geo_Place_Comment_Location($comment_ID){
	global $wpdb;
		if($_POST['location'] != null){
		$Table_Name = $wpdb->prefix . "geo_comments";
		$SQL = 'INSERT INTO `'.$Table_Name.'` (`comment_id`, `location`) VALUES("'.$comment_ID.'", "'.$_POST['location'].'")';
		@mysql_query($SQL);
		}else{}
}
	
add_action('comment_form_logged_in_after', 'Geo_Place_Comment_Location');
add_action('wp_insert_comment', 'Geo_Place_Comment_Location');
?>