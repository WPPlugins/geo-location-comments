<?php

/*
Plugin Name: Geo-Location
Plugin URI: http://blog.ahmedgeek.com/geo-location-for-wordpress
Description: Geo-Location Support for WordPress Blogs.
Version: 0.2
Author: Ahmed Hussein
Author URI: http://www.ahmedgeek.com
License: GPL2

Copyright 2010  WordPress Geo-Location (email : me@ahmedgeek.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

include_once(ABSPATH . 'wp-content/plugins/geo-location-comments/inc/geo_options.php');
include_once(ABSPATH . 'wp-content/plugins/geo-location-comments/inc/geo_admin_layout.php');
include_once(ABSPATH . 'wp-content/plugins/geo-location-comments/inc/activation_hooks.php');
include_once(ABSPATH . 'wp-content/plugins/geo-location-comments/inc/geo_comments.php');
include_once(ABSPATH . 'wp-content/plugins/geo-location-comments/inc/geo-stats.php');

//Admin menus function
function GeoC_Admin_Box()
{
    add_menu_page('Geo-Location', 'Geo-Location', 8, basename(__file__), '' , plugins_url('icon.png',__FILE__));
    add_submenu_page(basename(__file__), 'Geo-Location Settings', 'Settings', 8, basename(__file__),
        "GeoC_Admin_Layout");

}

//Add Admin Menus
add_action('admin_menu', 'GeoC_Admin_Box');
//Add Stats Menus
add_action('admin_menu', 'GeoC_Stats_Box');
?>