<?php

//Create Geo_Comments Table

function Geo_Create_Comments_Table()
{
	global $wpdb;
	
    $table_name = $wpdb->prefix . "geo_comments";
   if($wpdb->get_var("show tables like '".$table_name."'") != $table_name) {
      
      $sql = "CREATE TABLE " . $table_name . " (
	         `comment_id` VARCHAR(32) NOT NULL PRIMARY KEY ,
             `location` VARCHAR(255) NULL
	);";
	
	@mysql_query($sql);
    update_option('geo_location_table_update', 'true');	
   
   }
	
	}
Geo_Create_Comments_Table();

//Update Table Status

function Geo_Update_Table()
{
	global $wpdb;
	
	$Status = get_option('geo_location_table_update');
	
	if($Status == 'false')
	{
		$Table_Name = $wpdb->prefix . "geo_comments";
		@mysql_query('ALTER TABLE  `'.$Table_Name.'` CHANGE  `comment_id`  `comment_id` VARCHAR( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
');
        update_option('geo_location_table_update', 'true');		
		}
	
	}
Geo_Update_Table();

?>