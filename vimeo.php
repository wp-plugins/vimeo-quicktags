<?php 
/*
Plugin Name: Vimeo Quicktags
Plugin URI: http://denzeldesigns.com
Version: 1.1
Description: insert vimeo quicktag with full embed options as provided by vimeo
Author: Denzel Chia
Author URI: http://denzeldesigns.com
*/

function myplugin_addbuttons() {
   // Don't bother doing this stuff if the current user lacks permissions
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;
 
   // Add only in Rich Editor mode
   if ( get_user_option('rich_editing') == 'true') {
     add_filter("mce_external_plugins", "add_myplugin_tinymce_plugin");
     add_filter('mce_buttons_3', 'register_myplugin_button');
   }
}
 
function register_myplugin_button($buttons) {
   array_push($buttons, "vimeo");
   return $buttons;
}

// determine absolute url path of editor_plugin.js
function url($type) {

	if (file_exists(ABSPATH . "wp-content/plugins/". $type ."/editor_plugin.js")) {
		return "../../../wp-content/plugins/". $type ."/editor_plugin.js";
	
	}else{

	// Return false if we cant find them
	return false;}
}

// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function add_myplugin_tinymce_plugin($plugin_array) {
   $path = url("vimeo-quicktags");
   $plugin_array['vimeo'] = $path;
   return $plugin_array;
}
 
// init process for button control
add_action('init', 'myplugin_addbuttons');

?>