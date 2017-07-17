<?php

//Admin menus function
function GeoC_Stats_Box()
{
   
    add_submenu_page('geo-location.php', 'Geo-Location Stats', 'Comments Map', 8, basename(__file__),
        "GeoC_Stats_Layout");

}

//Display Map
function GeoC_Stats_Layout()
{
global $wpdb;

$Table_Name = $wpdb->prefix . "geo_comments";

$Query = @mysql_query('SELECT * FROM `'.$Table_Name.'`');

$Map = 'http://maps.google.com/maps/api/staticmap?center=0,0&zoom=1&size=800x400&maptype=roadmap';

while($Results = mysql_fetch_array($Query))
{
	$Map .= "&markers=color:blue|label:".$Results['comment_id']."|".$Results['location']."";
	
	}
$Map .= "&sensor=false";
echo "<br><br><center><h1>World Map With Comments Locations</h1><img style = 'border: 2px solid #3d3d3d;' src='".$Map."' /></center>";
}

?>