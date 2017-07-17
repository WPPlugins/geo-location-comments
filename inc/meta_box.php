<?php

/*Post & Page Custom Box*/

add_action('admin_menu', 'myplugin_add_custom_box');

function Geo_Loc_Meta_Box(){
	
	echo 'Empty So Far!';
	
	}


function myplugin_add_custom_box() {

  if( function_exists( 'add_meta_box' )) {
	  
    add_meta_box('geo-loc', 'Geo-Location', 'Geo_Loc_Meta_Box', 'post', 'side', 'default', null );
	add_meta_box('geo-loc', 'Geo-Location', 'Geo_Loc_Meta_Box', 'page', 'side', 'default', null );
	
   } else {
    add_action('dbx_post_advanced', 'Geo_Loc_Meta_Box' );
  }
  
}

?>