<?php 
/*
Plugin Name: Vimeo Quicktags
Plugin URI: http://denzeldesigns.com
Version: 2.0
Description: insert vimeo quicktag with full embed options as provided by vimeo
Author: Denzel Chia
Author URI: http://denzeldesigns.com
*/
/*
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

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
    //check if defined WordPress Plugins URL
	if (defined('WP_PLUGINS_URL'))  {
		
		return WP_PLUGINS_URL."/". $type ."/editor_plugin.js";
	
	}else{
    //if not assumme it is default location.
	return "../../../wp-content/plugins/". $type ."/editor_plugin.js";
	
	}
}

// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function add_myplugin_tinymce_plugin($plugin_array) {
   $path = url("vimeo-quicktags");
   $plugin_array['vimeo'] = $path;
   return $plugin_array;
}
 
// init process for button control
add_action('init', 'myplugin_addbuttons');

//since version 2.0
//WordPress Shortcode to print iframe. WordPress editor does not like iframe!
function vimeo_iframe_embed_shortcode($atts) {
	extract( shortcode_atts( array(
		     'video_id' => '',
			 'width'=>'400',
			 'height'=>'225',
			 'title'=>'No',
			 'byline'=>'No',
			 'portrait'=>'No',
			 'color'=>'',
			 'autoplay'=>'No',
			 'loop'=>'No',
		    ), $atts ) );
  
  if($title=="No"){
  $title = "0";
  }else{
  $title = '1';
  }
  
  if($byline=="No"){
  $byline = "0";
  }else{
  $byline = '1';
  }
  
  if($portrait=="No"){
  $portrait = "0";
  }else{
  $portrait = '1';
  }
  
  if($autoplay=="No"){
  $autoplay = "0";
  }else{
  $autoplay = '1';
  }
  
  if($loop=="No"){
  $loop = "0";
  }else{
  $loop = '1';
  }
   
  //construct vimeo iframe! 
  $vimeo_embed = "<iframe style=\"background:#000000;\" src=\"http://player.vimeo.com/video/$video_id";
  $vimeo_embed .="?title=$title&amp;byline=$byline&amp;portrait=$portrait&amp;color=$color&amp;";
  $vimeo_embed .="autoplay=$autoplay&amp;loop=$loop\" width=\"$width\" height=\"$height\" frameborder=\"0\"></iframe>";

  //show vimeo video!
  return $vimeo_embed;
}
add_shortcode('vimeo', 'vimeo_iframe_embed_shortcode');
?>